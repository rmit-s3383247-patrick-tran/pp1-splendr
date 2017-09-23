<?php
	session_start();

	$db = mysqli_connect("localhost", "root", "ybk2588098","accounts");
	if (isset($_POST['register_btn'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password2 = mysqli_real_escape_string($db, $_POST['password2']);
		$fname = mysqli_real_escape_string($db, $_POST['fname']);
		$lname = mysqli_real_escape_string($db, $_POST['lname']);
		if ($password == $password2) {
			//create user
			$password = md5($password); // hash password before storing for security purposes
			$sql = "INSERT INTO members(fname, lname,username, email, password) VALUES('$fname', '$lname', '$username', '$email', '$password')";
			mysqli_query($db, $sql);
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			$_SESSION['fname'] = $fname;
			$_SESSION['lname'] = $lname;
			header('Location: home.php');
		}else{
			$_SESSION['message'] = "The two passwords do not match!";
		}
//TODO: Run this

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<body>
			<h2>Signup Form for Match Making</h2>
			<table>
				<form method = "post" action = "register.php">
					<label>First Name:</label>
					<input type="text" name="fname" placeholder="Enter Username" >
					<br>
					<lable>Last Name:</lable>
					<input type="text" placeholder="Enter Email" name="lname">
					<br>
					<lable><b>Username</b></lable>
					<input type="text" placeholder="Enter Username" name="username">
					<br>
					<lable><b>Email</b></lable>
					<input type="text" placeholder="Enter Email" name="email">
					<br>
					<lable><b>Password</b></lable>
					<input type="text" placeholder="Enter Password" name="password">
					<br>
					<lable><b>Confirm Password</b></lable>
					<input type="text" placeholder="Confirm Password" name="password2">
					<br>
               			</div>
       			</div>
       			<input type ="submit" name ="register_btn" value ="register">

				</form>
			</table>

		</body>
	</head>
</html>
