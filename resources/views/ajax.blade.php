<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goodscore1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$id=$_POST['id'];

$sql = "UPDATE users SET quiz = quiz + 1, pos = pos + 1  WHERE id = $id"; 

// UPDATE `users` SET `quiz` = '20' WHERE `users`.`id` = 1

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    
} else {
    echo "Error updating record: " . $conn->error;
    
}


?>