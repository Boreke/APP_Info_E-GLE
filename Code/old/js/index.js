menuburger.addEventListener("click", ()=>{
    nav.classList.toggle("active");
});

const loader = document.querySelector('.loader');

window.addEventListener('load', ()=> {
    loader.classList.add('fondu-out');
})