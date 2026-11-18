<!-- includes/footer.php : pied de page + bouton "Retour en haut" (workshop étape 6) -->
<footer class="container-fluid bg-dark text-light footer pt-5 mt-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Contact</h4>
                <p class="mb-2"><i class="bi bi-geo-alt me-3"></i>ESPRIT, Tunis, Tunisie</p>
                <p class="mb-2"><i class="bi bi-telephone me-3"></i>+216 00 000 000</p>
                <p class="mb-2"><i class="bi bi-envelope me-3"></i>contact@agrismart.tn</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-sm rounded-circle me-2" href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a class="btn btn-outline-light btn-sm rounded-circle me-2" href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a class="btn btn-outline-light btn-sm rounded-circle" href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Liens rapides</h4>
                <a class="btn btn-link" href="<?= url('home') ?>">Accueil</a>
                <a class="btn btn-link" href="<?= url('login') ?>">Connexion</a>
                <a class="btn btn-link" href="<?= url('register') ?>">Inscription</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Notre mission</h4>
                <p>Cultivons mieux, gaspillons moins. Une plateforme guidée par l'IA pour économiser l'eau et préserver les sols.</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-3">Newsletter</h4>
                <p>Recevez nos conseils agricoles durables.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="email" placeholder="Votre email" aria-label="Email newsletter">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">OK</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright border-top border-secondary py-4 text-center text-md-start">
            &copy; <?= date('Y') ?> AgriSmart · Projet Technologies Web, ESPRIT · Koussay, Khlifi Israa, Lahbib Beya
        </div>
    </div>
</footer>

<!-- Retour en haut -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" aria-label="Retour en haut"><i class="bi bi-arrow-up"></i></a>
