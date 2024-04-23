<?php
session_start();
require_once('database_connection.php');

$date = date("Y-m-d H:i:s", time());
$user_id = $_SESSION['user']['user_id'];

$query = "UPDATE logs SET logout_time = ? WHERE user_id = ? AND logout_time IS NULL ORDER BY log_id DESC LIMIT 1";
$statement = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($statement, "si", $date, $user_id);
mysqli_stmt_execute($statement);

if ($_SESSION['user']['user_id']) {
	$name = $_SESSION['user']['name'];
	date_default_timezone_set("Asia/karachi");
	$date = date("Y-m-d H:i:s", time());
	if (is_file("Files/$name.txt")) {
	    $resource = fopen("Files/$name.txt", "a+");
	    fwrite($resource, "logout : " . $date . "\t");
	} else {
	    echo "File doesn't exist";
	}
}

session_destroy();
$_SESSION = [];
header("Location: login.php?message=Your Account has been logged out");

mysqli_close($connection);
?>
