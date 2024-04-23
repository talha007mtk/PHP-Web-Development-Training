<?php
	require_once("require/functions.php");
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
	<?php
		if(isset($_GET["message"]))
		{
			?>
				<p style="background-color:<?php echo $_GET["color"]; ?>; padding: 15px; text-align:center; margin: 30px; border-radius: 10px;"><?php echo $_GET["message"]; ?></p>
			<?php
		}
	?>
	<div align="center">
		<fieldset style="width: 400px; height: auto">
			<legend>Login Here !...</legend>
			<table>
				<form action="process.php" method="POST">
					<tr>
						<td>Email: </td>
						<td><input type="email" name="email" /></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="login" value="Login" /></td>
					</tr>
				</form>
			</table>
		</fieldset>
		<p style="text-align: center">
			Don't have an account click <a href="register.php">Here</a> to register 
		</p>
	</div>
</body>
</html>