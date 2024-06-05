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
        
    </div>
    </main>  
</body>

<?= $this->view("footer")?>
</html>