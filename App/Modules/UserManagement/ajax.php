<?
header ( 'Content-Type: text/plain' );
include_once "../App/Classes/users_class.php";
include_once "../App/Libraries/Helper.php";

$userms = new userm ( $ses_userId );
$Helper = new Helper ();

$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );
switch ($_action) {
	case "cek_old_pass" :
		$username = $Helper->replacetext ( $_POST ["username"] );
		$pass_old = $Helper->replacetext ( $_POST ["pass_old"] );
		$cek = $userms->cek_pass_old ( $username, $pass_old );
		echo $cek;
		exit ();
		break;
}
?>