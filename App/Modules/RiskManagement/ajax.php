<?
header ( 'Content-Type: text/plain' );

$position = 2;
include_once "../../Classes/report_class.php";
include_once "../../Classes/param_class.php";
include_once "../../Classes/auditor_class.php";
include_once "../../Classes/program_audit_class.php";
include_once "../../Libraries/Helper.php";
include_once "../../Classes/finding_class.php";
include_once "../../Classes/dashboard_class.php";
include_once "../../Classes/assignment_class.php";
include_once "../../Classes/rekomendasi_class.php";
include_once "../../Classes/risk_class.php";

$risks 	= new risk ();
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
	case "delete_identifikasi" :
		$id 		= $Helper->replacetext($_REQUEST['id']);
		$id_idn 	= $Helper->replacetext($_REQUEST['id_idn']);
		$count_idn	= $risks->cek_identifikasi($id_idn);
		if($count_idn > 1){
			$result = $risks->identifikasi_detail_delete($id);
		}else{
			$result	= 1;
		}
		echo $result;
		exit ();
		break;
}
?>