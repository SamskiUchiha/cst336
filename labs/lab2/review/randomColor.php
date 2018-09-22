
    
<?php
    function getLuckyNumber() {
        do {
            $s = rand(1,10);
            
        } while($s == 4);
        echo $s;
    }
    
    function getRandomColor() {
        echo "color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".rand(0,10).");";
    }
            
?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Random Colors & Numbers</title>
        
        <style>
            body {
                <?php 
         
                    echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
                ?>
            }
            h1 {
                <?php 
         
                    echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
                    echo "color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,10)/10).");";
                    
                ?>
            }
            
            h2 {
         
                background-color: <?php getRandomColor(); ?>
            }
            
            
        </style>
    </head>
    <body>
        
        <h1>
           My Lucky Number is: <?= getLuckyNumber(); ?>
           
        </h1>
            
    </body>
</html>