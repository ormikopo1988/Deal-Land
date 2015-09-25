<?php
require_once("php/connection.php");
function popup($vMsg,$vDestination) {
	echo("<html>\n");
	echo("<head>\n");
	echo("<script language=\"JavaScript\" type=\"text/JavaScript\">\n");
	echo("alert('$vMsg');\n");
	echo("window.location = ('$vDestination');\n");
	echo("</script>\n");
	echo("</head>\n");
	echo("</html>\n");
	exit;
}

//STEP 1 Connect To Database
$connect = mysql_connect($db_server, $user, $pass);
if (!$connect)
{
	die("MySQL could not connect!");
}

$DB = mysql_select_db($database);

if(!$DB)
{
	die("MySQL could not select Database!");
}

//STEP 2 Declare Variables

$email = mysql_real_escape_string($_REQUEST['email']);
$email_check = validate_email($email);
$username = mysql_real_escape_string($_REQUEST['username']);
$password = mysql_real_escape_string($_REQUEST['password']);
$re_password = mysql_real_escape_string($_REQUEST['re_password']);

$query = "SELECT * FROM users WHERE username = '".$username."' OR email = '".$email."'";
$result = mysql_query($query);
$NumRows = mysql_num_rows($result);

$_SESSION['email'] = $email;
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['re_password'] = $re_password;

//STEP 3 Check To See If All Information Is Correct

function validate_email(&$email) 
{
	return preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email);
}

if((empty($_SESSION['email'])) || (empty($_SESSION['username'])) || (empty($_SESSION['password'])) || (empty($_SESSION['re_password'])))
{
	popup('Παρακαλούμε εισάγετε όλα τα υποχρεωτικά πεδία για να είναι επιτυχής η εγγραφή!','Register.php');
}

if($password != $re_password)
{
	popup('Οι κωδικοί δεν ταιριάζουν.Προσπαθήστε ξανα!','Register.php');
}

if($email_check == 0)
{
	popup('Το email που δώσατε δεν είναι έγκυρο.Προσπαθήστε ξανά!','Register.php');
}

if($NumRows == 0) {
	//STEP 4 Insert Information Into MySQL Database
	$query = "INSERT INTO users (id, username, password, email, points) VALUES (NULL, '".$username."', '".base64_encode($password)."', '".$email."', 10)";
	$result = mysql_query($query);
	
	if(!$result)
	{
		die("We could not register you due to a mysql error (Contact the website owner if this continues to happen.)");
	}
}

else {
	popup('Το όνομα χρήστη/email που δώσατε υπάρχουν ήδη.Προσπαθήστε ξανά!','Register.php');
}
?>
<html lang="el" xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<title>Καλώς ήρθατε στο Deal-Land!</title>
	<link media="all" type="text/css" href="http://www.inf.uth.gr/cced/wp-admin/css/wp-admin.min.css?ver=3.5.1" id="wp-admin-css" rel="stylesheet">
	<link media="all" type="text/css" href="http://www.inf.uth.gr/cced/wp-includes/css/buttons.min.css?ver=3.5.1" id="buttons-css" rel="stylesheet">
	<link media="all" type="text/css" href="http://www.inf.uth.gr/cced/wp-admin/css/colors-fresh.min.css?ver=3.5.1" id="colors-fresh-css" rel="stylesheet">
	<script src="http://www.inf.uth.gr/cced/wp-includes/js/jquery/jquery.js?ver=1.8.3" type="text/javascript"></script>

<link href="http://www.inf.uth.gr/cced/wp-content/plugins/bm-custom-login/bm-custom-login.css" type="text/css" rel="stylesheet"><style>	
	#login {
		background: none repeat scroll 0 0 #FFFFFF;
		border: 2px solid #E5E5E5;
		box-shadow: 1px 4px 10px -1px rgba(200, 200, 200, 0.7);
		font-weight: normal;
		margin-top: 197px;
		padding: 29px 24px 46px;
	}
	
	#login,
	#login label {
		color:#454545;
	}
	
	html {
		background: grey url(img/bg_blue.jpg) center center fixed no-repeat;
		background-size: 100% 100%;
	}
	
	body.login {
		background:transparent !important;
	}
	
	.login #login a {
		color:black !important;
	}

    .login #login a:hover {
        color:#3333CC !important;
    }


	#login #nav,
	#login #backtoblog {
		text-shadow:0 1px 4px #000;
	}
</style><meta content="noindex,nofollow" name="robots">
</head>
<body class="login login-action-login wp-core-ui">
	<div id="login" align='center'>
		<p>Η εγγραφή σας πραγματοποιήθηκε με επιτυχία!Παρακαλούμε εισάγετε τα στοιχεία σας για την είσοδο στην εφαρμογή μας!</p>
	
	<form method="post" action="Members.php" id="loginform" name="loginform">
		<p>
			<label for="user_login">Όνομα χρήστη<br>
			<input type="text" size="20" value="" class="input" id="user_login" name="username"></label>
		</p>
		<p>
			<label for="user_pass">Συνθηματικό<br>
			<input type="password" size="20" value="" class="input" id="user_pass" name="password"></label>
		</p>
		<p class="submit">
			<input type="submit" value="Σύνδεση" class="button button-primary button-large" id="wp-submit" name="wp-submit">
		</p>
	</form>

	</div>
</body>
</html>