<?php /* includes/scripts.php : scripts JS communs (workshop étape 7) */ ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- TODO template : ajouter ici les scripts du template (jQuery, wow, owlcarousel...) copiés dans lib/ -->
<script src="js/validate.js"></script>
<script src="js/main.js"></script>
<?php if (!empty($extraScripts)): ?>
    <?= $extraScripts ?>
<?php endif; ?>
