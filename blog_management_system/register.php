<?php
	require_once("require/database_connection.php");
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
	<div align="center">
		<fieldset style="width: 400px; height: auto">
			<legend>Register Here !...</legend>
			<table>
				<form action="process.php" method="POST">
					<tr>
						<td>First Name: </td>
						<td><input type="text" name="first_name" /></td>
					</tr>
					<tr>
						<td>Last Name: </td>
						<td><input type="text" name="last_name" /></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input type="email" name="email" /></td>
					</tr>
					<tr>
						<td>Password: </td>
						<td><input type="password" name="password" /></td>
					</tr>
					<tr>
						<td>Phone Number: </td>
						<td><input type="text" name="phone_number" /></td>
					</tr>
					<tr>
						<td>User Role: </td>
						<td>
							<?php
								$query = "SELECT * FROM user_role_type WHERE user_role_type NOT LIKE 'Admin'";
								$result = mysqli_query($connection, $query);
							?>
								<select name="user_role_type_id">
									<option>-- Select User Role --</option>
								<?php
									while($data = mysqli_fetch_assoc($result))
									{
										?>
											<option value="<?php echo $data["user_role_type_id"]; ?>"><?php echo $data["user_role_type"]; ?></option>
										<?php
									}
								?>
								</select>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" name="register" value="Register" /></td>
					</tr>
				</form>
			</table>
		</fieldset>
		<p style="text-align: center">
			Already have an account click <a href="index.php">Here</a> to login 
		</p>
	</div>
</body>
</html>