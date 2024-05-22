const infosSeances = document.getElementById("infos-seances");
const seance = document.getElementById("seance");
const prevButton = document.getElementById("pre-btn");
const nextButton = document.getElementById("nxt-btn");

nextButton.addEventListener("click", () => {
  const slideWidth = seance.clientWidth;
  infosSeances.scrollLeft += slideWidth;
});

prevButton.addEventListener("click", () => {
  const slideWidth = seance.clientWidth;
  infosSeances.scrollLeft -= slideWidth;
});