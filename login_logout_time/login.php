<?php
session_start();
require_once('database_connection.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = ?";
    $statement = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($statement, "s", $email);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        if ($password == $user['password']) {
            $_SESSION['user'] = $user;
            $date = date("Y-m-d H:i:s", time());
            $query = "INSERT INTO logs (login_time, user_id) VALUES (?, ?)";
            $statement = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($statement, "si", $date, $user['user_id']);
            mysqli_stmt_execute($statement);

            if ($user['role'] == 'admin') {
                header("Location: Admin/dashboard.php");
            } else {
                if ($user['role'] == 'user') {
                    $name = $_SESSION['user']['name'];
                    if (is_file("Files/$name.txt")) {
                        date_default_timezone_set("Asia/karachi");
                        $resource = fopen("Files/$name.txt", "a+");
                        $date = date("Y-m-d H:i:s", time());
                        fwrite($resource, "login : " . $date . "\t");
                    }else{
                        date_default_timezone_set("Asia/karachi");
                        $resource = fopen("Files/$name.txt", "a+");
                        $date = date("Y-m-d H:i:s", time());
                        fwrite($resource, "login : " . $date . "\t");
                    }
                }
                header("Location: User/dashboard.php");
            }
        } else {
            echo "Invalid password";
        }
    } else {
        echo "Invalid email";
    }
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
        }
        input[type="email"], input[type="password"] {
            width: 90%;
            height: 30px;
            margin-top: 5px;
            padding: 0 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            height: 40px;
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
            background-color: #3399ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2288ee;
        }
        p {
            text-align: center;
            margin-top: 30px;
            font-size: 16px;
        }
        a {
            color: #3399ff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .error-message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: red;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error_message)) { ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php } ?>
    <form action="login.php" method="post">
        <label>Email:</label><br>
        <input type="email" name="email"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>
