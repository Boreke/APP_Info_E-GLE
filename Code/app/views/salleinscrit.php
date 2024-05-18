<!DOCTYPE html>
<html lang="en">
    <body>
    <?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>

    <!--code here-->

    <?= $this->view("footer")?>
</body>