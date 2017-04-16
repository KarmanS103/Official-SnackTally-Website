<?php
#connects to the database ignore this information
$sql_host = 'localhost';
$sql_user = 'snack';
$sql_pass = '[P7Co79J4[(N';
$sql_db = 'SnackTally';
$con = mysqli_connect($sql_host,$sql_user,$sql_pass,$sql_db);

#obtains the email from the php file
if(isset($_POST('email')))
{
$email = $_POST('email');

#runs it through the database
$emailver = "SELECT `Email` FROM `SnackTally`.`User` WHERE `Email` = '$email'";

if($select = mysqli_query($con, $emailver)){
  #output 0 = false, not a valid email
if(mysqli_fetch_assoc($select) > 0)
{
    #$emailErr = "Email already exists";
    mysqli_free_result($select);
    mysqli_close($con);
    echo '0';
}
else
{
  mysqli_free_result($select);
  mysqli_close($con);
  echo '1';
}}
}else{
  mysqli_close($con);
  echo '0';
}
?>
