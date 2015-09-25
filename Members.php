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

$username = mysql_real_escape_string($_REQUEST['username']);
$password = mysql_real_escape_string($_REQUEST['password']);
$password = base64_encode($password);

$query = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";
$result = mysql_query($query);

$row = mysql_fetch_object($result);
$points = $row->points;
$email = $row->email;

$NumRows = mysql_num_rows($result);

$_SESSION['username'] = $username;
$_SESSION['password'] = $password;

//STEP 3 Check to See If User Entered All Of The Information

if(empty($_SESSION['username']) || empty($_SESSION['password']))
{
	Logout();
	header("Location:LoginPage.php");
}

if($username == "" && $password == "")
{
	header("Location:LoginPage.php");
}

if($username == "")
{
	header("Location:LoginPage.php");
}

if($password == "")
{
	header("Location:LoginPage.php");
}

//STEP 4 Check Username And Password With The MySQL Database

if($NumRows != 0) {}

else if ($NumRows == 0)
{
	popup('Λάθος όνομα χρήστη/κωδικός.Προσπαθήστε ξανά!','LoginPage.php');
}

function Logout() {
   session_start();
   session_unset();
   header("Location: /Dealand");
   return false;
   exit();
}
?>
<html>
<head>
	<title>Dealand</title>
	<meta name="description" content="Site for dealings">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=yes" />
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/grid.css">
	<link rel="stylesheet" href="./css/elements.css">
	<link rel="stylesheet" href="./css/prettyPhoto.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<style>
		#give_details {
			width:500px;
			font-family:georgia,helvtica,serif;
		}

		#give_details label {
			color:#777;
			font-size:11pt;
			display:block;
		}

		#give_details input, select {
			margin-bottom:20px;
		}

		#give_details button {
			float:center;
		}

		#give_details fieldset {
			background:#DCEEF4;
		}
		
		#take_details {
			width:500px;
			font-family:georgia,helvtica,serif;
		}

		#take_details label {
			color:#777;
			font-size:11pt;
			display:block;
		}

		#take_details input, select {
			margin-bottom:20px;
		}

		#take_details button {
			float:center;
		}

		#take_details fieldset {
			background:#DCEEF4;
		}
		
		#sxhma {
			border:1px solid #a1a1a1;
			padding:0px 0px; 
			background:#E6E6E6;
			width:686px;
			border-radius:0px;
			box-shadow: 10px 10px 20px grey;
			-moz-border-radius:0px;
			-webkit-border-radius:0px;
		}
	</style>
	<script>
		function load() {
			var usrnam = document.getElementById('user').value;
			var points = document.getElementById('point').value;
			var password = document.getElementById('pass').value;						
			var status = "Active!";
			$("#give_details").resetForm();
			$("#take_details").resetForm();
			$('#controls1').hide();
			//alert(username + ' ' + points + ' ' + status);
		}
	</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
	<script src="http://malsup.github.com/jquery.form.js"></script>
	<!--Start of Zopim Live Chat Script-->
	<script type="text/javascript">
		window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
		d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
		_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
		$.src='//v2.zopim.com/?1UFdFkNzo1ZQIojwUsxpjO5cEpot8HHS';z.t=+new Date;$.
		type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
	</script>
	<!--End of Zopim Live Chat Script-->
</head>

<body onload="load()">

