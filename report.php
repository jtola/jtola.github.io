<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Odyssey Registration</title>
<style type="text/css">
#wrapper {
	height: 1000px;
	width: 800px;
	margin-top: 72px;
	margin-right: auto;
	margin-bottom: auto;
	margin-left: auto;
}
#wrapper #Logo {
	float: left;
	height: 101px;
	width: 223px;
}
#wrapper #Line {
	height: 18px;
	width: 800px;
	float: left;
}
#wrapper #Body {
	float: left;
	height: 400px;
	width: 764px;
	font-family: Tahoma, Geneva, sans-serif;
	padding-top: 18px;
	padding-right: 18px;
	padding-left: 18px;
	position: relative;
	font-size: 12px;
}
#wrapper #Body #create account {
	height: 36px;
	width: 764px;
	padding-bottom: 18px;
}
#wrapper #Body #Registration information {
	float: left;
	height: auto;
	width: auto;
	margin-top: 18px;
}
#wrapper #Line2 {
	float: left;
	height: 18px;
	width: 764px;
	margin-right: 18px;
	margin-left: 18px;
}
#wrapper #Homepage {
	float: left;
	height: 18px;
	width: 70px;
	margin-left: 18px;
	margin-right: 18px;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	color: #b2b2b2;
}
#wrapper #Log {
	height: 18px;
	width: 28px;
	margin-right: 18px;
	float: left;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	color: #b2b2b2;
}
#wrapper #Reports {
	float: left;
	height: 18px;
	width: 50px;
	margin-right: 18px;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	color: #b2b2b2;
}
#wrapper #Terms {
	float: left;
	height: 18px;
	width: 38px;
	margin-right: 18px;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	color: #b2b2b2;
}
#wrapper #Privacy {
	float: left;
	height: 18px;
	width: 48px;
	margin-right: 18px;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	color: #b2b2b2;
}
#wrapper #Help {
	float: left;
	height: 18px;
	width: 30px;
	margin-right: 18px;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 12px;
	color: #b2b2b2;
}
#wrapper #Body #Registration information table tr td {
	font-size: 12px;
}
#wrapper #Body #Registration information table tr td {
	color: #B2B2B2;
}
#wrapper #Body #Registration information table tr td {
	color: #B2B2B2;
}
#wrapper #Body #create account {
	font-size: 18px;
}
#wrapper #Body #create account {
	font-size: 12px;
}
#wrapper #Body #create account {
	font-size: 14px;
}

#wrapper #Body #Registration information table {
	color: #B2B2B2;
}
#wrapper #Body #Registration information table tr td {
	color: #B2B2B2;
}
.Warning {
	color: #FF0000;
	font-weight: normal;
	font-size: 12px;
}
.header {
	font-size: 14px;
	font-weight: bold;
	color: #B2B2B2;
	font-family: Tahoma, Geneva, sans-serif;
}
.header2 {
	color: #000000;
	font-size: 18px;
}
.header3 {
	color: #000000;
	font-family: Tahoma, Geneva, sans-serif;
	font-size: 14px;
}
</style>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
  <div id="Logo"><img src="Pictures/Oddyssye Logo.png" width="223" height="101" /></div>
  <div id="Line"><img src="Pictures/Blue Line.png" width="800" height="18" /></div>
  <div id="Body">
    <span class="Warning">
    <?php
