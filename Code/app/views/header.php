<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Scéance</title>
    <link rel="stylesheet" href="<?=$data['CSS']?>">
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/footer.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?=ASSETS?>img/Falcon (1).png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<div class="loader">
    <span class="lettre">L</span>
    <span class="lettre">O</span>
    <span class="lettre">A</span>
    <span class="lettre">D</span>
</div>

<header>
    
    <a class="topleft" href="<?=ROOT?>home">
        <div class="Logo_Nom">
            <img src="<?=ASSETS?>img/Falcon (1).png" alt="Logo" class="logo" >
            <p class="Nom">E-GLE</p>
        </div>
    </a>
    <nav id="nav" >
    <?php 

        foreach ($data['pageClassMap'] as $filename => $class) {
            if ($data['currentPage'] == $filename) {
                $class .= ' active';
            }
            echo '<li><a href="' . ROOT . $filename . '" class="' . $class . '">' . $data['pageName'][$filename] . '</a></li>';
        }
        ?>
    </nav>
    <img src="<?=ASSETS?>img/Menu.png" alt="Menu" class="menu" id="menuburger">
    <div class="topright">
        <div class="lg">
            <li><a href="" class="lg_elmt1">EN</a></li>
            <li><a href="" class="lg_elmt">FR</a></li>
        </div>    
        <?php if (isset($_SESSION["username"])): ?>
            <a href="<?=ROOT?>logout" ><button class="button1" >Logout</button></a>
        <?php else:  ?>
            <a href="<?=ROOT?>login"><button class="button1">Login</button></a>
        <?php endif; ?> 
    </div>
</header>
<script src="<?=ASSETS?>js/index.js">
    
</script>