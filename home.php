<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stream Movies</title>
</head>
<body>
    <a href="addmovie.php">Add Movie</a><br>
    <div id="addactor">
        <button id="actor-btn" onclick="addactor()">Add Actor</button>
    </div>
    
    <?php
        include "config.php";
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT * FROM movielist";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                ?> 
                <div id="<?php echo $row["Id"] ?>" class='show'><?php
                    echo "<br><br><br><br><img src=\"" .$row["Thumbnail"]. "\" width=\"150px\"/>";?>
                    <div id="D<?php echo $row["Id"] ?>"><?php
                    echo "<br>" .$row["Movie"]. ",      " .$row["Years"]. "<br>Starring : " . $row["Starring"]. 
                    "<br>Rating : " . $row["Rating"]. "<br>Genres : " .$row["Genres"]. 
                    "<br><br><button type=\"button\" value='".$row['Id']."' onclick=\"edit('".$row['Id']."')\">Edit</button>
                    &nbsp;<button id='".$row['Id']."' type=\"button\" class='delete'>Delete</button>";
                    ?></div>
                </div><?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="movie.js"></script>
</body>
</html>