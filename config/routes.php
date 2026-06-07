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
$router->get('/dashboard', 'AuthController@dashboard');
$router->get('/admin/dashboard', 'AuthController@adminDashboard');
$router->get('/etudiant/dashboard', 'AuthController@etudiantDashboard');
$router->get('/profile', 'AuthController@profileForm');
$router->get('/profil', 'AuthController@profileForm');
$router->get('/presences', 'AuthController@presences');
$router->get('/presence', 'AuthController@presences');
$router->get('/absences', 'AuthController@absences');
$router->get('/absence', 'AuthController@absences');
$router->get('/mes-presences', 'AuthController@mesPresences');
$router->get('/mes_presence', 'AuthController@mesPresences');
$router->get('/mes-absences', 'AuthController@mesAbsences');
$router->get('/mes_absence', 'AuthController@mesAbsences');
$router->get('/conge', 'AuthController@conge');
$router->get('/conges', 'AuthController@conge');
$router->get('/utilisateurs', 'AuthController@utilisateurs');
$router->get('/utilisateur', 'AuthController@utilisateurs');
$router->get('/qrcode', 'AuthController@qrcode');
$router->get('/feries', 'AuthController@feries');
$router->get('/cohorte', 'AuthController@cohorteDept');
$router->get('/notifications', 'AuthController@notifications');
$router->get('/notification', 'AuthController@notifications');
$router->get('/audit-logs', 'AuthController@auditLogs');
$router->get('/audit_log', 'AuthController@auditLogs');

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
$router->post('/profil', 'AuthController@updateProfile');

// Route pour déconnecter l'utilisateur
// URL: http://localhost/logout
// Contrôleur: AuthController, Méthode: logout()
$router->get('/logout', 'AuthController@logout');

//gestion utilisateur
$router->get('/user','UserController@utilisateur');
$router->post('/cohorte/save', 'CohorteController@saveCohorte');
$router->post('/cohorte/toggle', 'CohorteController@toggleCohorte');
$router->post('/departement', 'CohorteController@createDepartment');
