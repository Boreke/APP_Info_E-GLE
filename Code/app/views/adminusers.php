<!DOCTYPE html>
<html lang="en">

<body>
<?php 

        
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader();

    ?>
    <div class="container">
        <h1>Liste des utilisateurs</h1>
        <div class="listcontainer">
            <table>
                <tr class="top">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
                <?php if($data['users']): ?>
                    <?php foreach ($data['users'] as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user->nom); ?></td>
                            <td><?php echo htmlspecialchars($user->prenom); ?></td>
                            <td><?php echo htmlspecialchars($user->username); ?></td>
                            <td><?php echo htmlspecialchars($user->email); ?></td>
                            <td><?php echo htmlspecialchars($user->type); ?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="delete_id" value="<?php echo $user->id_user; ?>">
                                    <button type="submit" class="supp">Supprimer</button>
                                </form>
                                <form method="POST" action="">
                                    <input type="hidden" name="login_id" value="<?php echo $user->id_user; ?>">
                                    <button type="submit" class="login">Connexion</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Aucun utilisateur trouvé</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
        
    </div>
</body>
<?= $this->view("footer")?>
</html>