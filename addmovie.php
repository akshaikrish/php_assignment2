<!DOCTYPE html>
<html>
<body>
<head>
<style>
.error {color: #FF0000;}

</style>
</head>

<?php
$nameErr = $starringErr = $ratingErr = $yearErr = $genresErr = $thumbnailErr= "";
$name = $starring = $rating = $year = $genres = $thumbnail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["moviename"])) {
    $nameErr = "Movie name is required";
  } else {
    $name = test_input($_POST["moviename"]);
   }

 if (empty($_POST["starring"])) {
    $starringErr = "Please enter atleast an actor name";
  } else {
    $i=0;
    foreach ($_POST["starring"] as $selected){
      $starring[$i] = test_input($selected);
      if (!preg_match("/^[a-zA-Z, ]*$/",$starring[$i])) {
          $starringErr = "Only letters and white space allowed";
      }}
    $i+=1;
    }

    if (empty($_POST["rating"])) {
    $ratingErr = "Enter rating";
  } else {
    $rating = test_input($_POST["rating"]);
  }
  if (empty($_POST["year"])) {
    $yearErr = "Year is required";
  } else {
    $year = test_input($_POST["year"]);
   }
   if (empty($_POST["genres"])) {
    $genresErr = "Genre is required";
  } else {
    $genres = test_input($_POST["genres"]);
   }
   if (empty($_POST["thumbnail"])) {
    $thumbnailErr = "Thumbnail URL is required";
  } else {
    $thumbnail = test_input($_POST["thumbnail"]);
   }
  

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h><b>Add new movie</b></h><br><br>
<form name="myForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"><br>
Movie : <input type="varchar" name="moviename" placeholder="Enter movie name" required="required">
        <span class="error">*<?php echo $nameErr;?></span><br><br>

Actors: <?php
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "movies";
  
          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          } 
  
          $sql = "SELECT Names FROM actors";
          $result = $conn->query($sql);

          echo "<select name='starring[]' multiple>";
          while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row['Names'] ."'>" . $row['Names'] ."</option>";
          }
          echo "</select>";
          $conn->close();?><br><br>

Rating: <input type="int" placeholder="Enter movie rating" name="rating" id="rate" required="required">
        <span id="error">*<?php echo $ratingErr;?></span><br><br>

Year: <input type="year" placeholder="Enter release year" name="year" required="required">
        <span class="error">*<?php echo $yearErr;?></span><br><br>

Genres: <input type="varchar" placeholder="Enter genres"name="genres" required="required">
        <span class="error">*<?php echo $genresErr;?></span><br><br>

Thumbnail: <input type="varchar" placeholder="Enter thumbnail url" name="thumbnail">
        <span class="error">*<?php echo $thumbnailErr;?></span><br><br>

<input type="submit" name="submit" value="Add Movie" onclick="validateForm()">
</form>
<a href="home.php">Go back</a>

<?php

if($_POST){
$servername = "localhost";
$username = "root";
// $password = "user01";
$dbname = "movies";

$conn = new mysqli($servername, $username, "", $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
$name1= mysqli_real_escape_string($conn, $name);
$starring1= mysqli_real_escape_string($conn, $starring);
$rating1= mysqli_real_escape_string($conn, $rating);
$year1=  mysqli_real_escape_string($conn, $year);
$genres1=  mysqli_real_escape_string($conn, $genres);
$thumbnail1=  mysqli_real_escape_string($conn, $thumbnail);
$sql = "INSERT INTO movielist (Movie, Starring, Rating, Years, Genres, thumbnail )
VALUES ('$name1', '$starring1', '$rating1', '$year1', '$genres1', '$thumbnail1')";
if ($conn->query($sql) === TRUE) {
     header("Location: http://localhost/phpproject/assignment/php_assignment/assignment2/home.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  
$conn->close();
}
?> 
<script src="formvalidation.js"></script>
</body>
</html>
