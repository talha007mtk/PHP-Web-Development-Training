<?php
	require_once("../require/functions.php");
	require_once("../require/database_connection.php");
	
	session_maintainance(1);
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
	<p style="text-align:right"><b>Welcome Admin:</b> <?php echo $_SESSION["user"]["first_name"]." ".$_SESSION["user"]["last_name"] ?> | <a href="logout.php">Logout</a>
	</p>
	<hr />
	<div align="center">
		<?php
			if(isset($_GET["post_id"]))
			{
				$query = "SELECT * FROM post WHERE post_id=".$_GET["post_id"];
				$result = mysqli_query($connection, $query);
				$edit_data = mysqli_fetch_assoc($result);
			}
		?>
		<fieldset style="width: 400px; height: auto">
			<legend><?php echo isset($_GET["post_id"])?"Update":"Add"; ?> Post !...</legend>
			<table>
				<form action="manage_post.php" method="POST">
					<tr>
						<td>Title: </td>
						<td><input type="text" name="title" value="<?php echo $edit_data["title"]??""; ?>" /></td>
					</tr>
					<tr>
						<td>Description: </td>
						<td><textarea name="description" rows="5"><?php echo $edit_data["description"]??""; ?></textarea></td>
					</tr>
					<tr>
						<?php
							if(isset($_GET["post_id"]))
							{
								?>
									<input type="hidden" name="post_id" value="<?php echo $edit_data["post_id"]; ?>" />
								<?php
							}
						?>
						<td colspan="2" align="center"><input type="submit" name="<?php echo isset($_GET["post_id"])?"update":"add"; ?>_post" value="<?php echo isset($_GET["post_id"])?"Update":"Add"; ?> Post" /></td>
					</tr>
					<?php
						if(isset($_GET["message"]) && isset($_GET["color"]))
						{
							?>
								<tr>
									<td colspan="2" align="center" style="color:<?php echo $_GET["color"] ?>"><?php echo $_GET["message"]; ?></td>
								</tr>
							<?php
						}
					?>
				</form>
			</table>
		</fieldset>
	</div>
	<hr />
	<div align="center">
		<?php
			$query = "SELECT * FROM post,user
					  WHERE post.user_id=user.user_id
					  ORDER BY post_id DESC";
			$result = mysqli_query($connection, $query);
			
			if($result->num_rows)
			{
				?>
					<table border="1" cellpadding="10" cellspacing="5">
						<thead style="background-color: lightblue">
							<tr>
								<th>Post ID</th>
								<th>Title</th>
								<th>Description</th>
								<th>Added By</th>
								<th>Added On</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php
								while($data = mysqli_fetch_assoc($result))
								{
									?>
										<tr>
											<td><?php echo $data["post_id"] ?></td>
											<td><?php echo $data["title"] ?></td>
											<td style="width: 600px"><?php echo $data["description"] ?></td>
											<td><?php echo $data["first_name"]." ".$data["last_name"] ?></td>
											<td><?php echo $data["added_on"] ?></td>
											<td align="center">
												<a href="dashboard.php?post_id=<?php echo $data["post_id"]; ?>">Edit</a>
												&nbsp;|&nbsp;
												<a href="manage_post.php?action=delete&post_id=<?php echo $data["post_id"]; ?>">Delete</a>
											</td>
										</tr>
									<?php
								}
							?>
						</tbody>
					</table>
				<?php
			}
			else
			{
				?>
					<p style="color: red;">No Posts Found!...</p>
				<?php
			}
		?>
	</div>
</body>
</html>