<div id="content">

  <!-- HEADER -->
  <div class="header">
    <div class="logo"><h2><font face="MATURA MT">Dealand</font></h2></div>
    <div class="menubutton"></div>

    <div class="menu">
      <ul>
        <li id="default"><a href="#homepage">Αρχική</a></li>
		<li><a href="#profile">Προφίλ</a></li>
        <li><a href="#give">Χαρίζω</a></li>
        <li><a href="#take">Χρειάζομαι</a></li>
        <li><a href="#contact">Ερωτήσεις</a></li>
      </ul>
    </div>

    <br class="clear" />
  </div>

  <!-- HOMEPAGE -->
  <div class="wrapper homepage" id="homepage">
    <div class="container">
      <div class="three columns">
        <div class="frame">
          <img src="./img/name.gif">
        </div>
      </div>

      <div class="five columns">
        <h3>Καλώς ήρθατε!</h3>
        <p> Το Dealand είναι μια ιστοσελίδα δωρεάν δοσοληψιών. Η ιδέα είναι απλή! Aναρτώντας όλοι αγγελίες για αντικείμενα προς δωρεά που δεν χρειάζεστε πια, 
			θα υπάρχει πληθώρα αντικειμένων για άλλους συνανθρώπους μας και παράλληλα θα παίρνετε πόντους για να μπορείτε να αποκτήσετε αντικέιμενα που ενδεχομένως χρειάζεστε, 
			χωρίς να χρειαστεί να πληρώσετε τίποτα.
			Καλή περιήγηση!</p>
      </div>

      <div class="four columns">
		<form action = "#">
		<div style="padding-left:70px; padding-top:60px">
		<input type="submit" value="" title="Έξοδος <?php echo $username ?>" onclick="logout(); return false"
		style="font-family:sans-serif; font-size:49pt;
		font-weight:bold; background-image:url('http://www.clker.com/cliparts/f/7/5/c/13165542591764506524Plain%20Highway%20Exit%20Sign.svg.thumb.png'); none; color:white; width:1.56em">
		</SUBMIT>
		</div>
		</form>
      </div>

   </div>
  </div>

  <!-- PROFILE -->
  <div class="wrapper profile" id="profile">
	<div id="container">
	<table id="inside" cellspacing="0" border="0">
	<tr>
	<td colspan="2" id="one">
	<img src="http://chicvegan.com/wp-content/uploads/2012/07/HEADER-No-Money.jpg" style="width:720px; height:220px"><br>
	</td>
	</tr>
	<tr>
	<td id="two">
	<div class="head"><u>Προσωπικά στοιχεία</u></div>
	Όνομα Χρήστη: <?php echo $username ?><br>
	E-mail: <?php echo $email ?><br>
	</td>
	<td id="three">
	<div class="head"><u>Κάντε κλικ για να δείτε τους πόντους που σας απομένουν</u></div>
	<form method="get" action="points.php"><button type="button" name="submit" onclick="points(); return false">Δείξε διαθέσιμους πόντους</button></form>
	Εναπομείναντες πόντοι: <span id="show_num"></span>
	</td>
	</tr>
	</table>
	</div>
  </div>
  
  <!-- GIVE -->
  <div class="wrapper give" id="give">
    <div align="center">
	<form id="give_details" method="post" action="Members.php?username=<?php echo $username?>&password=<?php echo base64_decode($password)?>" enctype="multipart/form-data">
	<fieldset>
	<legend align="center">Στοιχεία αγγελίας</legend>
	<label style="padding-left:3px;">Είδος καταχώρησης και πραγματική αξία:</label><br>
	<select name="type">
	<option selected value="choice1"> - Επέλεξε Είδος - </option>
	<option value="Product">Προϊόν
	<option value="Service">Υπηρεσία-Εθελοντισμός
	</select>
	<select name="price">
	<option selected value="choice2"> - Πραγματική αξία προϊόντος/υπηρεσίας - </option>
	<option value="0-20"> Από 0 μέχρι και 20 ευρώ
	<option value="21-40"> Από 21 μέχρι και 40 ευρώ
	<option value="41-60"> Από 41 μέχρι και 60 ευρώ 
	<option value="61-80"> Από 61 μέχρι και 80 ευρώ
	<option value="81-100"> Από 81 μέχρι και 100 ευρώ		
	<option value=">100"> Από 101 ευρώ και πάνω
	</select><br>
	<label for="details" style="padding-left:3px;">Περιγραφή προϊόντος/υπηρεσίας:</label>
	<textarea name="details" rows="3" cols="40"></textarea><br><br>
	<label for="details" style="padding-left:3px;">Διεύθυνση παραλαβής (πόλη, περιοχή, οδός):</label>
	<textarea name="address" rows="1" cols="40"></textarea><br><br>
	Ανέβασε εικόνα (*προτείνεται):
		<input type="file" name="image" id="image"><br>
	<div align="left" style="margin-left:100px"> : <img type="image" style="margin-left:55px" align="left" src="img/email_logo.jpg" name="image" width="26px" height="22px">
	<input type="text" id="email" name="email"/><br></div>
	<label for="communicate" style="padding-left:3px;">Εισάγετε τουλάχιστον ένα από τα παρακάτω:</label><br>
	<div align="left" style="margin-left:48px"> : <img type="image" style="margin-left:55px" align="left" src="img/facebook_logo.jpg" name="image" width="26px" height="22px">www.facebook.com/
	<input type="text" id="facebook" name="facebook"/><br></div>
	<div align="left" style="margin-left:100px"> : <img type="image" style="margin-left:55px" align="left" src="http://johnmacventures.com/wp-content/themes/jmc2/images/phone.png" name="image" width="26px" height="22px">
	<input type="text" id="phone" name="phone"/><br></div>
	<div id="controls2">
	<button type="button" name="submit" value="Έλεγχος" onclick="process1(email.value,facebook.value,phone.value,type.value,form.details.value,form.address.value,price.value); return false">Έλεγχος εγκυρότητας</button>
	</div>
	<div id="controls1">
		<input type="submit" value="Καταχώρηση αγγελίας">
	</div>
	</fieldset>
	</form>
	<div id="keimeno">
	</div>
	</div>
	<!--<div align="center">Βήμα 2: Ανέβασε εικόνα (*προτείνεται)
	<form action="upload_file.php" method="post"
	enctype="multipart/form-data">
	<input type="file" name="file" id="file">
	<input type="submit" name="submit" value="Submit">
	</form>
	</div>-->
  </div>
  
  <?php
	error_reporting(E_ERROR);
	require_once('php/connection.php');
	$username = $_REQUEST['username'];
	$points = $_REQUEST['points'];
	$email = $_REQUEST['email'];
	$facebook = $_REQUEST['facebook'];
	$phone = $_REQUEST['phone'];
	$type = $_REQUEST['type'];
	$details = $_REQUEST['details'];
	$address = $_REQUEST['address'];
	$price = $_REQUEST['price'];
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["image"]["name"]);
	$extension = end($temp);
	if ((($_FILES["image"]["type"] == "image/gif")
	|| ($_FILES["image"]["type"] == "image/jpeg")
	|| ($_FILES["image"]["type"] == "image/jpg")
	|| ($_FILES["image"]["type"] == "image/pjpeg")
	|| ($_FILES["image"]["type"] == "image/x-png")
	|| ($_FILES["image"]["type"] == "image/png"))
	&& ($_FILES["image"]["size"] < 2000000000000)
	&& in_array($extension, $allowedExts))
	{
		if ($_FILES["image"]["error"] > 0)
		{
			"Return Code: " . $_FILES["image"]["error"] . "<br>";
		}
		else
		{
			
			"Upload: " . $_FILES["image"]["name"] . "<br>";
			"Type: " . $_FILES["image"]["type"] . "<br>";
			"Size: " . ($_FILES["image"]["size"] / 1024) . " kB<br>";
			"Temp file: " . $_FILES["image"]["tmp_name"] . "<br>";
		
			move_uploaded_file($_FILES["image"]["tmp_name"],
			"php/upload/" . $_FILES["image"]["name"]);
			"Stored in: " . "php/upload/" . $_FILES["image"]["name"];
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			
		}
	}
	
	//Establish Connection
	@mysql_connect ($db_server, $user, $pass) or die ('Error: '.mysql_error());

	mysql_select_db($database);

	// Perform insert
	if ($type == "Product")
	{
		if($price == "0-20")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '4', 'Active!')";
		}
		
		else if($price == "21-40")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '6', 'Active!')";
		}
		
		else if($price == "41-60")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '8', 'Active!')";
		}
		
		else if($price == "61-80")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '10', 'Active!')";
		}
		
		else if($price == "81-100")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '12', 'Active!')";
		}
		
		else if($price == ">100")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '15', 'Active!')";
		}
	}

	else if ($type == "Service")
	{
		if($price == "0-20")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '5', 'Active!')";
		}
		
		else if($price == "21-40")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '7', 'Active!')";
		}
		
		else if($price == "41-60")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '10', 'Active!')";
		}
		
		else if($price == "61-80")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '13', 'Active!')";
		}
		
		else if($price == "81-100")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '16', 'Active!')";
		}
		
		else if($price == ">100")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '20', 'Active!')";
		}
	}

	mysql_query($query) or die(mysql_error());
	
	if ($_FILES["image"]["name"] != "") {
		if ($type == "Product")
		{
			if($price == "0-20")
			{
				$query = 'UPDATE users SET points = points + 5 WHERE username = "'.$username.'"';
			}
			
			else if($price == "21-40")
			{
				$query = 'UPDATE users SET points = points + 7 WHERE username = "'.$username.'"';
			}
			
			else if($price == "41-60")
			{
				$query = 'UPDATE users SET points = points + 9 WHERE username = "'.$username.'"';
			}
			
			else if($price == "61-80")
			{
				$query = 'UPDATE users SET points = points + 11 WHERE username = "'.$username.'"';
			}
			
			else if($price == "81-100")
			{
				$query = 'UPDATE users SET points = points + 13 WHERE username = "'.$username.'"';
			}
			
			else if($price == ">100")
			{
				$query = 'UPDATE users SET points = points + 15 WHERE username = "'.$username.'"';
			}
		}

		else if ($type == "Service")
		{
			if($price == "0-20")
			{
				$query = 'UPDATE users SET points = points + 6 WHERE username = "'.$username.'"';
			}
			
			else if($price == "21-40")
			{
				$query = 'UPDATE users SET points = points + 8 WHERE username = "'.$username.'"';
			}
			
			else if($price == "41-60")
			{
				$query = 'UPDATE users SET points = points + 12 WHERE username = "'.$username.'"';
			}
			
			else if($price == "61-80")
			{
				$query = 'UPDATE users SET points = points + 15 WHERE username = "'.$username.'"';
			}
			
			else if($price == "81-100")
			{
				$query = 'UPDATE users SET points = points + 18 WHERE username = "'.$username.'"';
			}
			
			else if($price == ">100")
			{
				$query = 'UPDATE users SET points = points + 20 WHERE username = "'.$username.'"';
			}
		}
	}
	
	else
	{
		if ($type == "Product")
		{
			if($price == "0-20")
			{
				$query = 'UPDATE users SET points = points + 2 WHERE username = "'.$username.'"';
			}
			
			else if($price == "21-40")
			{
				$query = 'UPDATE users SET points = points + 4 WHERE username = "'.$username.'"';
			}
			
			else if($price == "41-60")
			{
				$query = 'UPDATE users SET points = points + 6 WHERE username = "'.$username.'"';
			}
			
			else if($price == "61-80")
			{
				$query = 'UPDATE users SET points = points + 8 WHERE username = "'.$username.'"';
			}
			
			else if($price == "81-100")
			{
				$query = 'UPDATE users SET points = points + 10 WHERE username = "'.$username.'"';
			}
			
			else if($price == ">100")
			{
				$query = 'UPDATE users SET points = points + 13 WHERE username = "'.$username.'"';
			}
		}

		else if ($type == "Service")
		{
			if($price == "0-20")
			{
				$query = 'UPDATE users SET points = points + 3 WHERE username = "'.$username.'"';
			}
			
			else if($price == "21-40")
			{
				$query = 'UPDATE users SET points = points + 5 WHERE username = "'.$username.'"';
			}
			
			else if($price == "41-60")
			{
				$query = 'UPDATE users SET points = points + 8 WHERE username = "'.$username.'"';
			}
			
			else if($price == "61-80")
			{
				$query = 'UPDATE users SET points = points + 11 WHERE username = "'.$username.'"';
			}
			
			else if($price == "81-100")
			{
				$query = 'UPDATE users SET points = points + 14 WHERE username = "'.$username.'"';
			}
			
			else if($price == ">100")
			{
				$query = 'UPDATE users SET points = points + 18 WHERE username = "'.$username.'"';
			}
		}
	}
			
	mysql_query($query) or die(mysql_error());
	
	$query2 = "SELECT * FROM users WHERE username = '".$username."'";
	$result2 = mysql_query($query2);

	$row = mysql_fetch_object($result2);
	$points = $row->points;
	//echo "Η αγγελία σας καταχωρήθηκε!";
