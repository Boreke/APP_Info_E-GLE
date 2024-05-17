

<!DOCTYPE html>
<html lang="en">
<head><link rel="stylesheet" href="<?=ASSETS?>css/index.css"></head>
<body>
    <?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>
    <section class="center">
        <div class="center1">
            <div class="left1">
                <h1>Explorez l'essence de l'expérience <br>cinématographique.</h1>
                <a href="#center2"><img src="<?=ASSETS?>img/Scroll Down.png" alt="Bouton Scroll" class="scroll-btn"></a>
            </div>
            <img src="<?=ASSETS?>img/SoundWavesIMG.svg" alt="" class="soundwaves">
        </div>
        <div class="center2" id="center2">
            <div class="left2">
                <p class="reserver_text">Réservez vos séances de cinéma</p>
                <a href="#"><button class="button">Réserver</button></a>
            </div>
            <div class="right2">
                <h2>A l'affiche :</h2>
                <div class="caroussel">
                    
                    
                    <div class="slider-container slider-1">
                        <div class="slider">
                            <img src="<?=ASSETS?>img/intouchables.svg" alt="" class="img-intouchables">
                            <img src="<?=ASSETS?>img/shutterIsland.png" alt="" class="img-intouchables">
                            <img src="<?=ASSETS?>img/avatar.png" alt="" class="img-intouchables">
                            <img src="<?=ASSETS?>img/intouchables.svg" alt="" class="img-intouchables">
                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        <div class="center3">
            <div class="left3">
                <img src="<?=ASSETS?>img/enceinte.svg" alt="Enceinte" class="img-enceinte">
            </div>
            <div class="right3">
                <h1 class="small-h1">Une <span class="expérience">expérience</span> sonore immersive</h1>
                <p class="texte_son">Découvrez une expérience sonore inégalée dans nos salles de cinéma partenaires. Grâce à une technologie audio de pointe, chaque film prend vie avec une clarté cristalline et une immersion totale. Plongez au cœur de l'action avec un son surround époustouflant, où chaque murmure, explosion et note de musique est restitué avec une fidélité exceptionnelle.</p>
            </div>
        </div>
        <div class="center4">
            <div class="left4">
                <h1 class="small-h1">Un visuel <span class="captivant">captivant</span></h1>
                <p class="texte_image">Découvrez une vision nouvelle du cinéma dans nos salles partenaires, où chaque image est une œuvre d'art en mouvement. Grâce à des technologies de projection de pointe, nous vous offrons une qualité visuelle d'une clarté saisissante, où les couleurs éclatent et les détails prennent vie sous vos yeux.</p>
            </div>
            <div class="right4">
                <img src="<?=ASSETS?>img/terre.png" alt="Terre" class="img-terre">
            </div>
        </div>
    </section>
</body>
<?= $this->view("footer")?>
<script src="<?=ASSETS?>js/index.js"></script>
</html>