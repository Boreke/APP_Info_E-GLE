<!DOCTYPE html>
<html lang="en">

<?php 

        
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader($data['page_title']);

    ?>
<body>
    <h1 class="TITRE">FAQ</h1>


    <div id="faqList">
        <?php if (is_array($data['faqs']) && count($data['faqs']) > 0): ?>
            <?php foreach ($data['faqs'] as $faq): ?>
                <div class="faqItem">
                    <h2 class="question"><?= $faq->question ?></h2>
                    <p class="description"><?= $faq->answer ?></p>
                    <button class="editFaqBtn" data-id="<?= $faq->id ?>" data-question="<?= $faq->question ?>" data-answer="<?= $faq->answer ?>">Edit</button>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No FAQs found.</p>
        <?php endif; ?>
    </div>
    <div class="addBtn">
        <button id="addFaqBtn">Add FAQ</button>
    </div>
    

    <!-- Popup pour ajouter une FAQ -->
    <div id="addFaqPopup" class="popup">
        <form id="addFaqForm" method="POST" action="<?= ROOT ?>faq/add">
            <label for="addQuestion">Question:</label>
            <input type="text" id="addQuestion" name="question" required>
            <label for="addAnswer">Answer:</label>
            <textarea id="addAnswer" name="answer" required></textarea>
            <button type="submit">Add</button>
            <button type="button" id="closeAddPopup">Close</button>
        </form>
    </div>

    <!-- Popup pour éditer une FAQ -->
    <div id="editFaqPopup" class="popup">
        <form id="editFaqForm" method="POST" action="<?= ROOT ?>faq/edit">
            <input type="hidden" id="editId" name="id">
            <label for="editQuestion">Question :</label>
            <input type="text" id="editQuestion" name="question" required>
            <label for="editAnswer">Réponse :</label>
            <textarea id="editAnswer" name="answer" required></textarea>
            <button type="submit">Edit</button>
            <button type="button" id="closeEditPopup">Close</button>
        </form>
    </div>

    <script>
        // JavaScript pour gérer les popups
        document.getElementById('addFaqBtn').addEventListener('click', function() {
            document.getElementById('addFaqPopup').style.display = 'block';
        });

        document.getElementById('closeAddPopup').addEventListener('click', function() {
            document.getElementById('addFaqPopup').style.display = 'none';
        });

        document.querySelectorAll('.editFaqBtn').forEach(button => {
            button.addEventListener('click', function() {
                document.getElementById('editId').value = this.dataset.id;
                document.getElementById('editQuestion').value = this.dataset.question;
                document.getElementById('editAnswer').value = this.dataset.answer;
                document.getElementById('editFaqPopup').style.display = 'block';
            });
        });

        document.getElementById('closeEditPopup').addEventListener('click', function() {
            document.getElementById('editFaqPopup').style.display = 'none';
        });
    </script>
</body>
<?= $this->view("footer")?>

</html>