?>
	
  <!-- TAKE -->
	<div class="wrapper take" id="take">
		<div align="center">
		<form id="take_details" method="post" target="_blank" onsubmit="process2(type2.value,price2.value); return false">
		<fieldset>
		<legend align="center">Στοιχεία αναζήτησης</legend><br>
		<select name="type2">
		<option selected value="choice3"> - Επέλεξε Είδος - </option>
		<option value="Product">Προϊόν
		<option value="Service">Υπηρεσία-Εθελοντισμός
		</select>
		<select name="price2">
		<option selected value="choice4"> - Εικονική αξία προϊόντος/υπηρεσίας - </option>
		<option value="8"> Από 0 μέχρι και 8 πόντους
		<option value="15"> Από 0 μέχρι και 15 πόντους 
		<option value="20"> Από 0 μέχρι και 20 πόντους
		</select><br>
		<input type="submit" name="submit" value="Αναζήτηση αγγελιών"></input>
		</fieldset>
		</form>
		</div>
	</div>

  <!-- CONTACT -->
  <div class="wrapper contact" id="contact">
    <!--span class="big-text">contact</span-->
    <div class="container">
      <div class="four columns">
	  <h5>Στοιχεία δημιουργού εφαρμογής</h5>
	  <button class="facebook"><a href="http://www.facebook.com/ormikopo" target="blank">Orestis Meik</a></button>
	  <button class="twitter"><a href="http://www.twitter.com/ormikopo" target="blank">@ormikopo</a></button>
	  <button class="linkedin"><a href="http://www.linkedin.com/profile/view?id=166729905&trk=nav_responsive_tab_profile" target="blank">Orestis Meikopoulos</a></button>
	  <button class="mail">diktyas1988@gmail.com</button>
	  <br><br>
	  <h5>Στοιχεία επικοινωνίας</h5>
        <ul>
          <li><strong>Διεύθυνση: </strong>Γκλαβάνη 37, 38221 Βόλος</li>
          <li><strong>Τηλέφωνο: </strong>+30 24210 74935</li>
        </ul>
      </div>
      <div class="eight columns">
      <form method="post" action="sendEmail.php" id="contactform">
        <label for="name">Το Όνομα μου:</label>
        <input type="text" name="name" id="name" class="required" />

        <label for="email">Το Email μου:</label>
        <input type="text" name="email" id="email" class="required email"/>

        <label for="message">Ερώτηση:</label>
        <textarea name="comments" id="message" class="required"></textarea>
		<br><br>
        <div align="center"><button type="submit" name="submit" value="Submit" class="submit-button" >Αποστολή</button></div>
      </form>
      </div>

    </div>
  </div>

  <div id="keimeno">
  </div>

  <input type="hidden" value="<?php echo $username ;?>" id="user" />
  <input type="hidden" value="<?php echo $points ;?>" id="point" />
  <input type="hidden" value="<?php echo $password ;?>" id="pass" />

