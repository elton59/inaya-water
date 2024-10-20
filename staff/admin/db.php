<?php
$servername='localhost'; 
$username='root';
$password=''; 
$db='inayawaterlimited';












//create connection
$mysqli =new mysqli($servername, $username, $password,$db)or die(mysqli_error($mysqli));
// Check connection
if (!$mysqli) {
    die($mysqli->error);
   }

?>
