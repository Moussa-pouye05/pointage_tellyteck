<?php

namespace App\Controllers;

use App\Models\Cohorte;
use App\Models\CohorteDept;
use App\Models\User;

class AuthController
{
    private ?User $users = null;

    public function loginForm(): void
    {
        if ($this->currentUser()) {
            $this->redirectByRole($_SESSION['user']['role']);
        }

        $this->render('auth/loginForm', 'Connexion - Pointage Tellyteck');
    }

    public function login(): void
    {
        $this->validateCsrf();

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $user = $this->users()->findByEmail($email);

        if (!$user || !password_verify($password, $user['password_hash'])) {
            $this->flash('error', 'Email ou mot de passe incorrect.');
            $this->redirect('/');
        }

        if ((int)$user['is_active'] !== 1) {
            $this->flash('error', 'Votre compte est en attente d’activation.');
            $this->redirect('/');
        }
        
        session_regenerate_id(true);
        $_SESSION['user'] = [
            'id' => (int)$user['id'],
            'nom' => $user['nom'],
            'email' => $user['email'],
            'role' => $user['role'],
        ];
        $_SESSION['last_activity'] = time();

        $this->redirectByRole($user['role']);
    }
    public function registerForm(): void
    {
        $this->render('auth/registerForm', 'Inscription - Pointage Tellyteck');
    }

    public function register(): void
    {
        $this->validateCsrf();

        $data = [
            'nom' => trim($_POST['nom'] ?? ''),
            'email' => trim($_POST['email'] ?? ''),
            'password' => $_POST['password'] ?? '',
            'role' => $_POST['role'] ?? 'etudiant',
            'department' => trim($_POST['department'] ?? ''),
            'telephone' => trim($_POST['telephone'] ?? ''),
            'is_active' => 0,
        ];

        if ($data['nom'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL) || strlen($data['password']) < 8) {
            $this->flash('error', 'Nom, email valide et mot de passe de 8 caractères minimum sont requis.');
            $this->redirect('/register-form');
        }

        if (!in_array($data['role'], ['admin', 'etudiant'], true)) {
            $data['role'] = 'etudiant';
        }

        if ($this->users()->findByEmail($data['email'])) {
            $this->flash('error', 'Cet email est déjà utilisé.');
            $this->redirect('/register-form');
        }

        $this->users()->create($data);
        $this->flash('success', 'Compte créé. Un administrateur doit l’activer avant connexion.');
        $this->redirect('/');
    }

    public function logout(): void
    {
        $this->validateCsrfFromQuery();
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }

