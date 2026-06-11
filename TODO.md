# TODO - Gestion des étudiants

## Import Excel (obligatoire)
- [ ] Ajouter UI d’import (upload fichier + CSRF) dans `app/views/admin/utilisateurs.php`.
- [ ] Ajouter route POST import dans `config/routes.php`.
- [ ] Ajouter méthode controller `UserController@importStudents`.
- [ ] Ajouter parsing Excel/CSV côté backend (solution sans dépendances externes si possible).
- [ ] Créer des étudiants en base + génération QR + activation token / password reset.
- [ ] Gestion des doublons email (éviter insert si email existe).
- [ ] Retour de statut (succès/erreurs) via flash message.

## Statistiques
- [ ] Corriger `new_this_month` (actuellement à 0) dans `app/models/User.php`.

## Dynamiser les cartes (section 2)
- [ ] Clarifier : option 2 choisie (côté client). Mettre en place JS qui charge/filtre/pagine via API.
- [ ] Ajouter endpoints JSON si nécessaire (ex: `/utilisateurs/api` pour liste paginée filtrée).
- [ ] Mettre à jour `public/assets/js/utilisateur.js`.
- [ ] Supprimer/neutraliser pagination serveur si bascule totale.

## Vérifications backend
- [ ] Vérifier cohérence jointures (`qr_code.token`) dans `searchStudents`.
- [ ] Vérifier routes et formulaires (POST toggle/create/update) + CSRF.

## Tests
- [ ] Tester : filtrer/rechercher/reinitialiser + pagination.
- [ ] Tester : activer/désactiver.
- [ ] Tester : import Excel (cas normal + lignes invalides + doublons).

