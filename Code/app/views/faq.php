<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Titre HTML et CSS</title>
    <link rel="stylesheet" href="<?= ASSETS ?>css/faq.css">
</head>

<body>

    <?php require "../app/controllers/header.php";
    $header = new Header();
    $header->displayHeader();
    ?>

    <section>
        <div class="faq-container">
            <div class="TITRE">FAQ</div>
            <div class="sous-titre">Frequently Asked Questions.</div>

            <!-- Questions and Answers -->
            <div class="faq-items">
                <?php
                // Loop through each question and answer pair
                foreach ($faqItems as $faqItem) {
                    echo "<div class='faq-item'>";
                    echo "<div class='question'>";
                    echo "<p>" . $faqItem['question'] . "</p>";
                    echo "<img src='" . ASSETS . "img/Drop Down.png' alt='' class='flechebas'>";
                    echo "</div>";
                    echo "<div class='description'>";
                    echo "<p>" . $faqItem['answer'] . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>

            <!-- Button to add a new question -->
            <button id="addQuestionBtn">Ajouter une question</button>

            <!-- Pop-up modal for adding a new question -->
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <form action="save_question.php" method="post">
                        <label for="question">Question:</label><br>
                        <input type="text" id="question" name="question"><br>
                        <label for="answer">Réponse:</label><br>
                        <textarea id="answer" name="answer"></textarea><br>
                        <input type="submit" value="Enregistrer">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?= $this->view("footer") ?>

    <script src="<?= ASSETS ?>js/index.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select all general elements
            const generalElements = document.querySelectorAll('.faq-item');

            // Loop through each general element
            generalElements.forEach(function(generalElement) {
                // Find elements within the current general element
                const dropdownImage = generalElement.querySelector('.flechebas');
                const descriptionElement = generalElement.querySelector('.description');

                let isDescriptionVisible = false; // Track initial state

                // Add click event listener to dropdown image
                dropdownImage.addEventListener('click', function() {
                    // Toggle visibility of description for the current general element
                    if (isDescriptionVisible) {
                        descriptionElement.style.display = 'none';
                    } else {
                        descriptionElement.style.display = 'block';
                    }

                    // Toggle state for the current general element
                    isDescriptionVisible = !isDescriptionVisible;

                });
            });

            // JavaScript to show/hide the pop-up
            const modal = document.getElementById("myModal");
            const btn = document.getElementById("addQuestionBtn");
            const span = document.getElementsByClassName("close")[0];

            btn.onclick = function() {
                modal.style.display = "block";
            }

            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
</body>

</html>
