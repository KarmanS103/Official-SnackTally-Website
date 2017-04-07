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

function filter($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
}

$email = $_POST["Email"];
$username = $_POST["USN"];
$password = $_POST["Pass"];
$passver = $_POST["PassVer"];

$gate = True;

$nameErr = $emailErr = $passErr = $websiteErr = "";
if($password != $passver)
{
  $passErr = "Passwords do not match";
  $gate = False;
}

if(preg_match($username)==1)
{
  $nameErr = "Username cannot have spaces";
  $gate = False;
}

$select = mysql_query("SELECT `Email` FROM `User` WHERE `Email` = '$email'") or exit(mysql_error());
if(mysql_num_rows($select))
    $emailErr = "Email already exists";
    $gate = False;

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
