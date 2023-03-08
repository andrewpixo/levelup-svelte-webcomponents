document.addEventListener("DOMContentLoaded", function() {
    const smallMainNavigationOverlay = document.querySelector('.js-small-main-navigation-overlay');
    const smallMainNavToggle = document.querySelector('.js-small-main-navigation-toggle');
    const smallMainNavItemToggles = document.querySelectorAll('.small-main-navigation__item-toggle');
    const smallMainNav = document.querySelector('.small-main-navigation');

    for(const el of smallMainNavItemToggles) {
        el.addEventListener('click', function (e) {
            let firstLevelItem = this.closest('.small-main-navigation__item');
            let itemChildren = firstLevelItem.querySelector('.small-main-navigation__children');
            let itemParentLink = firstLevelItem.querySelector('.small-main-navigation__item-link');

            if (this.getAttribute('aria-expanded') === 'true') {
                this.setAttribute('aria-expanded', 'false');
                itemChildren.setAttribute('data-active', 'false');
                itemParentLink.setAttribute('data-active', 'false');
            } else {
                this.setAttribute('aria-expanded', 'true');
                itemChildren.setAttribute('data-active', 'true');
                itemParentLink.setAttribute('data-active', 'true');
            }
        });
    }
    smallMainNavToggle.addEventListener('click', function (e) {
        toggleSmallMainNav();
    });

    smallMainNav.addEventListener('focusout', function () {
        setTimeout(function () {
            if(smallMainNav.matches(':focus-within')) {
            } else {
                closeSmallMainNav()
            }
        }, 10);
    });

    smallMainNavigationOverlay.addEventListener('click', function (e) {
        toggleSmallMainNav();
    });

    document.addEventListener("keydown", function(e) {
        if(e.key === "Escape") {
            if(smallMainNavigationOverlay.hasAttribute('data-active')) {
                closeSmallMainNav();
            }
        }
    });

    function toggleSmallMainNav() {
        if (smallMainNavToggle.getAttribute('aria-expanded') === 'true') {
            closeSmallMainNav();
        } else {
            openSmallMainNav();
        }
    }
    function closeSmallMainNav() {
        smallMainNavToggle.setAttribute('aria-expanded', 'false');
        smallMainNav.removeAttribute('data-expanding');
        smallMainNav.setAttribute('data-collapsing', 'true');
        smallMainNavigationOverlay.removeAttribute('data-active');
        smallMainNav.removeAttribute('data-collapsing');
        smallMainNav.setAttribute('data-expanded', 'false');
    }
    function openSmallMainNav() {
        smallMainNavToggle.setAttribute('aria-expanded', 'true');
        smallMainNav.removeAttribute('data-collapsing');
        smallMainNav.setAttribute('data-expanding', 'true');
        smallMainNavigationOverlay.setAttribute('data-active', 'true');
        smallMainNav.removeAttribute('data-expanding');
        smallMainNav.setAttribute('data-expanded', 'true');
    }
});
