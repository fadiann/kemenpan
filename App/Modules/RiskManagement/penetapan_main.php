<?
include_once "App/Classes/risk_class.php";
include_once "App/Classes/param_class.php";
include_once "App/Classes/auditee_class.php";

$risks = new risk ( $ses_userId );
$params = new param ( $ses_userId );
$auditees = new auditee ( $ses_userId );

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

$paging_request = "main.php?method=risk_penetapantujuan";
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
$gridHeader = array ("Satuan Kerja", "Tahun", "Identifikasi", "Analisis", "Evaluasi", "Penanganan");
$gridDetail = array ("auditee_name", "penetapan_tahun", "penetapan_id", "penetapan_profil_risk", "penetapan_profil_risk_residu", "penetapan_id");
$gridWidth = array ("30", "8", "9", "9", "9", "10");

$key_by = array ("Satuan Kerja", "Tahun", "Analisis", "Evaluasi");
$key_field = array ("auditee_name", "penetapan_tahun", "penetapan_profil_risk", "penetapan_profil_risk_residu");

$widthAksi = "15";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "risk_identifikasi" :
		$_SESSION ['ses_penetapan_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=risk_identifikasi', '_self');</script>
<?
		break;
	case "view_analisa" :
		$_SESSION ['ses_penetapan_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=risk_analisa&data_action=getadd', '_self');</script>
<?
		break;
	case "view_evaluasi" :
		$_SESSION ['ses_penetapan_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=risk_evaluasi&data_action=getadd', '_self');</script>
<?
		break;
	case "view_penanganan" :
		$_SESSION ['ses_penetapan_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=risk_penanganan&data_action=getadd', '_self');</script>
<?
		break;
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Penetapan Tujuan";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $risks->penetapan_data_viewlist ( $fdata_id );
		$page_title = "Ubah Penetapan Tujuan";
		break;
	case "getdetail" :
		$_nextaction = "poststatus";
		$page_request = $acc_page_request_detil;
		$ses_penetapan_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$page_title = "Detail Risiko";
		break;
	case "postadd" :
		$fsatker = $Helper->replacetext ( $_POST ["satker"] );
		$ftahun = $Helper->replacetext ( $_POST ["tahun"] );
		$fnama = $Helper->replacetext ( $_POST ["nama"] );
		$ftujuan = $Helper->replacetext ( $_POST ["tujuan"] );
		if ($fsatker != "" && $ftahun != "" && $fnama != "" && $ftujuan != "") {
			$cek_satker = $risks->cek_satker_tahun($fsatker, $ftahun);
			if($cek_satker==0){
				$risks->penetapan_add ( $fsatker, $ftahun, $fnama, $ftujuan );
				$Helper->js_alert_act ( 3 );
			}else{
				$Helper->js_alert_act ( 4, "Satker Sudah Ada Pada Tahun Ini");
			}
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "postedit" :
		$fdata_id = $Helper->replacetext ( $_POST ["data_id"] );
		$fsatker = $Helper->replacetext ( $_POST ["satker"] );
		$ftahun = $Helper->replacetext ( $_POST ["tahun"] );
		$fnama = $Helper->replacetext ( $_POST ["nama"] );
		$ftujuan = $Helper->replacetext ( $_POST ["tujuan"] );
		if ($fsatker != "" && $ftahun != "" && $fnama != "" && $ftujuan != "") {
			$cek_satker = $risks->cek_satker_tahun($fsatker, $ftahun, $fdata_id);
			if($cek_satker==0){
				$risks->penetapan_edit ( $fdata_id, $fsatker, $ftahun, $fnama, $ftujuan );
				$Helper->js_alert_act ( 1 );
			}else{
				$Helper->js_alert_act ( 4, "Satker Sudah Ada Pada Tahun Ini");
			}
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "poststatus" :

		$_nextaction = "postkomentar";
		$page_request = $acc_page_request_detil;
		
		$ses_penetapan_id = $Helper->replacetext ( $_POST ["penetapan_id"] );
		$fstatus_risiko = $Helper->replacetext ( $_POST ["status_risk"] );
		
		$page_title = "Reviu Penetapan Tujuan";
		break;
		/*
		
		$fpenetapan_id = $Helper->replacetext ( $_POST ["penetapan_id"] );
		$fstatus_risiko = $Helper->replacetext ( $_POST ["status_risk"] );
		$risks->update_status_risiko ( $fpenetapan_id, $fstatus_risiko );
		if($fstatus_risiko==1) $Helper->js_alert_act ( 7 );
		if($fstatus_risiko==2) $Helper->js_alert_act ( 8 );
		if($fstatus_risiko==3) $Helper->js_alert_act ( 9 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
*/
		case "postkomentar" :
			$id_risk = $Helper->replacetext ( $_POST ["penetapan_id"] );
			$status = $Helper->replacetext ( $_POST ["status_resiko"] );
			$fkomentar = $Helper->replacetext ( $_POST ["komentar"] );
			$notif_date = $Helper->dateSql(date("d-m-Y"));
			$Helper->hapus_notif($id_risk);
			$group_menu_id = "";
			if ($status != "") {
				if($status=='1') { //ajukan
					$group_menu_id = '93';
				}elseif ($status=='3'){//tolak
					$group_menu_id = '92';
				}
				if($group_menu_id!=""){
					$rs_user_accept = $Helper->notif_user_all_bygroup($group_menu_id);
					while($arr_user_accept = $rs_user_accept->FetchRow()){
						$Helper->insert_notif($id_risk, $ses_userId, $arr_user_accept['user_id'], 'risk_penetapantujuan', "(Profil Risiko) ".$fkomentar, $notif_date);
					}
				}
				$risks->update_status_risiko ( $id_risk, $status );
			}
		
			$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
			if ($fkomentar != "") {
				$risks->risk_add_komentar ( $id_risk, $fkomentar, $ftanggal );
				$Helper->js_alert_act ( 3 );
			}
			?>
		<script>window.open('<?=$def_page_request?>', '_self');</script>
		<?
				$page_request = "blank.php";
				break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$risks->penetapan_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
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
