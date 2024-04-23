<?php
session_start();
require_once 'bank.php';

$bank = new Bank();
$email = $_POST['email'];
$password = $_POST['password'];

$user = $bank->get_user_info_by_email($email);

if ($user && $password == $user['password']) {
  $_SESSION['user'] = $user;
  header("Location: info.php");
} else {
  echo "Invalid credentials.";
}
?>
