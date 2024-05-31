function openTab(evt, tabName) {

    var i, tabcontent, tablinks;


    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }


    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
        tablinks[i].style.color="white";
        tablinks[i].style.backgroundColor="black";
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
    evt.currentTarget.style.color = "black";
    evt.currentTarget.style.backgroundColor = "white";
}


document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".tablink").click();
});
