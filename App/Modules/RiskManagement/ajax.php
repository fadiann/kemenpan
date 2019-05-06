<?
header ( 'Content-Type: text/plain' );

include_once "../App/Classes/risk_class.php";
include_once "../App/Libraries/Helper.php";

$risks = new risk ();
$Helper = new Helper ();

$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );
switch ($_action) {
	case "cek_penanganan" :
		$status = $Helper->replacetext ( $_POST ["id_penanganan"] );
		$cek_status = $risks->cek_status_penanganan ( $status );
		echo $cek_status;
		exit ();
		break;
	
	case "getval_rr" :
		$fvalue_ri = $Helper->replacetext ( $_POST ["nilai_ri"] );
		$fvalue_pi = $Helper->replacetext ( $_POST ["nilai_pi"] );
		$val_rr = $risks->get_val_rr ( $fvalue_ri, $fvalue_pi );
		echo $val_rr;
		exit ();
		break;
}
?>