<?php
$connection = mysqli_connect("localhost","root","","db_register");

if (isset($_POST['register'])) {
    extract($_POST);

    $tmp_name = $_FILES['file']['tmp_name'];
    $original_name = $_FILES['file']['name'];
    $file_name = time() . " _ " . $_FILES['file']['name'];

    $directory = "images";
    if (!is_dir($directory)) {
        if (!mkdir($directory)) {
            echo "Directory Not Found";
        }
    }

    $path = $directory . " / " . $file_name;
    move_uploaded_file($tmp_name, $path);

    $query = "INSERT INTO register VALUES (null,'".$fname."', '".$lname."', '".$email."', '".$number."', '".$cnic."', '".$about."', '".$gender."', '".$original_name."', '".$path."')";

    $result = mysqli_query($connection, $query);

    if ($result) {
        $query = "SELECT * FROM register";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($connection);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<style>
    body{
        background-color: black;
        color: white;
    }
    fieldset{
        width: 600px;
    }
    .td{
        padding: 10px;
    }
</style>
<body>
    <center>
        <?php if (isset($row)){ ?>
            <h1>Welcome, <?php echo $row['fname']; ?>!</h1>
            <img src="<?php echo $row['img_path']; ?>" width="100">
            <fieldset>
                <legend>Profile</legend>
                <table cellpadding="5">
                    <tr>
                        <td><label>First Name:</label></td>
                        <td><?php echo $row['fname']; ?></td>
                    </tr>
                    <tr>
                        <td><label>Last Name:</label></td>
                        <td><?php echo $row['lname']; ?></td>
                    </tr>
                    <tr>
                        <td><label>Email:</label></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td><label>Phone Number:</label></td>
                        <td><?php echo $row['number']; ?></td>
                    </tr>
                    <tr>
                        <td><label>CNIC Number:</label></td>
                        <td><?php echo $row['cnic']; ?></td>
                    </tr>
                    <tr>
                        <td><label>About You:</label></td>
                        <td><?php echo $row['about']; ?></td>
                    </tr>
                    <tr>
                        <td><label>Gender:</label></td>
                        <td><?php echo $row['gender']; ?></td>
                    </tr>
                </table>
            </fieldset>
        <?php } ?>
    </center>
</body>
</html>
