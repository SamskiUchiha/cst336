<?php
    $skins = range(1,14);
    //$weapon = array(1,2,3);
    //$backbling = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14);
    
    $backbling = range(1,14); //Function Array(1)
    
    $back = array(1,2,3,4,5,6,7,8,9,10,12,13);
    function DisplayMessage($v1, $v2, $v3) {
        echo "<div id='output'>";
        if($v1 == $v2 && $v2 == $v3) {
            switch ($v1) {
                case 1:
                    break;
                case 2:
                    break;
                case 3:
                    break;
            }
            echo "<h2>You Are Lucky!</h2>";
        } else {
            echo "<h2>Better Luck Next Time!</h2>";
        }
        echo "</div";
    }
    
    function sortArray($s) {
        sort($s); //Function Array(2)
    }
    
    function shuffleArray($a) {
        shuffle($a); //Function Array(3)
    }
    
    function displaySkins() {
        global $skins;
        sortArray($skins);
        //shuffleArray($skins);
        
        $v1 = $skins[rand(0,count($skins)-1)];
        $v2 = $skins[rand(0,count($skins)-1)];
        $v3 = $skins[rand(0,count($skins)-1)];

        DisplayMessage($v1,$v2,$v3);
        
        echo "<div class='skins'>";
        for($i = 0; $i < 3; $i++) {
            ${"random_value" . $i} = rand(0,13); // test for 3 in a round
            selectionSkins(${"random_value" . $i} );
        }
        
        echo "<br>";
    }
    
    function selectionSkins($random_value) {
        switch ($random_value) {
            case 0: $symbol = "1";
                break;
            case 1: $symbol = "2";
                break;
            case 2: $symbol = "3";
                break;
            case 3: $symbol = "4";
                break;
            case 4: $symbol = "5";
                break;
            case 5: $symbol = "6";
                break;
            case 6: $symbol = "7";
                break;
            case 7: $symbol = "8";
                break;
            case 8: $symbol = "9";
                break;
            case 9: $symbol = "10";
                break;
            case 10: $symbol = "11";
                break;
            case 11: $symbol = "12";
                break;
            case 12: $symbol = "13";
                break;
            case 13: $symbol = "14";
                break;
        }
        echo "<img width='150' src='img/skinimg/$symbol.jpg' border='10' style='border-color: black'>";
    }
    
    
    function displayWeapons() {
        global $weapon;
        
        $v11 = $weapon[rand(0,count($weapon)-1)];
        $v22 = $weapon[rand(0,count($weapon)-1)];
        $v33 = $weapon[rand(0,count($weapon)-1)];
        
        DisplayMessage($v11,$v22,$v33);
           
        echo "<div class='weapons'>";
        echo "<img width='150' src='img/weaponimg/$v11.PNG' border='10' style='border-color: black'>";
        echo "<img width='150' src='img/weaponimg/$v22.PNG' border='10' style='border-color: black'>";  
        echo "<img width='150' src='img/weaponimg/$v33.PNG' border='10' style='border-color: black'>";  
        echo "<br>";
        
        
    }
    
    function displayBling() {
        global $backbling;

        $v11 = $backbling[rand(0,count($backbling)-1)];
        $v22 = $backbling[rand(0,count($backbling)-1)];
        $v33 = $backbling[rand(0,count($backbling)-1)];
        
        DisplayMessage($v11,$v22,$v33);
           
        echo "<div class='weapons'>";
        echo "<img width='150' src='img/backimg/$v11.PNG' border='10' style='border-color: black'>";
        echo "<img width='150' src='img/backimg/$v22.PNG' border='10' style='border-color: black'>";  
        echo "<img width='150' src='img/backimg/$v33.PNG' border='10' style='border-color: black'>";  
        echo "<br>";
        
        // echo "<div class='backbling'>";
        // for($i = 0; $i < 3; $i++) {
        //     ${"random_value" . $i} = rand(1,14);
        //     selectionBling(${"random_value" . $i} );
        // }
        
        // echo "<br>";

    }
    
    function selectionBling($random_value) {
        switch ($random_value) {
            case 0: $symbol = "1";
                break;
            case 1: $symbol = "2";
                break;
            case 2: $symbol = "3";
                break;
            case 3: $symbol = "4";
                break;
            case 4: $symbol = "5";
                break;
            case 5: $symbol = "6";
                break;
            case 6: $symbol = "7";
                break;
            case 7: $symbol = "8";
                break;
            case 8: $symbol = "9";
                break;
            case 9: $symbol = "10";
                break;
            case 10: $symbol = "11";
                break;
            case 11: $symbol = "12";
                break;
            case 12: $symbol = "13";
                break;
            case 13: $symbol = "14";
                break;
        }
        echo "<img width='150' src='img/backimg/$symbol.PNG' border='10' style='border-color: black'>";
    }
    
    function displayBackGround() {
        global $back;
        $randomBackG = $back[rand(0,count($back)-1)];
        
        echo "<div class='back'>";
        echo "<img width='300' src='img/backgroundimg/$randomBackG.jpg' border='10' style='border-color: black'>";    
        echo "<br>";

    }
    
   
    

?>