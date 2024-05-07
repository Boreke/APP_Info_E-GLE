<?php
/*
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $mysqli = require __DIR__ . "/database.php";

    $sql = sprintf("SELECT * FROM user WHERE username = '%s'", $mysqli->real_escape_string($_POST["username"]));

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id_user"];
            

            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}
*/
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="<?=ASSETS?>css/connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <div class="center">
        <img src="<?=ASSETS?>img/imagedelogin.svg" alt="image de fond" class="imagelogin">
        <div class="left">
            <a href="<?=ROOT?>home"><img src="<?=ASSETS?>img/Falcon (1).png" alt="Logo" class="logo" ></a>
            </div>
    </div>
<section class="connexion">
    <h2 class="titre2">Connexion</h2>

    <form class="inputs" method="post">
        <input type="Identifiant" placeholder="Identifiant" class="id" id="username" name="username" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
        <input type="password" placeholder="Mot de passe" class="id" id="password" name="password">
        <button class="buttonconnexion"> Connexion </button>
        <div class="crétioncompte">
            <p class="inline">Vous n'avez pas de compte ?</p> <a href="<?=ROOT?>nouveaucompte" class="lienverscreation">Créer un compte</a>
        </div>
    </form>
   

</section>
</body>

</html>