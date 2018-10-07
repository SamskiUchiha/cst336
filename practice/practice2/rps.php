<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>


    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
            
            
            
        </div>
        <div class="col">
            <h2>Player 2</h2>
            
            
            
        </div>
    </div>
    
    <?php 
    function displayImages() {
        $random = rand(0,2);
        $symbol;
        switch($random) {
            case 0: $symbol = "paper";
                break;
            case 1: $symbol = "rock";
                break;
            case 2: $symbol = "scissors";
                break;
        }
        return $symbol;
    }
    
    function printImages() {
        $rand_1 = rand(0,1);
        $symbol_1;
        switch($rand_1) {
            case 0: $symbol_1 = " echo '<div class='col'><img src='img/$symbolOne.png' alt='$symbolOne' width='150'></div>';";
                break;
            case 1: $symbol_1 = " echo '<div class='col'><img src='img/$symbolOne.png' alt='$symbolOne' width='150'></div>';";
    }

    
    for($i = 1; $i < 4; $i++) {
        do{
        $symbolOne = displayImages();
        $symbolTwo = displayImages();
        } while ($symbolOne==$symbolTwo);
        
        echo "<div class='row'>";
           printImages();
        echo "</div>";
        echo "<hr>";
        // $s_1 = displayImages();
        // $s_2= displayImages();
        // $s_3= displayImages();
        // if($s_1 == $s_2) {
        //     echo "<h3> winner player 1";
        // }
        // if($s_2 == )

    // <div id="finalWinner">

    //     <h1>The winner is Player 2</h1>

    // </div>
        }
    

    ?>
    
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
    </body>

</html>