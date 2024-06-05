document.addEventListener('DOMContentLoaded', () => {
    const menuburger = document.getElementById('menuburger');
    const nav = document.getElementById('nav');
    const loader = document.querySelector('.loader');

    menuburger.addEventListener("click", () => {
        nav.classList.toggle("active");
    });

    window.addEventListener('load', () => {
        loader.classList.add('fondu-out');
    });
});
