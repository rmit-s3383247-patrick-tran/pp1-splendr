<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration page</title>
</head>
<body>
<h1>Your registration is now complete</h1>
<?php echo $_SESSION['username']; ?>
<?php echo $_SESSION['fname']; ?>
<?php echo $_SESSION['lname']; ?>
</body>
</html>
