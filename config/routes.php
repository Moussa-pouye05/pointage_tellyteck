<?php
/**
 * ============================================
 * CONFIGURATION DES ROUTES
 * ============================================
 * 
 * Ce fichier définit toutes les routes de l'application.
 * 
 * Une route relie une URL (URI) à un contrôleur et une méthode.
 * 
 * Format:
 * $router->METHOD('URI', 'Contrôleur@méthode');
 * 
 * Exemple:
 * $router->get('/', 'AuthController@loginForm');
 * - Quand l'utilisateur accède à http://localhost/, le navigateur envoie une requête GET
 * - Le routeur appelle la méthode loginForm() du contrôleur AuthController
 * - Cette méthode affiche le formulaire de connexion
 */

/**
 * ROUTES GET - Affichage des pages
 */

// Route racine (page d'accueil) - Affiche le formulaire de connexion
// URL: http://localhost/
// Contrôleur: AuthController, Méthode: loginForm()
$router->get('/', 'AuthController@loginForm');

// Route pour afficher le formulaire d'inscription
// URL: http://localhost/register-form
// Contrôleur: AuthController, Méthode: registerForm()
$router->get('/register-form', 'AuthController@registerForm');
$router->get('/forgot-password', 'AuthController@forgotPasswordForm');
$router->get('/reset-password', 'AuthController@resetPasswordForm');
$router->get('/admin/dashboard', 'AuthController@adminDashboard');
$router->get('/etudiant/dashboard', 'AuthController@etudiantDashboard');
$router->get('/profile', 'AuthController@profileForm');

/**
 * ROUTES POST - Traitement des formulaires
 */

// Route pour traiter la connexion (soumission du formulaire de connexion)
// URL: http://localhost/login (formulaire soumis)
// Contrôleur: AuthController, Méthode: login()
$router->post('/login', 'AuthController@login');

// Route pour traiter l'inscription (soumission du formulaire d'inscription)
// URL: http://localhost/register (formulaire soumis)
// Contrôleur: AuthController, Méthode: register()
$router->post('/register', 'AuthController@register');
$router->post('/forgot-password', 'AuthController@sendResetLink');
$router->post('/reset-password', 'AuthController@resetPassword');
$router->post('/profile', 'AuthController@updateProfile');

// Route pour déconnecter l'utilisateur
// URL: http://localhost/logout
// Contrôleur: AuthController, Méthode: logout()
$router->get('/logout', 'AuthController@logout');

/**
 * COMMENT AJOUTER UNE NOUVELLE ROUTE ?
 * 
 * Exemple: Créer un contrôleur Dashboard
 * 
 * 1. Créer le fichier: app/controllers/DashboardController.php
 *    avec une méthode index()
 * 
 * 2. Ajouter la route:
 *    $router->get('/dashboard', 'DashboardController@index');
 * 
 * 3. Créer la vue: app/views/dashboard/index.php
 * 
 * 4. Dans le contrôleur:
 *    public function index() {
 *        $this->render('dashboard/index');
 *    }
 * 
 * Maintenant, quand l'utilisateur accède à http://localhost/dashboard,
 * il verra la page du tableau de bord.
 */
