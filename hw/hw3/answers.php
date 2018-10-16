<?php 

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
        <h1>Check Your Answers!</h1>
        <hr>
        <form method = 'GET' action="index.php">
            <div id ="div1">
            <center><table class="cinereousTable"></center>
                <thead>
                <tr>
                <th>#1: Type the word "String".</th>
                <th>
                <!---->
                    Enter <input type="text" id="fname" name="one" value="String" disabled>
                </th>
                </tr>
                </thead>
                
                <tfoot>
                <tr>
                <td><Strong>#5: What country are you living in right now? (hint: USA only)</Strong></td>
                <td>
                <!---->
                    <label for="country">Country</label>
                    <select id="country" name="five" disabled>
                        <option value="usa">USA</option>
                        <option value="myhouse">Your House</option>
                        <option value="canada">Canada</option>
                      
                    </select>
                      
                </td>
                </tr>
                </tfoot>
                
                <tfoot>
                <tr>
                <td><Strong>#2: What is the integer value between 3 & 5? </Strong></td>
                <td>
                <!---->
                    <input type="radio" name="two" value="3"> Three
                    <input type="radio" name="two" value="4" checked disabled> Four 
                    <input type="radio" name="two" value="5"> Five 
                      
                </td>
                </tr>
                </tfoot>
                
                <tbody>
                <tr>
                <td><Strong>#3: Easy Question. Com'on you can do it!</Strong></td>
                <td>
                <!---->
                  <label>
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
                    Select <input type="number" name="quantity" value="6" disabled>
                      
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