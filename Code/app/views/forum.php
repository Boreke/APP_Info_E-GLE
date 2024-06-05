<!DOCTYPE html>
<html lang="en">

<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader($data['page_title']);

?>

<body>
    <main>
    <h1 class="TITRE">FORUM</h1>
    <div id="PostList">
        <?php $this->displayCommentaire(1);?>
    </div>
    </main>  
</body>

<?= $this->view("footer")?>
</html>