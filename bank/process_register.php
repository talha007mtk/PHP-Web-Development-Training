<?php
require_once 'bank.php';

$bank = new Bank();
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$bank_account_number = $_POST['bank_account_number'];
$password = $_POST['password'];

$bank->register_user($name, $email, $phone_number, $bank_account_number, $password);
header("Location: login.php");
?>
