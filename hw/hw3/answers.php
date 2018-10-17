<?php 
    function checkingRadio() {
        if($_GET['two'] == 'three') {
            echo "<input type='radio' name='two' value='three' checked disabled> 3";
            echo "<input type='radio' name='two' value='four'disabled> 4"; 
            echo "<input type='radio' name='two' value='five'disabled> 5"; 
        }
        else if($_GET['two'] == 'four') {
            echo "<input type='radio' name='two' value='three'disabled> 3";
            echo "<input type='radio' name='two' value='four'checked disabled> 4"; 
            echo "<input type='radio' name='two' value='five'disabled> 5"; 
        }
        else if($_GET['two'] == 'five') {
            echo "<input type='radio' name='two' value='three'disabled> 3";
            echo "<input type='radio' name='two' value='four'disabled> 4"; 
            echo "<input type='radio' name='two' value='five' checked disabled> 5"; 
        }
    }
    
    function checkCountry() {
        if($_GET['country'] == 'USA') {
            echo "<select id='country' name='country' disabled selected>";
                echo "<option value='USA'>USA</option>";
            echo "</select>";
        }
        
        else if($_GET['country'] == 'Your House') {
            echo "<select id='country' name='country' disabled selected>";
                echo "<option value='Your House'>Your House</option>";
            echo "</select>";
        }
        
        else if($_GET['country'] == 'Canada') {
            echo "<select id='country' name='country' disabled selected>";
                echo "<option value='Canada'>Canada</option>";
            echo "</select>";
        }
        
        
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
        <h1>Your Entered Answers!</h1>
        <hr>
        <form method = 'GET' action="index.php">
            <div id ="div1">
            <center><table class="cinereousTable"></center>
                <thead>
                <tr>
                <th>#1: Type the word "String".</th>
                <th>
                <!---->
                    Enter <input type="text" id="fname" name="one" value= "<?=$_GET['one'] ?>" disabled>
                </th>
                </tr>
                </thead>
                
                <tfoot>
                <tr>
                <td><Strong>#5: What country are you living in right now? (hint: USA only)</Strong></td>
                <td>
                <!---->
                    <label for="country">Country</label>
                    <?=checkCountry() ?>;
                      
                </td>
                </tr>
                </tfoot>
                
                <tfoot>
                <tr>
                <td><Strong>#2: What is the integer value between 3 & 5? </Strong></td>
                <td>
                <!---->
                    <?=checkingRadio() ?>;
                      
                </td>
                </tr>
                </tfoot>
                
                <tbody>
                <tr>
                <td><Strong>#3: Easy Question. Com'on you can do it!</Strong></td>
                <td>
                <!---->
                  <label>
                      <!--call function here-->
                    <input type="checkbox" name="three" checked disabled> Check me! Just do it.
                  </label>
                </td>
                </tr>
                </tbody>
                
                <tfoot>
                <tr>
                <td><Strong>#4: What is 3 + 3 = ? </Strong></td>
                <td>
                <!---->
                    Select <input type="text" name="quantity" value="<?=$_GET['quantity'] ?>" disabled>
                      
                </td>
                </tr>
                </tfoot>
                
                </table>
            
            </div>
            <hr>
            <input type="submit" value="Go Back">
        </form>
       
        <?php
        
        ?>
        
    </body>
</html>