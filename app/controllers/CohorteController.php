<?php

namespace App\Controllers;

use App\Models\Cohorte;
use App\Models\CohorteDept;
use App\Models\User;

class CohorteController
{
    private ?CohorteDept $departements = null;
    private ?Cohorte $cohortes = null;

    public function saveCohorte(): void
    {
        $this->validateCsrf();
        $this->requireRole('admin');

        $cohorteId = (int)($_POST['cohorte_id'] ?? 0);
        $departmentId = (int)($_POST['department_id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $workDays = $_POST['work_days'] ?? [];
        $startTime = trim($_POST['start_time'] ?? '');
        $endTime = trim($_POST['end_time'] ?? '');
        $isActive = $_POST['is_active'] ?? '1';

        $workDays = array_filter(array_map('trim', (array)$workDays));
        $workDaysString = implode(',', $workDays);

        if ($departmentId < 1 || $name === '' || $workDaysString === '' || $startTime === '' || $endTime === '') {
            $this->flash('error', 'Tous les champs obligatoires doivent être remplis.');
            $this->redirect('/cohorte');
        }

        $data = [
            'department_id' => $departmentId,
            'name' => $name,
            'work_days' => $workDaysString,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'is_active' => $isActive === '1' ? 1 : 0,
        ];

        if ($cohorteId > 0) {
            $saved = $this->cohortes()->update($cohorteId, $data);
            $message = $saved ? 'Cohorte mise à jour avec succès.' : 'Impossible de mettre à jour la cohorte.';
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $saved = $this->cohortes()->create($data);
            $message = $saved ? 'Cohorte créée avec succès.' : 'Impossible de créer la cohorte.';
        }

        if (!$saved) {
            $this->flash('error', $message);
            $this->redirect('/cohorte');
        }

        $this->flash('success', $message);
        $this->redirect('/cohorte');
    }

    public function toggleCohorte(): void
    {
        $this->validateCsrf();
        $this->requireRole('admin');

        $cohorteId = (int)($_POST['id'] ?? 0);
        $isActive = $_POST['is_active'] ?? '1';

        if ($cohorteId < 1) {
            $this->flash('error', 'Identifiant de cohorte invalide.');
            $this->redirect('/cohorte');
        }

        $updated = $this->cohortes()->toggleActive($cohorteId, $isActive === '1' ? 1 : 0);
        $message = $updated ? 'Statut de la cohorte mis à jour.' : 'Impossible de mettre à jour le statut de la cohorte.';

        if (!$updated) {
            $this->flash('error', $message);
            $this->redirect('/cohorte');
        }

        $this->flash('success', $message);
        $this->redirect('/cohorte');
    }

    public function createDepartment(): void
    {
        $this->validateCsrf();
        $this->requireRole('admin');

        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $isActive = $_POST['is_active'] ?? '1';

        if ($name === '') {
            $this->flash('error', 'Le nom du département est requis.');
            $this->redirect('/cohorte');
        }

        $code = $this->generateCode($name);

        $created = $this->departements()->create([
            'name' => $name,
            'code' => $code,
            'description' => $description,
            'is_active' => $isActive === '1' ? 1 : 0,
        ]);

        if (!$created) {
            $this->flash('error', 'Impossible de créer le département. Réessayez plus tard.');
            $this->redirect('/cohorte');
        }

        $this->flash('success', 'Département créé avec succès.');
        $this->redirect('/cohorte');
    }

    private function departements(): CohorteDept
    {
        if ($this->departements === null) {
            $this->departements = new CohorteDept();
        }

        return $this->departements;
    }

    private function cohortes(): Cohorte
    {
        if ($this->cohortes === null) {
            $this->cohortes = new Cohorte();
        }

        return $this->cohortes;
    }

    private function redirect(string $path): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_write_close();
        }

        $statusCode = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' ? 303 : 302;
        header('Location: ' . BASE_URL . $path, true, $statusCode);
        exit;
    }

    private function flash(string $type, string $message): void
    {
        $_SESSION['flash'][$type] = $message;
    }

    private function validateCsrf(): void
    {
        $token = $_POST['csrf_token'] ?? '';
        if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
            http_response_code(419);
            exit('Token CSRF invalide.');
        }
    }

    private function requireAuth(): array
    {
        if (empty($_SESSION['user'])) {
            $this->redirect('/');
        }

        if (!empty($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > SESSION_TIMEOUT) {
            $this->flash('error', 'Session expirée après 30 minutes d’inactivité.');
            unset($_SESSION['user'], $_SESSION['last_activity']);
            $this->redirect('/');
        }

        $_SESSION['last_activity'] = time();

        $userModel = new User();
        $user = $userModel->findById((int)$_SESSION['user']['id']);

        if (!$user) {
            $this->redirect('/');
        }

        return $user;
    }

    private function requireRole(string $role): array
    {
        $user = $this->requireAuth();
        if ($user['role'] !== $role) {
            $this->flash('error', 'Accès non autorisé.');
            $this->redirect($user['role'] === 'admin' ? '/admin/dashboard' : '/etudiant/dashboard');
        }

        return $user;
    }

    private function generateCode(string $name): string
    {
        $slug = preg_replace('/[^A-Za-z0-9]+/', '-', trim($name));
        $slug = strtoupper(trim($slug, '-'));
        $parts = explode('-', $slug);
        $prefix = substr(implode('', array_map(function ($part) {
            return substr($part, 0, 3);
        }, $parts)), 0, 6);

        return $prefix . '-' . strtoupper(bin2hex(random_bytes(2)));
    }
}
