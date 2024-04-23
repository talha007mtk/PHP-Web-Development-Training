<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Bank Account Registration</h1>
  <form method="post" action="process_register.php">
    <p>
      <input type="text" name="name" id="name" placeholder="Enter Your Full Name">
    </p>
    <p>
      <input type="email" name="email" id="email" placeholder="Enter Your Email">
    </p>
    <p>
      <input type="text" name="phone_number" id="phone_number" placeholder="Enter Your Phone Number">
    </p>
    <p>
      <input type="text" name="bank_account_number" id="bank_account_number" placeholder="Enter Your Bank Account Number">
    </p>
    <p>
      <input type="password" name="password" id="password" placeholder="Enter Your Password">
    </p>
    <p>
      <input type="submit" name="register" value="Register">
    </p>
    <p>
      Already have an account? <a href="login.php">Login here</a>
    </p>
  </form>
</body>
</html>
