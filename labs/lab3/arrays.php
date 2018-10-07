<?php

    function displayArray() {
        global $symbol;
        echo "<hr>";
        for($i = 0; $i < count($symbol); $i++) {
           echo $symbol[$i] . ", ";
        }
    }

    $symbol = array("seven");
    print_r($symbol); //Displays array content
    
    $points = array("orange" => 250, "cherry" => 500); //index zero donest exist
    echo $points["orange"]; // display 250
    $points["seven"] = 1000;
    
    
    array_push($symbol,"orange","grapes");
    print_r($symbol);
    
    $symbol[] = "cherry"; //Also adds element to end of array
    //print_r($symbol);
    displayArray();
    
    unset($symbol[2]);
    $symbol = array_values($symbol);
    displayArray();
    
    //echo "Random Item: " . $symbol[array_rand($symbol)];
    
    $indexes = array();
    for($i = 0; $i < 3; $i++) {
        $indexes[] = $symbol[array_rand($symbol)];
        //echo "<img src='../lab2/img/" . $symbol[array_rand($symbol)] . ".png'>";
        echo "<img src='../lab2/img/" . $indexes[$i] . ".png'>";
    }
    echo "<hr";
    print_r($indexes);

    if($indexes[0] == $indexes[1] && $indexes[1] == $indexes[2]) {
        echo "Congrats!! You Won " . $points[$indexes[0] ] . "points!";
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title> Review: Arrays </title>
    </head>
    <body>

    </body>
</html>