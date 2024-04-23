<?php
	require_once("../require/functions.php");
	
	session_maintainance(2);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php title(); ?></title>
</head>
<body>
	<h1 align="center"><?php title(); ?></h1>
	<p style="text-align:right"><b>Welcome Editor:</b> <?php echo $_SESSION["user"]["first_name"]." ".$_SESSION["user"]["last_name"] ?></p>
	<hr />
</body>
</html>