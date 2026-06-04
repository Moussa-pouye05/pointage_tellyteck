- [ ] Injecter l’affichage de `$_SESSION['flash']['error']` dans `app/views/auth/loginForm.php` après la section “Bienvenue”, puis `unset` après rendu.
- [ ] Supprimer (ou désactiver) l’affichage toast `flash['error']` dans `app/views/layouts/main.php` pour éviter le doublon.
- [ ] Tester : login avec identifiants incorrects => message sous “Bienvenue”.
- [ ] Tester : success/reset_link => inchangé.

