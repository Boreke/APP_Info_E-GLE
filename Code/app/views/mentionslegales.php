<!DOCTYPE html>
<html lang="en">

<?php
        $data['mention']=require_once '../app/models/mentions_legales_content.php';
        require "../app/controllers/header.php";
        $header = new Header();
        $header->displayHeader($data['page_title']);
    
    ?>

<body>
    <main>

    <div class="container">
        <div class='header-edit'>
            <h1>Mentions Légales</h1>
            <?php if($data['user']->check_logged_in() && $_SESSION['type']=== 'admin'):?>
                <button class='edit-btn'> Editer </button>
            <?php endif;?>
        </div>
        <div id="mainText">
            <h2>1. Éditeur du site</h2>

            <p>Le site E-GLE est édité par :
            <br>
            Nom du responsable : <?=$data['mention']['editor']['name']?> <br>
            Adresse : <?=$data['mention']['editor']['address']?> <br>
            Téléphone : <?=$data['mention']['editor']['phone']?> <br>
            Email : <?=$data['mention']['editor']['email']?> <br>
            </p>

            <h2><?=$data['mention']['headers'][2]?></h2>

            <p><?=$data['mention']['intellectual_property']?></p>
            
            <h2><?=$data['mention']['headers'][3]?></h2>
            <p><?=$data['mention']['data_protection']?></p>

            <h2><?=$data['mention']['headers'][4]?></h2>
            <p><?=$data['mention']['responsibility']?></p>

            <h2><?=$data['mention']['headers'][5]?></h2>
            <p><?=$data['mention']['applicable_law']?></p>
        </div>
    </div>
    <form class="edit-form" method='post'>
        <div class='header-edit'>
            <h1>Mentions Légales</h1>
            <input type="submit" value="Submit" class='submit-btn'>
        </div>

        <h2>1. Éditeur du site</h2>

        <p>Le site E-GLE est édité par :
        <br>
        <label for="name">Nom du responsable : </label>
        <input type='text' class='name' name='name' value="<?=$data['mention']['editor']['name']?>" ><br>
        <label for="address"> Adresse : </label>
        <input type='text' class='address' name='address' value="<?=$data['mention']['editor']['address']?>"> <br>
        <label for="phone">Téléphone : </label>
        <input type='text' class='phone' name='phone' value="<?=$data['mention']['editor']['phone']?>"> <br>
        <label for="email">Email :</label>
        <input type='text' class='email' name='email' value="<?=$data['mention']['editor']['email']?>"> <br>
        </p>

        <input type='text' class='header' name='2' value="<?=$data['mention']['headers'][2]?>">
        <textarea id='intellectual_property' class='intellectual_property' name='intellectual_property' rows="4" cols="50"><?=$data['mention']['intellectual_property']?></textarea>

        <input type='text' class='header' name='3' value="<?=$data['mention']['headers'][3]?>">
        <textarea id='data_protection' class='data_protection' name='data_protection' rows="4" cols="50"><?=$data['mention']['data_protection']?></textarea>
        
        <input type='text' class='header' name='4' value="<?=$data['mention']['headers'][4]?>">
        <textarea id='responsibility' class='responsibility' name='responsibility' rows="4" cols="50"><?=$data['mention']['responsibility']?></textarea>

        <input type='text' class='header' name='5' value="<?=$data['mention']['headers'][5]?>">
        <textarea id='applicable_law' class='applicable_law' name='applicable_law' rows="4" cols="50"><?=$data['mention']['applicable_law']?></textarea>
    </form>
            </main>
</body>
<?= $this->view("footer")?>
<script>const root="<?php echo ROOT;?>";</script>
<script src="<?=ASSETS?>js/mentions.js"></script>
</html>