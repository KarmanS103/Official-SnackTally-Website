<?php
$sql_host = 'localhost';
$sql_user = 'snack';
$sql_pass = '[P7Co79J4[(N';
$sql_db = 'SnackTally';

$con = mysqli_connect($sql_host,$sql_user,$sql_pass,$sql_db);

if(mysqli_connect_errno())
{
  echo "Cannot Connect To Database";
}
else {
  echo "Connected To Database";
}

$email = $_POST["Email"];
$username = $_POST["USN"];
$password = $_POST["Pass"];
$passver = $_POST["PassVer"];

if($password == $passver){
$query = "INSERT INTO `SnackTally`.`User` (`Email`, `First Name`,
  `Last Name`, `Photo`, `Pass`, `Username`, `GroupID`)
  VALUES ('$email', 'test', 'test', NULL, '$password', '$username', 0)";
}

mysqli_query($con, $query);
if (!$query) { die(mysqli_error($db_connect)); }
else{
  echo ", Success";
}
mysqli_close($con);
?>
