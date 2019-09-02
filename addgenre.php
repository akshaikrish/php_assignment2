<?php 
include "config.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$genre=$_POST["genre"];


$sql="INSERT INTO genres (Genre)
VALUES ('$genre')";
if($conn->query($sql)===TRUE){
    echo "Genre added successfully";
    exit;
} else {
    echo "Unsuccessful";
    exit;
}
?>