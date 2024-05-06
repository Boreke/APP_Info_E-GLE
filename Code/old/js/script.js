const productContainers = [...document.querySelectorAll('.movie-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    });

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    });
});

const FilmContenu = [...document.querySelectorAll('.movie-contenu')];
const nextBtn = [...document.querySelectorAll('.next-btn')]; 
const previousBtn = [...document.querySelectorAll('.previous-btn')];

FilmContenu.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nextBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    });

    previousBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    });
});
const FilmVenirContenu = [...document.querySelectorAll('.movie-venir-contenu')];
const suivantBtn = [...document.querySelectorAll('.suivant-btn')]; 
const precedentBtn = [...document.querySelectorAll('.precedent-btn')]; 
FilmVenirContenu.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    suivantBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    });

    precedentBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    });
});

