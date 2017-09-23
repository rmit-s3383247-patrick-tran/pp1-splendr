<?php session_start(); ?>
<html>
	<header>
		<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
        <body>
			<form action = "validation.php" method="POST">
				<div class="login">
												<h1 style ="font-family:'Lobster', sans-serif;">Splendr</h1>
												<?php if (isset($_SESSION["error"])){
													echo "<p style=color:red;>"."Your username and password is incorrect!"."<p>";
													session_unset();
												}
												 ?>
                    <div class="user"><span><input type="text" name ="username" placeholder="Username" id="uname" required/></span></div>
                    <div class="pws"><span><input type="password" name="password" placeholder="Password" id="pword" required/></span></div>
                    <div class="logbutton"><span><button type ="submit" name ="login_btn">Log In</button></span></div>
                    <div class= "remember"><input type="checkbox"><a style="font-size: 16px;"> Remember me</a>
                    <a href="#" class="forgot">Forgot password?</a></div>
                </div>
            </form>
		</body>
	</header>

</html>
