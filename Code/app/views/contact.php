<!DOCTYPE html>
<html lang="fr">

<?php
        require "../app/controllers/header.php";
        $header = new Header();
        $header->displayHeader($data['page_title']);
    
    ?>
<body>
    <div class="contact-info">
        <h2>Contactez-nous</h2>
        <p><strong>Email :</strong> <a href="mailto:eglereadytofly@gmail.com">eglereadytofly@gmail.com</a></p>
        <p><strong>Téléphone :</strong> +33 6 37 87 51 34</p>
        <p><strong>Adresse :</strong></p>
        <p>10 rue de Vanves,<br>92130 Issy-Les-Moulineaux,<br>France</p>
    </div>
</body>
<?= $this->view("footer")?>

</html>