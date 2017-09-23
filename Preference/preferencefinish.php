<?php
session_start();
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
$query = "SELECT * FROM members AS m INNER JOIN ideal AS i ON m.user_id=i.user_id INNER JOIN information AS f ON m.user_id = f.user_id INNER JOIN hobby as h ON m.user_id = h.user_id WHERE m.user_id='$user_id'";
$result2 = $db->query($query);
	if ($result2->num_rows > 0) {
	    // output data of each row
	    while($row = $result2->fetch_assoc()) {
					$age = $year - $row["doby"];
	        echo "Name:".$row["fname"]." ".$row["lname"]."<br>"."Gender:".$row["gender"]."<br>"."Age: ".$age."<br>"."Height:".$row["height"]."<br>"."Looking for: ".$row["idealgender"]."<br>Ideal Body Type: ".$row["idealbtype"]."<br>";
					$gender = $row["idealgender"]; // store the ideal gender of the user into the variable
					$btype = $row["idealbtype"]; // store the ideal body type of the user into the varable
					$education = $row["idealeducation"]; //store education information from the user
					$state = $row["state"];
					$hobby1 = $row["hobby1"];
					$hobby2 = $row["hobby2"];
					$hobby3 = $row["hobby3"];
					$hobby4 = $row["hobby4"];
					$hobby5 = $row["hobby5"];
					echo "<br>";
					echo "<b>Your Matches</b><br><br>";
					if($row["idealgender"] == $row["idealgender"] && $row["idealbtype"] == $row["idealbtype"] && $row["state"] == $row["state"]){ // Matchmaking algorithm : Checking the ideal gender of the user.
					//echo "desired partner is female";
					$search = "SELECT * FROM members AS m INNER JOIN ideal AS i ON m.user_id=i.user_id INNER JOIN information AS f ON m.user_id = f.user_id INNER JOIN hobby as h ON m.user_id = h.user_id WHERE m.gender='$gender' AND f.body='$btype' AND m.state='$state'";
					//search database to seelct everything from members, ideal, information table all joint together on the user_id and selectign everything that has the gender of the ideal gender stored in $gender var in line 21
					$result2 = $db->query($search);
					if ($result2 -> num_rows > 0) {// if the conditions are all met
						while ($row = $result2->fetch_assoc()) { // print every single line of the results that meets the criteria of the conditions.
							$age = $year - $row["doby"];
							echo "Name: ".$row["fname"]." ".$row["lname"]."<br>"."Gender: ".$row["gender"]."<br>"."Age: ".$age."<br>"."Height:".$row["height"]."<br>"."Looking for: ".$row["idealgender"]."<br>"."Ideal Body Type:".$row["idealbtype"]."<br>";
							$partnerid = $row["user_id"];
							if ($row["ethnic"] == "blk") {
								$ethnic = "African";
							}
							else if ($row["ethnic"] == "asn") {
								$ethnic = "Asian";
							}
							else if ($row["ethnic"] == "latino") {
								$ethnic = "Hispanic";
							}
							else if ($row["ethnic"] == "white") {
								$ethnic = "Caucasian";
							}
							else if ($row["ethnic"] == "arab") {
								$ethnic = "Middle Eastern";
							}
							else if ($row["ethnic"] == "other") {
								$ethnic = "Other";
							}
							echo "Ethnicity: ".$ethnic."<br>";

													if ($row["religion"] == "ath") {
														$religion = "Atheist";
													}
													else if ($row["religion"] == "agn") {
													  $religion = "Agnostic";
													}
													else if ($row["religion"] == "budd") {
														$religion = "Buddhist";
													}
													else if ($row["religion"] == "cath") {
														$religion = "Catholic";
													}
													else if ($row["religion"] == "christ") {
														$religion = "Christian";
													}
													else if ($row["religion"] == "hindu") {
														$religion = "Hinduism";
													}
													else if ($row["religion"] == "islam") {
														$religion = "Islam";
													}
													else if ($row["religion"] == "jew") {
														$religion = "Judaism";
													}
													else if ($row["religion"] == "othr") {
														$religion = "Other";
													}else{
														$religion = "The person has not specificed their religion";
													}
													echo "Religion: ".$religion."<br>";


							if (in_array($hobby1, array($row["hobby1"], $row["hobby2"], $row["hobby3"], $row["hobby4"], $row["hobby5"]))){ // checking to see if hobby of the user is same for the mathces
								$similarhobbycount += 1; // add 1 value everytime the if condition is met
								$score += 5;
							}
							if (in_array($hobby2, array($row["hobby1"], $row["hobby2"], $row["hobby3"], $row["hobby4"], $row["hobby5"]))) {
								$similarhobbycount += 1;
								$score +=5;
							}
							if (in_array($hobby3, array($row["hobby1"], $row["hobby2"], $row["hobby3"], $row["hobby4"], $row["hobby5"]))) {
								$similarhobbycount += 1;
								$score +=5;
							}
							if (in_array($hobby4, array($row["hobby1"], $row["hobby2"], $row["hobby3"], $row["hobby4"], $row["hobby5"]))) {
								$similarhobbycount += 1;
								$score +=5;
							}
							if (in_array($hobby5, array($row["hobby1"], $row["hobby2"], $row["hobby3"], $row["hobby4"], $row["hobby5"]))) {
								$similarhobbycount += 1;
								$score +=5;
							}
							echo "You share ".$similarhobbycount." similar hobbies with this person"; // echo how many similar hobbies the two users have between each other
							echo "<br>";
							echo "SCORE: ".$score;
							$sql = "SELECT * FROM result WHERE user_id ='$user_id' AND partner_id ='$partnerid'"; //check if the match has already been calcualted
							$result = $db->query($sql);
							$partner_id = mysqli_real_escape_string($db, $partnerid);
							if (!$row = mysqli_fetch_assoc($result)) { // if there are no match made between the user and the potential partner, the insert the values into the database
								$match = "INSERT INTO result(user_id, partner_id, score, similarint) VALUES('$user_id', '$partner_id', '$score', '$similarhobbycount')";
								mysqli_query($db, $match);
							}// if already exist, won't add the data and wont do anything
							$similarhobbycount = 0; // reset the count to 0 and start again for a new user
							$score = 0;

							echo "<br><br>";
						}
					}else{
						echo "couldnt find your match";
					}
				}
			}
	}
header("Location:match.php");

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>
    </title>
  </head>
  <body>

  </body>
</html>
