<?php 
include "config2.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$refname= $row["Movie"];
$sql2 = "SELECT actorname FROM actors where movie='$refname'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {

        echo $row2["actorname"].", ";
    }}

?>