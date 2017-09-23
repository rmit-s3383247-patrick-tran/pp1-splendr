<?php
$db = mysqli_connect("localhost", "root", "ybk2588098","accounts");
$age = $_POST["age"];
$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];

$statement = mysqli_prepare($db, "INSERT INTO user (name, username, age, password) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($statement, "ssis", $name, $username, $age, $password);
mysqli_stmt_execute($statement);

$response = array();
$response["success"] = true;

echo json_encode($response);
 ?>
