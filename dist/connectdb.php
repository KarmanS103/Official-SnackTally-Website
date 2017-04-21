<!doctype html>

<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SnackTally</title>

<html lang="">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="description" content=""><meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SnackTally Website</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet" />
	<link href="apple-touch-icon.png" rel="apple-touch-icon" /><!-- Place favicon.ico in the root directory -->
	<link href="confirmation.css" rel="stylesheet" /><script src="scripts/vendor/modernizr.js"></script>
</head>

<body>
  <div class="topbar">
    <a src="index.html">
      <img class="logo" src="images/wordlogo.png" />
    </a>
  </div>

<!--Footer for the Bottom of the Page-->
<div class="slide">
<div class="container">
  <div class="icon">
    <img src=images/icon.png>
    <h1 id="thanks"> Thank you for creating a SnackTally Profile! </br> Stay tuned for our official App Release. </h1>
  </div>


<div class="col-md-4 info-item">
</div>
</div>
</div>
<div class='footer'>
	<div class="bottom-column-left">
		<a href= "index.html">
			<img src = "images/wordlogoBlue.png" width="200" />
		</a>
	</div>
	<div class="bottom-column-center">
		<a href= "https://twitter.com/SnackTally">
			<img src = "twitter.png" width=55px/>
		</a>
		<a id="facebookicon" href= "https://www.facebook.com/SnackTally/">
			<img src = "facebook.png" width=55px/>
		</a>
	</div>
	<div class="bottom-column-right">
		<p> Copyright SnackTally Inc. 2017 </p>
	</div>
</div>

<!--Scripts for JavaScript-->
    <script src="scripts/vendor.js"></script>
    <script src="scripts/plugins.js"></script>
    <script src="scripts/main.js"></script>
  </body>

<!--<div class="modal-footer"><button class="primary" type ="Submit" value="Send Data">Sign up</button><button data-dismiss="modal" type="button">Close</button></div>-->
  </div>
  </div>
  </div>
  <script src="scripts/vendor.js"></script><script src="scripts/plugins.js"></script><script src="scripts/main.js"></script></body>
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

  	$salt = openssl_random_pseudo_bytes(16);
    $saltpass = $password.$salt;
  	$hashpass = hash('sha512', $saltpass);
  	$query = "INSERT INTO `SnackTally`.`User` (`Email`, `First Name`,
    `Last Name`, `Photo`, `Pass`, `Username`, `GroupID`, `Salt`)
    VALUES ('$email', 'test', 'test', NULL, '$hashpass', '$username', 0, '$salt')";
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
</html>
