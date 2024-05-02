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
const nextBtn = [...document.querySelectorAll('.nxt-btn')];
const prevBtn = [...document.querySelectorAll('.pre-btn')]; 

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


document.addEventListener("DOMContentLoaded", function() {
    const container = document.querySelector('.movie-container');
    const movies = document.querySelectorAll('.movie-card');
    const totalWidth = movies[0].offsetWidth * movies.length;
    let scrollStep = movies[0].offsetWidth * 3; // Scroll three movies per click

    document.querySelector('.next-button').addEventListener('click', function() {
        if (container.scrollLeft < (totalWidth - scrollStep * 2)) {
            container.scrollBy({ left: scrollStep, behavior: 'smooth' });
        } else {
            container.scrollTo({ left: 0, behavior: 'smooth' }); // Loop back to start
        }
    });

    document.querySelector('.prev-button').addEventListener('click', function() {
        if (container.scrollLeft > 0) {
            container.scrollBy({ left: -scrollStep, behavior: 'smooth' });
        } else {
            container.scrollTo({ left: totalWidth - scrollStep, behavior: 'smooth' }); // Loop to end
        }
    });
});


  
