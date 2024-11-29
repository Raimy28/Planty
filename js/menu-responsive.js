// Sélection des éléments nécessaires
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuLinks = document.querySelector('.custom-menu-links');

    if (menuToggle && menuLinks) {
        console.log('Menu toggle and links found'); // Debug
        menuToggle.addEventListener('click', function () {
            console.log('Menu toggle clicked'); // Debug
            menuLinks.classList.toggle('open');
        });
    } else {
        console.error('Menu toggle or links not found'); // Debug
    }

    // Optionnel : fermer le menu si un lien est cliqué (utile en mode mobile)
    menuLinks.addEventListener('click', function (event) {
        if (event.target.tagName === 'A') {
            menuLinks.classList.remove('open');
        }
    });
});