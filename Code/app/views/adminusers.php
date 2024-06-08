<!DOCTYPE html>

<html lang="en">

<?php 
        require "../app/controllers/header.php";
        $header= new Header();
        $header->displayHeader($data['page_title']);
?>

<body>
<main>
    <div class="container">
        <div class="container_top">
            <h1>Liste des utilisateurs</h1>
            <div class="search_bar">
                <form method="post">
                    <input type="text" class="id" name="search_keyword" placeholder="Search users..." />
                    <select name="search_category">
                        <option value="nom">Nom</option>
                        <option value="prenom">Prénom</option>
                        <option value="username">Username</option>
                        <option value="email">Email</option>
                        <option value="type">Type</option>
                    </select>
                    <button type="submit" class="search">Search</button>
                </form>
            </div>

            <div>
                <form method="post">
                        <select name="logintest">
                                <option value="">Select User Type</option>
                                <option value="client">Client</option>
                                <option value="gerant">Gérant</option>
                        </select>
                        <button type="submit" class="login">Prévisualiser</button>
                </form>
            </div>

        </div>
        
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
</main>
</body>
<?= $this->view("footer")?>
</html>