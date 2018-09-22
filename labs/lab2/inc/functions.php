<?php
    //Sam Laitha
    //9/21/2018
    function displayPoints($value1, $value2, $value3) {
        echo "<div id='output'>";
        if ($value1 == $value2 && $value2 == $value3) {
            switch ($value1) {
                case 0:$totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
                case 1:$totalPoints = 500;
                    break;
                case 2:$totalPoints = 250;
                    break;
                case 3:$totalPoints = 900;
                    break;
            }
            echo "<h2>You won $totalPoints points!</h2>";
        }
        else {
            echo "<h3> Try again! </h3>";
        }
        echo "</div>";
    }
    function displaySymbol($random_value, $pos) {
        
        switch ($random_value) {
            case 0: $symbol = "seven";
                break;
            case 1: $symbol = "cherry";
                break;
            case 2: $symbol = "lemon";
                break;
            case 3: $symbol = "orange";
                break;
                
        }
        echo "<img id='reel$pos'. src='img/$symbol.png' alt='$symbol' title='.ucfirst($symbol).' width=70>";
    }
    function play() {
        for ($i=1; $i<4; $i++) {
            ${"random_value" . $i} = rand(0,3);
            displaySymbol(${"random_value" . $i}, $i);
        }
        displayPoints($random_value1, $random_value2, $random_value3);
    }
?>