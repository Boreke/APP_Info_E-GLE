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
            <?php if(isset($_SESSION["username"]) && $_SESSION["type"] == "client"): ?>
                <button class="tablink" onclick="openTab(event, 'Films')">Mes Films préférés</button>
                <button class="tablink" onclick="openTab(event, 'Billets')">Mes Billets</button>
            <?php elseif($_SESSION["type"] == "gerant"):  ?>
                <button class="tablink" onclick="openTab(event, 'Cinema')">Mon Cinema</button>
            <?php endif; ?> 
            <button class="tablink" onclick="openTab(event, 'Forum')">Mes Posts</button>
        </div>

        <div id="Profil" class="tabcontent">
            <h2>Mon Compte</h2>
            <?php $this->displayUserInfo(); ?>
        </div>

        <div id="Password" class="tabcontent">
            <h2>Mon Mot de passe</h2>



            <div id="section">
                <button onclick="openPopup()" id="button">Modifier mon mot de passe</button>
                <div id="popup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopup()">&times;</span>
                        <form method="post">
                                <input type="hidden" name="form_type" value="update_password">
                                <div>
                                    <label for="current_password">Mot de passe actuel:</label>
                                    <input type="password" id="current_password" name="current_password" required>
                                </div>
                                <div>
                                    <label for="new_password">Nouveau mot de passe:</label>
                                    <input type="password" id="new_password" name="new_password" required>
                                </div>
                                <div>
                                    <label for="confirm_password">Confirmez le nouveau mot de passe:</label>
                                    <input type="password" id="confirm_password" name="confirm_password" required>
                                </div>

                                <button type="submit" name="updatePassword" id="b1">Mettre à jour le mot de passe</button>
                        </form>
                    </div>                    
                </div>
            </div>

            <div id="section">
                <button onclick="openDeletePopup()" id="buttonDelete">Supprimer mon compte</button>
                <div id="deleteProfilePopup" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closeDeletePopup()">&times;</span>
                        <p>Êtes-vous sûr de vouloir supprimer votre compte ? Cette action est irréversible.</p>
                        <form method="post">
                            <div>
                                <label for="delete_password">Mot de passe actuel:</label>
                                <input type="password" id="delete_password" name="delete_password" placeholder="••••••••" required>
                            </div>
                            <button type="submit" name="deleteProfile" class="btn btn-remove">Supprimer mon compte</button>
                            <button type="button" onclick="closeDeletePopup()" class="btn">Annuler</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div id="Films" class="tabcontent">
            <h2>Mes Films préférés</h2>
            
        </div>

        <div id="Billets" class="tabcontent">
            <h2>Mes Billets</h2>
            
        </div>

        <div id="Cinema" class="tabcontent">
            <h2>Mon Cinema</h2>
            
        </div>

        <div id="Forum" class="tabcontent">
            <h2>Mes Posts</h2>
            
        </div>
        
        <script src="<?=ASSETS?>js/popupprofil.js"></script>
        <script src="<?=ASSETS?>js/profil.js"></script>
    </div>
</section>

</body>

<?= $this->view("footer")?>