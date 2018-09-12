<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
    </head>
    <body>
        <?php
        function displaySymbol($random_value1) {
            
        
            $random_value = rand(0,2); //Generates a random number from 0 to 2
            
           // echo $random_value;
           
            // if($random_value == 0) {
            //     $symbol = "seven";
                
            // } else if($random_value == 1) {
            //     $symbol = "orange";
                
            // } else {
            //     $symbol = "cherry";
            // }
            
            switch($random_value) {
                
                case 0: $symbol = "seven";
                        break;
                case 1: $symbol = "orange";
                        break;
                case 2: $symbol = "cherry";
                        break;
            }
            
  
            echo "<img src=\"img/$symbol.png\" alt = '$symbol' title ='".ucfirst($symbol)."'/>";
            
            }
        
            
            $random_value1 = rand(0,2);
            displaySymbol($random_value1);
            $random_value2 = rand(0,2);
            displaySymbol($random_value2);
            $random_value3 = rand(0,2);
            displaySymbol($random_value3);
            
            echo "<br> Random_value 1: $random_value1 <br>";
            echo "Random_value 2: $random_value2 <br>";
            echo "Random_value 3: $random_value3 <br>";
            
            
        function displayPoint($random_value1, $random_value2, $random_value3) {
            echo "<div id='output'>";
            if($random_value1 == $random_value2 && $random_value2 == $random_value3){
                switch ($random_value1) {
                    case 0: $totalPoints = 1000;
                            echo "<h1>Jackpot!</h1>";
                            break;
                    case 1: $totalPoints = 500;
                            break;
                    case 2: $totalPoints = 250;
                            break;
                }
                echo "<h2>You Won $totalPoints points!</h2>";
            } else {
                echo "<h3> Try Again! </h3>";
            }
            echo "</div>";
        }
        for($i = 1; $i<4; $i++) {
            ${"randValue" . $i} = rand(0,2);
            displaySymbol(${"randValue" . $i} );
        }
        displayPoint($random_value1, $random_value2, $random_value3);
    
        ?>
        
        

    </body>
</html>