//check name
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$remail = $_POST['remail'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$postalcode = $_POST['postalcode'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$terms = $_POST['terms'];
$registration = true;

if((empty($first_name)) && (empty($last_name))) {
	echo nl2br ("Please enter your full name \n") ;
	$registration = false;} 
	else{
		$name = $first_name . ' ' . $last_name;}
		
//check email
if(empty($email)){
	print nl2br ("Please enter your email address \n");
	$registration = false;}
if($email != $remail) {
	print nl2br ("Please check your email address to make sure it was entered correctly \n");
	$registration = false;}
if (!preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', $email)) {
	print nl2br ("Your email address is invalid \n");
      $registration = false;}
    else {
      // Strip out everything but the domain from the email
      $domain = preg_replace('/^[a-zA-Z0-9][a-zA-Z0-9\._\-&!?=#]*@/', '', $email);
      // Now check if $domain is registered
      if (!checkdnsrr($domain)) {
		  print nl2br ("Your email address is invalid \n");
		  $registration = false;}
     }
	 
$dbc = mysqli_connect('mysql12.000webhost.com','a2045032_jtola','Chobits!','a2045032_Odyssey') or die('Error connecting to MySQL Server.');
$query = "SELECT * FROM user WHERE email = '$email'";
$results = mysqli_query($dbc,$query) or die('Could not check email');
$check_email = mysqli_fetch_array($results);
if($check_email['email'] == $email){
	print nl2br ('Your email has already been used to register an account \n');
	$registration = false;}
	mysqli_close($dbc);

//echo $check_email['email'];

//check birthday
if(empty($birthday)){
	print nl2br ("Please enter your birthday \n");
	$registration = false;}
if(!ereg ("([0-1]{1}[0-9]{1})/([0-3]{1}[0-9]{1}/([0-9]{4}))", $birthday)) {
    print nl2br ("Your birthday is invalid, please format MM/DD/YYYY \n");
	$registration = false;}
	
//postal code check 
if(!empty($postalcode)){
	if(!ereg("([0-9\-]{5,10})",$postalcode)){
	print nl2br ("Please enter a 5 or 9 digit zip code \n");
	$registration = false;}
	}
//Password check
if($password != $repassword) {
	print nl2br ("Please check your password \n");
	$registration = false;}
	else{if(ctype_alnum($password) && strlen($password)>7 && strlen($password)<17 && preg_match('`[A-Z]`',$password) && preg_match('`[a-z]`',$password) && preg_match('`[0-9]`',$password)){}
	else{
		print nl2br ("Please enter valid password at 8-20 characters long with at least of each char (a-z, A-Z, 0-9) \n");
		$registration = false;}
	}

//Agree to terms and privacy
if(!isset($terms)){
	print nl2br ("You must agree to the terms and privacy documents\n");
	$registration = false;}
	else{
		$term= 'y';}

//Accepting the registration process  
if($registration == false) {
?>
    </span>
    <form method="post" action="report.php">
      <div id="Registration information"> 
      <label for="firstname"><br />
        First Name:*</label>
      <input name="firstname" type="text" size="40" id="firstname" maxlength="30" /><br />
      <label for="lastname">Last Name:*</label>
      <input name="lastname" type="text" size="40" id="lastname" maxlength="30" /><br />
      <label for="email">Email Address:*</label>
      <input name="email" type="text" size="40" id="email" maxlength="30" /><br />
      <label for="remail">Re-enter Email:*</label>
      <input name="remail" type="text" size="40" id="remail" maxlength="30" /><br />
      <label for="gender">Gender:</label>
      <select name="gender" id="gender">
              <option>-</option>
              <option>Male</option>
              <option>Female</option>
      </select><br />
      <label for="birthday">Birth Day:*</label>
      <input name="birthday" type="text" size="40" id="birthday" maxlength="30" /><br />
      <label for="postalcode">Postal Code:</label>
      <input name="postalcode" type="text" size="40" id="postalcode" maxlength="30" /><br />
      <label for="password">Password:*</label>
      <input name="password" type="password" size="40" id="password" maxlength="30" /><br />
      <label for="repassword">Re-enter Password:*</label>
      <input name="repassword" type="password" size="40" id="repassword" maxlength="30" /><br />
    </div>
    <div class="header" id="Terms of Use"> 
      <input type="checkbox" name="terms" id="terms" />
    I agree to the Terms of Use and Privacy Policy*</div>
    <div id="Register">
      <input type="submit" name="Submit" id="Submit" value="Submit" />
    </div>
  </form>
<p>
      <?php
}
else{
	  $to = 'jeffreytola@gmail.com';
	  $min = 10000;
	  $max = 99999;
	  $code = rand ($min,$max);
	  $subject = 'Odyssey registration code';
	  $msg = "Thank you $name for your submission, below is the code you will need to finish your registration process.\n".$code;
	  mail($to, $subject, $msg, 'From: Odyssey Diabetes Management'.$email);
	  $dbc = mysqli_connect('mysql12.000webhost.com','a2045032_jtola','Chobits!','a2045032_Odyssey') or die('Error connecting to MySQL Server.');
	  $query = "INSERT INTO user (name, email, birthday, gender, postal, password, terms, admission, activation, code)
VALUES ('$name', '$email', '$birthday', '$gender', '$postalcode', '$password', '$term', 'a', '0', '$code')";
$results = mysqli_query($dbc,$query) or die('Error querying database');
mysqli_close($dbc);
?>
      <span class="header2">Thank you for registering, an email will send your confirmation code shortly.<br/></span>
      <form method="post" action="codecheck.php">
      <label for="code" class="header3">Enter confirmation code:</label>
      <input name="code" type="text" size="20" id="code" maxlength="10" />
      <input name="email" type="hidden" id="email" value="<?php echo $email;?>" /><br />
      <input type="submit" name="Submit" id="Submit" value="Submit" />
      </form>
<?php
}
?>
</div>
  <div id="Line2"><img src="Pictures/line.png" width="768" height="18" /></div>
<div id="Homepage">Homepage</div>
  <div id="Log">Log</div>
  <div id="Reports">Contact</div>
  <div id="Terms">Terms</div>
  <div id="Privacy">Privacy</div>
  <div id="Help">Help</div>
</div>
</body>
</html>
