<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['pageTitle']?></title>
    
    <link rel="stylesheet" href="<?=ASSETS?>css/header.css">
    <link rel="stylesheet" href="<?=ASSETS?>css/footer.css">
    <link rel="stylesheet" href="<?=$data['CSS']?>">
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
           
        <?php if (isset($_SESSION["username"])): ?>
            <div class="dropdown">
                <button class="dropbtn" onclick="toggleDropdown()"><?=$_SESSION["username"]?></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="<?=ROOT?>profil">Mon Profil</a>
                    <a href="<?=ROOT?>forum">Forum</a>
                    <?php if (isset($_SESSION["real_type"])): ?>
                        <a href="<?=ROOT?>logoutadmin">Back to admin</a>
                    <?php elseif(isset($_SESSION["username"])):  ?>
                        <a href="<?=ROOT?>logout">Logout</a>
                    <?php endif; ?> 
                    
                </div>
            </div>
            <script src="<?=ASSETS?>js/dropdown.js"></script>
        <?php else:  ?>
            <a href="<?=ROOT?>login"><button class="button1">Login</button></a>
        <?php endif; ?> 
    </div>
</header>
<script src="<?=ASSETS?>js/loader.js">
    
</script>