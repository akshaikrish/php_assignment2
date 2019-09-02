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

//  if (empty($_POST["starring"])) {
//     $starringErr = "Please enter atleast an actor name";
//   } else {
//     $i=0;
//     foreach ($_POST["starring"] as $selected){
//       $starring[$i] = test_input($selected);
//       if (!preg_match("/^[a-zA-Z, ]*$/",$starring[$i])) {
//           $starringErr = "Only letters and white space allowed";
//       }}
//     $i+=1;
//     }

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
  //  if (empty($_POST["genres"])) {
  //   $genresErr = "Genre is required";
  // } else {
  //   $genres = test_input($_POST["genres"]);
  //  }
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

          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT Names FROM actors";
          $result = $conn->query($sql);?>
          <select name="actor[]" multiple required>
            <?php
            while ($rows = $result->fetch_assoc()) {
                $actor = $rows['Names'];
                echo "<option value='$actor'>$actor</option>";
            }
            ?>
        </select><br>

Rating: <input type="int" placeholder="Enter movie rating" name="rating" id="rate" required="required">
        <span id="error">*<?php echo $ratingErr;?></span><br><br>

Year: <input type="year" placeholder="Enter release year" name="year" required="required">
        <span class="error">*<?php echo $yearErr;?></span><br><br>

Genres: <?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "movies";

          $conn = new mysqli($servername, $username, $password, $dbname);
          // Check connection
          if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT Genre FROM genres";
          $result = $conn->query($sql);?>
          <select name="genre[]" multiple required>
            <?php
            while ($rows = $result->fetch_assoc()) {
                $genre = $rows['Genre'];
                echo "<option value='$genre'>$genre</option>";
            }
            ?>
        </select><br>
        

Thumbnail: <input type="varchar" placeholder="Enter thumbnail url" name="thumbnail">
        <span class="error">*<?php echo $thumbnailErr;?></span><br><br>

<input type="submit" name="submit" value="Add Movie" onclick="validateForm()">
</form>
<a href="home.php">Go back</a>

<?php

if($_POST){
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "moviedb";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

  
  $name1= mysqli_real_escape_string($conn, $name);
  // $starring1= mysqli_real_escape_string($conn, $starring);
  $rating1= mysqli_real_escape_string($conn, $rating);
  $year1=  mysqli_real_escape_string($conn, $year);
  // $genres1=  mysqli_real_escape_string($conn, $genres);
  $thumbnail1=  mysqli_real_escape_string($conn, $thumbnail);
  // echo $_POST['genre'][0];
  // echo $_POST['genre'][1];
  $sql = "INSERT INTO movies (Movie, Rating, Years, Thumbnail )
  VALUES ('$name1',  '$rating1', '$year1', '$thumbnail1')";
  // echo $name1;
  foreach ($_POST['actor'] as $selectedactor) {
    $sql2 = "INSERT INTO actors(actorname, movie) VALUES ('$selectedactor', '$name1')";
    if(mysqli_query($conn, $sql2)){
      echo "Records inserted successfully.";
    } else{
      echo "ERROR: Could not able to execute $sql2. " . $mysqli->error;
  }
  }
  foreach ($_POST['genre'] as $selectedgenre) {
    $sql3 = "INSERT INTO genres(genre, movie) VALUES ('$selectedgenre', '$name1')";
    if(mysqli_query($conn, $sql3)){
      echo "Records inserted successfully.";
      header("Location: http://localhost/phpproject/assignment/php_assignment/assignment2/home.php");
  } else{
      echo "ERROR: Could not able to execute $sql3. " . $mysqli->error;
  }
  }

  mysqli_close($conn);
}
?> 
<script src="formvalidation.js"></script>
</body>
</html>
