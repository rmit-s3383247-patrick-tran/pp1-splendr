<!DOCTYPE html>
<?php
  session_start();
  $db = mysqli_connect("localhost", "root", "ybk2588098", "accounts");
  $username = $_SESSION["id"];
  $get = "SELECT user_id FROM members WHERE username = '$username'";
  $result = $db->query($get);
  $similarhobbycount = 0;
  $score = 0;
  $year = date("Y");
  date_default_timezone_set("Australia/Sydney");
  $hour = date("H",time());
  $minute = date("i",time());
  $second = date("s",time());
  $time = $hour.$minute.$second;
  if ($row = mysqli_fetch_assoc($result)) {
  	$user_id = $row["user_id"];
  }else{
  	echo "Not working";
  }
  if (isset($_GET['user'])) {
   $partner_id = $_GET['user'];
  }
  if (isset($_POST["send_msg"])) {
    if (isset($_POST["message"])) {
      $message = mysqli_real_escape_string($db, $_POST["message"]);
      $storemsg = "INSERT INTO message(user_id, friend_id, message, time) VALUES('$user_id', '$partner_id', '$message','$time')";
      mysqli_query($db, $storemsg);
    }
  }
 ?>
<html>
<style>
.chat{
  width: auto;
  height: auto;
  background-color: white;
  border: 2px solid grey;
}
</style>
  <head>
    <meta charset="utf-8">
    <title>
    </title>
  </head>
  <body>
    <form action="chat.php?user=<?php echo $partner_id?>" method="post">
    <div class="chat">
      <?php
            echo "user:".$user_id;
            echo "<br>";
            echo "partner:".$partner_id;
        $sql = "SELECT * FROM members AS m INNER JOIN message AS msg ON m.user_id = msg.user_id INNER JOIN members AS m2 ON m2.user_id = msg.friend_id WHERE msg.user_id = '$user_id' AND msg.friend_id = '$partner_id' OR msg.user_id = '$partner_id' AND msg.friend_id = '$user_id'
        order by time asc";
        $result= $db->query($sql);

        if (!mysqli_query($db,$sql))
      {
      echo("Error description: " . mysqli_error($db));
      }
          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<p>".$row["user_id"]."(".$row["time"].")".": ".$row["message"]."</p>";
                echo "<br>";
              }
            }
       ?>
    </div>
    <br>
    <textarea name="message" rows="8" cols="80" required></textarea>
    <input type="submit" name="send_msg" value="Send Message">
    </form>
  </body>
</html>
