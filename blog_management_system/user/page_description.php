<?php
	require_once("../require/functions.php");
	require_once("../require/database_connection.php");
	
	session_maintainance(3);
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
	<p style="text-align:right"><b>Welcome User:</b> <?php echo $_SESSION["user"]["first_name"]." ".$_SESSION["user"]["last_name"] ?> | <a href="logout.php">Logout</a>
	</p>
	<hr />
	
	<div align="center">
		<?php
			$query = "SELECT * FROM post,user
					  WHERE post.user_id=user.user_id
					  AND post.post_id=".$_GET["post_id"];
			$result = mysqli_query($connection, $query);
			
			$data= mysqli_fetch_assoc($result);
		?>
				<br />
				<p>
					<a href="dashboard.php" style="text-decoration: none; background-color: blue; color: white; font-weight: bolder; padding: 15px; border-radius:10px;">View All Posts</a>
				</p>
				<br />
				<div style="background-color:lightblue; text-align: left; padding: 20px; margin: 15px;">
					<h2><?php echo $data["title"]; ?></h2>
					<div>
						<?php echo $data["description"]; ?>
					</div>
				</div>
	</div>
</body>
</html>