document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');

    console.log('toggle:', toggle); // <- debug ini
    console.log('navMenu:', navMenu);

    if (!toggle || !navMenu) return;

    toggle.addEventListener('click', () => {
        navMenu.classList.toggle('active');
    });
});
