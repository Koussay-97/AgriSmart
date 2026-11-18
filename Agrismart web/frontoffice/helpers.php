<?php
/** Helpers propres au Front Office (e(), url(), redirect(), flash() sont dans ../core/helpers.php). */

/** Contrôleur utilisateurs partagé (une seule instance par requête). */
function users(): UserController
{
    static $controller = null;
    if ($controller === null) {
        $controller = new UserController();
    }
    return $controller;
}

/** Agriculteur connecté (relu en base), ou null. */
function currentUser(): ?Agriculteur
{
    $u = users()->currentUser();
    return $u instanceof Agriculteur ? $u : null;
}

function isLoggedIn(): bool
{
    return currentUser() !== null;
}

/** Classe .active pour le lien de navbar correspondant à la page courante (workshop étape 5). */
function navActive(string $key, string $currentPage): string
{
    return $key === $currentPage ? ' active' : '';
}
