const header = document.querySelector(".calendar h3");
const dates = document.querySelector(".dates");
const navs = document.querySelectorAll("#prev, #next");

const months = [
  "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

const currentDate = new Date();
let month = currentDate.getMonth();
let year = currentDate.getFullYear();
var seanceId;
let dateMax=new Date(year, month, getDaysInMonth(year, month));

function renderCalendar() {
  const startDay = new Date(year, month, 1).getDay();

  const endDatePrev = new Date(year, month, 0).getDate();

  let datesHtml = "";

  for (let i = startDay; i > 0; i--) {
    datesHtml += `<li class="inactive">${endDatePrev - i + 1}</li>`;
  }
  
  for (var d = new Date(year, month, 1); d <= dateMax; d.setDate(d.getDate() + 1)) {
    let dateFull = `${year}-${String(month+1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`;
    let className = d.getDate() === currentDate.getDate() && d.getMonth() === currentDate.getMonth() && d.getFullYear() === currentDate.getFullYear() ? 'today' : '';
    let seanceClass = seanceData[dateFull] ? 'seance' : '';
    let pastClass = d < currentDate.setHours(0, 0, 0, 0) ? 'past' : '';
    datesHtml += `<li class="${className} ${seanceClass} ${pastClass}"><div class="date-link" data-day="${d.getDate()}">${d.getDate()}</div></li>`;
  }

  dates.innerHTML = datesHtml;
  header.textContent = `${months[month]} ${year}`;
}

function handleDayClick(day) {
  let dateClicked = `${year}-${String(month+1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;

  header.textContent = `${months[month]} ${year} - ${day}`;
  var rectangleTitle = document.getElementById('rectangleTitle');
  rectangleTitle.innerHTML = ''; 

  if (seanceData[dateClicked]) {
    seanceData[dateClicked].forEach(seance => {
      let timeElement = document.createElement('div');
      let hour=document.createElement('h3');
      let seanceInfo=document.createElement('p');
      hour.className='hour-header';
      seanceInfo.className="info-seance";
      timeElement.className = 'time-block';
      timeElement.id=seance.id;
      hour.textContent = seance.time;
      seanceInfo.textContent= "cinema:"+seance.nomCinema+" \nprix: "+seance.price+"€";
      timeElement.appendChild(hour);
      timeElement.appendChild(seanceInfo);
      rectangleTitle.appendChild(timeElement);
      timeElement.addEventListener('click',function(){
        seanceId=timeElement.id;
        showReservation();
      });
    }); 
  } else {
    rectangleTitle.textContent = "Aucune séance de disponible";
  }
  
}

dates.addEventListener("click", function(event) {
  const target = event.target.closest('.date-link');
  
  if (target) {
    const day = target.dataset.day;
    console.log(day);
    handleDayClick(day);
  }
});

function getDaysInMonth(year, month) {
  return new Date(year, month + 1, 0).getDate();
}

navs.forEach((nav) => {
  nav.addEventListener("click", (e) => {
    if (nav.id === "prev") {
      month = (month === 0) ? 11 : month - 1;
      year = (month === 11) ? year - 1 : year;
    } else {
      month = (month === 11) ? 0 : month + 1;
      year = (month === 0) ? year + 1 : year;
    }
    dateMax= new Date(year, month, getDaysInMonth(year, month));
    renderCalendar();
  });
});

document.addEventListener("DOMContentLoaded", renderCalendar);

function showReservation() {
  document.getElementById("festival-popup").style.display = "flex";
  document.getElementById("festival-popup").style.justifyContent = "space-around";
  document.getElementById("festival-popup").style.alignContent = "center";
  document.getElementById("festival-popup").style.alignItems = "center";
  document.body.classList.add('no-scroll');
}

function hideReservation() {
  document.getElementById("festival-popup").style.display = "none";
  document.body.classList.remove('no-scroll');
}

function reserveSeats() {
    
  document.getElementById('festival-popup').style.display = 'none';
  document.body.classList.remove('no-scroll');
}
var form=document.getElementById('form');
form.addEventListener('submit',function(e){
  e.preventDefault();
  var formData = {
    seatCount: $("#seatCount").val(),
    cardNumber: $("#cardNumber").val(),
    expiryDate: $("#expiryDate").val(),
    owner: $("#owner").val(),
    cvc: $("#cvc").val(),
    idSeanceClicked:seanceId,
  };
  let url= root+"calendar/checkPayment";
  
  console.log(formData);
  $.ajax({
    url: url,
    type: "POST",
    data: formData,
    success: function(response) {
      console.log(response);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error("Error:", errorThrown);
      alert("An error occurred during form submission. Please try again later.");
    }
  });
});