</div>

<!-- Scripts -->
<script src="./js/libs/respond.min.js"></script>
<script src="./js/libs/jquery.easytabs.min.js"></script>
<script src="./js/libs/jquery.prettyPhoto.js"></script>
<script src="./js/libs/jquery.validate.min.js"></script>
<script src="./js/script.js"></script>
<script src="./js/form.js"></script>
<script>
	function process1 (email,facebook,phone,type,details,address,price) {
		
		var usrnam = document.getElementById('user').value;
		var points = document.getElementById('point').value;
		var status = "Active!";
		var errors = '';
		var give_id = null;
		
		var type = $("#give_details [name='type']").val();
		if (type == "choice1") {
			errors += '- Παρακαλούμε επιλέξτε το είδος του προϊόντος που χαρίζετε\n';
		}
		
		var price = $("#give_details [name='price']").val();
		if (price == "choice2") {
			errors += '- Παρακαλούμε επιλέξτε εύρος τιμής-αξίας\n';
		}
		
		var email = $("#give_details [name='email']").val();
		var facebook = $("#give_details [name='facebook']").val();
		var phone = $("#give_details [name='phone']").val();
		if (!email.match(/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i)) {
			errors += '- Παρακαλούμε εισάγετε μια έγκυρη διέυθυνση email σας\n';
		}
		
		if(!facebook && !phone) {
			errors += '- Παρακαλούμε εισάγετε τη σελίδα σας στο facebook / το τηλέφωνο επικοινωνίας σας\n';
		}
		
		var details = $("#give_details [name='details']").val();
		if (!details) {
			errors += '- Παρακαλούμε εισάγετε τις λεπτομέρειες που σας ζητούνται\n';
		}
		
		var address = $("#give_details [name='address']").val();
		if (!address) {
			errors += '- Παρακαλούμε εισάγετε διεύθυνση παραλαβής\n';
		}
		
		if (errors) {
			errors = 'Υπάρχουν τα παρακάτω σφάλματα: \n' + errors;
			alert(errors);
			return false;
		}
		
		else {
			/*var xmlhttp;
			
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			}
			
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("keimeno").innerHTML=xmlhttp.responseText;
					//$('#control').hide();
				}
			}
			
			xmlhttp.open("GET","php/process1.php?give_id=" +give_id+ "&username=" +username+ "&email=" +email+ "&facebook=" +facebook+ "&phone=" +phone+ "&type=" +type+ "&price=" +price+ "&details=" +details+ "&address=" +address+ "&status=" +status,true);
			xmlhttp.send();
			alert("Η αγγελία σας καταχωρήθηκε!");
			$("#give_details").resetForm();*/
			$('#controls1').show();
			alert("Πατήστε 'Καταχώρηση αγγελίας' για να ολοκληρωθεί η διαδικασία!");
			//$('#controls2').hide();
		}
		
		/*else {
			//$('#controls1').show();
			$("#give_details").resetForm();
			var url = "php/process1.php?give_id=" +give_id+ "&username=" +username+ "&email=" +email+ "&facebook=" +facebook+ "&phone=" +phone+ "&type=" +type+ "&price=" +price+ "&details=" +details+ "&address=" +address+ "&status=" +status;

			$.ajax({
				url: url,
				type: "POST",
				dataType: 'json',
				success: function(){
					alert("Η αγγελία σας καταχωρήθηκε!");
					$("#give_details").resetForm();
				}
			});
		}*/
	}
	
	function process2 (type2,price2) {
		
		var points = document.getElementById('point').value;
		var usrnam = document.getElementById('user').value;
		var errors = '';
	
		var type2 = $("#take_details [name='type2']").val();
		if (type2 == "choice3") {
			errors += '- Παρακαλούμε επιλέξτε είδος\n';
		}
		
		var price2 = $("#take_details [name='price2']").val();
		if (price2 == "choice4") {
			errors += '- Παρακαλούμε επιλέξτε εύρος εικονικής τιμής-αξίας\n';
		}
	
		if (errors) {
			errors = 'Υπάρχουν τα παρακάτω σφάλματα: \n' + errors;
			alert(errors);
			return false;
		}
		
		else 
		{
			$("#take_details").resetForm();
			//window.location = "http://localhost/Dealand/php/process2.php?type2=" + encodeURIComponent(type2) + "&price2=" + encodeURIComponent(price2);
			window.open(
				'http://83.212.107.26/Dealand/php/process2.php?type2=' + encodeURIComponent(type2) + '&price2=' + encodeURIComponent(price2) + '&username=' + encodeURIComponent(usrnam)+ '&points=' + encodeURIComponent(points), '_blank'
			);
		}
	}
	
	function points() {
	
		var usrnam = document.getElementById('user').value;

		$.ajax({
			type:"POST",
			url: "points.php",
			data:"username="+usrnam ,

			success: function(data){
				//Create jQuery object from the response HTML.
				var $response=$(data);

				//Query the jQuery object for the values
				var point = $response.filter('#point').text();
				
				$('#show_num').html(point);
			}
		});
	}
	
	function logout() {
		window.location = "/Dealand";
		return false;
	}
