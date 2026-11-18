<?php
$pageTitle = 'Page introuvable';
$currentPage = '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once __DIR__ . '/includes/head.php'; ?>
</head>
<body>
<?php require_once __DIR__ . '/includes/spinner.php'; ?>
<?php require_once __DIR__ . '/includes/navbar.php'; ?>

<section class="container py-5 text-center">
    <h1 class="display-1 text-primary">404</h1>
    <h3 class="mb-3">Page introuvable</h3>
    <p class="text-muted">La page demandée n'existe pas ou n'est pas encore disponible.</p>
    <a href="<?= url('home') ?>" class="btn btn-primary rounded-pill px-5">Retour à l'accueil</a>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>
