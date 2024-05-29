const header = document.querySelector(".calendar h3");
const dates = document.querySelector(".dates");
const navs = document.querySelectorAll("#prev, #next");

const months = [
  "January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

let currentDate = new Date();
let month = currentDate.getMonth();
let year = currentDate.getFullYear();

function renderCalendar() {
  const startDay = new Date(year, month, 1).getDay();
  const endDate = new Date(year, month + 1, 0).getDate();
  const endDatePrev = new Date(year, month, 0).getDate();

  let datesHtml = "";

  for (let i = startDay; i > 0; i--) {
    datesHtml += `<li class="inactive">${endDatePrev - i + 1}</li>`;
  }

  for (let i = 1; i <= endDate; i++) {
    let dateFull = `${year}-${String(month+1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
    let className = i === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate.getFullYear() ? 'today' : '';
    let seanceClass = seanceData[dateFull] ? 'seance' : '';
    datesHtml += `<li class="${className} ${seanceClass}"><div class="date-link" data-day="${i}">${i}</div></li>`;
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
    let timeElement = document.createElement('div');
    timeElement.className = 'time-block';
    timeElement.textContent = seanceData[dateClicked].time; 
    rectangleTitle.appendChild(timeElement);
  } else {
    rectangleTitle.textContent = "No seance";
  }
}

dates.addEventListener("click", function(event) {
  const target = event.target.closest('.date-link');
  if (target) {
    const day = target.dataset.day;
    handleDayClick(day);
  }
});

navs.forEach((nav) => {
  nav.addEventListener("click", (e) => {
    if (nav.id === "prev") {
      month = (month === 0) ? 11 : month - 1;
      year = (month === 11) ? year - 1 : year;
    } else {
      month = (month === 11) ? 0 : month + 1;
      year = (month === 0) ? year + 1 : year;
    }
    currentDate = new Date(year, month, currentDate.getDate());
    renderCalendar();
  });
});

document.addEventListener("DOMContentLoaded", renderCalendar);
