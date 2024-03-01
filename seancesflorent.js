const movieContainer=[...document.querySelectorAll('.movie-container2')];
const previousbtn=[...document.querySelectorAll('.previous-btn')];
const nextbtn=[...document.querySelectorAll('.next-btn')];

movieContainer.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nextBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    previousBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})

const productContainers = [...document.querySelectorAll('.movie-container')];
const nxtBtn = [...document.querySelectorAll('.nxt-btn')];
const preBtn = [...document.querySelectorAll('.pre-btn')];

productContainers.forEach((item, i) => {
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })

    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})