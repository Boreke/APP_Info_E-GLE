document.addEventListener("DOMContentLoaded", () => {

  //recuperation des elements de seances
  const infosSeances = document.getElementById("infos-seances");
  const seancesContainer = document.querySelector(".seances-container");
  const seances = document.querySelectorAll(".seance");

  //recuperation des elements de la date
  const DateContainer = document.getElementById("date-container");
  const dateList = document.getElementById("seance-time");
  const date = document.querySelectorAll(".date");

  const prevButton = document.getElementById("pre-btn");
  const nextButton = document.getElementById("nxt-btn");

  if (!infosSeances || !seancesContainer || seances.length === 0 || !prevButton || !nextButton) {
      console.error("One or more elements are missing.");
      return;
  }
  nextButton.addEventListener("click", () => {
      const seanceWidth = seances[0].clientWidth;
      
      seancesContainer.scrollLeft += seanceWidth;
        if(date!=null){
            const dateWidth= date[0].clientWidth;
            dateList.scrollLeft += dateWidth;
        }
  });

  prevButton.addEventListener("click", () => {
      const seanceWidth = seances[0].clientWidth;
      
      seancesContainer.scrollLeft -= seanceWidth;
      if(date!=null){
        const dateWidth= date[0].clientWidth;
        dateList.scrollLeft -= dateWidth;
    }
  });
});
