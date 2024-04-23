<?php
session_start();
require_once('../database_connection.php');

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php?message=Please enter email and password");
    exit();
}

$query = "SELECT * FROM logs WHERE user_id = ?";
$statement = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($statement, "i", $_SESSION['user']['user_id']);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .logout {
            position: absolute;
            top: 10px;
            right: 10px;
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
        .logout:hover {
            color: #666;
        }
    </style>
</head>
<body>
    <center>
        <h1>User Dashboard</h1>
        <h2>Welcome, <?php echo $_SESSION['user']['name']; ?></h2>
        <p>Email: <?php echo $_SESSION['user']['email']; ?></p>
        <p>Role: <?php echo $_SESSION['user']['role']; ?></p>
        <a href="../logout.php" class="logout">Logout</a>
    </center>
</body>
</html>
