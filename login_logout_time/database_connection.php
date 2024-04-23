<?php
$driver = new mysqli_driver();
$driver->report_mode = MYSQLI_REPORT_OFF;

$hostname = "localhost";
$username = "root";
$password = "";
$database = "log_managment";

$connection = mysqli_connect($hostname, $username, $password, $database);

if(mysqli_connect_errno())
{
  echo "Error Message: ".mysqli_connect_error() ."<br/>";
  echo "Error Message: ".mysqli_connect_errno();
}
?>
