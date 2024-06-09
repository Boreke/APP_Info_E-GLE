<!DOCTYPE html>
<html lang="en">

<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader($data['page_title']);
?>
<body>
    <main>
    <section class="center">
        <div class="salles_existantes" id="salles_existantes">
        
        </div>
        <div class="ajouter_salle">
            <div class="div-btn-add">
                <h1 class="add-header">Ajouter une salle</h1>
                <a onclick="openAddPopup()" id="popup11" class="plus"> <img src="<?=ASSETS?>img/Addplus.png" alt="Bouton Add" class="add_btn"></a>
            </div>
            <div class="div-btn-del">
                <h1 class="del-header">Supprimer une salle</h1>
                <a onclick="openDelPopup()" id="popup11" class="plus"> <img src="<?=ASSETS?>img/Addminus.png" alt="Bouton Del" class="del_btn"></a>
            </div>

            <h2 id="error-message"></h2>
             
            <div id="addPopup" class="addPopup">
                <div class="popup-content">
                    <div class="haut">
                        <a class="close" onclick="closeAddPopup()">&times;</a>
                        <h1>Entrez le numero de la salle à ajouter.</h1>
                        
                    </div>
                    <form class="form_salle" id="form_salle" method="post" >
                        <input type="text" placeholder="numero de la salle" class="numero_salle" id="numero_salle" name="numero_salle">
                        <input type="text" placeholder="numero de places" class="nb_places" id="nb_places" name="nb_places">
                        <button type="submit" class="button-creer">Ajouter</button>
                    </form>
                
                </div>  
            </div>
            <div id="delPopup" class="delPopup">
                <div class="popup-content">
                    <div class="haut">
                        <a class="close" onclick="closeDelPopup()">&times;</a>
                        <h1>Entrez le numero de la salle à supprimer. </h1>
                        <h2>(attention cela supprimera les séances qui lui sont associées)</h2>
                    </div>
                    <form class="form_salle_del" id="form_salle_del" method="post" >
                        <select type="number" placeholder="numero de la salle" class="numero_salle_del" id="numero_salle_del" name="numero_salle_del">
                            <?php
                                $this->afficher_salle();
                            ?>
                        </select>
                        
                        <button type="submit" class="button-del">Supprimer</button>
                    </form>
                    
                </div>  
            </div>
            
        </div>
    </section> 
    </main>
     
</body>
    <?= $this->view("footer")?>
    <script>const root="<?php echo ROOT;?>"; var data=<?= json_encode($data); ?>; var seances=<?= json_encode($data['seances']); ?>;</script>
    <script src="<?=ASSETS?>js/cinemasalle.js"></script>
</html>