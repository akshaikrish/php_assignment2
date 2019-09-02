<div id="addactor">
    <button id="actor-btn" onclick="addactor()">Add Actor</button>
</div><br>
<div id="addgenre">
    <button id="genre-btn" onclick="addgenre()">Add Genre</button>
</div>
<?php
include "config2.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        ?> 
        <div id="<?php echo $row["m_id"] ?>" class='show'><?php
            echo "<br><br><br><br><img src=\"" .$row["Thumbnail"]. "\" width=\"150px\"/>";?>
            <div id="D<?php echo $row["m_id"] ?>"><?php
            echo "<br>" .$row["Movie"]. ",      " .$row["Years"]. "<br>Starring : ";
            include "displayactor.php";
            echo "<br>Rating : " . $row["Rating"]. "<br>Genres : ";
            include "displaygenre.php";
            echo "<br><br><button type=\"button\" value='".$row['m_id']."' onclick=\"edit('".$row['m_id']."')\">Edit</button>
            &nbsp;<button id='".$row['m_id']."' type=\"button\" class='delete'>Delete</button>";
            ?></div>
        </div><?php
        
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<script src="delete.js"></script>