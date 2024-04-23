<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Login</h1>
  <form method="post" action="process_login.php">
    <p>
      <input type="email" name="email" id="email" placeholder="Please Enter Email">
    </p>
    <p>
      <input type="password" name="password" id="password" placeholder="Please Enter Password">
    </p>
    <p>
      <input type="submit" name="login" value="Login">
    </p>
  </form>
  <p>
    Don't have an account? <a href="register.php">Register here</a>
  </p>
</body>
</html>
