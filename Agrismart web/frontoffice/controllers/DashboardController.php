<?php
require_once __DIR__ . '/ExploitationController.php';

class DashboardController extends Controller
{
    public function index(): void
    {
        $user = $this->requireLogin();
        $exploitations = (new ExploitationController())->listFor($user->getId());
        $nbParcelles = 0;
        $surface = 0.0;
        foreach ($exploitations as $ex) {
            $nbParcelles += count($ex->getParcelles());
            $surface += $ex->calculerSurface();
        }
        $this->render('dashboard', compact('user', 'exploitations', 'nbParcelles', 'surface'));
    }
}
