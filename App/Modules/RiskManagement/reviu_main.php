<?
include_once "App/Classes/risk_class.php";
include_once "App/Classes/param_class.php";
include_once "App/Classes/auditee_class.php";

$risks = new risk ( $ses_userId );
$params = new param ( $ses_userId );
$auditees = new auditee ( $ses_userId );

if(isset($_POST["val_search"])){
	@session_start();
	$_SESSION['key_search'] = $Helper->replacetext($_POST["key_search"]);
	$_SESSION['val_search'] = $Helper->replacetext($_POST["val_search"]);
	$_SESSION['val_method'] = $method;
}

$key_search = @$_SESSION['key_search'];
$val_search = @$_SESSION['val_search'];
$val_method = @$_SESSION['val_method'];

if(@$method!=@$val_method){	
	$key_search = "";
	$val_search = "";
	$val_method = "";
}

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=risk_reviu";
$acc_page_request = "penetapan_acc.php";
$acc_page_request_detil = "penetapan_detil.php";
$list_page_request = "risk_view.php";

// ==== buat grid ===//
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

$grid = "App/Templates/Grids/grid_risiko.php";
$gridHeader = array ("Satuan Kerja", "Tahun", "Analisis", "Evaluasi");
$gridDetail = array ("auditee_name", "penetapan_tahun", "penetapan_profil_risk", "penetapan_profil_risk_residu");
$gridWidth = array ("50", "10", "10", "10");

$key_by = array ("Satuan Kerja", "Tahun", "Analisis", "Evaluasi");
$key_field = array ("auditee_name", "penetapan_tahun", "penetapan_profil_risk", "penetapan_profil_risk_residu");

$widthAksi = "10";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "view_monitoring" :
		$_SESSION ['ses_penetapan_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=risk_monitoring', '_self');</script>
<?
		break;
	case "getdetail" :
		$_nextaction = "poststatus";
		$page_request = $acc_page_request_detil;
		$ses_penetapan_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$page_title = "Detail Risiko";
		break;
	default :
		$recordcount = $risks->penetapan_count ("", $base_on_id_eks, $key_search, $val_search, $key_field);
		$rs = $risks->penetapan_view_grid ( "", $offset, $num_row, $base_on_id_eks, $key_search, $val_search, $key_field);
		$page_title = "Daftar Proses Manajemen Risiko";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
