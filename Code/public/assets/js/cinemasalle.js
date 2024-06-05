document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.salle').forEach(function(salleElement) {
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

    $(".form_salle").on('submit',function(e){
        e.preventDefault();
        const serializedData = $(this).serialize();
        let url= root+"cinemasalle/addSalle";
        console.log(serializedData);

        $.ajax({
            url: url,
            type: 'POST',
            data: serializedData,
            success: function(response) {
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
    $(".form_salle_del").on('submit',function(e){
        e.preventDefault;
        const serializedData = $(this).serialize();
        
        let url= root+"cinemasalle/addSalle";


        $.ajax({
            url: url,
            type: 'POST',
            data: serializedData,
            success: function(response) {
                window.location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
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
