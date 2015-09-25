<html lang="el" xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
	<title>Εγγραφή στο Deal-land!</title>
	<link media="all" type="text/css" href="http://www.inf.uth.gr/cced/wp-admin/css/wp-admin.min.css?ver=3.5.1" id="wp-admin-css" rel="stylesheet">
	<link media="all" type="text/css" href="http://www.inf.uth.gr/cced/wp-includes/css/buttons.min.css?ver=3.5.1" id="buttons-css" rel="stylesheet">
	<link media="all" type="text/css" href="http://www.inf.uth.gr/cced/wp-admin/css/colors-fresh.min.css?ver=3.5.1" id="colors-fresh-css" rel="stylesheet">
	<script src="http://www.inf.uth.gr/cced/wp-includes/js/jquery/jquery.js?ver=1.8.3" type="text/javascript"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<link href="http://www.inf.uth.gr/cced/wp-content/plugins/bm-custom-login/bm-custom-login.css" type="text/css" rel="stylesheet"><style>	
	#login {
		background: none repeat scroll 0 0 #FFFFFF;
		border: 2px solid #E5E5E5;
		box-shadow: 1px 4px 10px -1px rgba(200, 200, 200, 0.7);
		font-weight: normal;
		margin-top: 80px;
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
</style>
<meta content="noindex,nofollow" name="robots">
<script>
	function Finish(email,username,password,re_password,birth) {

		/*var errors = '';

		var email = $("#registerform [name='email']").val();
		if (email == "") {
			errors += '- Παρακαλώ εισάγετε το email σας\n';
		}
		
		var username = $("#registerform [name='username']").val();
		if (username == "") {
			errors += '- Παρακαλώ εισάγετε το όνομα χρήστη που επιθυμείτε\n';
		}

		var password = $("#registerform [name='password']").val();
		if (password == "") {
			errors += '- Παρακαλώ εισάγετε το συνθηματικό που επιθυμείτε\n';
		}
		
		var re_password = $("#registerform [name='re_password']").val();
		if (re_password == "") {
			errors += '- Παρακαλώ εισάγετε δεύτερη φορά το συνθηματικό σας για επιβεβαίωση\n';
		}
		
		var birth = $("#registerform [name='birth']").val();
		if (birth == "") {
			errors += '- Παρακαλώ εισάγετε το έτος γέννησης σας\n';
		}

		if (errors) {
			errors = 'Διαπιστώθηκαν τα παρακάτω σφάλματα: \n' + errors;
			alert(errors);
			return false;
		}*/
	}
</script>
</head>
	<body class="login login-action-login wp-core-ui">
	<div id="login" align='center'>
	<font size="2"></font>
<form action="Finish.php" method="POST" id="registerform" name="registerform">
Email(*): <input type="text" name="email" /></br>
Όνομα Χρήστη(*): <input type="text" name="username" /></br>
<label for="user_pass"><font size="2">Συνθηματικό(*): </font><br>
			<input type="password" size="20" value="" class="input" id="user_pass" name="password"></label>
<label for="user_repass"><font size="2">Επανέλαβε Συνθηματικό(*): </font><br>
			<input type="password" size="20" value="" class="input" id="user_repass" name="re_password"></label></br>
<p class="submit">
	<input type="submit" value="Εγγραφή" onclick="Finish(email.value,username.value,password.value,re_password.value)" class="button button-primary button-large" id="wp-submit" name="wp-submit"></input>
	<input type="hidden" value="index.php" name="redirect_to">
	<input type="hidden" value="1" name="testcookie">
</p>

</form>
<p align='center' style="padding-top:5px">Με (*) τα υποχρεωτικά πεδία</p>
<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();
</script>

</div>

	<link media="all" type="text/css" href="http://www.inf.uth.gr/cced/wp-content/uploads/formidable/css/formidablepro.css?ver=1.06.08" id="frm-forms0-css" rel="stylesheet">
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready( function($) {
	$("ul.menu").not(":has(li)").closest('div').prev('h3.widget-title').hide();
});
/* ]]> */
</script>
</body></html>