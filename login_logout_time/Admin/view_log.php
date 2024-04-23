<?php
session_start();
require_once('../database_connection.php');

if (!isset($_SESSION['user'])) {
    header("Location: ../login.php?message=Please enter email and password");
    exit();
}

if ($_SESSION['user']['role'] !== 'admin') {
    header("Location: dashboard.php");
    exit();
}

if (!isset($_GET['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$user_id = $_GET['user_id'];

$query = "SELECT name FROM users WHERE user_id = ?";
$statement = mysqli_prepare($connection, $query);
mysqli_stmt_bind_param($statement, "i", $user_id);
mysqli_stmt_execute($statement);
$user_result = mysqli_stmt_get_result($statement);
$user = mysqli_fetch_assoc($user_result);

if (!$user) {
    header("Location: dashboard.php");
    exit();
}

$log_file = __DIR__ . "/../Files/{$user['name']}.txt";

if (!file_exists($log_file)) {
    header("Location: dashboard.php");
    exit();
}

$log_lines = [];
$log_file_handle = fopen($log_file, 'r');

if ($log_file_handle) {
    while (($line = fgets($log_file_handle)) !== false) {
        $line = trim($line);
        if (!empty($line)) {
            $log_lines[] = $line;
        }
    }
    fclose($log_file_handle);
} else {
    echo "Unable to open the log file.";
    exit();
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        h1, h2 {
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: inline-block;
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }
        input[type="text"], textarea {
            width: calc(100% - 110px);
            padding: 5px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
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
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <center>
        <h1><?php echo ($user['name']); ?> Log</h1>
        <a href="dashboard.php" class="logout">Back to Dashboard</a>
        <table>
            <tr>
                <th>Login Time</th>
                <th>Logout Time</th>
            </tr>
            <?php foreach ($log_lines as $line){ ?>
                <?php
                $parts = explode("\t", $line);
                if (count($parts) == 2) {
                    echo "<tr><td>" . ($parts[0]) . "</td><td>" . ($parts[1]) . "</td></tr>";
                }
                ?>
            <?php } ?>
        </table>
    </center>
</body>
</html>
