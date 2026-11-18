<?php /* includes/navbar.php : barre de navigation.
         Variable attendue : $currentPage (clé de la page courante) -> ajoute .active au bon lien (workshop étape 5). */
$currentPage = $currentPage ?? '';
$flash = flash();
?>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm sticky-top px-4 px-lg-5">
    <a href="<?= url('home') ?>" class="navbar-brand d-flex align-items-center">
        <svg width="34" height="34" viewBox="0 0 64 64" class="me-2" aria-hidden="true">
            <rect x="10" y="38" width="10" height="16" rx="3" fill="#2C7A46"/>
            <rect x="27" y="28" width="10" height="26" rx="3" fill="#2C7A46"/>
            <rect x="44" y="16" width="10" height="38" rx="3" fill="#17352A"/>
            <path d="M15 40 L32 30 L49 17" stroke="#E3A72F" stroke-width="3" fill="none" stroke-linecap="round"/>
            <path d="M48 16 C50 6 60 4 62 6 C62 14 56 20 48 16Z" fill="#8FCE9B" stroke="#2C7A46" stroke-width="2"/>
        </svg>
        <h2 class="m-0 fw-bold text-primary">Agri<span class="text-dark">Smart</span></h2>
    </a>
    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-label="Menu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="<?= url('home') ?>" class="nav-item nav-link<?= navActive('home', $currentPage) ?>">Accueil</a>
            <?php if (isLoggedIn()): ?>
                <a href="<?= url('dashboard') ?>" class="nav-item nav-link<?= navActive('dashboard', $currentPage) ?>">Tableau de bord</a>
                <a href="<?= url('exploitations') ?>" class="nav-item nav-link<?= navActive('exploitations', $currentPage) ?>">Mes exploitations</a>
                <a href="<?= url('profile') ?>" class="nav-item nav-link<?= navActive('profile', $currentPage) ?>">Mon profil</a>
                <!-- Membre 2 : Consultations / Membre 3 : Cultures, Météo, Chatbot -->
            <?php endif; ?>
        </div>
        <?php if (isLoggedIn()): ?>
            <form method="post" action="<?= url('logout') ?>" class="d-inline">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-outline-primary rounded-pill px-4 ms-lg-3">Déconnexion <i class="bi bi-box-arrow-right"></i></button>
            </form>
        <?php else: ?>
            <a href="<?= url('login') ?>" class="btn btn-outline-primary rounded-pill px-4 ms-lg-3<?= navActive('login', $currentPage) ?>">Connexion</a>
            <a href="<?= url('register') ?>" class="btn btn-primary rounded-pill px-4 ms-2">S'inscrire</a>
        <?php endif; ?>
    </div>
</nav>
<?php if ($flash): ?>
    <div class="container mt-3">
        <div class="alert alert-<?= e($flash['type']) ?> alert-dismissible fade show mb-0" role="alert">
            <?= e($flash['msg']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    </div>
<?php endif; ?>
