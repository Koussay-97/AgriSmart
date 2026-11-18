<?php
$pageTitle = 'Accueil';
$currentPage = 'home';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once __DIR__ . '/includes/head.php'; ?>
</head>
<body>
<?php require_once __DIR__ . '/includes/spinner.php'; ?>
<?php require_once __DIR__ . '/includes/navbar.php'; ?>

<!-- Hero -->
<header class="hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <p class="tagline mb-2">Transition écologique · Agriculture · Gestion durable des ressources</p>
                <h1 class="display-4 mb-3">Agri<span class="text-ochre">Smart</span></h1>
                <p class="lead mb-4">Cultivons mieux, gaspillons moins. Une plateforme web guidée par l'IA qui aide les agriculteurs à économiser l'eau, préserver les sols et produire durablement.</p>
                <?php if (isLoggedIn()): ?>
                    <a href="<?= url('dashboard') ?>" class="btn btn-ochre btn-lg rounded-pill px-5">Mon tableau de bord</a>
                <?php else: ?>
                    <a href="<?= url('register') ?>" class="btn btn-ochre btn-lg rounded-pill px-5 me-2">Commencer</a>
                    <a href="<?= url('login') ?>" class="btn btn-outline-light btn-lg rounded-pill px-5">Se connecter</a>
                <?php endif; ?>
            </div>
            <div class="col-lg-5 text-center">
                <i class="bi bi-flower2 text-ochre" style="font-size: 9rem;"></i>
            </div>
        </div>
    </div>
</header>

<!-- Constats -->
<section class="container py-5 mt-4">
    <div class="text-center mb-5">
        <h2 class="text-primary">Pourquoi AgriSmart ?</h2>
        <p class="text-muted">Parce que chaque goutte et chaque graine comptent.</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 p-4 stat-card">
                <div class="icon mb-3"><i class="bi bi-droplet-half"></i></div>
                <h5 class="text-primary">Pression sur l'eau</h5>
                <p class="mb-0">L'irrigation consomme beaucoup, et la ressource est limitée dans un climat de plus en plus sec.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 p-4 stat-card">
                <div class="icon mb-3"><i class="bi bi-tree"></i></div>
                <h5 class="text-primary">Sols fragilisés</h5>
                <p class="mb-0">Un excès d'engrais et de mauvaises pratiques appauvrissent la terre et la biodiversité.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 p-4 stat-card">
                <div class="icon mb-3"><i class="bi bi-tools"></i></div>
                <h5 class="text-primary">Outils peu accessibles</h5>
                <p class="mb-0">Beaucoup d'agriculteurs n'ont ni conseils fiables ni outils adaptés à leur taille.</p>
            </div>
        </div>
    </div>
</section>

<!-- Objectifs -->
<section class="container py-4">
    <div class="text-center mb-5"><h2 class="text-primary">Nos objectifs</h2></div>
    <div class="row g-4 text-center">
        <div class="col-md-6 col-lg-3"><div class="card h-100 p-4"><i class="bi bi-water fs-1 text-primary"></i><h5 class="mt-2">Ressources</h5><p class="mb-0">Réduire le gaspillage d'eau, d'engrais et d'énergie.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="card h-100 p-4"><i class="bi bi-flower1 fs-1 text-primary"></i><h5 class="mt-2">Sols &amp; biodiversité</h5><p class="mb-0">Encourager des pratiques agroécologiques.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="card h-100 p-4"><i class="bi bi-person-check fs-1 text-primary"></i><h5 class="mt-2">Accompagnement</h5><p class="mb-0">Offrir des conseils fiables et accessibles à tous.</p></div></div>
        <div class="col-md-6 col-lg-3"><div class="card h-100 p-4"><i class="bi bi-people fs-1 text-primary"></i><h5 class="mt-2">Communauté</h5><p class="mb-0">Partager les bonnes pratiques entre agriculteurs.</p></div></div>
    </div>
</section>

<!-- Étapes d'utilisation -->
<section class="container py-5">
    <div class="text-center mb-5"><h2 class="text-primary">Comment ça marche ?</h2></div>
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <?php
            $etapes = [
                "L'agriculteur crée son compte et décrit son exploitation (cultures, surface, région).",
                "Il renseigne ses parcelles : sol, irrigation, intrants, consommation d'eau.",
                "L'IA analyse les données et propose un plan : irrigation, rotation, alertes météo.",
                "Un expert agronome valide les conseils sensibles avant leur diffusion.",
                "Le tableau de bord mesure l'eau économisée et l'impact écologique.",
            ];
            foreach ($etapes as $i => $texte): ?>
                <div class="d-flex align-items-center mb-3">
                    <div class="step-number me-3"><?= $i + 1 ?></div>
                    <p class="mb-0 fs-5"><?= e($texte) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Appel à l'action -->
<?php if (!isLoggedIn()): ?>
<section class="container pb-4">
    <div class="bg-forest rounded-4 p-5 text-center">
        <h3 class="mb-3">Prêt à cultiver durablement ?</h3>
        <a href="<?= url('register') ?>" class="btn btn-ochre btn-lg rounded-pill px-5">Créer mon compte</a>
    </div>
</section>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>
