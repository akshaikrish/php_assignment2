<?php 
$servername = "localhost";
$username = "root";
// $password = "user01";
$dbname = "movies";

$conn = new mysqli($servername, $username, "", $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$Movie=$_POST["Movie"];
$Starring=$_POST["Starring"];
$Rating=$_POST["Rating"];
$Year=$_POST["Year"];
$Genres=$_POST["Genres"];
$Thumbnail=$_POST["Thumbnail"];
$Id=$_POST["Id"];

$sql="UPDATE movielist set Movie='$Movie', Starring='$Starring', Rating='$Rating', Years='$Year',
 Genres='$Genres', Thumbnail='$Thumbnail' where Id='$Id'";
if($conn->query($sql)===TRUE){
    echo "Movie edited successfully";
    exit;
} else {
    echo "Edit Unsuccessful";
    exit;
}
?>