<?php 
include "config.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$actor=$_POST["actor"];


$sql="INSERT INTO actors (Names)
VALUES ('$actor')";
if($conn->query($sql)===TRUE){
    echo "Actor added successfully";
    exit;
} else {
    echo "Unsuccessful";
    exit;
}
?>