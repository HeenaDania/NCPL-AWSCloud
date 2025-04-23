<?php
 
//Including Database configuration file.
 
include "config.php";
 
//Getting value of "search" variable from "script.js".
 
if (isset($_POST['search'])) {
 
//Search box value assigning to $Name variable.
 
   $Name = $_POST['search'];
 
//Search query.
 
   $Query = "SELECT Name FROM services WHERE Name LIKE '%$Name%' LIMIT 7";
 
//Query execution
 
   $ExecQuery = MySQLi_query($con, $Query);
 
//Creating unordered list to display result.
 
   echo '
 
<ul type=none style="margin-left: 80px; text-align:justify; color: #4a4a80; border-radius: 5px; background-color: #ffffff; width: 53.3%;">
 
   ';
 
   //Fetching result from database.
 
   while ($Result = MySQLi_fetch_array($ExecQuery)) {
 
       ?>
 
   <!-- Creating unordered list items.
 
        Calling javascript function named as "fill" found in "script.js" file.
 
        By passing fetched result as parameter. -->
 
   <li onclick='fill("<?php echo $Result['Name']; ?>")'>
 
   <a style="color: #1d1f1f; margin-left: -10px; font-size: 18px; font-family: raleway; font-style: bold; background-color: white; text-align: left;">
 
   <!-- Assigning searched result in "Search box" in "search.php" file. -->
 
       <?php echo $Result['Name']; ?>
   </a>
 
   </li>
 
   <!-- Below php code is just for closing parenthesis. Don't be confused. -->
 
   <?php
 
}}
 
 
?>
</ul>