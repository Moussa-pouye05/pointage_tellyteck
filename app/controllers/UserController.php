<?php

namespace App\Controllers;

use App\Models\Cohorte;
use App\Models\User;
use App\Services\MailService;
use Throwable;

class UserController
{
    private ?User $users = null;

    public function utilisateur(): void
    {
        $user = $this->requireRole('admin');
        $cohortes = (new Cohorte())->findActive();

        $this->render('admin/utilisateurs', 'Utilisateurs', [
            'user' => $user,
            'cohortes' => $cohortes,
        ]);
    }

    public function createStudent(): void
    {
        $this->validateCsrf();
        $this->requireRole('admin');

        $data = [
            'nom' => trim($_POST['nom'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'telephone' => trim($_POST['telephone'] ?? ''),
            'cohort_id' => (int)($_POST['cohorte_id'] ?? 0),
            'role' => 'etudiant',
            'is_active' => 0,
        ];

        if ($data['nom'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) || $data['cohort_id'] < 1) {
            $this->flash('error', 'Nom, email valide et cohorte sont requis.');
            $this->redirect('/utilisateurs');
        }

        if ($this->users()->findByEmail($data['email'])) {
            $this->flash('error', 'Cet email est déjà utilisé.');
            $this->redirect('/utilisateurs');
        }

        $activationToken = bin2hex(random_bytes(32));
        $qrToken = bin2hex(random_bytes(24));
        $data['password'] = bin2hex(random_bytes(12));

        try {
            $userId = $this->users()->createStudentWithQrToken($data, $qrToken);
            $expiresAt = date('Y-m-d H:i:s', time() + 86400);
            $this->users()->storeResetToken($userId, $activationToken, $expiresAt);

            $subject = 'Activation de votre compte';
            $mailResult = $this->sendActivationEmail($data['email'], $data['nom'], $activationToken, $subject);
            $this->users()->logEmail(
                $data['email'],
                $subject,
                $mailResult['sent'] ? 'sent' : 'failed',
                $mailResult['sent'] ? null : $mailResult['error']
            );

            if (!$mailResult['sent']) {
                $_SESSION['flash']['reset_link'] = $mailResult['link'];
                $this->flash('error', 'Compte créé, mais email non envoyé. Le lien temporaire est affiché.');
                $this->redirect('/utilisateurs');
            }

            $this->flash('success', 'Compte étudiant créé. Un email d’activation a été envoyé.');
            $this->redirect('/utilisateurs');
        } catch (Throwable $e) {
            $this->flash('error', 'Impossible de créer le compte étudiant: ' . $e->getMessage());
            $this->redirect('/utilisateurs');
        }
    }

    private function sendActivationEmail(string $email, string $name, string $token, string $subject): array
    {
        $link = BASE_URL . '/reset-password?token=' . urlencode($token);
        $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
        $safeLink = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');
        $body = "
            <p>Bonjour {$safeName},</p>
            <p>Votre compte étudiant a été créé. Cliquez sur le lien ci-dessous pour définir votre mot de passe, activer votre compte et vous connecter à l'application.</p>
            <p><a href=\"{$safeLink}\">Activer mon compte</a></p>
            <p>Ce lien expire dans 24 heures.</p>
        ";

        $mailer = new MailService();
        $sent = $mailer->send($email, $subject, $body);

        return [
            'sent' => $sent,
            'link' => $link,
            'error' => $sent ? null : ($mailer->getLastError() ?: 'Erreur SMTP inconnue'),
        ];
    }

    private function render(string $view, string $title = 'Pointage Tellyteck', array $data = []): void
    {
        $csrfToken = $this->csrfToken();
        extract($data, EXTR_SKIP);

        ob_start();
        require __DIR__ . '/../views/' . $view . '.php';
        $content = ob_get_clean();

        require __DIR__ . '/../views/layouts/main.php';
    }

    private function users(): User
    {
        if ($this->users === null) {
            $this->users = new User();
        }

        return $this->users;
    }

    private function csrfToken(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
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
        $user = $this->users()->findById((int)$_SESSION['user']['id']);

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
}
