document.addEventListener("DOMContentLoaded", function() {
    loadSalles();

    $("#form_salle").on('submit', function(e) {
        e.preventDefault();
        const serializedData = $(this).serialize();
        let url = root + "cinemasalle/add_salle";

        $.ajax({
            url: url,
            type: 'POST',
            data: serializedData,
            success: function(response) {
                document.querySelector("#error-message").style.color = 'red';
                document.querySelector("#error-message").textContent = response;
                loadSalles();
                closeAddPopup();
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

    $("#form_salle_del").on('submit', function(e) {
        e.preventDefault();
        const serializedData = $(this).serialize();
        let url = root + "cinemasalle/delete_salle";

        $.ajax({
            url: url,
            type: 'POST',
            data: serializedData,
            success: function(response) {
                loadSalles();
                closeDelPopup();
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

function updateLayout(salleBotElement, seance) {
    var seats = salleBotElement.querySelectorAll(".seat");
    for (let i = 0; i < seance.nbr_places_rsv; i++) {
        seats[i].className = "seat occupied";
    }
    for (let i = seance.nbr_places_rsv; i < seance.nbr_places_disp; i++) {
        seats[i].className = "seat";
    }
}

function loadSalles() {
    $.ajax({
        url: root + 'cinemasalle/showExistingSalles',
        type: 'GET',
        success: function(data) {
            $('#salles_existantes').html(data);
            initializeSalleElements();
        },
        error: function() {
            alert('Failed to load content');
        }
    });
}

function initializeSalleElements() {

    document.querySelectorAll('.salle').forEach(function(salleElement) {
        const dropdownImage = salleElement.querySelector('.dropdown');
        const salleBotElement = salleElement.querySelector('.salle-bot');

        let isSalleBotVisible = false;
        salleBotElement.style.display = 'none';

        if (seances[salleElement.id]) {
            console.log(seances[salleElement.id]);
            var seancesContainer = salleBotElement.querySelector(".seances-container");
            var seancesElement = salleBotElement.querySelectorAll(".seance");

            var prevButton = salleBotElement.querySelector("#pre-btn");
            var nextButton = salleBotElement.querySelector("#nxt-btn");
            var keyShownSeance = 0;
            updateLayout(salleBotElement, seances[salleBotElement.id][0]);

            nextButton.addEventListener("click", function() {
                const seanceWidth = seancesElement[0].clientWidth;
                seancesContainer.scrollLeft += seanceWidth;
                if (!(keyShownSeance >= seancesElement.length - 1)) {
                    keyShownSeance += 1;

                }
                updateLayout(salleBotElement, seances[salleBotElement.id][keyShownSeance]);
            });

            prevButton.addEventListener("click", function() {
                const seanceWidth = seancesElement[0].clientWidth;
                seancesContainer.scrollLeft -= seanceWidth;
                if (!(keyShownSeance <= 0)) {
                    keyShownSeance = keyShownSeance - 1;
   
                }
                updateLayout(salleBotElement, seances[salleBotElement.id][keyShownSeance]);
            });
        }

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
}
