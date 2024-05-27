document.addEventListener('DOMContentLoaded', function() {
    const carousels = [...document.querySelectorAll('.movie-container')];
    carousels.forEach((carousel) => {
        const nextBtn = carousel.nextElementSibling;
        const prevBtn = carousel.previousElementSibling;

        nextBtn.addEventListener('click', () => {
            carousel.scrollLeft += carousel.offsetWidth;
        });

        prevBtn.addEventListener('click', () => {
            carousel.scrollLeft -= carousel.offsetWidth;
        });
    });
});
