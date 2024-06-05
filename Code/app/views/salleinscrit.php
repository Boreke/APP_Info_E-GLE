<!DOCTYPE html>
<html lang="en">
<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader($data['page_title']);
?>

    <body>
    <main>
    <section class="top">
        <div class="disposition">
            <h1 class="place-header">Places :</h1> 
            <div class="layout">
                <div class="container">
                    <div class="screen"></div>
                    <?php $this->showRows();?>
                </div>
                <ul class="showcase">
                    <li>
                        <div class="seat"></div>
                        <small>N/A</small>
                    </li>
                    <li>
                        <div class="seat occupied"></div>
                        <small>Occupied</small>
                        </li>    
                </ul>
            </div>
        </div>
        <div class="infos-capteur">
            <h1 class="capt-header">Intensité sonore moyenne:</h1>
            <h1>89.3 dB</h1>
        </div>
    </section>
    <?php if(!empty($this->getSeance())):?>
    <section class="bot">
        
        <div class="infos-seances" id="infos-seances">
            <div class="seances-container">
                <?php $this->showSeance();?>
            </div>
        </div>
        <div class="header-seances">
            <h1 class="seance-header">Séances :</h1>
            <div class="carrousel-command" id="carrousel-command">
                <button id="pre-btn"><img src="<?=ASSETS?>img/arrow.png" alt="" class="pre-btn-img"></button>
                <div class="date-container" id="date-container">
                    <ul class="seance-time" id="seance-time">
                    <?php $this->showSeanceDate();?>
                    </ul>
                </div>
                <button id="nxt-btn"><img src="<?=ASSETS?>img/arrow.png" alt="" class="nxt-btn-img"></button>
            </div>
        </div>
    </section>
    <?php endif;?>
    </main>
</body>
<script>var seances=<?= json_encode($data['seances']);?>;</script>
<script src="<?=ASSETS?>js/carroussel.js"></script>
<?= $this->view("footer")?>