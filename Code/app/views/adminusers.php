<!DOCTYPE html>
<html lang="en">

<body>
<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>

    <section class="container">
        <div>
            <div class="nav">
                <a href="#" class="elmt_nav elmt1">Clients</a>
                <a href="#" class="elmt_nav">Cinéma</a>
            </div>
        </div>
        <div class="main">
            <h2>Utilisateurs</h2>
            <div class="listecontainer">
                <div class="top">
                    <ul>
                        <li><p>Prénom</p></li>
                        <li><p>Nom</p></li>
                        <li><p>Email</p></li>
                        <li><p>Pseudo</p></li>
                    </ul>
                </div>
                <div class="liste">
                    <div class="elmt">
                        <li><p>Hugo</p></li>
                        <li><p>O'Neill</p></li>
                        <li><p>honeill2000@gmail.com</p></li>
                        <li><p>Hugo</p></li>
                        <li><a href="#" class="supp_btn"><img src="<?=ASSETS?>img/Waste.png" alt="Supprimer"></a></li>
                    </div>
                    <div class="elmt elmt2">
                        <li><p>Hugo</p></li>
                        <li><p>O'Neill</p></li>
                        <li><p>honeill2000@gmail.com</p></li>
                        <li><p>Hugo</p></li>
                        <li><a href="#" class="supp_btn"><img src="<?=ASSETS?>img/Waste.png" alt="Supprimer"></a></li>
                    </div>
                    <div class="elmt">
                        <li><p>Hugo</p></li>
                        <li><p>O'Neill</p></li>
                        <li><p>honeill2000@gmail.com</p></li>
                        <li><p>Hugo</p></li>
                        <li><a href="#" class="supp_btn"><img src="<?=ASSETS?>img/Waste.png" alt="Supprimer"></a></li>
                    </div>
                    <div class="elmt elmt2">
                        <li><p>Hugo</p></li>
                        <li><p>O'Neill</p></li>
                        <li><p>honeill2000@gmail.com</p></li>
                        <li><p>Hugo</p></li>
                        <li><a href="#" class="supp_btn"><img src="<?=ASSETS?>img/Waste.png" alt="Supprimer"></a></li>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?= $this->view("footer")?>
</html>