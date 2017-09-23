<?php
session_start();
$db = mysqli_connect("localhost", "root", "ybk2588098", "accounts" );
$username = $_SESSION["id"];
$get = "SELECT user_id FROM members WHERE username = '$username'";
$result = $db->query($get);
if ($row = mysqli_fetch_assoc($result)) {
	$user_id = $row["user_id"];
}else{
	echo "Not working";
}

if (isset($_POST['pref_btn'])) {
	$ptype = mysqli_real_escape_string($db, $_POST['ptype']);
	$personality = mysqli_real_escape_string($db, $_POST['personality']);
	$hobby1 = mysqli_real_escape_string($db, $_POST['hobby1']);
	$hobby2 = mysqli_real_escape_string($db, $_POST['hobby2']);
	$hobby3 = mysqli_real_escape_string($db, $_POST['hobby3']);
 	$hobby4 = mysqli_real_escape_string($db, $_POST['hobby4']);
	$hobby5 = mysqli_real_escape_string($db, $_POST['hobby5']);
	$travel = mysqli_real_escape_string($db, $_POST['travel']);
	$visit = mysqli_real_escape_string($db, $_POST['visit']);

	$sql = "INSERT INTO hobby(user_id, ptype, personality, hobby1, hobby2, hobby3, hobby4, hobby5, travel, visit) VALUES('$user_id', '$ptype', '$personality', '$hobby1', '$hobby2', '$hobby3', '$hobby4', '$hobby5', '$travel', '$visit')";
	mysqli_query($db, $sql);
}

if (isset($_POST['pref_btn2'])) {
	$idealgender = mysqli_real_escape_string($db, $_POST['idealgender']);
	$idealage = mysqli_real_escape_string($db, $_POST['idealage']);
	$idealbtype = mysqli_real_escape_string($db, $_POST['idealbtype']);
	$idealeducation = mysqli_real_escape_string($db, $_POST['idealeducation']);
	$idealrace = mysqli_real_escape_string($db, $_POST['idealrace']);
 	$idealdrink = mysqli_real_escape_string($db, $_POST['idealdrink']);
	$idealsmoke = mysqli_real_escape_string($db, $_POST['idealsmoke']);
	$idealgamble = mysqli_real_escape_string($db, $_POST['idealgamble']);
	$idealreligion = mysqli_real_escape_string($db, $_POST['idealreligion']);

	$sql = "INSERT INTO ideal(user_id, idealgender, idealage, idealbtype, idealeducation, idealrace, idealdrink, idealsmoke, idealgamble, idealreligion) VALUES('$user_id', '$idealgender', '$idealage', '$idealbtype', '$idealeducation', '$idealrace', '$idealdrink', '$idealsmoke', '$idealgamble', '$idealreligion')";
	mysqli_query($db, $sql);
	header('location:preferencefinish.php');
}
 ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/preferencesstyle.css">
		<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

        <body>
        <nav>
            <ul>
                <li><a href="#">Matches</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Account</a></li>
            </ul>
        </nav>

        <h1>Preferences</h1>
        <div id="pref" class = "preferences">
        <form method="POST" action="preference5.php">
            <p>I am looking for a</p>
            <input type="radio" name="idealgender" value="male"> Male
						<input type="radio" name="idealgender" value="female"> Female<br>


            <p>I would like my partner to be in this age range</p>
                <select name="idealage">
                    <option></option>
                    <option value="early">18-23</option>
                    <option value="late">24-29</option>
                    <option value="middle">30-34</option>
                    <option value="lmiddle">35-39</option>
                    <option value="old">40+</option>
                </select>

            <p>My ideal body type is for my partner is</p>
                <select name="idealbtype">
                    <option></option>[]
                    <option value="slim">Slim</option>
                    <option value="ath">Athletic</option>
                    <option value="avg">Average</option>
                    <option value="over">Overweight</option>
                    <option value="obese">Obese</option>
                </select>


            <p>My ideal education level for my partner is</p>
                <select name="idealeducation">
                    <option></option>
                    <option value="hsg">High School Graduate</option>
                    <option value="cd">Certificate Diploma</option>
                    <option value="bchlr">Bachelor's Degree</option>
                    <option value="mstr">Master's Degree</option>
                    <option value="dctr">Doctorate</option>
                </select>

            <p>My preferred ethnicity for my partner is</p>
                <select name="idealrace">
                    <option></option>
                    <option value="asian">Asian</option>
                    <option value="black">Black/African</option>
                    <option value="white">Caucasian</option>
                    <option value="latino">Hispanic</option>
                    <option value="arab">Middle Eastern</option>
                    <option value="othr">Other</option>
                </select>

            <p>I'd like my partner to drink</p>
                <select name="idealdrink">
                    <option></option>
                    <option value="all">All the time</option>
                    <option value="most">Most of the time</option>
                    <option value="some">Sometimes</option>
                    <option value="social">Socially</option>
                    <option value="never">Never</option>
                </select>

            <p>I'd like my partner to smoke</p>
                <select name="idealsmoke">
                    <option></option>
                    <option value="all">All the time</option>
                    <option value="most">Most of the time</option>
                    <option value="some">Sometimes</option>
                    <option value="social">Socially</option>
                    <option value="never">Never</option>
                </select>

            <p>I'd like my partner to gamble</p>
                <select name="idealgamble">
                    <option></option>
                    <option value="all">All the time</option>
                    <option value="most">Most of the time</option>
                    <option value="some">Sometimes</option>
                    <option value="social">Socially</option>
                    <option value="never">Never</option>
                </select>

            <p>My preferred religion for my partner is</p>
                <select name="idealreligion">
                    <option></option>
                    <option value="ath">Atheist</option>
                    <option value="agn">Agnostic</option>
                    <option value="budd">Buddhism</option>
                    <option value="cath">Catholic</option>
                    <option value="christ">Christianity</option>
                    <option value="hindu">Hinduism</option>
                    <option value="islam">Islam</option>
                    <option value="jew">Judaism</option>
                    <option value="othr">Other</option>
                    <option value="othr">None</option>
                </select>


            <div class="nextbtn"><input type ="submit" class ="nextbtn" name ="pref_btn2" value ="Next"></div>

        </form>
        </div>

		</body>
	</head>
</html>
