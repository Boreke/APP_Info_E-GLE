<!DOCTYPE html>
<html lang="en">
<?php 
    require "../app/controllers/header.php";
    $header= new Header();
    $header->displayHeader();
?>
    <body>

    <section class="top">
        <div class="disposition">
            <h1 class="place-header">Places:</h1> 
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
            <h1 class="capt-header">intensité sonore moyenne:</h1>
            <h1>89.3 dB</h1>
        </div>
    </section>
    
    <section class="bot">
        <h1 class="seance-header">Séances:</h1>
        <div class="infos-seances">
            <?php $this->showSeance();?>
            
            </div>
    </section>
    
</body>
<?= $this->view("footer")?>