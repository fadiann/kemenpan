<?
include_once "App/Classes/risk_class.php";
include_once "App/Classes/param_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/audit_plann_class.php";

$risks = new risk ( $ses_userId );
$params = new param ( $ses_userId );
$auditees = new auditee ( $ses_userId );
$plannings = new planning ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

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

$paging_request = "main.php?method=risk_result";
$page_request_plan = "main.php?method=risk_result&data_action=getplan";
$acc_page_request_detil = "risk_result_detil.php";
$acc_page_request = "risk_result_acc.php";
$list_page_request = "audit_view.php";

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
$gridWidth = array ("25", "10", "15", "15");

$key_by = array ("Satuan Kerja", "Tahun", "Analisis", "Evaluasi");
$key_field = array ("auditee_name", "penetapan_tahun", "penetapan_profil_risk", "penetapan_profil_risk_residu");

$widthAksi = "30";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "getplan" :
		$_nextaction = "postplan";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $risks->penetapan_data_viewlist ( $fdata_id );
		$page_title = "Tambah Perencanaan Audit";
		break;
	case "postplan" :
		$fpenetapan_id = $Helper->replacetext ( $_POST ["data_id"] );
		$fauditee_id = $Helper->replacetext ( $_POST ["auditee_id"] );
		$ftahun = $Helper->replacetext ( $_POST ["tahun"] );
		$auto_num = mt_rand(100000, 999999);
		$kode_plan = $ftahun."_".$auto_num;
		$ftujuan = $Helper->replacetext ( $_POST ["tujuan"] );
		$fperiode = $Helper->replacetext ( $_POST ["periode"] );
		$ftipe_audit = $Helper->replacetext ( $_POST ["tipe_audit"] );
		$ftanggal_awal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$count_plan_date = (($ftanggal_akhir - $ftanggal_awal) / 86400) + 1;
		$count_weekend = $Helper->cek_holiday ( $ftanggal_awal, $ftanggal_akhir );
		$hari_kerja = $count_plan_date - $count_weekend;
		if ($ftipe_audit != "" && $ftanggal_akhir != "") {
			$id = $plannings->uniq_id();
			$plannings->planning_add ( $id, $kode_plan, $ftipe_audit, $ftahun, $ftanggal_awal, $ftanggal_akhir, $hari_kerja, $ftujuan, $fperiode );
			$plannings->planning_add_auditee ( $id, $fauditee_id );
			$risks->update_status_pkat ( $fpenetapan_id );
			$Helper->js_alert_act ( 3 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
		<script>window.open('<?=$def_page_request?>', '_self');</script>
		<?
		$page_request = "blank.php";
		break;
	case "getdetail" :
		$page_request = $acc_page_request_detil;
		$ses_penetapan_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$page_title = "Detail Risiko";
		break;
	default :
		$recordcount = $risks->penetapan_count ( 'Audit', $base_on_id_eks, $key_search, $val_search, $key_field );
		$rs = $risks->penetapan_view_grid ( 'Audit', $offset, $num_row, $base_on_id_eks, $key_search, $val_search, $key_field );
		$page_title = "Daftar Profil Risiko";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
