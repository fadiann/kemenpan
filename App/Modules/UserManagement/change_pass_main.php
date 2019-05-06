<?
include_once "App/Classes/users_class.php";
$userms = new userm ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php";
$acc_page_request = "change_pass_acc.php";

switch ($_action) {
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$page_title = "Ubah Password";
		break;
	case "postedit" :
		$fdata_id = $Helper->replacetext ( $_POST ["cuser_id"] );
		$fname = $Helper->replacetext ($_POST ["name"] );
		$fpassword_old = $Helper->replacetext ( $_POST ["password_old"] );
		$fpassword_new = $Helper->replacetext ( $_POST ["password_new"] );
		$fpassword_confirm_new = $Helper->replacetext ( $_POST ["password_confirm_new"] );
		if ($fname != "" && $fpassword_old != "") {
			if ($fpassword_new == $fpassword_confirm_new) {
				$userms->users_change_pass ( $fdata_id, $fname, $fpassword_new );
				$Helper->js_alert_act ( 1 );
			} else {
				$Helper->js_alert_act ( 6 );
			}
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
		<script>window.open('<?=$def_page_request?>', '_self');</script>
		<?
		$page_request = "blank.php";
		break;
	default :
		$page_request = "blank.php";
		break;
}
include_once $page_request;
?>
