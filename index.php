<?php

include('vendor/autoload.php');

use North\Deaths;
use North\Mormont;
use North\Stark;
use North\Karstark;

$deaths = new Deaths('deaths.json');
$print = $deaths->getDeaths();
$mormont = new Mormont();
$stark = new Stark();
$karstark = new Karstark();

$deaths->attach($mormont);
$deaths->attach($stark);
$deaths->attach($karstark);
$deaths->notify();

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Cinzel+Decorative');
        @import url('https://fonts.googleapis.com/css?family=Rock+Salt');

        h1 
        {
            font-family: 'Cinzel Decorative', cursive;
            text-align: center;
        }
        
        h2 {
            text-align: center;
            font-family: 'Rock Salt', cursive;
        }
        
        #death
        {
            margin:auto;
            width: 90%;
            padding: 10px;
            text-align: center;
        }

        .house {
            float: left;
            width: 30%;
            padding: 10px;
            height: 300px;
            text-align: center;
        }

        #houses:after {
            content: "";
            display: table;
            clear: both;
            margin:auto;
            width:95%;
        }

        .fate
        {
            font-family: 'Cinzel Decorative', cursive;
            font-size: 25px;
        }

        h3 
        {
            font-family: 'Rock Salt', cursive;
        }
</style>
</head>
<body>
    <h1>The North Observer</h1>
    <h2>Deaths:</h2>

    <div id="death"><?php foreach ($print as $death)
            {
                echo $death['name'] . ' ' . $death['house'] .', <i>' .$death['book'] .'</i><br>';
            }
    ?></div>

    <div id="houses">

        <div id="mormont" class="house">
            <h3>Casa Mormont</h3>
            <span class="family">
                <span class="fate">Vivi: <br></span>
                <?php
                    foreach($mormont->getAlive() as $mlive)
                    {
                        echo $mlive . '<br>';
                    }
                ?>
                <br><br>
                <span class="fate">Morti: <br></span>
                <?php
                    foreach($mormont->getDead() as $mdead)
                    {
                        echo $mdead . '<br>';
                    }
                ?>
            </span>    
        </div>

        <div id="stark" class="house">
            <h3>Casa Stark</h3>
            <span class="fate">Vivi: <br></span>
            <?php
                foreach($stark->getAlive() as $slive)
                {
                    echo $slive . '<br>';
                }
            ?>
            <br><br>
            <span class="fate">Morti: <br></span>
            <?php
                foreach($stark->getDead() as $sdead)
                {
                    echo $sdead . '<br>';
                }
            ?>
        </div>

        <div id="karstark" class="house">
            <h3>Casa Karstark</h3>
            <span class="fate">Vivi: <br></span>
            <?php
                foreach($karstark->getAlive() as $klive)
                {
                    echo $klive . '<br>';
                }
            ?>
            <br><br>
            <span class="fate">Morti: <br></span>
            <?php
                foreach($karstark->getDead() as $kdead)
                {
                    echo $kdead . '<br>';
                }
            ?>
        </div>

    </div>      
</body>
</html>