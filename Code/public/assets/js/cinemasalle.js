document.addEventListener("DOMContentLoaded", function() {
    const salleElement = document.querySelectorAll('.salle');

    salleElement.forEach(function(salleElement) {
        const dropdownImage = salleElement.querySelector('.dropdown');
        const salleBotElement = salleElement.querySelector('.salle-bot');

        let isSalleBotVisible = false;
        salleBotElement.style.display = 'none';
        dropdownImage.addEventListener('click', function() {
            if (isSalleBotVisible) {
                salleBotElement.style.display = 'none';
                
            } else {
                salleBotElement.style.display = 'flex';
                
            }

            isSalleBotVisible = !isSalleBotVisible;

            dropdownImage.style.transform = isSalleBotVisible ? 'rotate(-90deg)' : 'rotate(0deg)';
        });
    });
});
$(document).ready(function() {
    const formElement = document.querySelectorAll('.form_salle')
    const addButton = formElement.querySelectorAll('.button-creer');
    addButton.addEventListener('click', function() {

        $.ajax({
            url: '../app/AJAX/addSalle.php', 
            type: 'POST',
            data: $(this).serialize(), 
            success: function(response) {
                
                $('#salles_existantes').load('../app/AJAX/getSalle.php');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
function openAddPopup() {
    document.getElementById("addPopup").style.display = "block";
}
  
function closeAddPopup() {
    document.getElementById("addPopup").style.display = "none";
}
function openDelPopup() {
    document.getElementById("delPopup").style.display = "block";
}
  
function closeDelPopup() {
    document.getElementById("delPopup").style.display = "none";
}