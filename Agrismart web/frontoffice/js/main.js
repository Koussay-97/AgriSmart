/* AgriSmart Front Office : spinner + bouton retour en haut.
   Si le template fournit son propre main.js, copier sa logique ici ou le remplacer. */
(function () {
    // Masquer le spinner une fois la page chargée
    window.addEventListener('load', function () {
        var spinner = document.getElementById('spinner');
        if (spinner) { setTimeout(function () { spinner.classList.remove('show'); spinner.style.display = 'none'; }, 150); }
    });

    // Bouton "retour en haut"
    var backToTop = document.querySelector('.back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', function () {
            backToTop.style.display = window.scrollY > 300 ? 'flex' : 'none';
        });
        backToTop.addEventListener('click', function (e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
})();

// Confirmation avant action destructive : <form class="js-confirm" data-confirm="Message ?">
// (pas de JavaScript inline dans les pages : la Content-Security-Policy l'interdit)
document.addEventListener('submit', function (e) {
    var form = e.target;
    if (form.classList && form.classList.contains('js-confirm') && !e.defaultPrevented) {
        if (!window.confirm(form.getAttribute('data-confirm') || 'Confirmer ?')) { e.preventDefault(); }
    }
});
