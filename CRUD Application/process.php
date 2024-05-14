<?php
	require_once("database.php");

	$mysqli_driver = new mysqli_driver();
	$mysqli_driver->report_mode = MYSQLI_REPORT_OFF;

	$database = new database();

	if (isset($_GET['action']) && $_GET['action'] == "show_posts") 
	{
		$query = "SELECT * FROM post,user WHERE post.added_by = user.user_id ORDER BY post_id DESC";

	    $result = $database->execute_query($query);

	    if($result->num_rows)
				{
					?>
						<table border="1" cellpadding="10" cellspacing="5">
							<thead style="background-color: gray;">
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
									while($post = mysqli_fetch_assoc($result))
									{
										?>
											<tr>
												<td><?php echo $post["post_id"] ?></td>
												<td><?php echo $post["title"] ?></td>
												<td style="width: 600px"><?php echo $post["description"] ?></td>
												<td><?php echo $post["first_name"]." ".$post["last_name"] ?></td>
												<td><?php echo $post["added_on"] ?></td>
												<td align="center" width="120px">
													<button onclick="edit_post(<?php echo $post["post_id"] ?>, '<?php echo $post["title"] ?>', '<?php echo $post["description"] ?>')" style="background-color: green; color: white; padding: 7px; border-radius: 10px;">Edit</button>&nbsp;&nbsp;

													<button onclick="delete_post(<?php echo $post["post_id"] ?>)" style="background-color: red; color: white; padding: 7px; border-radius: 10px;">Delete</button>
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

	}elseif (isset($_POST['action']) && $_POST['action'] == "add_post") {

	    $query = "INSERT INTO post(title, description, added_by) VALUES ('".htmlspecialchars($_POST['title'])."','".htmlspecialchars($_POST['description'])."', '1')";

	    $result = $database->execute_query($query);

	    if ($result) {
	    	echo "<p style = 'color: green;'><b>Post Added Succesfully</b></p>";
	    }else{
	    	echo "<p style = 'color: red;'><b>Post Did Not Added Please Try Again!...</b></p>";
	    }

	} elseif (isset($_POST['action']) && $_POST['action'] == "delete_post") {

	  $query = "DELETE FROM post WHERE post_id = " . $_POST['post_id'];
	  $result = $database->execute_query($query);

	  if ($result) {
	    echo "<p style='color: green;'><b>Post Deleted successfully</b></p>";
	  } else {
	    echo "<p style='color: red;'><b>Post Did Not Deleted Please Try Again!...</b></p>";
	  }

	} elseif (isset($_POST['action']) && $_POST['action'] == "update_post") {
	  $query = "UPDATE post SET title='" . htmlspecialchars($_POST['title']) . "', description='" . htmlspecialchars($_POST['description']) . "' WHERE post_id=" . $_POST['post_id'];

	  $result = $database->execute_query($query);

	  if ($result) {
	    echo "<p style='color: green;'><b>Post Updated Successfully</b></p>";
	  } else {
	    echo "<p style='color: red;'><b>Post Did Not Update. Please Try Again!...</b></p>";
	  }
	}

?>
