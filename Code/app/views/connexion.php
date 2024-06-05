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
    <a class="topleft" href="<?=ROOT?>home">
        <div class="Logo_Nom">
            <img src="<?=ASSETS?>img/Falcon (1).png" alt="Logo" class="logo" >
            <p class="Nom">E-GLE</p>
        </div>
    </a>

    <section class="container">
        <div class="connexion">
        
            <h2 class="titre2">Connexion</h2>

            <form class="inputs" method="post">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="error">
                    <h3 class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></h3>
                    </div>  
                <?php endif; ?>
                <input type="Identifiant" placeholder="Identifiant" class="id" id="username" name="username" value="<?= htmlspecialchars($_POST["username"] ?? "") ?>">
                <input type="password" placeholder="Mot de passe" class="id" id="password" name="password">
                <button class="buttonconnexion"> Connexion </button>
                <div class="crétioncompte">
                    <p class="inline">Vous n'avez pas de compte ?</p> <a href="<?=ROOT?>nouveaucompte" class="lienverscreation">Créer un compte</a>
                </div>
                
            </form>
        </div>
    </section>
</body>
</html>