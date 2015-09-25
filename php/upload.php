<?php
	require_once("connection.php");

	//Establish Connection
	@mysql_connect ($db_server, $user, $pass) or die ('Error: '.mysql_error());
	mysql_select_db($database);
	
	$u_image = addslashes(file_get_contents($_FILES['u_image']['tmp_name']));
	
	$query = mysql_query("INSERT INTO store VALUES ('$u_image')");
			
	mysql_query($query);
?>