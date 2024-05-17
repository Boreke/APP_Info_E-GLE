<!DOCTYPE html>
<html lang="FR">

    <body>
    <?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>

        <br><br><br>
        <section id="resa">
            <div id="resav">
                Votre Réservation :
                
            </div>
        </section>


        <main>
            

            <section class="descriptiffilm">
                <img src="<?=ASSETS?>img/8C01404F-F8BD-4ADD-8079-E07121D25BEE.jpeg" id="film1">
            </section>

            <section class="formpay">
                <div>
                    <h2 id="titreF">INTOUCHABLES</h2>
                    <div id="plaace">
                        <p id="place">Nombre de places : </p>
                        <p id="place1">&nbsp1</p>
                    </div>
                    
                </div>

                <div id="genre">
                    <h4 id="A">Genre : </h4>
                    <h4 id="AB"> &nbspComédie dramatique</h4> 
                </div>

                <div id="B">
                    <div>
                        <h4 id="S1">Synopsis : </h4>

                    </div>
                
                    <div id="C">
                        <h4 id="S2">Durée du film : </h4>
                        <h4 id="S12">&nbsp1h30min</h4>
                    </div>
                </div>
                <div id="resum">
                    A sa sortie de prison, Driss se doit de prouver aux Assedic qu'il est bien à la recherche d'un travail. Il se rend donc aux entretiens d'embauche qu'a organisés Philippe, un riche tétraplégique, dans son hôtel particulier, pour un poste d'aide à domicile.
                </div>

                <br><br>

            </section>



        
            <section class="form">
                <br>

                <h1 id="M1">
                    <div id="M11">Moyen de paiement</div>
                    <img src="<?=ASSETS?>img/image 39.png" id="img2">
                </h1>
                
                <div id="F1">
                    <input type="text" placeholder="XXXX XXXX XXXX XXXX" id="in1">
                    <input type="text" placeholder="CVC" id="in2">
                    
                </div>

                <br><br>

                <div id="F2">
                    <input type="text" placeholder="Nom du titulaire" id="in3">
                    <input type="text" placeholder="JJ/MM/AAAA" id="in4">
                </div>

                <br><br>

                <div class="but">
                    <button id="b1"> <img src="<?=ASSETS?>img/Padlock.png" id="img3"> PAYER</button>
                </div>
                <br><br>

            </section>

            <br><br>
            
            <!-------- METTRE LA PAGE VERS QUOI CA VA -------->
            <a href="" id="lien">
                RETOUR AU SITE
            </a>

            <br><br><br>

        </main>
<body>
<?= $this->view("footer")?>
    
</body>
</html>