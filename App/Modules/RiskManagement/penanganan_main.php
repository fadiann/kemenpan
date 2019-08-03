<?
include_once "App/Classes/risk_class.php";
include_once "App/Classes/param_class.php";

$risks = new risk ( $ses_userId );
$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$ses_penetapan_id = $_SESSION ['ses_penetapan_id'];

$paging_request = "main.php?method=risk_penetapantujuan";
$acc_page_request = "penanganan_acc.php";

$num_row = 10;
@$str_page = $Helper->replacetext ( $_GET ['page'] );
if (isset ( $str_page )) {
	if (is_numeric ( $str_page ) && $str_page != 0) {
		$noPage = $str_page;
	} else {
		$noPage = 1;
	}
} else {
	$noPage = 1;
}
$offset = ($noPage - 1) * $num_row;

$def_page_request = $paging_request . "&page=$noPage";

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Rencana Tindak Pengendalian";
		break;
	case "postadd" :
		$no = 0;
		$rs_kategori = $params->risk_kategori_data_viewlist ();
		while ( $arr_kategori = $rs_kategori->FetchRow () ) {
			$x = 0;
			$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
			$countKat = $rs_iden->RecordCount ();
			while ( $arr_iden = $rs_iden->FetchRow () ) {
				$no ++;
				$pil_penanganan = $Helper->replacetext ( $_POST ["pil_penanganan_$no"] );
				$penanganan     = $Helper->replacetext ( $_POST ["penanganan_$no"] );
				$date           = $Helper->date_db ( $Helper->replacetext ( $_POST ["date_$no"] ) );
				$pic_id         = $Helper->replacetext ( $_POST ["pic_$no"] );
				$rs_cek         = $params->risk_penanganan_data_viewlist ( $pil_penanganan );
				$arr_cek        = $rs_cek->fetchRow ();
				$cek_penanganan = $arr_cek ['risk_penanganan_status'];
				// var_dump($_POST);
				// die();
				// if ($cek_penanganan != 1) {
				// 	$penanganan = "";
				// 	$date       = "";
				// 	$pic_id     = "";
				// }
				$risks->update_penanganan ( $arr_iden ['identifikasi_id'], $pil_penanganan, $penanganan, $date, $pic_id );
			}
		}
		$Helper->js_alert_act ( 3 );
		echo "<script>window.open('main.php?method=risk_penanganan&data_action=getadd', '_self');</script>";
		$page_request = "blank.php";
		break;
}
include_once $page_request;
?>
