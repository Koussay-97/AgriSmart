<?php
$pageTitle = 'Parcelles';
$currentPage = 'exploitations';
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
    <nav aria-label="breadcrumb"><ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= url('exploitations') ?>">Mes exploitations</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= e($exploitation->getNom()) ?></li>
    </ol></nav>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="text-primary mb-0">Parcelles · <?= e($exploitation->getNom()) ?></h2>
            <small class="text-muted">Surface totale : <?= number_format($exploitation->calculerSurface(), 1, ',', ' ') ?> ha</small>
        </div>
        <a href="<?= url('parcelle-form', ['exploitation' => $exploitation->getId()]) ?>" class="btn btn-primary rounded-pill"><i class="bi bi-plus-lg"></i> Nouvelle parcelle</a>
    </div>
    <?php if (!$exploitation->getParcelles()): ?>
        <div class="alert alert-info">Cette exploitation n'a pas encore de parcelle.</div>
    <?php else: ?>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead><tr><th>Nom</th><th>Surface</th><th>Type de sol</th><th class="text-end">Actions</th></tr></thead>
                    <tbody>
                    <?php foreach ($exploitation->getParcelles() as $p): ?>
                        <tr>
                            <td class="fw-semibold"><?= e($p->getNom()) ?></td>
                            <td><?= number_format($p->getSurface(), 1, ',', ' ') ?> ha</td>
                            <td><span class="badge text-bg-light border"><?= e($p->getTypeSol()) ?></span></td>
                            <td class="text-end">
                                <a href="<?= url('parcelle-form', ['exploitation' => $exploitation->getId(), 'id' => $p->getId()]) ?>" class="btn btn-sm btn-outline-secondary rounded-pill">Modifier</a>
                                <form method="post" action="<?= url('parcelle-delete', ['exploitation' => $exploitation->getId()]) ?>" class="d-inline js-confirm" data-confirm="Supprimer la parcelle « <?= e($p->getNom()) ?> » ?">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="exploitation" value="<?= $exploitation->getId() ?>">
                                    <input type="hidden" name="id" value="<?= $p->getId() ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill"><i class="bi bi-trash"></i></button>
                                </form>
                                <!-- Membre 3 : lien vers les cultures de la parcelle -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
<?php require_once __DIR__ . '/includes/scripts.php'; ?>
</body>
</html>
