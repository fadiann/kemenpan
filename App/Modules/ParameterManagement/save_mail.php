<?php 

include_once "App/Classes/param_class.php";

$params = new param ( $ses_userId );

foreach ($_POST as $key => $value) {
	// echo $key .'=>'. $value;
	$params->save_mail_data($key, $value);
}

$Helper->js_alert_act ( 1 );

$def_page_request = "main.php?method=par_email";

?>
<script>window.open('<?=$def_page_request?>', '_self');</script>