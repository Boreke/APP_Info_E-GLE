<!DOCTYPE html>
<html lang="FR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Séances</title>
        <link rel="stylesheet" href="css/page_paiement.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">   
        <link rel="icon" type="image/png" href="img/Falcon (1).png">
    </head>
    <body>
    <header>
        <a href="<?=ROOT?> home" class="topleft">
            <div class="Logo_Nom">
                <img src="<?=ASSETS?>img/Falcon (1).png" alt="Logo" class="logo">
                <p class="Nom">E-GLE</p>
            </div>
        </a>
        <?php if (isset($user) && htmlspecialchars($user['type'])=='gerant'):?>
        <nav id="nav" >
            <li><a href="<?=ROOT?>index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="<?=ROOT?>seancesgerant.php"  class="nav_elmt">Séances</a></li>
            <li><a href="<?=ROOT?>Cinema_Salles.php"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php elseif (isset($user) && htmlspecialchars($user['type'])=='admin'):?>
            <nav id="nav" >
            <li><a href="<?=ROOT?>index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="<?=ROOT?>adminusers.php"  class="nav_elmt">Séances</a></li>
            <li><a href="<?=ROOT?>faq.php"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php else: ?>
            <nav id="nav" >
            <li><a href="<?=ROOT?>index.php"  class="nav_elmt1">Accueil</a></li>
            <li><a href="<?=ROOT?>seancesflorent"  class="nav_elmt">Séances</a></li>
            <li><a href="<?=ROOT?>salles.php"  class="nav_elmt">Salles</a></li>
        </nav>
        <?php endif; ?>
        <img src="<?=ASSETS?>img/Menu.png" alt="Menu" class="menu" id="menuburger">
        <div class="topright">
            <div class="lg">
                <li><a href="" class="lg_elmt1">EN</a></li>
                <li><a href="" class="lg_elmt">FR</a></li>
            </div>    
            <?php if (isset($user)): ?>
                <a href="<?=ROOT?>deconnexion"><button class="button1">Logout</button></a>
            <?php else:  ?>
                <a href="<?=ROOT?>login"><button class="button1">Login</button></a>
            <?php endif; ?> 
        </div>
    </header>

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


        <footer>
            <img src="<?=ASSETS?>img/logo-events-IT 1.png" alt="">
            <div class="nav_bas">
                <li><a href="#" class="nav_bas_elmt">A propos</a></li>
                <li><a href="#" class="nav_bas_elmt">Forum</a></li>
                <li><a href="#" class="nav_bas_elmt">Contact</a></li>
                <li><a href="#" class="nav_bas_elmt">Mention légales</a></li>
                <li><a href="#" class="nav_bas_elmt">FAQ</a></li>
            </div>
            <div class="reseaux">
                <li><a href="https://www.twitter.com"><img src="<?=ASSETS?>img/Twitter.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com"><img src="<?=ASSETS?>img/Instagram.png" alt="Instagram"></a></li>
                <li><a href="https://www.facebook.com"><img src="<?=ASSETS?>img/Facebook.png" alt=""></a></li>
            </div>
            <div class="mention_legales">
                <img src="<?=ASSETS?>img/Copyright.png" alt="" class="Copyright">
                <p class="mention_legales_text">E-GLE 2024 Tous droits réservés</p>
            </div>
        </footer>
<body>
    
</body>
</html>