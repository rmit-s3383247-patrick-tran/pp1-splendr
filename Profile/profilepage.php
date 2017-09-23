<!DOCTYPE html>
<?php session_start();
if (isset($_GET['user'])) {
 $user_id = $_GET['user'];
}
$year = date("Y");
?>
<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/arnoldstyle.css">
    <meta charset="utf-8">
    <style>
    html{
      font-family: 'Quicksand', sans-serif;
      background-color: #E9EBEE;
    }
    body{
      text-align: center;
    }
    nav{
      width: 100%;
      background-color: #FF3a44;
      color: white;
      height: auto;
      font-family: 'Roboto', sans-serif;
    }
    nav li{
      display: inline-block;
    }
    nav a{
        padding:25px 25px 25px 25px;
        display: block;
        text-decoration: none;
        color: white;
    }
    table{
      margin-left: 0%;
      text-align: center;
      width: 40%;
    }
    .aboutme{
      background-color: pink;
      width: 80%;
      margin:auto;
      padding: 5px 0px 0px 0px;
    }
    .middleline{
      background-color: grey;
      width: 80%;
      margin:auto;
      height: 5px;
    }

    </style>
    <title>
    </title>
  </head>
  <body>
    <button type="button" name="logout"><a href="../Login/logout.php">Logout</a></button>
    <button type="button" name="home"><a href="../index.php">Home</a></button>
    <h1 style ="color:#FF3A44; font-family:'lobster', cursive;">PROFILE</h1>
    <section class = "container1">
      <div align="center" class="middle1">
        <img class ="person" src="../img/human.jpg"><br>
        <p>
        <?php
        $db = mysqli_connect("localhost", "root", "ybk2588098", "accounts");
        $sql = "SELECT * FROM members WHERE user_id = '$user_id'";
        $result = $db->query($sql);
        	if ($result->num_rows > 0) {
        	    // output data of each row
        	    while($row = $result->fetch_assoc()) {
                	$age = $year - $row["doby"];
                echo $row["fname"]." ".$row["lname"]." || ". $row["gender"]." || ".$age;
              }
            }
         ?></p>
        <br>
      </div>
    </section>
    <div class="middleline">
    </div>
    <div class="aboutme">
        <?php
        $db = mysqli_connect("localhost", "root", "ybk2588098", "accounts");
        $sql = "SELECT * FROM members AS m INNER JOIN information as f ON m.user_id = f.user_id INNER JOIN ideal as i ON m.user_id = i.user_id INNER JOIN favourites as fa ON m.user_id = fa.user_id WHERE m.user_id = '$user_id'";
        $result = $db->query($sql);
        echo "<table class>";
        echo "<tr>";
        echo "<th>Height</th>";
        echo "<th>Occupation</th>";
        echo "<th>Education</th>";
        echo "<th>Ethnic</th>";
        echo "</tr>";
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["movgenre"]."</td>";
                echo "<td>".$row["favmovie"]."</td>";
                echo "<td>".$row["musgenre"]."</td>";
                echo "<td>".$row["favsong"]."</td>";
                echo "</tr>";
              }
            }
        echo "</table>";
        echo "<table class ='two'>";
        echo "<tr>";
        echo "<th>Height</th>";
        echo "<th>Occupation</th>";
        echo "<th>Education</th>";
        echo "<th>Ethnic</th>";
        echo "</tr>";
        echo "</table>";
         ?>
       </div>
  </body>
</html>
