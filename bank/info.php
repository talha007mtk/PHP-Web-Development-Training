<?php
session_start();
require_once 'bank.php';

if (!isset($_SESSION['user'])) {
  header("Location: login.php");
}

$bank = new Bank();
$user = $bank->get_user_info($_SESSION['user']['bank_account_number']);
$has_balance = $user['bank_balance'] > 0;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Info</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>User Information</h1>
  <p>Full Name: <?php echo $user['name']; ?></p>
  <p>Email: <?php echo $user['email']; ?></p>
  <p>Phone Number: <?php echo $user['phone_number']; ?></p>
  <p>Bank Account Number: <?php echo $user['bank_account_number']; ?></p>
  <p>Bank Balance: <?php echo $user['bank_balance']; ?></p>

  <h2>Transactions</h2>
  <form method="post" action="process_deposit.php">
    <input type="hidden" name="bank_account_number" value="<?php echo $user['bank_account_number']; ?>">
    <p>
      <input type="text" name="amount" id="amount" placeholder="Enter Amount to Deposit">
    </p>
    <p>
      <input type="submit" name="deposit" value="Deposit">
    </p>
  </form>

  <?php if ($has_balance){ ?>
  <form method="post" action="process_withdraw.php">
    <input type="hidden" name="bank_account_number" value="<?php echo $user['bank_account_number']; ?>">
    <p>
      <input type="text" name="amount" id="amount" placeholder="Enter Amount to Withdraw">
    </p>
    <p>
      <input type="submit" name="withdraw" value="Withdraw">
    </p>
  </form>
  <?php } ?>
  <div class="logout">
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
