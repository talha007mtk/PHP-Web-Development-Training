<?php
	session_start();
	
	function title()
	{
		echo "Blog Management System";
	}
	
	function session_maintainance($user_role_type_id)
	{
		if(!isset($_SESSION["user"]))
		{
			header("location: ../index.php?message=Please Login Into Your Account First&color=lightpink");
		}
		else if(isset($_SESSION["user"]) && $_SESSION["user"]["user_role_type_id"]!=$user_role_type_id)
		{
			session_destroy();
			
			header("location: ../index.php?message=Invalid Acess Login Into Your Account&color=lightpink");
		}	
	}
?>