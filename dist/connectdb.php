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

#$gate = TRUE;

$nameErr = "";
$emailErr = "";
$passErr = "";

if($password != $passver)
{
  $passErr = "Passwords do not match";
  #$gate = FALSE;
} else {
  $password = filter($password);
  $passver = filter($passver);
}

if(preg_match($username)==1)
{
  $nameErr = "Username cannot have spaces";
  #$gate = FALSE;
} else {
  $username = filter($username);
}

$emailver = "SELECT `Email` FROM `SnackTally`.`User` WHERE `Email` = '$email'";

if($select = mysqli_query($con, $emailver)){
if(mysqli_fetch_assoc($select) > 0)
{
    $emailErr = "Email already exists";
    #$gate = FALSE;
} else {
  $email = filter($email);
}
mysqli_free_result($result);
}

$query = "INSERT INTO `SnackTally`.`User` (`Email`, `First Name`,
  `Last Name`, `Photo`, `Pass`, `Username`, `GroupID`)
  VALUES ('$email', 'test', 'test', NULL, '$password', '$username', 0)";

function filter($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

mysqli_query($con, $query);
if (!$query) { die(mysqli_error($db_connect)); }
else{
  echo ", Success";
}
mysqli_close($con);
?>
