<!DOCTYPE html>

<html lang="en">

<?php 

        
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader($data['page_title']);

?>
<body>


</body>
<?= $this->view("footer")?>
</html>