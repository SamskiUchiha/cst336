<?php 

    $Nov = range(1,30);
    $Dec = range(1,31);
    $Jan = range(1,31);
    $Fed = range(1,28);
    
    function displaymonth($month) {
        <table>
            <tr>
            
            </tr>
            
            
        </table>
        
    }
    
    function displaySelectedInfo() {
        echo $_GET['months']." Itinerary";
        echo "<br>";
        echo "Visiting ".$_GET['location']." places in ".$_GET['country'];
    }
    
    function formIsValid() {
    
        if (empty($_GET['months'])) {
            echo "<h2>You must select a Month!</h2>";
            return false;
        }
        
        if(empty($_GET['location'])) {
            echo "<h2>You must specify the number of locations!</h2>";
            return false;
        }
        return true;
            
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Midterm 1 </title>
        
    </head>
    <link rel='stylesheet' href='css/style.css' type='text/css' />
    <style>
    
        body {
            text-align: center;
            /*background-color: green;*/
            border-radius: 100px;
        }
        h2 {
            color: red;
        }
        #header {
            background-color: lightgrey;
        }
        
    </style>
   
    
    <body>
        <div id="header">
            <h1> Winter Vacation Planner ! </h1>
        </div>
        
        <form method = 'GET'>
     Select Month: 
            <select name="months">
                <option value="" disabled selected > Select </option>  
                <option value="November"> November </option>
                <option value="December"> December </option>
                <option value="January"> January </option>
                <option value="February"> February </option>
            </select>
        <br>
        Number of locations: 
        <input type="radio" name="location" value="3"> Three
        <input type="radio" name="location" value="4"> Four
        <input type="radio" name="location" value="5"> Five 
        
        <br>
        Select Country: 
        <select name="country">
            <option value="USA"> USA </option>
            <option value="Mexico"> Mexico </option>
            <option value="France"> France </option>
        </select>
        
        <br>
        Visit locations in alphabetical order:
        <input type="radio" name="acending" value="acending"> A-Z
        <input type="radio" name="decending" value="decending"> Z-A
        
        <br>
        
        <input type="submit" value="Submit">
        
        </form>
        <?php
            if(formIsValid()) {
                displaySelectedInfo();
                displaymonth($_GET['months']);
            }
        
        
        ?>
        
        
    </body>
</html>