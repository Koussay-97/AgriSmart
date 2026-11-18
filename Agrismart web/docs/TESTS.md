# Scénarios de test (validation)

Prérequis : base importée, FO sur `:8000`, BO sur `:8001` (voir README).

## Authentification et sessions
- [ ] Inscription FO avec données valides -> redirection vers la connexion ; en base, le mot de passe commence par `$2y$` (pas en clair).
- [ ] Inscription avec email déjà utilisé / mot de passe faible / confirmation différente -> messages d'erreur (JS puis serveur : désactiver JS pour vérifier).
- [ ] Connexion FO réussie -> tableau de bord ; mauvais mot de passe -> « Email ou mot de passe incorrect. ».
- [ ] `index.php?page=dashboard` sans être connecté -> redirigé vers la connexion.
- [ ] Après déconnexion, bouton Précédent du navigateur -> pas d'accès aux pages protégées.
- [ ] DevTools > Application > Cookies : `AGRISMART_FO`, HttpOnly, SameSite=Lax ; la valeur change après reconnexion.
- [ ] Expiration : mettre `session_lifetime` à 10 dans `config/config.php`, attendre 10 s, recharger -> retour à la connexion (remettre 1800).
- [ ] 5 mauvais mots de passe sur le même email -> « Trop de tentatives... » (`DELETE FROM tentative_connexion;` pour débloquer).

## Rôles et autorisation
- [ ] `admin@agrismart.tn` sur le BO -> tableau de bord ; un agriculteur sur le BO -> « Accès réservé aux administrateurs. ».
- [ ] Un admin sur le FO -> message l'invitant à utiliser le Back Office.
- [ ] BO : `index.php?page=utilisateurs` sans connexion -> redirigé vers `login`.
- [ ] Agriculteur A : ouvrir `index.php?page=parcelles&exploitation=<id d'une exploitation de B>` -> « Exploitation introuvable. » (propriété vérifiée).
- [ ] Dans phpMyAdmin, passer le rôle d'un agriculteur connecté à `administrateur` puis recharger une page du FO -> **403** immédiat (rôle relu en base).
- [ ] Bloquer un compte depuis le BO pendant qu'il est connecté -> sa prochaine requête le déconnecte.

## CRUD utilisateurs (Back Office)
- [ ] Ajouter un agriculteur (téléphone + région obligatoires) et un administrateur (non obligatoires).
- [ ] Consulter (icône œil) : infos + exploitations.
- [ ] Modifier : nom, email, rôle, statut ; mot de passe vide = inchangé.
- [ ] Changer le rôle depuis la liste (liste déroulante).
- [ ] Bloquer / activer un compte ; le compte bloqué ne peut plus se connecter.
- [ ] Supprimer -> modale de confirmation ; ses exploitations/parcelles disparaissent (cascade).
- [ ] Garde-fous : impossible de se supprimer / se bloquer / se rétrograder soi-même ; impossible de supprimer le dernier admin actif.
- [ ] Recherche par nom/email, filtres rôle/région/statut, pagination (ajouter > 10 utilisateurs).

## Failles
- [ ] **Injection SQL** : email `' OR '1'='1` (passer le champ en `type="text"` via F12) -> connexion refusée.
- [ ] **XSS** : `INSERT INTO utilisateur (nom, email, mot_de_passe, role, telephone, region) VALUES ('<script>alert(1)</script>', 'xss@test.tn', '<hash>', 'agriculteur', '+216 98 000 000', 'Tunis');` -> le nom s'affiche en texte brut partout (FO et liste BO), sans popup.
- [ ] **CSRF** : F12 > supprimer le champ caché `csrf_token` d'un formulaire puis l'envoyer -> page « 419 Jeton de sécurité invalide ».
- [ ] **Fixation de session** : le cookie de session change à la connexion.
- [ ] En-têtes : onglet Réseau, requête document -> `Content-Security-Policy`, `X-Frame-Options: DENY`, `X-Content-Type-Options: nosniff`.

## Exploitations / parcelles (FO)
- [ ] Ajouter / modifier / supprimer une exploitation et une parcelle (surface `3,5` acceptée, `0` ou `abc` refusée).
