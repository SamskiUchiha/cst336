<?php
    $animal = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    
    function display($startYear, $endYear) {
        $i;
        $num = 0;
        global $animal;
        
        for($i = $startYear; $i <= $endYear; $i++) {

            
            if($i % 4 == 0) {
                echo "<li> Year $i";
                $total += $i;
                
                if($i == 1776) {
                    echo "<strong> USA INDEPENDENCE </strong>";
                }
                
                if($num == 12) {
                    $num = 0;
                } 
                
                echo "<hr>";
                echo "<img src='img/".$animal[$num].".png' alt='hello' title='blank' />";
                $num++;
    
    
                    
                // if($i%100 == 0) {
                //     echo "<strong> Happy New Year! </strong>";
                // }
                echo "</li>";
            }
           
            
            
        }
        return "<h1>Year Sum: $total</h1>";
  
    }
    
    function createTable() {
        $row = $_GET["row"];
        $col = $_GET["col"];
        
        
        
        for ($i = 0; $i < $row; $i++) {
            for ($j = 0; $j < $col; $j++) {
                echo display(1900, 2000);
            }
            echo "<br/>"; 
        }
        
    }


?>



<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
         table, th {
            border: 1px solid black;
            background-color: brown;
            border-radius: 100px;
            color: white;
        }
        </style>
    </head>
    <body>
        <center><table style="width:50%" ></center>
            <tr>
            <th>
                <h1>Chinese Zodiac Tasks</h1>
                <?=  display($_GET['startyear'], $_GET['endyear']); ?>
            </th>
                
            </tr>
        </table>
        
        <form>
          Start Year:<br>
          <input type="text" name="startyear" value="0">
          <br>
          End Year:<br>
          <input type="text" name="endyear" value="0">
          <br><br>
          <input type="submit" value="Submit">
        </form> 
        
        <!--<form>-->
        <!--  Colum:<br>-->
        <!--  <input type="text" name="col" value="0">-->
        <!--  <br>-->
        <!--  Row:<br>-->
        <!--  <input type="text" name="row" value="0">-->
        <!--  <br><br>-->
        <!--  <input type="submit" value="Submit">-->
        <!--</form> -->
        
        
    </body>
</html>