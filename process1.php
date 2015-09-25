<html>
<head>
<style>
	#upload {
		width:500px;
		font-family:georgia,helvtica,serif;
	}

	#upload label {
		color:#777;
		font-size:11pt;
		display:block;
	}

	#upload input, select {
		margin-bottom:20px;
	}

	#upload button {
		float:center;
	}

	#upload fieldset {
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
</head>
<body>
<?php
require_once('connection.php');

$username = $_REQUEST['username'];
$points = $_REQUEST['points'];
$email = $_REQUEST['email'];
$facebook = $_REQUEST['facebook'];
$phone = $_REQUEST['phone'];
$type = $_REQUEST['type'];
$details = $_REQUEST['details'];
$address = $_REQUEST['address'];
$status = $_REQUEST['status'];
$price = $_REQUEST['price'];

//Establish Connection
@mysql_connect ($db_server, $user, $pass) or die ('Error: '.mysql_error());

mysql_select_db($database);

//$mysqli = new MySQLi('localhost', 'ormikopo1988', '%or1440891988', 'deal');

// Perform insert
if ($type == "Product")
{
	if($price == "0-50")
	{
		$query = "INSERT INTO give_table (give_id, username, email, facebook, phone, gdate, type, price, details, address, u_image, a_price, status) VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$u_image', '3', '".$status."')";
		//$query = $mysqli->prepare('INSERT INTO give_table (give_id, username, email, facebook, phone, gdate, type, price, details, address, u_image, a_price, status) VALUES (:give_id, :username, :email, :facebook, :phone, :gdate, :type, :price, :details, :address, :u_image, :a_price, :status)');
		//$query->execute(array(':give_id' => NULL, ':username' => $username, ':email' => $email, ':facebook' => $facebook, ':phone' => $phone, ':gdate' => CURDATE(), ':type' => $type, ':price' => $price, ':details' => $details, ':address' => $address, ':u_image' => $u_image, ':a_price' => 3, ':status' => $status));
	}
	
	else if($price == "51-100")
	{
		$query = "INSERT INTO give_table (give_id, username, email, facebook, phone, gdate, type, price, details, address, u_image, a_price, status) VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$u_image', '7', '".$status."')";
	}
	
	else if($price == ">100")
	{
		$query = "INSERT INTO give_table (give_id, username, email, facebook, phone, gdate, type, price, details, address, u_image, a_price, status) VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$u_image', '15', '".$status."')";
	}
}

else if ($type == "Service")
{
	if($price == "0-50")
	{
		$query = "INSERT INTO give_table (give_id, username, email, facebook, phone, gdate, type, price, details, address, u_image, a_price, status) VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$u_image', '8', '".$status."')";
	}
	
	else if($price == "51-100")
	{
		$query = "INSERT INTO give_table (give_id, username, email, facebook, phone, gdate, type, price, details, address, u_image, a_price, status) VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$u_image', '12', '".$status."')";
	}
	
	else if($price == ">100")
	{
		$query = "INSERT INTO give_table (give_id, username, email, facebook, phone, gdate, type, price, details, address, u_image, a_price, status) VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$u_image', '20', '".$status."')";
	}
}

mysql_query($query) or die(mysql_error());

if ($type == "Product")
{
	if($price == "0-50")
	{
		$query = 'UPDATE users SET points = points + 5 WHERE username='.$username;
	}
	
	else if($price == "51-100")
	{
		$query = 'UPDATE users SET points = points + 10 WHERE username='.$username;
	}
	
	else if($price == ">100")
	{
		$query = 'UPDATE users SET points = points + 15 WHERE username='.$username;
	}
}

else if ($type == "Service")
{
	if($price == "0-50")
	{
		$query = 'UPDATE users SET points = points + 10 WHERE username='.$username;
	}
	
	else if($price == "51-100")
	{
		$query = 'UPDATE users SET points = points + 15 WHERE username='.$username;
	}
	
	else if($price == ">100")
	{
		$query = 'UPDATE users SET points = points + 20 WHERE username='.$username;
	}
}
		
mysql_query($query) or die(mysql_error());
//echo "Η αγγελία σας καταχωρήθηκε!";
?>
<div align="center">
	<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
	<fieldset>
	<legend align="center">Βήμα 2</legend>
	Ανέβασε εικόνα (*προτείνεται):
	<input type="file" name="u_image" id="u_image"><br>
	<input type="submit" name="submit" value="Ανέβασε">
	</fieldset>
	</form>
</div>
</body>
</html>