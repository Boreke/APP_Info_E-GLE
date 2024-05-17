<!DOCTYPE html>
<html lang="en">
    <body>
    <?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();
    ?>
        <section class="center">
            <div class="salles_existantes" id="salles_existantes">
            <?php include "../app/AJAX/getSalles.php"; ?>
            </div>
            <div class="ajouter_salle">
                <h1>Ajouter une salle</h1>
                <a onclick="openAddPopup()" id="popup11" > <img src="<?=ASSETS?>img/Addplus.png" alt="Bouton Add" class="add_btn"></a>
                <a onclick="openDelPopup()" id="popup11" > <img src="<?=ASSETS?>img/Addminus.png" alt="Bouton Del" class="del_btn"></a>
                <?php if (!empty($_SESSION["error_message"])) : ?>
                    <div class="error-message"><?php echo $_SESSION["error_message"]; ?></div>
                <?php endif; ?>  
                <div id="addPopup" class="addPopup">
                    <div class="popup-content">
                        <div class="haut">
                            <a class="close" onclick="closeAddPopup()">&times;</a>
                            <h1>Entrez le numero de la salle à ajouter.</h1>
                            
                        </div>
                        <form class="form_salle" id="form_salle" method="post" >
                            <input type="numero" placeholder="numero de la salle" class="numero_salle" id="numero_salle" name="numero_salle">
                            
                            <button type="submit" class="button-creer">Ajouter</button>
                        </form>
                    
                    </div>  
                </div>
                <div id="delPopup" class="delPopup">
                    <div class="popup-content">
                        <div class="haut">
                            <a class="close" onclick="closeDelPopup()">&times;</a>
                            <h1>Entrez le numero de la salle à supprimer.</h1>
                            
                        </div>
                        <form class="form_salle" id="form_salle" method="post" >
                            <select type="number" placeholder="numero de la salle" class="numero_salle_del" id="numero_salle_del" name="numero_salle_del">
                                <?php
                                    
                                ?>
                            </select>
                            
                            <button type="submit" class="button-del">Supprimer</button>
                        </form>
                    
                    </div>  
                </div>
                
            </div>
        </section>    
    </body>
    <?= $this->view("footer")?>
    <script src="<?=ASSETS?>js/cinemasalle.js"></script>
</html>