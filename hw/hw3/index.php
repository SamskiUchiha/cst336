<?php 
// https://www.crystalwebdesigns.com.au/checking-variables-in-php.html
    function formIsValid() {
        
        if (empty($_GET['one']) && empty($_GET['two']) && empty($_GET['quantity']) && empty($_GET['quantity'])) {
            echo "<h2>You must Answer all the Questions!</h2>";
            return false;
        }
        
        if (empty($_GET['one']) || empty($_GET['two']) || empty($_GET['quantity']) || empty($_GET['quantity'])) {
            echo "<h2>You must enter a complete input!</h2>";
            return false;
        }
        
    return true;
            
    }
    
    function congrats() {
        if(countScore() == 5) {
            echo "WOW! CONGRATS!!";
        } 
    }
    
    function countScore() {
        $counter = 0;
        if($_GET['one'] == 'String') {
            $counter++;
        }
        if($_GET['two'] == 'four') {
            $counter++;
        }
        if(isset($_GET['check'])) {
            $counter++;
        }
        if (isset($_GET['task']) && $_GET['task'] == 'save') {
        	if ($_GET['quantity'] == 6) {
        	    $counter++;
        	}
        }
        if($_GET['country'] == 'USA') {
            $counter++;
        }
       
        return $counter;
    }
    

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Homework 3 </title>
    </head>
    <style>
        table {
            background-color: lightgray;
            border-radius: 50px;
        }
        
        hr {
            width: 50%;
        }
        
    </style>
    <link rel='stylesheet' href='css/styles.css' type='text/css' />
    
    <body>
        <h1>Take a Quiz</h1>
        <hr>
        <form method = 'GET'>
            <div id ="div1">
            <center><table class="cinereousTable"></center>
                <thead>
                <tr>
                <th>#1: Type the word "String".</th>
                <th>
                <!---->
                    Enter <input type="text" id="fname" name="one" placeholder="enter...something">
                </th>
                </tr>
                </thead>
                
                <tfoot>
                <tr>
                <td><Strong>#5: What country are you living in right now? (hint: USA only)</Strong></td>
                <td>
                <!---->
                    <label for="country">Country</label>
                    <select id="country" name="country">
                      <option value="Your House">Your House</option>
                      <option value="Canada">Canada</option>
                      <option value="USA">USA</option>
                    </select>
                      
                </td>
                </tr>
                </tfoot>
                
                <tfoot>
                <tr>
                <td><Strong>#2: What is the integer value between 3 & 5? </Strong></td>
                <td>
                <!---->
                    <input type="radio" name="two" value="three"> Three
                    <input type="radio" name="two" value="four"> Four
                    <input type="radio" name="two" value="five"> Five 
                      
                </td>
                </tr>
                </tfoot>
                
                <tbody>
                <tr>
                <td><Strong>#3: Easy Question. Com'on you can do it!</Strong></td>
                <td>
                <!---->
                  <label>
                    <input type="checkbox" name="check"> Check me! Just do it.
                  </label>
                </td>
                </tr>
                </tbody>
                
                <tfoot>
                <tr>
                <td><Strong>#4: What is 3 + 3 = ? </Strong></td>
                <td>
                <!---->
                    <!--Enter <input type="integer" id="iname" name="four" placeholder="enter...an integer">-->
                    <input type="hidden" name="task" value="save" />
                    Select <input type="number" name="quantity" min="1" max="7">
                      
                </td>
                </tr>
                </tfoot>
                
                </table>
            
            </div>
            <hr>
            <input type="submit" value="Submit" >
            <?php
            
            if (formIsValid()) {
                echo "<h3>".'Total Score: '.countScore().'/5'.congrats()."</h3>";
                echo "<h2> Your Entered Answers </h2>";
                echo "#1: ".$_GET['one']."  ";
                echo "#2: ".$_GET['two']."  ";
                echo "#3: ".$_GET['check']."  ";
                echo "#4: ".$_GET['quantity']."  ";
                echo "#5: ".$_GET['country']."  ";
                require 'answers.php';
                
            }
           
               
            
            ?>
            
            
            
        </form>
       

        
    </body>
</html>