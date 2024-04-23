<?php
class Bank {
  private $conn;

  public function __construct() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank";

    $this->conn = mysqli_connect($servername, $username, $password, $dbname);

    if (mysqli_connect_error()) {
      die("Connection failed: " . mysqli_connect_error());
    }
  }

  public function register_user($name, $email, $phone_number, $bank_account_number, $password) {
  $query = "SELECT * FROM users WHERE email = '$email' OR bank_account_number = '$bank_account_number'";
  $result = mysqli_query($this->conn, $query);

  if (mysqli_num_rows($result) > 0) {
    return "User already exists";
  } else {
    $query = "INSERT INTO users (name, email, phone_number, bank_account_number, bank_balance, password) VALUES ('$name', '$email', '$phone_number', '$bank_account_number', 0, '$password')";
    mysqli_query($this->conn, $query);
    return "Registration successful";
  }
}


  public function get_user_info_by_email($email) {
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($this->conn, $query);
    return $result->fetch_assoc();
  }

  public function get_user_info($bank_account_number) {
    $query = "SELECT * FROM users WHERE bank_account_number = '$bank_account_number'";
    $result = mysqli_query($this->conn, $query);
    return $result->fetch_assoc();
  }

  public function deposit($bank_account_number, $amount) {
    $query = "UPDATE users SET bank_balance = bank_balance + $amount WHERE bank_account_number = '$bank_account_number'";
    mysqli_query($this->conn, $query);
  }

  public function withdraw($bank_account_number, $amount) {
  $user = $this->get_user_info($bank_account_number);
  $balance = $user['bank_balance'];

  if ($balance < $amount) {
    return "Insufficient balance";
  } else {
    $query = "UPDATE users SET bank_balance = bank_balance - $amount WHERE bank_account_number = '$bank_account_number'";
    mysqli_query($this->conn, $query);
    return "Withdrawal successful";
  }
}

  public function __destruct()
    {
      mysqli_close($this->conn);
    }
}
?>
