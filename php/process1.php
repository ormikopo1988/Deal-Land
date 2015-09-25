<html>
<head>
</head>
<body>
<?php
	require_once('connection.php');
	echo "OK!";
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
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name = addslashes($_FILES['image']['name']);
	$image_size = getimagesize($_FILES['image']['tmp_name']);

	//Establish Connection
	@mysql_connect ($db_server, $user, $pass) or die ('Error: '.mysql_error());

	mysql_select_db($database);

	// Perform insert
	if ($type == "Product")
	{
		if($price == "0-20")
		{
			echo "OK!";
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '4', '".$status."')";
		}
		
		else if($price == "21-40")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '6', '".$status."')";
		}
		
		else if($price == "41-60")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '8', '".$status."')";
		}
		
		else if($price == "61-80")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '10', '".$status."')";
		}
		
		else if($price == "81-100")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '12', '".$status."')";
		}
		
		else if($price == ">100")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '15', '".$status."')";
		}
	}

	else if ($type == "Service")
	{
		if($price == "0-20")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '5', '".$status."')";
		}
		
		else if($price == "21-40")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '7', '".$status."')";
		}
		
		else if($price == "41-60")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '10', '".$status."')";
		}
		
		else if($price == "61-80")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '13', '".$status."')";
		}
		
		else if($price == "81-100")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '16', '".$status."')";
		}
		
		else if($price == ">100")
		{
			$query = "INSERT INTO give_table VALUES (NULL, '".$username."', '".$email."', '".$facebook."', '".$phone."', CURDATE(), '".$type."', '".$price."', '".$details."', '".$address."', '$image_name', '$image', '20', '".$status."')";
		}
	}

	mysql_query($query) or die(mysql_error());
echo "OK!";
	if ($type == "Product")
	{
		if($price == "0-20")
		{
			$query = 'UPDATE users SET points = points + 5 WHERE username='.$username;
		}
		
		else if($price == "21-40")
		{
			$query = 'UPDATE users SET points = points + 7 WHERE username='.$username;
		}
		
		else if($price == "41-60")
		{
			$query = 'UPDATE users SET points = points + 9 WHERE username='.$username;
		}
		
		else if($price == "61-80")
		{
			$query = 'UPDATE users SET points = points + 11 WHERE username='.$username;
		}
		
		else if($price == "81-100")
		{
			$query = 'UPDATE users SET points = points + 13 WHERE username='.$username;
		}
		
		else if($price == ">100")
		{
			$query = 'UPDATE users SET points = points + 15 WHERE username='.$username;
		}
	}

	else if ($type == "Service")
	{
		if($price == "0-20")
		{
			$query = 'UPDATE users SET points = points + 6 WHERE username='.$username;
		}
		
		else if($price == "21-40")
		{
			$query = 'UPDATE users SET points = points + 8 WHERE username='.$username;
		}
		
		else if($price == "41-60")
		{
			$query = 'UPDATE users SET points = points + 12 WHERE username='.$username;
		}
		
		else if($price == "61-80")
		{
			$query = 'UPDATE users SET points = points + 15 WHERE username='.$username;
		}
		
		else if($price == "81-100")
		{
			$query = 'UPDATE users SET points = points + 18 WHERE username='.$username;
		}
		
		else if($price == ">100")
		{
			$query = 'UPDATE users SET points = points + 20 WHERE username='.$username;
		}
	}
			
	mysql_query($query) or die(mysql_error());
	//echo "Η αγγελία σας καταχωρήθηκε!";
?>
</body>
</html>