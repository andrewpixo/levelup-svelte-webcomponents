document.addEventListener("DOMContentLoaded", function() {
    const megaMenuToggles = document.querySelectorAll('.js-mega-menu-toggle');
    const navigationOverlay = document.querySelector('.js-main-navigation-overlay');
    let activeToggle;
    let activeMenu;
    let deactivateTimer;

    for(const el of megaMenuToggles) {
        el.addEventListener('mouseover', setupActivateTimer);
        el.addEventListener('focus', setupActivateTimer);

        el.addEventListener('mouseout', setupDeactivateTimer);
        el.addEventListener('focusout', setupDeactivateTimer);
    }

    function setupActivateTimer() {
        if (this.getAttribute('aria-expanded') === 'false') {
            if (activeToggle) {
                deactivateMegaMenu();
            }
            activateMegaMenu(this);
        }
        else {
            clearDeactivateTimer();
        }
    }

    function setupDeactivateTimer() {
        if(deactivateTimer)
            return;

        deactivateTimer = setTimeout(function () {
            if (!activeMenu.matches(':hover') && !activeMenu.matches(':focus-within')) {
                deactivateMegaMenu();
            }
            else {
                clearDeactivateTimer();
            }
        }, 500)
    }

    navigationOverlay.addEventListener('click', function () {
        deactivateMegaMenu();
    });

    function activateMegaMenu(el) {
        let megaMenu = el.parentNode.querySelector('.js-mega-menu');
        activeToggle = el;
        activeMenu = megaMenu;
        el.classList.add('main-navigation__item-link--selected');
        el.setAttribute('aria-expanded', 'true');
        navigationOverlay.setAttribute('data-active', 'true');
        megaMenu.setAttribute('data-active', 'true');
        megaMenu.addEventListener('mouseleave', setupDeactivateTimer);
        megaMenu.addEventListener('focusout', setupDeactivateTimer);

    }

    function deactivateMegaMenu() {
        activeToggle.setAttribute('aria-expanded', 'false');
        activeMenu.removeAttribute('data-active');
        navigationOverlay.removeAttribute('data-active');

        clearDeactivateTimer();
    }

    function clearDeactivateTimer() {
        clearInterval(deactivateTimer);
        deactivateTimer = null;
    }

    document.addEventListener("keydown", function(e) {
        if(e.key === "Escape") {
            if (activeToggle) {
                deactivateMegaMenu();
            }
        }
    });

});
