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
		<p style="font-size: 28px">
			<?php
				$per_page = 3;
				
				$query = "SELECT COUNT(*) AS 'total_records' FROM post";
				$result = mysqli_query($connection, $query);
				
				if($result->num_rows)
				{
					$data = mysqli_fetch_assoc($result);
					
					$total_pages = ceil($data["total_records"] / $per_page);
					
					//echo $total_pages; 
					//die();
				}
				
				if(isset($_GET["page"]))
				{
					$start = $_GET["page"]*$per_page;
				}
				else
				{
					$start = 0;
					
					$_GET["page"] = 0;
				}
				
				if($_GET["page"] > 0)
				{
					?>
						<a href="dashboard.php?page=<?php echo $_GET["page"]-1; ?>" >Previous</a>
						&nbsp;&nbsp;&nbsp;
					<?php
				}
				
				for($loop=1; $loop<=$total_pages; $loop++)
				{
					if($_GET["page"] == $loop-1)
					{
					?>
						<a href="dashboard.php?page=<?php echo $loop-1; ?>" style="color: red; font-size:40px"><?php echo $loop; ?></a>&nbsp;
					<?php
					}
					else
					{
					?>
						<a href="dashboard.php?page=<?php echo $loop - 1; ?>"><?php echo $loop; ?></a>&nbsp;
					<?php
					}
				}
				?>
				&nbsp;&nbsp;
				<?php
				if($_GET["page"] < $total_pages-1)
				{
					?>
						<a href="dashboard.php?page=<?php echo $_GET["page"]+1; ?>" >Next</a>
						&nbsp;&nbsp;&nbsp;
					<?php
				}
			?>
		</p>
		<?php
			$query = "SELECT * FROM post,user
					  WHERE post.user_id=user.user_id
					  ORDER BY post_id DESC
					  LIMIT $start,$per_page";
			$result = mysqli_query($connection, $query);
			
			while($data = mysqli_fetch_assoc($result))
			{
				?>
				<div style="background-color:lightblue; text-align: left; padding: 20px; margin: 15px;">
					<h3><?php echo $data["title"]; ?></h3>
					<p>
						<?php
							$description = $data["description"];
							echo substr($description, 0, 200); 
						?>
					</p>
					<p style="text-align:right;">
						<a href="page_description.php?post_id=<?php echo $data["post_id"] ?>" style="color: blue">Read More</a>
					</p>
				</div>
				<?php
			}
		?>
	</div>
</body>
</html>