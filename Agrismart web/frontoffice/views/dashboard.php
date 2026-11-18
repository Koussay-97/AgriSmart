<?php
$pageTitle = 'Tableau de bord';
$currentPage = 'dashboard';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once __DIR__ . '/includes/head.php'; ?>
</head>
<body>
<?php require_once __DIR__ . '/includes/spinner.php'; ?>
<?php require_once __DIR__ . '/includes/navbar.php'; ?>

<section class="container py-5">
    <h2 class="text-primary mb-1">Bonjour, <?= e($user->getNom()) ?> 👋</h2>
    <p class="text-muted mb-4">Voici un aperçu de votre activité · Région : <?= e($user->getRegion()) ?></p>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card stat-card p-4 d-flex flex-row align-items-center">
                <div class="icon me-3"><i class="bi bi-house-door"></i></div>
                <div><div class="fs-2 fw-bold"><?= count($exploitations) ?></div><div class="text-muted">Exploitation(s)</div></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card p-4 d-flex flex-row align-items-center">
                <div class="icon me-3"><i class="bi bi-grid-3x3-gap"></i></div>
                <div><div class="fs-2 fw-bold"><?= $nbParcelles ?></div><div class="text-muted">Parcelle(s)</div></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card p-4 d-flex flex-row align-items-center">
                <div class="icon me-3"><i class="bi bi-rulers"></i></div>
                <div><div class="fs-2 fw-bold"><?= number_format($surface, 1, ',', ' ') ?> ha</div><div class="text-muted">Surface totale</div></div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Mes exploitations</h4>
        <a href="<?= url('exploitation-form') ?>" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg"></i> Ajouter</a>
    </div>
    <?php if (!$exploitations): ?>
        <div class="alert alert-info">Vous n'avez pas encore d'exploitation. Commencez par en ajouter une.</div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($exploitations as $ex): ?>
                <div class="col-md-6">
                    <div class="card p-4 h-100">
                        <h5 class="text-primary"><?= e($ex->getNom()) ?></h5>
                        <p class="text-muted mb-2"><i class="bi bi-geo-alt"></i> <?= e($ex->getLocalisation()) ?></p>
                        <p class="mb-3"><?= count($ex->getParcelles()) ?> parcelle(s) · <?= number_format($ex->calculerSurface(), 1, ',', ' ') ?> ha</p>
                        <a href="<?= url('parcelles', ['exploitation' => $ex->getId()]) ?>" class="btn btn-outline-primary btn-sm rounded-pill align-self-start">Voir les parcelles</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>
