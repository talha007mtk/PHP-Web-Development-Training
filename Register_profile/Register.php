<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
</head>
<style>
	body{
		background-color: black;
		color: white;
	}
	fieldset{
		width: 600px;
	}
	span{
		color: red;
	}
	.td{
		padding: 10px;
	}
</style>
<script src="validform.js"></script>
<body>
	<center>
	<h1>Register Your Account!...</h1>
	<br>
	<br>
	<fieldset>
		<legend>Register Now</legend>
		 <!-- Pattern Same as Class -->
		<p><b>Note:</b> Required Fields Are Marked With <span>*</span></p>
		<form action="profile.php"  onsubmit="return validate();" method="POST" id="form_d" enctype="multipart/form-data">
			<table cellpadding="5">
				<tr>
					<td><label>First Name: <span>*</span></label></td>
					<td><input type="text" name="fname" placeholder="Ex: Ali" id="fname"> 
						<span id="fname_msg"></span></td>
				</tr>

				<tr>
					<td><label>Last Name:</label></td>
					<td><input type="text" name="lname" placeholder="Ex: Khan" id="lname">
						<span id="lname_msg"></span></td>
				</tr>

				<tr>
					<td><label>Email: <span>*</span></label></td>
					<td><input type="email" name="email" placeholder="Ex: talha12@gmail.com" id="email">
						<span id="email_msg"></span></td>
				</tr>

				<tr>
					<td><label>Phone Number: <span>*</span></label></td>
					<td><input type="text" name="number" placeholder="Ex: 92307-2541336" id="number">
						<span id="number_msg"></span></td>
				</tr>

				<tr>
					<td><label>CNIC Number: <span>*</span></label></td>
					<td><input type="text" name="cnic" placeholder="Ex: 41301-0581676-7" id="cnic" >
						<span id="cnic_msg"></span></td>
				</tr>

				<tr>
					<td><label>About You: <span>*</span></label></td>
					<td><textarea name="about" id="textarea" rows="3" cols="20"></textarea>		
					        <span id="textarea_msg"></span>
					</td>
				</tr>

				<tr>
					<td><label>Gender: <span>*</span></label></td>
					<td><input type="radio" name="gender" value="male" id="male">Male
						<input type="radio" name="gender" value="female" id="female">Female
						<span id="gender_msg"></span></td>					
				</tr>
				
				<tr>
					<td><label>Upload Image: <span>*</span></label></td>
					<td><input type="file" name="file" id="file">
						<span id="file_msg"></span></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" name="register" value="Register">
					&nbsp&nbsp<input type="reset" name="cancel" value="Cancel"></td>
				</tr>
			</table>
		</form>
	</fieldset>
	</center>
</body>
</html>