<?php
	require_once('formvalid.php');
?>
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
		<?php
			if(!isset($table)){
		?>
	<h1>Register Your Account!...</h1>
	<br>
	<br>
	<fieldset>
		<legend>Register Now</legend>
		 <!-- Pattern Same as Class -->
		<p><b>Note:</b> Required Fields Are Marked With <span>*</span></p>
		<form action="#" onsubmit="return validate();" method="POST" id="form_d">
			<table cellpadding="5">
				<tr>
					<td><label>First Name: <span>*</span></label></td>
					<td><input type="text" name="fname" placeholder="Ex: Ali" id="fname"  value="<?= $fname ?? ""; ?>"> 
						<span id="fname_msg"><?= $fname_msg ?? ""; ?></span></td>
				</tr>

				<tr>
					<td><label>Last Name:</label></td>
					<td><input type="text" name="lname" placeholder="Ex: Khan" id="lname" value="<?= $lname ?? ""; ?>">
						<span id="lname_msg"><?= $lname_msg ?? ""; ?></span></td>
				</tr>

				<tr>
					<td><label>Email: <span>*</span></label></td>
					<td><input type="email" name="email" placeholder="Ex: talha12@gmail.com" id="email" value="<?= $email ?? ""; ?>">
						<span id="email_msg"><?= $email_msg ?? ""; ?></span></td>
				</tr>

				<tr>
					<td><label>Phone Number: <span>*</span></label></td>
					<td><input type="text" name="number" placeholder="Ex: 92307-2541336" id="number" value="<?= $number ?? ""; ?>">
						<span id="number_msg"><?= $number_msg ?? ""; ?></span></td>
				</tr>

				<tr>
					<td><label>CNIC Number: <span>*</span></label></td>
					<td><input type="text" name="cnic" placeholder="Ex: 41301-0581676-7" id="cnic" value="<?= $cnic ?? ""; ?>">
						<span id="cnic_msg"><?= $cnic_msg ?? ""; ?></span></td>
				</tr>

				<tr>
					<td><label>About You: <span>*</span></label></td>
					<td><textarea name="about" id="textarea" rows="3" cols="20"><?= isset($_POST['about']) ? $_POST['about'] : ''; ?></textarea>
					    <?php if (isset($about_msg) && empty($_POST['about'])){ ?>
					        <span id="textarea_msg"><?= $about_msg; ?></span>
					    <?php } ?>
					</td>
				</tr>

				<tr>
					<td><label>Country: <span>*</span></label></td>
					<td>
						<select id="country" name="country">
							<option value="" selected>--Select Country--</option>
							<option value="pakistan" <?= (isset($country) && $country == "pakistan") ? "selected" : ""; ?>>Pakistan</option>
				            <option value="india" <?= (isset($country) && $country == "india") ? "selected" : ""; ?>>India</option>
				            <option value="usa" <?= (isset($country) && $country == "usa") ? "selected" : ""; ?>>USA</option>
						</select>
						<span id="country_msg"><?= $country_msg ?? ""; ?></span>
					</td>
				</tr>

				<tr>
					<td><label>Gender: <span>*</span></label></td>
					<td><input type="radio" name="gender" value="male" <?= (isset($gender) && $gender == "male") ? "checked" : ""; ?> id="male">Male
						<input type="radio" name="gender" value="female" <?= (isset($gender) && $gender == "female") ? "checked" : ""; ?> id="female">Female
						<span id="gender_msg"><?= $gender_msg ?? ""; ?></span></td>
						
				</tr>

				<tr>
					<td><label>Policies: <span>*</span></label></td>
					<td><?php
					$policies = array(
					    "Attendance Policy" => 0,
					    "Assignment Policy" => 0,
					    "Test Policy" => 0,
					    "Stipend Policy" => 0
					);

					if (isset($_POST['policies'])) {
					    foreach ($_POST['policies'] as $policy) {
					        $policies[$policy] = 1;
					    }
					}
					?>

					<input type="checkbox" name="policies[]" value="Attendance Policy" <?php echo $policies["Attendance Policy"] ? "checked" : ""; ?>> Attendance Policy<br>
					<input type="checkbox" name="policies[]" value="Assignment Policy" <?php echo $policies["Assignment Policy"] ? "checked" : ""; ?>> Assignment Policy
					&nbsp&nbsp&nbsp<span id="policy_msg"><?= $policy_msg ?? ""; ?></span><br>
					<input type="checkbox" name="policies[]" value="Test Policy" <?php echo $policies["Test Policy"] ? "checked" : ""; ?>> Test Policy<br>
					<input type="checkbox" name="policies[]" value="Stipend Policy" <?php echo $policies["Stipend Policy"] ? "checked" : ""; ?>> Stipend PolicyS
					</td>
				</tr>
	

				<tr>
					<td colspan="2" align="center"><input type="submit" name="register" value="Register">
					&nbsp&nbsp<input type="reset" name="cancel" value="Cancel"></td>
				</tr>
			</table>
		</form>
	</fieldset>
	<?php
		}elseif (isset($table)) {
	?>
		<h1 align="center">THANK YOU FOR YOUR ACCOUNT REGISTRATION</h1>
			<br>
			<hr>
			<br>
			<table cellpadding="5" border="1" align="center" style="padding: 5px;">
				<tr>
					<td class="td"><label>First Name: </label></td>
					<td class="td"><?= $fname; ?></td>
				</tr>

				<tr>
					<td class="td"><label>Last Name: </label></td>
					<td class="td"><?= $lname; ?></td>
				</tr>

				<tr>
					<td class="td"><label>Email: </label></td>
					<td class="td"><?= $email; ?></td>
				</tr>

				<tr>
					<td class="td"><label>Phone Number: </label></td>
					<td class="td"><?= $number; ?></td>
				</tr>

				<tr>
					<td class="td"><label>CNIC Number: </label></td>
					<td class="td"><?= $cnic; ?></td>
				</tr>

				<tr>
					<td class="td"><label>About You: </label></td>
					<td class="td"><?= $about; ?></td>
				</tr>

				<tr>
					<td class="td"><label>Country: </label></td>
					<td class="td"><?= $country; ?></td>
				</tr>

				<tr>
					<td class="td"><label>Gender: </label></td>
					<td class="td"><?= $gender; ?></td>
				</tr>

				<tr>
					<td class="td"><label>Policies: </label></td>
					<td class="td"><?php foreach ($policies as $key => $value) {
						echo $value . "<br/>";
					} ?></td>
				</tr>
			</table>
	<?php
		}
	?>
	</center>
</body>
</html>