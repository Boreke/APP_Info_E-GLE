<!DOCTYPE html>
<html lang="en">

<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader($data['page_title']);
    show($data);
?>

<body>
    <main>
    <h1 class="TITRE">FORUM</h1>
    <div id="PostList">
        <?php $this -> displayPost(); ?>
    </div>

    <div id="editPostPopup" class="popup">
        <form id="editPostForm" method="POST">
            <label for="editTitre">Titre :</label>
            <input type="text" id="editTitre" name="titre" required>
            <label for="editContenu">Contenu :</label>
            <textarea id="editContenu" name="contenu" required></textarea>
            <button type="submit">Edit</button>
            <button type="button" id="closeEditPopup">Close</button>
        </form>
    </div>

    </main>  
</body>

<?= $this->view("footer")?>

<script src="<?=ASSETS?>js/forum.js"></script>

</html>