function openPopupFilm() {
    document.getElementById('popupFilm').style.display = 'block';
}

function closePopupFilm() {
    document.getElementById('popupFilm').style.display = 'none';
}

function openPopupScreening() {
    document.getElementById('popupScreening').style.display = 'block';
}

function closePopupScreening() {
    document.getElementById('popupScreening').style.display = 'none';
}


function openPopupEdit(popupID) {
   
    var popup = document.getElementById(popupID);
    if (popup) {
        popup.style.display = "block";
    } else {
        console.log("No popup found with ID:", popupID);
    }
}

function closePopupEdit(popupID) {

    var popup = document.getElementById(popupID);
    if (popup) {
        popup.style.display = "none";
    } else {
        console.log("No popup found with ID:", popupID);
    }
}