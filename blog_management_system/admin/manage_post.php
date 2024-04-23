<?php
	session_start();
	
	require_once("../require/database_connection.php");
	
	if(isset($_GET["action"]) && $_GET["action"]="delete")
	{
		$query = "DELETE FROM post WHERE post_id=".$_GET["post_id"];
		$result = mysqli_query($connection, $query);
		
		if($result)
		{
			$message = "Post ID: ".$_GET["post_id"]." Deleted Successfully !...";
			$color = "green";
		}
		else
		{
			$message = "Post Has Not Been Deleted Try Again !...";
			$color = "red";
		}
	}
	else if(isset($_POST["add_post"]))
	{
		$query = "INSERT INTO post (title, description, user_id, added_on) VALUES('".$_POST["title"]."', '".$_POST["description"]."', ".$_SESSION["user"]["user_id"].", '".date("y-m-d", time())."')";
		$result = mysqli_query($connection, $query);
		
		if($result)
		{
			$message = "Post ID: ".mysqli_insert_id($connection)." Added Successfully !...";
			$color = "green";
		}
		else
		{
			$message = "Post Has Not Been Added Try Again !...";
			$color = "red";
		}
	}
	else if(isset($_POST["update_post"]))
	{
		$query = "UPDATE post SET title='".$_POST["title"]."', description='".$_POST["description"]."' WHERE post_id=".$_POST["post_id"];
		$result = mysqli_query($connection, $query);
		
		if($result)
		{
			$message = "Post ID: ".$_POST["post_id"]." Updated Successfully !...";
			$color = "green";
		}
		else
		{
			$message = "Post ID: ".$_POST["post_id"]." Has Not Been Updated Try Again !...";
			$color = "red";
		}
	}
	
	header("location: dashboard.php?message=$message&color=$color");
?>