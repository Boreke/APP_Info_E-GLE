<!DOCTYPE html>
<html lang="en">
<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader($data['page_title']);

?>
<body>  
<main>
<section id="Compte" class="Compte">
    <div>
        <div class="tabs">
            <button class="tablink" onclick="openTab(event, 'Profil')">Mon Compte</button>
            <button class="tablink" onclick="openTab(event, 'Password')">Sécurité</button>
            <?php if(isset($_SESSION["username"]) && $_SESSION["type"] == "client"): ?>
                <!-- Pas encore implémenté <button class="tablink" onclick="openTab(event, 'Films')">Mes Films préférés</button> -->
                <button class="tablink" onclick="openTab(event, 'Billets')">Mes Billets</button>
            <?php elseif($_SESSION["type"] == "gerant"):  ?>
                <button class="tablink" onclick="openTab(event, 'Cinema')">Mon Cinema</button>
            <?php endif; ?> 
            <button class="tablink" onclick="openTab(event, 'Forum')">Mes Posts</button>
        </div>

        <div id="Profil" class="tabcontent">
            <h2>Mon Compte</h2>
            <?php $this->displayUserInfo();?>

            <div id="section">
                <button onclick="openPopupEdit()" id="button">Modifier mon profil</button>
                <div id="popupEdit" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopupEdit()">&times;</span>
                        <form method="post">
                                <input type="hidden" name="form_type" value="update_profile">
                                <div>
                                    <label for="current_surname">Prénom actuel:</label>
                                    <input type="text" id="current_surname" name="current_surname" value="<?= htmlspecialchars($data['user_info']->prenom) ?>" required>
                                </div>
                                <div>
                                    <label for="current_name">Nom actuel:</label>
                                    <input type="text" id="current_name" name="current_name" value="<?= htmlspecialchars($data['user_info']->nom) ?>" required>
                                </div>
                                <div>
                                    <label for="current_email">Email actuel:</label>
                                    <input type="email" id="current_email" name="current_email" value="<?= htmlspecialchars($data['user_info']->email) ?>" required>
                                </div>
                                <div>
                                    <label for="current_username">Username actuel:</label>
                                    <input type="text" id="current_username" name="current_username" value="<?= htmlspecialchars($data['user_info']->username) ?>" required>
                                </div>

                                <button type="submit" name="updateProfile" id="b2">Mettre à jour mon profil</button>
                        </form>
                    </div>                    
                </div>
            </div>

        </div>

        <div id="Password" class="tabcontent">
            <h2>Mon Mot de passe : ******** </h2>

            <div id="section">
                <button onclick="openPopup()" id="buttonMDP">Modifier mon mot de passe</button>
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
                            <input type="hidden" name="form_type" value="delete_profile">
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

        <!-- Pas encore implémenté 
        <div id="Films" class="tabcontent">
            <h2>Mes Films préférés</h2>
            
        </div>
        -->

        <div id="Billets" class="tabcontent">
            <h2>Mes Billets</h2>
            <?php if ($data['user_tickets'] && count($data['user_tickets']) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Film</th>
                            <th>Cinema</th>
                            <th>Salle</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['user_tickets'] as $ticket): ?>
                            <tr>
                                <td><?= htmlspecialchars($ticket->film_title) ?></td>
                                <td><?= htmlspecialchars($ticket->cinema_name) ?></td>
                                <td><?= htmlspecialchars($ticket->salle_number) ?></td>
                                <td><?= htmlspecialchars($ticket->price) ?> €</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>Vous n'avez aucun billet.</p>
            <?php endif; ?>
        </div>

        <div id="Cinema" class="tabcontent">
            <h2>Mon Cinema</h2>
            <?php $this->displayCinemaInfo();?>
            
            <div id="section">
                <button onclick="openPopupEditCinema()" id="button">Modifier mon Cinema</button>
                <div id="popupEditCinema" class="popup">
                    <div class="popup-content">
                        <span class="close" onclick="closePopupEditCinema()">&times;</span>
                        <form method="post">
                                <input type="hidden" name="form_type" value="update_cinema">
                                <div>
                                    <label for="current_cinema">Nom actuel:</label>
                                    <input type="text" id="current_cinema" name="current_cinema" value="<?= htmlspecialchars($data['cinema']->nom_cinema) ?>" required>
                                </div>
                                <div>
                                    <label for="current_address">Adresse actuel:</label>
                                    <input type="text" id="current_address" name="current_address" value="<?= htmlspecialchars($data['cinema']->adresse_cinema) ?>" required>
                                </div>

                                <button type="submit" name="updateCinema" id="b1">Mettre à jour les informations</button>
                        </form>
                    </div>                    
                </div>
            </div>

        </div>

        <div id="Forum" class="tabcontent">
            <h2>Mes Posts</h2>
            <?php if (!empty($data['user_posts'])): ?>
                <ul>
                    <?php foreach ($data['user_posts'] as $post): ?>
                        <li>
                            <?= htmlspecialchars($post->contenu) ?>
                            <button onclick="openEditPostPopup(<?= $post->idpost ?>)">Éditer</button>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="post_id" value="<?= $post->idpost ?>">
                                <button type="submit" name="delete_post">Supprimer</button>
                            </form>
                            <div id="editPostPopup<?= $post->idpost ?>" class="popup">
                                <div class="popup-content">
                                    <span class="close" onclick="closeEditPostPopup(<?= $post->idpost ?>)">&times;</span>
                                    <form method="post">
                                        <input type="hidden" name="post_id" value="<?= $post->idpost ?>">
                                        <textarea name="post_content" required><?= htmlspecialchars($post->content) ?></textarea>
                                        <button type="submit" name="update_post">Mettre à jour</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Vous n'avez aucun post.</p>
            <?php endif; ?>
            
            <h3>Mes Commentaires</h3>
            <?php if (!empty($data['user_comments'])): ?>
                <ul>
                    <?php foreach ($data['user_comments'] as $comment): ?>
                        <li>
                            <?= htmlspecialchars($comment->comment_content) ?>
                            <a href="<?= $comment->post_id ?>">Voir</a>
                            <button onclick="openEditCommentPopup(<?= $comment->id ?>)">Éditer</button>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                <button type="submit" name="delete_comment">Supprimer</button>
                            </form>
                            <div id="editCommentPopup<?= $comment->id ?>" class="popup">
                                <div class="popup-content">
                                    <span class="close" onclick="closeEditCommentPopup(<?= $comment->id ?>)">&times;</span>
                                    <form method="post">
                                        <input type="hidden" name="comment_id" value="<?= $comment->id ?>">
                                        <textarea name="comment_content" required><?= htmlspecialchars($comment->comment_content) ?></textarea>
                                        <button type="submit" name="update_comment">Mettre à jour</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Vous n'avez aucun commentaire.</p>
            <?php endif; ?>
            </div>
        </div>
        
        
    </div>
</section>
<script src="<?=ASSETS?>js/popupprofil.js"></script>
<script src="../public/assets/js/profil.js"></script>
</main>
</body>

<?= $this->view("footer")?>