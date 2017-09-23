<?php session_start();
$db = mysqli_connect("localhost", "root", "ybk2588098", "accounts");
$username = $_SESSION["id"];
$get = "SELECT user_id FROM members WHERE username = '$username'";
$result = $db->query($get);
$similarhobbycount = 0;
$score = 0;
$year = date("Y");
if ($row = mysqli_fetch_assoc($result)) {
  $user_id = $row["user_id"];
}else{
  echo "Not working";
}
?>
<!DOCTYPE html>
<html>
  <head>
		<style>
			table{
				    font-family: 'Roboto', sans-serif;
						width: 90%;
					height: 30%;
					margin: auto;

			}
			table th{
				font-family: 'Roboto',sans-serif;
			}
			html{
				text-align: center;
			}
			body{
				font-family: 'Roboto', sans-serif;
			}
			h1, h2{
				font-family:'Lobster', sans-serif;
				color: #FF3A44;
			}
			.profiletest{
				text-decoration: none;
				font-weight: bold;
				color: #FF3A44;

			}
		</style>
		<link rel ="stylesheet" type="text/css" href ="../css/registrationstyle.css">
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <meta charset="utf-8">
    <title>
    </title>
  </head>
  <body>
		<nav>
				<ul>
						<li class="login"><a href="#">A</a></li>
						<li class="login"><a href="#">B</a></li>
						<li class="login"><a href="#">C</a></li>
						<?php if(isset($_SESSION["loggedin"])){
								echo"<li class='login'><a href ='../Profile/profilepage.php?user=$user_id'>Profile</a></li>";
						}else{
								echo"<li class='login'><a href ='../Login/login.php'>Log in</a></li>";
						} ?>
				</ul>
		</nav>
						<h1>FIND YOUR MATCH</h1>
						<?php
						$query = "SELECT * FROM members AS m INNER JOIN ideal AS i ON m.user_id=i.user_id INNER JOIN information AS f ON m.user_id = f.user_id INNER JOIN hobby as h ON m.user_id = h.user_id WHERE m.user_id='$user_id'";
						$result2 = $db->query($query);
							if ($result2->num_rows > 0) {
							    // output data of each row
							    while($row = $result2->fetch_assoc()) {
                    if ($row["idealgender"] == "female") {
                      $gender = "Female";
                    }else{
                      $gender = "Male";
                    }
                    if ($row["idealbtype"] == "slim") {
                      $btype = "Slim";
                    }if ($row["idealbtype"] == "ath") {
                      $btype="Athletic";
                    }if ($row["idealbtype"] == "avg") {
                      $btype="Average";
                    }if ($row["idealbtype"] == "over") {
                      $btype="Chubby";
                    }if ($row["idealbtype"] == "obese") {
                      $btype="Fat";
                    }
											$age = $year - $row["doby"];
							        echo "<p class='asd'>Name: ".$row["fname"]." ".$row["lname"]."<br>"."Gender: ".$row["gender"]."<br>"."Age: ".$age."<br>"."Height: ".$row["height"]."<br>";
                      echo "Looking for: ".$gender."<br>";
                      echo "Ideal Body Type: ".$btype."<br></p>";
									}
                  echo "<h2>YOUR MATCHES</h2>";
							}
							$ass = "SELECT * FROM members AS m INNER JOIN ideal AS i ON m.user_id=i.user_id INNER JOIN information AS f ON m.user_id = f.user_id INNER JOIN hobby as h ON m.user_id = h.user_id INNER JOIN result as s ON m.user_id = s.user_id
							INNER JOIN members as m2 ON m2.user_id=s.partner_id INNER JOIN information AS f2 ON m2.user_id = f2.user_id  INNER JOIN ideal AS i2 ON m2.user_id = i2.user_id INNER JOIN hobby as h2 ON m2.user_id = h2.user_id WHERE m.user_id = $user_id order by s.score desc";
							$result = $db->query($ass);
							echo "<table> <tr>
							 	<th>NAME</th>
								<th>GENDER</th>
								<th>AGE</th>
								<th>HEIGHT</th>
								<th>LOOKING FOR</th>
								<th>IDEAL BODY TYPE</th>
								<th>COMMON INTERESTS</th>
								<th>SCORE</th>
							 </tr>";
							if ($result -> num_rows > 0) {// if the conditions are all met
								while ($row = $result->fetch_assoc()) { // print every sin\
									if ($row["idealgender"] == "male") {
										$idealgender = "Male";
									}else{
										$idealgender = "Female";
									}
									if ($row["idealbtype"] == "slim") {
										$btype = "Slim";
									}if ($row["idealbtype"] == "ath") {
										$btype="Athletic";
									}if ($row["idealbtype"] == "avg") {
										$btype="Average";
									}if ($row["idealbtype"] == "over") {
										$btype="Chubby";
									}if ($row["idealbtype"] == "obese") {
										$btype="Fat";
									}
									$age = $year - $row["doby"];
									$id = $row["user_id"];
									echo "<tr><td>".$row["fname"]." ".$row["lname"]."</td>".
									"<td>".$row["gender"]."</td>".
									"<td>".$age."</td>".
									"<td>".$row["height"]."</td>".
									"<td>".$idealgender."</td>".
									"<td>".$btype."</td>".
									"<td>".$row["similarint"]."</td>".
									"<td>".$row["score"]."</td>";

									echo "<td><form action='../Profile/profilepage.php?user=$id' method='post'>
									<a href='../Profile/profilepage.php?user=$id' class='profiletest'>View Profile</a><br><br><a href='chat.php?user=$id' class='profiletest'>Send Message</a></td></tr>";
							echo "</form>";
								}
							}
														echo "</table>";

						 ?>
  </body>
</html>
