<!DOCTYPE html>
<html lang="en">
<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader();
?>
<body>  

<section id="Compte">
    <div>
        <div class="tabs">
            <button class="tablink" onclick="openTab(event, 'Profil')">Mon Compte</button>
            <button class="tablink" onclick="openTab(event, 'Password')">Sécurité</button>
            <button class="tablink" onclick="openTab(event, 'Films')">Mes Films préférés</button>
            <button class="tablink" onclick="openTab(event, 'Forum')">Mes Posts</button>
        </div>

        <div id="Profil" class="tabcontent">
            <h3>Mon Compte</h3>
            
        </div>

        <div id="Password" class="tabcontent">
            <h3>Mon Mot de passe</h3>
            
        </div>

        <div id="Films" class="tabcontent">
            <h3>Mes Films préférés</h3>
            
        </div>

        <div id="Forum" class="tabcontent">
            <h3>Mes Posts</h3>
            
        </div>

        <script src="<?=ASSETS?>js/profil.js"></script>
    </div>
</section>

</body>

<?= $this->view("footer")?>