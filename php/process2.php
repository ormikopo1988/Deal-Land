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
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
<script src="http://malsup.github.com/jquery.form.js"></script>
</head>
<body>
<?php
	require_once("connection.php");
	
	$type2 = $_REQUEST['type2'];
	$price2 = $_REQUEST['price2'];
	$points = $_REQUEST['points'];
	$username = $_REQUEST['username'];
	
	//Establish Connection
	@mysql_connect ($db_server, $user, $pass) or die ('Error: '.mysql_error());
	mysql_select_db($database);

	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * 5;
	
	if ($type2 == "Product")
	{
		$sql="SELECT * FROM give_table WHERE type = '$type2'  AND (a_price <= '$price2' AND status = 'Active!') LIMIT $start_from, 5";
	}
	
	else if ($type2 == "Service")
	{
		$sql="SELECT * FROM give_table WHERE type = '$type2'  AND (a_price <= '$price2' AND status = 'Active!') LIMIT $start_from, 5";
	}
	
	$rs_result = mysql_query ($sql);
?>

<div id="sxhma" align="center">
<h2><u>ΑΠΟΤΕΛΕΣΜΑΤΑ ΑΝΑΖΗΤΗΣΗΣ ΒΑΣΗ ΤΩΝ ΚΡΙΤΗΡΙΩΝ ΣΑΣ</u></h2>
<table class="hovertable" border="2" cellspacing="3" cellpadding="3">
<tr>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Περιγραφή</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Εικονική τιμή</font>
</th>
<th>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif">Μοναδικό αναγνωριστικό</font>
</th>
</tr>
<?php
	$i=0;
	while ($row = mysql_fetch_assoc($rs_result)) {
		$f1=mysql_result($rs_result,$i,"username");
		$f2=mysql_result($rs_result,$i,"email");
		$f3=mysql_result($rs_result,$i,"facebook");
		$f4=mysql_result($rs_result,$i,"phone");
		$f5=mysql_result($rs_result,$i,"gdate");
		$f6=mysql_result($rs_result,$i,"a_price");
		$f7=mysql_result($rs_result,$i,"details");
		$f8=mysql_result($rs_result,$i,"status");
		$f9=mysql_result($rs_result,$i,"address");
		$f0=mysql_result($rs_result,$i,"give_id");
?>
<tr>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f7; ?></font>
</td>
<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font>
</td>
<!--<td>
<font style="font-weight:bold" face="Arial, Helvetica, sans-serif"><?php echo $f8; ?></font>
</td>-->
<td align="center">
	<?php echo $f0; ?>
</td>
</tr>
<?php
		$i++;
	};
?>
<?php
error_reporting(E_ERROR);
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
		echo "<td>"; ?> <img src = "<?php echo 'upload/'.$row["name"];?>" width='450' height='350'> <?php echo "</td>";
		echo "</tr>";
	}
}
echo "</table>";
?>
</table><br>

<form id="details" method="post" action="booking.php">
	Εισάγετε το μοναδικό αναγνωριστικό της αγγελίας που επιθυμείτε: <input type="text" id="g_id" name="g_id" />
	<button type="button" name="submit" onclick="booking(g_id.value); return false">Δες περισσότερα</button>
</form>
<div style="font-size:13pt"><b>Σελίδα</b>:
<?php
	if ($type2 == "Product")
	{
		$sql = "SELECT COUNT(username) FROM give_table WHERE type = '$type2'  AND (a_price <= '$price2' AND status = 'Active!')";
		$rs_result = mysql_query($sql);
		$row = mysql_fetch_row($rs_result);
		$total_records = $row[0];
		$total_pages = ceil($total_records / 5);
	}

	else if ($type2 == "Service")
	{
		$sql = "SELECT COUNT(username) FROM give_table WHERE type = '$type2'  AND (a_price <= '$price2' AND status = 'Active!')";
		$rs_result = mysql_query($sql);
		$row = mysql_fetch_row($rs_result);
		$total_records = $row[0];
		$total_pages = ceil($total_records / 5);
	}
	
	for ($i=1; $i<=$total_pages; $i++) {
				echo "<a href='process2.php?page=".$i."&type2=".$type2."&price2=".$price2."&points=".$points."&username=".$username."'>".$i."</a> ";
	};
?>
</div>
</div><br> 
<div id="keimeno">
</div>
<input type="hidden" value="<?php echo $username ;?>" id="user" />
<input type="hidden" value="<?php echo $points ;?>" id="point" />
<input type="hidden" value="<?php echo $g_id ;?>" id="give_id" />
<script>
	function booking(g_id) {
		
		var username = document.getElementById('user').value;
		var points = document.getElementById('point').value;
		var g_id = $("#details [name='g_id']").val();
		
		var xmlhttp;

		if (g_id == "")
		{
			document.getElementById("keimeno").innerHTML = "";
			return;
		}
		
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
				$('#control').hide();
			}
		}
		
		xmlhttp.open("GET","booking.php?g_id="+g_id+ "&username=" +username+ "&points=" +points,true);
		xmlhttp.send();
	}
</script>
<script>
		function show()
		{
			var x;
			var r=confirm("Αν είστε σίγουροι για την επιλογή σας πατήστε 'ΟΚ'. \n\nΘα σας αφαιρεθούν οι πόντοι που αντιστοιχούν στην εικονική αξία της αγγελίας και θα έχετε τη δυνατότητα να έρθετε σε επαφή με τον χρήστη που την έβαλε! \n\nΑν όχι πατήστε 'Cancel'.");
			if (r==true)
			{
				$('#control').show();
				$('#interest').hide();
				
				var g_id = $("#details [name='g_id']").val();
				var username = document.getElementById('user').value;
				var points = document.getElementById('point').value;
				var url = "f_book.php?g_id=" +g_id+ "&username=" +username+ "&points=" +points;
				
				$.ajax({
					url: url,
					type: "POST",
					dataType: 'json',
					success: function(){
						$("#details").resetForm();
						$("#give_details").resetForm();
					}
				});
			}
			else
			{
				$('#control').hide();
				$('#interest').show();
			}
		}
</script>
<script type="text/javascript">

function stopRKey(evt) {
  var evt = (evt) ? evt : ((event) ? event : null);
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
}

document.onkeypress = stopRKey;

</script> 
</body>
</html>