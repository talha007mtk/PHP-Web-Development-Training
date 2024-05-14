<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CRUD Application</title>
	<style>
		h1{
			background-color: black;
			color: white;
			padding: 10px;
			border-radius: 10px;
		}
	</style>
	<script>
		window.onload = function() {
			show_posts();
		}

		function show_posts() {
			var ajax_request = null;
			if (window.XMLHttpRequest) {
				ajax_request = new XMLHttpRequest();
			}
			else{
				ajax_request = ActiveXObject("Microsoft.XMLHttp");
			}

			ajax_request.onreadystatechange = function(){
				if (ajax_request.readyState == 4 && ajax_request.status == 200 && ajax_request.statusText == "OK") {
				document.getElementById("show_posts").innerHTML = ajax_request.responseText;
			}
			}

			ajax_request.open("GET","process.php?action=show_posts");
			ajax_request.send();
		}

		function add_post(){
			var title 			= document.getElementById("title").value;
			var description 	= document.getElementById("description").value;
			var ajax_request 	= null;
			if (window.XMLHttpRequest) {
				ajax_request = new XMLHttpRequest();
			}
			else{
				ajax_request = ActiveXObject("Microsoft.XMLHttp");
			}

			ajax_request.onreadystatechange = function(){
				if (ajax_request.readyState == 4 && ajax_request.status == 200 && ajax_request.statusText == "OK") {
				document.getElementById("show_message").innerHTML = ajax_request.responseText;
				show_posts();
			}
			}

			ajax_request.open("POST","process.php");
			ajax_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
			ajax_request.send("action=add_post&title="+title+"&description="+description);
		}

		function delete_post(post_id) {
		  if (window.confirm("Do you want to delete post ID: " + post_id + "?")) {
		    var ajax_request = null;
		    if (window.XMLHttpRequest) {
		      ajax_request = new XMLHttpRequest();
		    } else {
		      ajax_request = ActiveXObject("Microsoft.XMLHTTP");
		    }

		    ajax_request.onreadystatechange = function() {
		      if (ajax_request.readyState == 4 && ajax_request.status == 200 && ajax_request.statusText == "OK") {
		        document.getElementById("show_message").innerHTML = ajax_request.responseText;
		        show_posts();
		      }
		    }

		    ajax_request.open("POST", "process.php");
		    ajax_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		    ajax_request.send("action=delete_post&post_id=" + post_id);
		  }
		}

		function edit_post(post_id, title, description) {
		  if (window.confirm("Do you want to Edit post ID: " + post_id + "?")) {
		    document.getElementById("title").value 					= title;
		    document.getElementById("description").value 			= description;
		    document.getElementById("post_id").value 				= post_id;
		    document.getElementById("add_post_legend").innerText 	= "Update Post";
		    document.getElementById("add_post_button").innerText 	= "Update Post";
		    document.getElementById("add_post_button").onclick 		= function() { update_post(); };
		  }
		}

		function reset_form() {
		  document.getElementById("title").value 				= "";
		  document.getElementById("description").value 			= "";
		  document.getElementById("post_id").value 				= "";
		  document.getElementById("add_post_legend").innerText 	= "Add Post";
		  document.getElementById("add_post_button").innerText 	= "Add Post";
		  document.getElementById("add_post_button").onclick 	= function() { add_post(); };
		}

		function update_post() {
		  var post_id 		= document.getElementById("post_id").value;
		  var title 		= document.getElementById("title").value;
		  var description 	= document.getElementById("description").value;
		  var ajax_request 	= null;

		  if (window.XMLHttpRequest) {
		    ajax_request = new XMLHttpRequest();
		  } else {
		    ajax_request = ActiveXObject("Microsoft.XMLHttp");
		  }

		  ajax_request.onreadystatechange = function() {
		    if (ajax_request.readyState == 4 && ajax_request.status == 200 && ajax_request.statusText == "OK") {
		      document.getElementById("show_message").innerHTML = ajax_request.responseText;
		      show_posts();
		      reset_form();
		    }
		  }

		  ajax_request.open("POST", "process.php");
		  ajax_request.setRequestHeader("content-type", "application/x-www-form-urlencoded");
		  ajax_request.send("action=update_post&post_id=" + post_id + "&title=" + title + "&description=" + description);
		}
	</script>
</head>
<body>
	<center>
	<h1>CRUD Application</h1>
	<div id="add_post" style="margin: 10px;">
		<fieldset style="width: 600px; height: auto">
			<legend id="add_post_legend">Add Post</legend>
			<input type="hidden" id="post_id" name="post_id">
			<table cellpadding="5px">
				<tr>
					<td><label>Title:</label><span style="color:red;">*</span></td>
					<td><input type="text" name="title" id="title" placeholder="Enter Post Title" style="width : 400px;" required></td>
				</tr>

				<tr>
					<td><label>Description:</label><span style="color:red;">*</span></td>
					<td><textarea name="description" id="description" placeholder="Enter Post Description" style="width : 400px;" rows="4" required></textarea></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><button id="add_post_button" onclick="add_post()" style="background-color: green; color: white; padding: 7px; border-radius: 10px;">Add Post</button>
					&nbsp;&nbsp;<button type="reset" style="background-color: red; color: white; padding: 7px; border-radius: 10px;">Cancel</button></td>
				</tr>
			</table>
		</fieldset>
	</div>
	<div id="show_message"></div>
	<div id="show_posts" style="margin-top: 30px;"></div>
	</center>
</body>
</html>
