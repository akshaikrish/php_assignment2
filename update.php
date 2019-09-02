<?php 
$servername = "localhost";
$username = "root";
// $password = "user01";
$dbname = "moviedb";

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

$sql="UPDATE movies set Movie='$Movie', Rating='$Rating', Years='$Year',
  Thumbnail='$Thumbnail' where m_id='$Id'";
$sql2="UPDATE actors set actorname='$Starring' where movie='$Movie'";
$sql3="UPDATE genres set genre='$Genres' where movie='$Movie'";  
if(($conn->query($sql)===TRUE)&&($conn->query($sql2)===TRUE)&&($conn->query($sql3)===TRUE)){
    echo "Movie edited successfully";
    exit;
} else {
    echo "Edit Unsuccessful";
    exit;
}
?>