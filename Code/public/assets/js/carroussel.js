document.addEventListener("DOMContentLoaded", () => {
  console.log(seances);
  //recuperation des elements de seances
  const infosSeances = document.getElementById("infos-seances");
  const seancesContainer = document.querySelector(".seances-container");
  const seancesElement = document.querySelectorAll(".seance");

  //recuperation des elements de la date
  const DateContainer = document.getElementById("date-container");
  const dateList = document.getElementById("seance-time");
  const date = document.querySelectorAll(".date");

  const prevButton = document.getElementById("pre-btn");
  const nextButton = document.getElementById("nxt-btn");

  var keyShownSeance=0;
  nextButton.addEventListener("click", () => {
    const seanceWidth = seancesElement[0].clientWidth;
    
    seancesContainer.scrollLeft += seanceWidth;
    if(date!=null){
        const dateWidth = date[0].clientWidth;
        dateList.scrollLeft += dateWidth;
    }
    if (!(keyShownSeance >= seancesElement.length - 1)) {
      keyShownSeance += 1;
    }
    updateLayout(seances[keyShownSeance]);
  });

  prevButton.addEventListener("click", () => {
    const seanceWidth = seancesElement[0].clientWidth;
    
    seancesContainer.scrollLeft -= seanceWidth;
    if(date!=null){
      const dateWidth= date[0].clientWidth;
      dateList.scrollLeft -= dateWidth;
    }
    if (!(keyShownSeance <= 0)) {
      keyShownSeance = keyShownSeance - 1;
    }
    updateLayout(seances[keyShownSeance]);
  });
});
function updateLayout(seance) {
  var seats = document.querySelectorAll(".seat");
  for (let i = 0; i < seance.nbr_places_rsv; i++) {
      seats[i].className = "seat occupied";
  }
  for (let i = seance.nbr_places_rsv; i < seance.nbr_places_disp; i++) {
      seats[i].className = "seat";
  }
}
