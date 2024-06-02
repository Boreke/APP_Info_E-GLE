<!DOCTYPE html>
<html lang="en">
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
    <div class="container">
        <h1>Mentions Légales</h1>

        <h2>1. Éditeur du site</h2>

        <p>Le site E-GLE est édité par :
        <br>
        Nom du responsable : Hugo O'NEILL <br>
        Adresse : 6 avenue du général Balfourier, 75016 <br>
        Téléphone : +33 6 37 87 51 34 <br>
        Email : honeill2000@gmail.com <br>
        </p>

        <h2>2. Propriété intellectuelle</h2>

        <p>L'ensemble du contenu du site E-GLE, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de E-GLE, à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires ou auteurs.

        Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l'accord exprès par écrit de E-GLE. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.335-2 et suivants du Code de la propriété intellectuelle.
        </p>

        <h2>3. Protection des données personnelles</h2>

        <p>
            Le site E-GLE peut être amené à collecter des données personnelles. Conformément à la loi "Informatique et Libertés" du 6 janvier 1978 modifiée, vous disposez d'un droit d'accès, de rectification, de modification et de suppression des données vous concernant. Vous pouvez exercer ce droit en envoyant un courrier à l'adresse suivante : [Votre Adresse] ou par email à [Votre Adresse Email].
        </p>

        <h2>4. Responsabilité</h2>

        <p>
            Le site E-GLE contient des liens hypertextes vers d'autres sites. Cependant, E-GLE n'a pas la possibilité de vérifier le contenu des sites ainsi visités, et n'assumera en conséquence aucune responsabilité de ce fait.

            E-GLE met en œuvre tous les moyens dont il dispose pour assurer une information fiable et une mise à jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent survenir. L'internaute devra donc s'assurer de l'exactitude des informations auprès de E-GLE, et signaler toutes modifications du site qu'il jugerait utile. E-GLE n'est en aucun cas responsable de l'utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.
        </p>

        <h2>5. Droit applicable</h2>

        <p>
            Les présentes mentions légales sont soumises au droit français et tout litige ou contestation qui pourrait naître de l'interprétation ou de l'exécution de celles-ci sera de la compétence exclusive des tribunaux dont dépend le siège de l'éditeur du site.
        </p>
    </div>
    
</body>
<?= $this->view("footer")?>

</html>