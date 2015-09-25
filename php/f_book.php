<?php
require_once('connection.php');

$g_id = $_REQUEST['g_id'];
$username = $_REQUEST['username'];
$points = $_REQUEST['points'];

//Establish Connection
@mysql_connect ($db_server, $user, $pass) or die ('Error: '.mysql_error());

mysql_select_db($database);

$query = "SELECT * FROM give_table WHERE give_id = '".$g_id."'";

$rs_result = mysql_query($query);

$i=0;
while ($row = mysql_fetch_assoc($rs_result)) {
	$f1=mysql_result($rs_result,$i,"username");
	$f2=mysql_result($rs_result,$i,"email");
	$f3=mysql_result($rs_result,$i,"facebook");
	$f4=mysql_result($rs_result,$i,"phone");
	$f5=mysql_result($rs_result,$i,"a_price");
	$f6=mysql_result($rs_result,$i,"status");
	$f7=mysql_result($rs_result,$i,"type");
	$f8=mysql_result($rs_result,$i,"price");
	$f9=mysql_result($rs_result,$i,"address");
	$i++;
};

if ($points >= $f5) {
	if ($f7 == "Product")
	{
		if($f8 == "0-20")
		{
			$query = 'UPDATE users SET points = points - 4 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == "21-40")
		{
			$query = 'UPDATE users SET points = points - 6 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == "41-60")
		{
			$query = 'UPDATE users SET points = points - 8 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == "61-80")
		{
			$query = 'UPDATE users SET points = points - 10 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == "81-100")
		{
			$query = 'UPDATE users SET points = points - 12 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == ">100")
		{
			$query = 'UPDATE users SET points = points - 15 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
	}

	else if ($f7 == "Service")
	{
		if($f8 == "0-20")
		{
			$query = 'UPDATE users SET points = points - 5 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == "21-40")
		{
			$query = 'UPDATE users SET points = points - 7 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == "41-60")
		{
			$query = 'UPDATE users SET points = points - 10 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == "61-80")
		{
			$query = 'UPDATE users SET points = points - 13 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == "81-100")
		{
			$query = 'UPDATE users SET points = points - 16 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
		
		else if($f8 == ">100")
		{
			$query = 'UPDATE users SET points = points - 20 WHERE username = "'.$username.'"';
			$query2 = 'UPDATE give_table SET status = "Inactive..." WHERE give_id='.$g_id;
		}
	}
}

mysql_query($query) or die(mysql_error());
mysql_query($query2) or die(mysql_error());
?>