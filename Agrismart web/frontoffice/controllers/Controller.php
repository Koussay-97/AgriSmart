<?php
/** Contrôleur de base : charge une vue en lui passant des données + garde d'accès. */
abstract class Controller
{
    protected function render(string $view, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        require __DIR__ . '/../views/' . $view . '.php';
    }

    /** Autorisation : page réservée aux agriculteurs connectés (redirige vers la connexion sinon, 403 si autre rôle). */
    protected function requireLogin(): Agriculteur
    {
        $user = users()->requireRole(Utilisateur::ROLE_AGRICULTEUR);
        return $user;
    }
}

class Controller404 extends Controller
{
    public function index(): void { $this->render('404'); }
}
