<?php
require_once('php/connection.php');
$username = $_REQUEST['username'];
//Establish Connection
@mysql_connect ($db_server, $user, $pass) or die ('Error: '.mysql_error());

mysql_select_db($database);

$sql="SELECT * FROM users WHERE username = '$username'";
	
$rs_result = mysql_query ($sql);

$i=0;

while ($row = mysql_fetch_assoc($rs_result)) {
	$f1=mysql_result($rs_result,$i,"points");
	$i++;
};

echo '<div id="point">' . $f1 . '</div>';

?>