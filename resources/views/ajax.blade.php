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
$addPos=$_POST['addPos'];
$arr = implode( ',', $addPos );

echo $arr;
$sql = "UPDATE users SET quiz = quiz + 1, pos = '$arr'   WHERE id = $id"; 

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    
} else {
    echo "Error updating record: " . $conn->error;    
}
?>