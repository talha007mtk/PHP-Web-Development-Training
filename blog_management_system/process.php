<?php
	session_start();
	
	require_once("require/database_connection.php");
	
	if(isset($_POST["register"]) && $_POST["register"])
	{
		$query = "INSERT INTO user (first_name, last_name, email, password, phone_number, user_role_type_id) VALUES(?, ?, ?, ?, ?, ?)";
		$statement = mysqli_prepare($connection, $query);
		mysqli_stmt_bind_param($statement, "sssssi", $_POST["first_name"], $_POST["last_name"], $_POST["email"], $_POST["password"], $_POST["phone_number"], $_POST["user_role_type_id"]);
		$result = mysqli_stmt_execute($statement);
		
		if($result)
		{
			header("location: index.php?message=Your Account Has Been Registered Successfully Please Login Into Your Account !...&color=lightgreen");
		}
		else
		{
			header("location: index.php?message=Your Account Has Not Been Registered !...&color=lightred");
		}
	}
	else if(isset($_POST["login"]) && $_POST["login"])
	{
		$query = "SELECT * FROM user WHERE email='".$_POST["email"]."' AND password='".$_POST["password"]."'";
		$result = mysqli_query($connection, $query);
		if($result->num_rows)
		{
			$data = mysqli_fetch_assoc($result);
			
			/*echo "<pre>";
			print_r($data);
			echo "</pre>";*/
			
			$_SESSION["user"] = $data;
			
			/*echo "<pre>";
			print_r($_SESSION["user"]);
			echo "</pre>";*/
			
			if($_SESSION["user"]["user_role_type_id"] == 1)
			{
				header("location: admin/dashboard.php");
			}
			else if($_SESSION["user"]["user_role_type_id"] == 2)
			{
				header("location: editor/dashboard.php");
			}
			else if($_SESSION["user"]["user_role_type_id"] == 3)
			{
				header("location: user/dashboard.php");
			}
		}
		else
		{
			header("location: index.php?message=Login Fail !... Invalid Email/Password&color=lightpink");
		}
	}
?>