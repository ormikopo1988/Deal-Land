<html>
<head>
	<style type="text/css">
		body
		{
			background: white url(http://mi9.com/uploads/abstract/4147/abstract-blue-backgrounds-25_1920x1200_71464.jpg) center center fixed no-repeat;
			background-size: 100% 100%;
		}
		
		table.hovertable {
			font-family: verdana,arial,sans-serif;
			font-size:15px;
			color:#333333;
			background-color:#d4e3e5;
			border-width: 1px;
			border-color: #999999;
			border-collapse: collapse;
		}
		table.hovertable th {
			background-color:#d4e3e5;
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #a9c6c9;
		}
		table.hovertable tr:hover {
			background-color:yellow;
		}
		table.hovertable td {
			border-width: 1px;
			padding: 8px;
			border-style: solid;
			border-color: #a9c6c9;
		}
		
		#contactform {
			width:350px;
			font-family:georgia,helvtica,serif;
		}

		#contactform label {
			color:#777;
			font-size:11pt;
			display:block;
		}

		#contactform input, select {
			margin-bottom:20px;
		}

		#contactform button {
			float:center;
		}

		#contactform fieldset {
			background:#DCEEF4;
		}
		
		#errormsg {
			background-color:#d4e3e5;
			font-family:georgia,helvtica,serif;
			font-size:15px;
			background:#DCEEF4;
			width:1160px;
		}
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
	<script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body onload="load()">
<?php
require_once('connection.php');

$g_id = $_REQUEST['g_id'];
$username = $_REQUEST['username'];
$points = $_REQUEST['points'];

//header('Content-Type: text/html; encoding=UTF-8');

@mysql_connect ($db_server, $user, $pass) or die ('Error: '.mysql_error());

mysql_select_db($database);

$query = "SELECT * FROM give_table WHERE give_id = '".$g_id."'";

$rs_result = mysql_query($query);

?>
<?php
	$i=0;
	while ($row = mysql_fetch_assoc($rs_result)) {
		$f1=mysql_result($rs_result,$i,"username");
		$f2=mysql_result($rs_result,$i,"email");
		$f3=mysql_result($rs_result,$i,"facebook");
		$f4=mysql_result($rs_result,$i,"phone");
		$f5=mysql_result($rs_result,$i,"gdate");
		$f6=mysql_result($rs_result,$i,"a_price");
		if($points < $f6) {
			echo '<div id="errormsg">Οι πόντοι σας δεν επαρκούν για να δείτε αυτή την αγγελία! Παρακαλούμε χαρίστε κάτι για να πάρετε παραπάνω πόντους και επανέλθετε ή επιλέξτε κάποια άλλη αγγελία!</div>';
			break;
		}
		$f7=mysql_result($rs_result,$i,"details");
		$f8=mysql_result($rs_result,$i,"status");
		$f9=mysql_result($rs_result,$i,"address");
		$f0=mysql_result($rs_result,$i,"give_id");
?>
<div id="sxhma" align="center">
<h2><u>ΑΓΓΕΛΙΑ ΕΠΙΛΟΓΗΣ ΣΑΣ</u></h2>
<table class="hovertable" border="2" cellspacing="3" cellpadding="3">
<tr>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Όνομα Χρήστη</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Email</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Facebook</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Τηλέφωνο</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Ημερομηνία καταχώρησης</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Περιγραφή</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Διεύθυνση Παραλαβής</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Εικονική τιμή</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Κατάσταση αγγελίας</font>
</th>
</tr>

<tr>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f7; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f9; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f8; ?></font>
</td>
<td id="interest">
<form id="details" method="post">
	<button type="button" name="submit" onclick="show();">Ενδιαφέρομαι!</button>
</form>
</td>
</tr><br>
<?php
		$i++;
	};
?>
<?php
$res = mysql_query("SELECT * FROM give_table WHERE give_id = $g_id");
echo "<table>";
while($row = mysql_fetch_array($res)) {
	if ($row["name"] == "") {
		echo "<br><tr>";
		echo "<td>"; ?> <img src = "<?php echo 'upload/noimage.jpg'; ?>" width='450' height='350'> <?php echo "</td>";
		echo "</tr>";
	}
	
	else {
		echo "<br><tr>";
		echo "<td>"; ?> <img src = "<?php echo 'upload/'.$row["name"]; ?>" width='450' height='350'> <?php echo "</td>";
		echo "</tr>";
	}
}
echo "</table>";
?>
</div>
</table><br>
<div id="control" align="center">
	<form method="post" action="sendEmail.php" id="contactform">
	<fieldset>
	<legend align="center" style="font-weight:bold; font-size:11pt; color:red">Εκδήλωση ενδιαφέροντος</legend>
	<form method="post" action="sendEmail.php" id="contactform">
	<label for="name">Το όνομα μου:</label>
	<input type="text" name="name" id="name" class="required" />

	<label for="email">To email μου:</label>
	<input type="text" name="email" id="email" class="required email"/>
	
	<label for="email2">Email παραλήπτη:</label>
	<input type="text" value="<?php echo $f2; ?>" name="email2" id="email2" class="required email"/>

	<label for="message">Μήνυμα:</label>
	<textarea name="comments" id="message" class="required"></textarea><br><br>

	<button type="submit" name="submit" value="Submit" class="submit-button">Αποστολή</button>
	</fieldset>
	</form>
</div>
<input type="hidden" value="<?php echo $username ;?>" id="user" />
<input type="hidden" value="<?php echo $points ;?>" id="point" />
<input type="hidden" value="<?php echo $g_id ;?>" id="give_id" />
<script>
	function show()
	{	
		var username = document.getElementById('user').value;
		var points = document.getElementById('point').value;
		var give_id = document.getElementById('give_id').value;
		
		var x;
		var r=confirm("Αν είστε σίγουροι για την επιλογή σας πατήστε 'ΟΚ'. \n\nΘα σας αφαιρεθούν οι πόντοι που αντιστοιχούν στην εικονική αξία της αγγελίας και θα έχετε τη δυνατότητα να έρθετε σε επαφή με τον χρήστη που την έβαλε! \n\nΑν όχι πατήστε 'Cancel'.");
		if (r==true)
		{
			$('#control').show();
			$('#interest').hide();
			
			var url = "f_book.php?give_id=" +give_id+ "&username=" +username+ "&points=" +points;
				
			$.ajax({
				url: url,
				type: "POST",
				dataType: 'json',
				success: function(){}
			});
		}
		else
		{
			$('#control').hide();
			$('#interest').show();
		}
	}
	
	function load(){
		$('#control').hide();
	}
</script>
</body>
</html>