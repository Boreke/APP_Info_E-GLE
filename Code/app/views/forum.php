<!DOCTYPE html>
<html lang="en">

<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader($data['page_title']);

?>

<body>
    <main>
    

    <div class="addBtn">
        <h1 class="TITRE">FORUM</h1>
        <?php if(isset($_SESSION['user_id'])):?>
            <button id="addPostBtn">Add Post</button>
        <?php else:?>
            <a href="<?=ROOT?>login"><button id="fakeAddPostBtn">Add Post</button></a>
        <?php endif;?> 
    </div>

    <div id="PostList">
        <?php $this -> displayPost(); ?>
    </div>

    <div id="addPostPopup" class="popup">
        <form id="addPostForm" method="POST" action="<?= ROOT ?>forum/add">
            <label for="addTitre">Titre:</label>
            <input type="text" id="addTitre" name="titre" required>
            <label for="addContenu">Contenu:</label>
            <textarea id="addContenu" name="contenu" required></textarea>
            <label for="addtype">Type de post:</label>
            <select id="addtype" name="post_type"required>
                <option value="Aide">Aide</option>
                <option value="Discussion">Discussion</option>
                <option value="Update">Update</option>
                <option value="Humour">Humour</option>
            </select>
            <button type="submit">Créé le post</button>
            <button type="button" id="closeAddPopup">Close</button>
        </form>
    </div>

    <div id="editPostPopup" class="popup">
        <form id="editPostForm" method="POST" action="<?= ROOT ?>forum/edit">
            <input type="hidden" id="editId" name="id">
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