</script>
	<style type="text/css">
	/*<![CDATA[*/
	#fbplikebox{display: block;padding: 0;z-index: 99999;position: fixed;}
	.fbplbadge {background-color:#3B5998;display: block;height: 150px;top: 50%;margin-top: -75px;position: absolute;left: -47px;width: 47px;background-image: url("http://3.bp.blogspot.com/-1GCgbuSZXK0/T38iRiVF41I/AAAAAAAABpg/WlGuQ3fi-Rs/s1600/vertical-right.png");background-repeat: no-repeat;overflow: hidden;-webkit-border-top-left-radius: 8px;-webkit-border-bottom-left-radius: 8px;-moz-border-radius-topleft: 8px;-moz-border-radius-bottomleft: 8px;border-top-left-radius: 8px;border-bottom-left-radius: 8px;}
	/*]]>*/
	</style>
	<script type="text/javascript">
	/*<![CDATA[*/
		(function(w2b){
			w2b(document).ready(function(){
				var $dur = "medium"; // Duration of Animation
				w2b("#fbplikebox").css({right: -250, "top" : 80 })
				w2b("#fbplikebox").hover(function () {
					w2b(this).stop().animate({
						right: 0
					}, $dur);
				}, function () {
					w2b(this).stop().animate({
						right: -250
					}, $dur);
				});
				w2b("#fbplikebox").show();
			});
		})(jQuery);
	/*]]>*/
	</script>
	<div style="right: -250px; top: 50px;" id="fbplikebox" style="color:white">
		<div class="fbplbadge"></div>
		<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FDeaLand%2F640096446012464&amp;width=255&amp;height=290&amp;colorscheme=dark&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:255px; height:290px; background-color:black;" allowTransparency="true"></iframe>
	</div>
</body>
</html>

