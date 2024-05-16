<!DOCTYPE html>
<html lang="en">



<body>

<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>


    <section id="resa">
    
        Votre Film :
        
    </section>


    <main>

        <section class="descriptiffilm">
            <img src="<?=ASSETS?>img/8C01404F-F8BD-4ADD-8079-E07121D25BEE.jpeg" id="film1">
        </section>

        <section class="formpay">
            <div>
                <h2 id="titreF">INTOUCHABLES</h2>
               
                
            </div>

            <div id="genre">
                <h3 id="A">Genre : </h3>
                <h3 id="AA"> &nbspComédie dramatique</h3> 
            </div>

            <div id="B">
                <div>
                    <h4 id="S1">Synopsis : </h4>

                </div>
            
                <div id="C">
                    <h4 id="S2">Durée du film : </h4>
                    <h4>&nbsp1h30min</h4>
                </div>
            </div>
            <div id="resum">
                A sa sortie de prison, Driss se doit de prouver aux Assedic qu'il est bien à la recherche d'un travail. Il se rend donc aux entretiens d'embauche qu'a organisés Philippe, un riche tétraplégique, dans son hôtel particulier, pour un poste d'aide à domicile.
            </div>


        </section>

        <div class="but">
            <!-- <label for="#R1"><img src="Search.png" id="img4"></label> -->
            <br>
            <div id="R11">
                RECHERCHER VOTRE CINEMA :
            </div> 
            <br>
            <div>
                <select id="R1">
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                    <option value="option3">Option 3</option>
                    <option value="option4">Option 4</option>
                </select>
            </div>
            <br>
            
        </div>

    </main>
    <br><br>



    <h1 id="horraire">Voici les horaires : </h1>

    <br><br>

    <section class="planning">
        <section id="sec1">
            <div class="lundi">Lun 19 Fev</div>
            <div id="H1">

                <button onclick="openPopup()" id="popup11">9h30 <br>(Fin 11h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <div class="PP">
                            <section class="totalpp">
                                <div class="imgpopup">
                                    <img src="<?=ASSETS?>img/8C01404F-F8BD-4ADD-8079-E07121D25BEE.jpeg" id="img1pp" alt="rien">
                                </div>

                                <div class="interieur">

                            
                                    <div id="PP1">
                                        DATE : 19 Fev 
                                    </div>
    
                                    <div id="PP3">
                                        DEBUT : 9h30
                                    </div>
    
                                    <div id="PP4">
                                        FIN :  11h30
                                    </div>
    
                                    <div id="PP5">
                                        AUDIO : VF
                                    </div>
                                
    
                                    <div id="PP2">
                                        <div class="choi">
                                            <div>
                                                NOMBRE DE PLACE :
                                            </div>
                                        
                                            <div id="choi1">
                                               
                                                <select id="CHOICE-POPUP">
                                                <option value="option1">1</option>
                                                <option value="option2">2</option>
                                                <option value="option3">3</option>
                                                <option value="option4">4</option>
                                                <option value="option5">5</option>
                                                </select>
                                            </div>
    
                                        </div>
                                    
                                    </div>
                                    
                                </div>


                            </section>
                            <!-- <div class="interieur">

                            
                                <div id="PP1">
                                    DATE : 19 Fev 
                                </div>

                                <div id="PP3">
                                    DEBUT : 9h30
                                </div>

                                <div id="PP4">
                                    FIN :  11h30
                                </div>

                                <div id="PP5">
                                    AUDIO : VF
                                </div>
                            

                                <div id="PP2">
                                    <div class="choi">
                                        <div>
                                            NOMBRE DE PLACE :
                                        </div>
                                    
                                        <div id="choi1">
                                           
                                            <select id="CHOICE-POPUP">
                                            <option value="option1">1</option>
                                            <option value="option2">2</option>
                                            <option value="option3">3</option>
                                            <option value="option4">4</option>
                                            <option value="option5">5</option>
                                            </select>
                                        </div>

                                    </div>
                                
                                </div>
                                
                            </div> -->
                            <div class="but">
                                <a href="page_paiement.html">
                                    <button id="b1"> VALIDER
                                
                                    </button>
                                </a>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

              
            

            <div id="H2">
                <button onclick="openPopup()" id="popup12">11h30 <br>(Fin 13h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <div class="PP">
                            <div id="PP1">
                                DEBUT : 11h30 <br>FIN :  13h <br>AUDIO : VF
                            </div>

                            <div id="PP2">
                                <div>
                                    NOMBRE DE PLACE : 
                                    <select id="CHOICE-POPUP">
                                    <option value="option1">1</option>
                                    <option value="option2">2</option>
                                    <option value="option3">3</option>
                                    <option value="option4">4</option>
                                    <option value="option5">5</option>
                                    </select>

                                </div>
                                
                                <div class="but">
                                    <a href="page_paiement.html">
                                        <button id="b1"> VALIDER
                                    
                                        </button>
                                    </a>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H3">
                <button onclick="openPopup()" id="popup11">14h45 <br>(Fin 16h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H4">
                <button onclick="openPopup()" id="popup12">17h <br>(Fin 18h30) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H5">
                <button onclick="openPopup()" id="popup11">18h45 <br>(Fin 20h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>


        </section>

    

        <section id="sec2">
            <div class="mardi">Mar 20 Fev</div>

            <div id="H1">
                <button onclick="openPopup()" id="popup12">9h30 <br>(Fin 11h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H2">
                <button onclick="openPopup()" id="popup11">11h30 <br>(Fin 13h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>


            <div id="H3">
                <button onclick="openPopup()" id="popup12">14h45 <br>(Fin 16h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H4">
                <button onclick="openPopup()" id="popup11">17h <br>(Fin 18h30) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>


            <div id="H5">
                <button onclick="openPopup()" id="popup12">18h45 <br>(Fin 20h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

        </section>
        
        <section id="sec3">
            <div class="mercredi">Mer 21 Fev</div>

            <div id="H1">

                <button onclick="openPopup()" id="popup11">9h30 <br>(Fin 11h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

              
            

            <div id="H2">
                <button onclick="openPopup()" id="popup12">11h30 <br>(Fin 13h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H3">
                <button onclick="openPopup()" id="popup11">14h45 <br>(Fin 16h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H4">
                <button onclick="openPopup()" id="popup12">17h <br>(Fin 18h30) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H5">
                <button onclick="openPopup()" id="popup11">18h45 <br>(Fin 20h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

        </section>
        
        <section id="sec4">
            <div class="jeudi">Jeu 22 Fev</div>
            <div id="H1">
                <button onclick="openPopup()" id="popup12">9h30 <br>(Fin 11h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H2">
                <button onclick="openPopup()" id="popup11">11h30 <br>(Fin 13h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>


            <div id="H3">
                <button onclick="openPopup()" id="popup12">14h45 <br>(Fin 16h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H4">
                <button onclick="openPopup()" id="popup11">17h <br>(Fin 18h30) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>


            <div id="H5">
                <button onclick="openPopup()" id="popup12">18h45 <br>(Fin 20h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>
            
        </section>
        
        <section id="sec5">
            <div class="vendredi">Ven 23 Fev</div>
            <div id="H1">

                <button onclick="openPopup()" id="popup11">9h30 <br>(Fin 11h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

              
            

            <div id="H2">
                <button onclick="openPopup()" id="popup12">11h30 <br>(Fin 13h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H3">
                <button onclick="openPopup()" id="popup11">14h45 <br>(Fin 16h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H4">
                <button onclick="openPopup()" id="popup12">17h <br>(Fin 18h30) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H5">
                <button onclick="openPopup()" id="popup11">18h45 <br>(Fin 20h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>
        </section>
        
        <section id="sec6">
            <div class="samedi">Sam 24 Fev</div>
            <div id="H1">
                <button onclick="openPopup()" id="popup12">9h30 <br>(Fin 11h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H2">
                <button onclick="openPopup()" id="popup11">11h30 <br>(Fin 13h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>


            <div id="H3">
                <button onclick="openPopup()" id="popup12">14h45 <br>(Fin 16h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H4">
                <button onclick="openPopup()" id="popup11">17h <br>(Fin 18h30) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>


            <div id="H5">
                <button onclick="openPopup()" id="popup12">18h45 <br>(Fin 20h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>
        </section>
        
        <section id="sec7">
            <div class="dimanche">Dim 25 Fev</div>
            <div id="H1">

                <button onclick="openPopup()" id="popup11">9h30 <br>(Fin 11h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

              
            

            <div id="H2">
                <button onclick="openPopup()" id="popup12">11h30 <br>(Fin 13h) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H3">
                <button onclick="openPopup()" id="popup11">14h45 <br>(Fin 16h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H4">
                <button onclick="openPopup()" id="popup12">17h <br>(Fin 18h30) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>

            <div id="H5">
                <button onclick="openPopup()" id="popup11">18h45 <br>(Fin 20h15) VF
                </button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;
                        </span>
                        <p>Contenu de la popup...</p>
                    </div>
                </div>
                <script src="<?=ASSETS?>js/planningSeanceGas.js"></script>
            </div>
        </section>


    </section>


    <br><br><br><br><br><br>


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
    
</body>
</html>