<!DOCTYPE html>
<html lang="fr">
<head>   
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Création d'un compte</title>
  <link rel="stylesheet" href="<?=ASSETS?>css/nouveau_compte.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
  <script src="<?=ASSETS?>js/validation.js" defer></script>
</head>

<body>
   <img src="img/Falcon (1).png" alt="Logo-events-IT" class="logo-events">
   <img src="img/imagedelogin.svg" alt="" class="imagelogin">
   
   
    <form class="inputs" id="signup" action="php/nouveaucompte.php" method="post" novalidate>
      <h2>Nouveau compte</h2>

      <div><input type="Nom" placeholder="Nom" class="id" id="nom" name="nom"></div>
      <div><input type="Prénom" placeholder="Prénom" class="id" id="prenom" name="prenom"></div>
      <div><input type="Email" placeholder="Email" class="id" id="email" name="email"></div>
      <div><input type="Identifiant" placeholder="Identifiant" class="id" id="username" name="username"></div>
      <div><input type="password" placeholder="Mot de passe" class="id" id="password" name="password"></div>
      <div><input type="password" placeholder="Confirmation" class="id" id="password_confirmation" name="password_confirmation"></div>

      <label class="text"for="type">Êtes-vous un gérant?<label class="switch"><input type="checkbox"  id="gerant" name="type"><span class="slider round"></span></label></label>
      <div class="cinema_form">
      <div class="cinema_form_elem"><input type="Nom" placeholder="Nom du Cinéma" class="id" id="nom_cinema" name="nom_cinema"></div>
      <div class="cinema_form_elem"><input type="Adresse" placeholder="Adresse du Cinéma" class="id" id="adresse_cinema" name="adresse_cinema"></div>
      </div>
    
      <div class="CGU-ensemble">
        <div class="CGU">
          <input type="checkbox" id="acceptcheckbox" required class="CGU-checkbox">
          <p>En vous inscrivant sur E-GLE, vous confirmez avoir lu, <br>compris et accepté l'ensemble des conditions générales énoncées ci-dessous.</p>
        </div>
      </div>
      
      <button class="button-creer">Créer</button>

    </form>
      
    <div class="redirection">
      <p class="question">Vous avez déjà un compte ?</p><a href="<?=ROOT?>connexion.php" class="lienversconnexion">Se connecter</a>
    </div>
     

</body>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const cinemaform=document.querySelector(".cinema_form");
    const form_elements=document.querySelectorAll(".cinema_form_elem");
    const Switch = document.getElementById("gerant");

    function toggleCinemaForm() {
        if (!Switch.checked) {
            cinemaform.style.display = 'none'; 
        } else {
            cinemaform.style.display = 'block'; 
            form_elements.forEach(element => {
                element.style.display = 'flex'; 
                element.style.marginBottom = '30px';
            });
        }
    }

    toggleCinemaForm();

    Switch.addEventListener('change', toggleCinemaForm);

  })

</script>

</html>