<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] ?></title>
</head>
<?php
        $data['mention']=require_once '../app/models/mentions_legales_content.php';
        require "../app/controllers/header.php";
        $header = new Header();
        $header->displayHeader();
    
    ?>

<body>
    <!-- ajouter modifs h2 (nouvelle entrées dans liste : $data['mention']['headers'][int] faire correspondre int à numero de la partie, commencer à 2)
        ajouter form d'edit ->js? ->popup? 
        ajouter bouton edit en dessous de h1 et grouper les deux dans une div(pour le display)
    -->
    <div class="container">
        <h1>Mentions Légales</h1>

        <h2>1. Éditeur du site</h2>

        <p>Le site E-GLE est édité par :
        <br>
        Nom du responsable : <?=$data['mention']['editor']['name']?> <br>
        Adresse : <?=$data['mention']['editor']['address']?> <br>
        Téléphone : <?=$data['mention']['editor']['phone']?> <br>
        Email : <?=$data['mention']['editor']['email']?> <br>
        </p>

        <h2>2. Propriété intellectuelle</h2>

        <p><?=$data['mention']['intellectual_property']?></p>
        
        <h2>3. Protection des données personnelles</h2>
        <p><?=$data['mention']['data_protection']?></p>

        <h2>4. Responsabilité</h2>
        <p><?=$data['mention']['responsibility']?></p>

        <h2>5. Droit applicable</h2>
        <p><?=$data['mention']['applicable_law']?></p>
    </div>
    
</body>
<?= $this->view("footer")?>

</html>