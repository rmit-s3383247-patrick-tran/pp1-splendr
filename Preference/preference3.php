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
	$height = mysqli_real_escape_string($db, $_POST['height']);
	$jobs = mysqli_real_escape_string($db, $_POST['jobs']);
	$body = mysqli_real_escape_string($db, $_POST['body']);
	$education = mysqli_real_escape_string($db, $_POST['education']);
	$ethnic = mysqli_real_escape_string($db, $_POST['ethnic']);
 	$drink = mysqli_real_escape_string($db, $_POST['drink']);
	$smoke = mysqli_real_escape_string($db, $_POST['smoke']);
	$gamble = mysqli_real_escape_string($db, $_POST['gamble']);
	$religion = mysqli_real_escape_string($db, $_POST['religion']);

	$sql = "INSERT INTO information(user_id, height, jobs, body, education, ethnic, drink, smoke, gamble, religion) VALUES('$user_id', '$height', '$jobs', '$body', '$education', '$ethnic', '$drink', '$smoke', '$gamble', '$religion')";
	mysqli_query($db, $sql);
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

        <h1>About Me</h1>
        <div id="pref" class = "preferences">
        <form method="POST" action="preference4.php">
            <p>What is your favourite movie genre?</p>
            <select name="movgenre">
                    <option></option>
				    				<option value="action">Action</option>
				    				<option value="adventure">Adventure</option>
                    <option value="comedy">Comedy</option>
                    <option value="crime">Crime</option>
                    <option value="drama">Drama</option>
                    <option value="fantasy">Fantasy</option>
                    <option value="horror">Horror</option>
                    <option value="romance">Romance</option>
                    <option value="satire">Satire</option>
                    <option value="thriller">Thriller</option>
            </select>

            <p>What is your favourite movie?</p>
                <input  type="text" value="" placeholder="" name="favmovie" id="movie" style="width: 70%;"/>

            <p>What is your favourite music genre?</p>
            <select name="musgenre">
                    <option value="1"></option>
				    <option value="alt">Alternative</option>
				    <option value="blu">Blues</option>
                    <option value="class">Classical</option>
                    <option value="com">Comedy</option>
                    <option value="country">Country</option>
                    <option value="dance">Dance</option>
                    <option value="elect">Electronic</option>
                    <option value="rap">Hip-Hop/Rap</option>
                    <option value="indie">Indie Pop</option>
                    <option value="jazz">Jazz</option>
                    <option value="kpop">K-Pop</option>
				    <option value="latin">Latin</option>
                    <option value="pop">Pop</option>
                    <option value="regg">Reggae</option>
                    <option value="rock">Rock</option>
                    <option value="track">Soundtrack</option>
                    <option value="world">World</option>
            </select>

             <p>What is your favourite song?</p>
                <input  type="text" value="" placeholder="" name ="favsong" id="song" style="width: 70%;"/>

            <br><br>


            <div class="nextbtn"><input type ="submit" class ="nextbtn" name ="pref_btn" value ="Next"></div>

        </form>
        </div>

		</body>
	</head>
</html>
