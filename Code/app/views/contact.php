<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] ?></title>
</head>
<?php
        require "../app/controllers/header.php";
        $header = new Header();
        $header->displayHeader();
    
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