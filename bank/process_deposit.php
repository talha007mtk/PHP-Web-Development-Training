<?php
session_start();
require_once 'bank.php';

$bank = new Bank();
$bank_account_number = $_SESSION['user']['bank_account_number'];
$amount = $_POST['amount'];

$bank->deposit($bank_account_number, $amount);
header("Location: info.php");
?>