        session_destroy();
        $this->redirect('/');
    }

    public function adminDashboard(): void
    {
        $user = $this->requireRole('admin');
        $this->render('admin/dashboard', 'Dashboard Admin', ['user' => $user]);
    }

    public function etudiantDashboard(): void
    {
        $user = $this->requireRole('etudiant');
        $this->render('etudiant/dashboard', 'Dashboard Etudiant', ['user' => $user]);
    }

    public function dashboard(): void
    {
        $user = $this->requireAuth();
        $this->redirectByRole($user['role']);
    }

    public function presences(): void
    {
        $user = $this->requireRole('admin');
        $this->render('admin/presences', 'Présences', ['user' => $user]);
    }

    public function absences(): void
    {
        $user = $this->requireRole('admin');
        $this->render('admin/absences', 'Absences', ['user' => $user]);
    }

    public function conge(): void
    {
        $user = $this->requireAuth();
        $view = $user['role'] === 'admin' ? 'admin/conges' : 'etudiant/mes_conges';
        $this->render($view, 'Congé', ['user' => $user]);
    }

    public function utilisateurs(): void
    {
        $user = $this->requireRole('admin');
        $cohortes = (new Cohorte())->findActive();
        $this->render('admin/utilisateurs', 'Utilisateurs', ['user' => $user, 'cohortes' => $cohortes]);
    }

    public function qrcode(): void
    {
        $user = $this->requireAuth();
        $view = $user['role'] === 'admin' ? 'admin/qr_code' : 'etudiant/scanne_qr';
        $this->render($view, 'Scanne QR', ['user' => $user]);
    }

    public function feries(): void
    {
        $user = $this->requireRole('admin');
        $this->render('admin/ferie', 'Jours fériés', ['user' => $user]);
    }
    public function cohorteDept(): void
    {
        $user = $this->requireRole('admin');
        $departements = (new CohorteDept())->allActive();
        $cohortes = (new Cohorte())->findAll();

        $this->render('admin/cohorte', 'Cohorte et departement', ['user' => $user, 'departements' => $departements, 'cohortes' => $cohortes]);
    }

    public function notifications(): void
    {
        $user = $this->requireAuth();
        $view = $user['role'] === 'admin' ? 'admin/notifications' : 'etudiant/notifications';
        $this->render($view, 'Notifications', ['user' => $user]);
    }

    public function mesPresences(): void
    {
        $user = $this->requireRole('etudiant');
        $this->render('etudiant/mes_presences', 'Mes présences', ['user' => $user]);
    }

    public function mesAbsences(): void
    {
        $user = $this->requireRole('etudiant');
        $this->render('etudiant/mes_absences', 'Mes absences', ['user' => $user]);
    }

    public function auditLogs(): void
    {
        $user = $this->requireRole('admin');
        $this->render('admin/audit_logs', 'Audit logs', ['user' => $user]);
    }

    public function profileForm(): void
    {
        $user = $this->requireAuth();
        $this->render('auth/profileForm', 'Mon profil', ['user' => $user]);
    }

    public function updateProfile(): void
    {
        $this->validateCsrf();
        $user = $this->requireAuth();

        $data = [
            'nom' => trim($_POST['nom'] ?? ''),
            'department' => trim($_POST['department'] ?? ''),
            'telephone' => trim($_POST['telephone'] ?? ''),
        ];

        if ($data['nom'] === '') {
            $this->flash('error', 'Le nom est requis.');
            $this->redirect('/profile');
        }

        $photoPath = $this->handleProfilePhoto();
        if ($photoPath !== null) {
            $data['profil'] = $photoPath; 
        }

        $this->users()->updateProfile((int)$user['id'], $data);

        if (!empty($_POST['password'])) {
            if (strlen($_POST['password']) < 8 || $_POST['password'] !== ($_POST['password_confirmation'] ?? '')) {
                $this->flash('error', 'Le nouveau mot de passe doit contenir 8 caractères minimum et être confirmé.');
                $this->redirect('/profile');
            }

            $this->users()->updatePassword((int)$user['id'], $_POST['password']);
        }

        $_SESSION['user']['nom'] = $data['nom'];
        $this->flash('success', 'Profil mis à jour.');
        $this->redirect('/profile');
    }

    public function forgotPasswordForm(): void
    {
        $this->render('auth/forgotPassword', 'Mot de passe oublié');
    }

    public function sendResetLink(): void
    {
        $this->validateCsrf();

        $email = trim($_POST['email'] ?? '');
        $user = $this->users()->findByEmail($email);

        if ($user && (int)$user['is_active'] === 1) {
            $token = bin2hex(random_bytes(32));
            $expiresAt = date('Y-m-d H:i:s', time() + 3600);
            $this->users()->storeResetToken((int)$user['id'], $token, $expiresAt);
            $result = $this->sendPasswordResetEmail($user['email'], $token);

            if (!$result['sent']) {
                $_SESSION['flash']['reset_link'] = $result['link'];
                $this->flash('error', 'Email non envoyé: serveur SMTP local non configuré. Utilisez le lien temporaire affiché ci-dessous.');
                $this->redirect('/forgot-password');
            }
        }

        $this->flash('success', 'Si cet email existe, un lien temporaire a été envoyé.');
        $this->redirect('/forgot-password');
    }

    public function resetPasswordForm(): void
    {
        $token = $_GET['token'] ?? '';
        $user = $token ? $this->users()->findByValidResetToken($token) : null;

        if (!$user) {
            $this->flash('error', 'Lien de réinitialisation invalide ou expiré.');
            $this->redirect('/forgot-password');
        }

        $this->render('auth/resetPassword', 'Réinitialiser le mot de passe', ['token' => $token]);
    }

    public function resetPassword(): void
    {
        $this->validateCsrf();

        $token = $_POST['token'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmation = $_POST['password_confirmation'] ?? '';
        $user = $token ? $this->users()->findByValidResetToken($token) : null;

        if (!$user || strlen($password) < 8 || $password !== $confirmation) {
            $this->flash('error', 'Lien invalide ou mot de passe incorrectement confirmé.');
            $this->redirect('/forgot-password');
        }

        $this->users()->updatePassword((int)$user['id'], $password);
        $this->users()->activate((int)$user['id']);
        $this->flash('success', 'Mot de passe réinitialisé. Vous pouvez vous connecter.');
        $this->redirect('/');
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

    private function currentUser(): ?array
    {
        if (empty($_SESSION['user'])) {
            return null;
        }

        if (!empty($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > SESSION_TIMEOUT) {
            $this->flash('error', 'Session expirée après 30 minutes d’inactivité.');
            $_SESSION['user'] = null;
            unset($_SESSION['user'], $_SESSION['last_activity']);
            return null;
        }

        $_SESSION['last_activity'] = time();
        return $this->users()->findById((int)$_SESSION['user']['id']);
    }

    private function requireAuth(): array
    {
        $user = $this->currentUser();
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
            $this->redirectByRole($user['role']);
        }

        return $user;
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

    private function validateCsrfFromQuery(): void
    {
        $token = $_GET['csrf_token'] ?? '';
        if (!hash_equals($_SESSION['csrf_token'] ?? '', $token)) {
            http_response_code(419);
            exit('Token CSRF invalide.');
        }
    }

    private function handleProfilePhoto(): ?string
    {
        if (empty($_FILES['profil']['tmp_name']) || $_FILES['profil']['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $allowedTypes = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];
        $mime = mime_content_type($_FILES['profil']['tmp_name']);

        if (!isset($allowedTypes[$mime])) {
            $this->flash('error', 'La photo doit être au format JPG, PNG ou WEBP.');
            $this->redirect('/profile');
        }

        if ($_FILES['profil']['size'] > 2 * 1024 * 1024) {
            $this->flash('error', 'La photo ne doit pas dépasser 2 Mo.');
            $this->redirect('/profile');
        }

        $directory = __DIR__ . '/../../public/uploads/profiles';
        if (!is_dir($directory)) {
            mkdir($directory, 0775, true);
        }

        $filename = 'profile_' . ($_SESSION['user']['id'] ?? time()) . '_' . bin2hex(random_bytes(8)) . '.' . $allowedTypes[$mime];
        move_uploaded_file($_FILES['profil']['tmp_name'], $directory . '/' . $filename);

        return 'uploads/profiles/' . $filename;
    }

    private function sendPasswordResetEmail(string $email, string $token): array
    {
        $link = BASE_URL . '/reset-password?token=' . urlencode($token);
        $subject = 'Réinitialisation de votre mot de passe';
        $message = "Bonjour,\n\nCliquez sur ce lien temporaire pour réinitialiser votre mot de passe :\n{$link}\n\nCe lien expire dans 1 heure.";
        $headers = 'From: no-reply@pointage-tellyteck.local';

        $sent = @mail($email, $subject, $message, $headers);

        $logDirectory = __DIR__ . '/../../storage/logs';
        if (!is_dir($logDirectory)) {
            mkdir($logDirectory, 0775, true);
        }

        file_put_contents($logDirectory . '/password_reset_links.log', '[' . date('Y-m-d H:i:s') . '] ' . $email . ' ' . $link . PHP_EOL, FILE_APPEND);

        return [
            'sent' => $sent,
            'link' => $link,
        ];
    }

    private function redirectByRole(string $role): void
    {
        $this->redirect($role === 'admin' ? '/admin/dashboard' : '/etudiant/dashboard');
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
