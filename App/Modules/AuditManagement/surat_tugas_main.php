<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/assignment_class.php";

$auditors = new auditor ( $ses_userId );
$auditees = new auditee ( $ses_userId );
$assigns = new assign ( $ses_userId );

$ses_assign_id = $_SESSION ['ses_assign_id'];

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

$paging_request 	= "main.php?method=surattugas";
$acc_page_request 	= "surat_tugas_acc.php";
$surat_page_request = "surat_tugas.php";
$list_page_request 	= "audit_view.php";

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

$grid = "App/Templates/Grids/grid_surat.php";
$gridHeader = array ("Satuan Kerja", "Tanggal Audit", "No Surat Tugas", "Tanggal Surat Tugas", "Penandatangan", "Status");
$gridDetail = array ("assign_surat_id_assign", "0", "assign_surat_no", "assign_surat_tgl", "auditor_name", "status");
$gridWidth = array ("25", "14", "14", "9", "16", "10");

$key_by = array ("No Surat Tugas", "Penandatangan", "Status");
$key_field = array ("assign_surat_no", "auditor_name", "status");

$widthAksi = "10";
$iconDetail = "0";
// === end grid ===//

$rs_assign = $assigns->assign_viewlist( $ses_assign_id );
$arr_assign = $rs_assign->FetchRow();

switch ($_action) {
	case "viewsurattugas" :
		$_nextaction = "postkomentar";
		$page_request = $surat_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $assigns->surat_assign_viewlist ( $fdata_id );
		$page_title = "SURAT TUGAS";
		break;
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Surat Tugas";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $assigns->surat_tugas_viewlist ( $fdata_id );
		$page_title = "Ubah Surat Tugas";
		break;
	case "getdetail" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		echo "<script>window.open('" . $acc_page_request_detil . "&auditor=" . $fdata_id . "', '_self');</script>";
		break;
	case "postadd" :
		$fno_surat = $Helper->replacetext ( $_POST ["no_surat"] );
		$ftanggal_surat = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_surat"] ) );
		$fttd_id = $Helper->replacetext ( $_POST ["ttd_id"] );
		$fjabatan_surat = $Helper->replacetext ( $_POST ["jabatan_surat"] );
		$ftembusan = $Helper->replacetext ( $_POST ["tembusan"] );
		if ($fno_surat != "" && $ftanggal_surat != "" && $fttd_id != "" && $fjabatan_surat != "") {
			$id_surat_tugas = $assigns->uniq_id();
			$assigns->surat_tugas_add ( $ses_assign_id, $id_surat_tugas, $fno_surat, $ftanggal_surat, $fttd_id, $fjabatan_surat, $ftembusan );
			$Helper->js_alert_act ( 3 );
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
		$fno_surat = $Helper->replacetext ( $_POST ["no_surat"] );
		$ftanggal_surat = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_surat"] ) );
		$fttd_id = $Helper->replacetext ( $_POST ["ttd_id"] );
		$fjabatan_surat = $Helper->replacetext ( $_POST ["jabatan_surat"] );
		$ftembusan = $Helper->replacetext ( $_POST ["tembusan"] );
		if ($fno_surat != "" && $ftanggal_surat != "" && $fttd_id != "" && $fjabatan_surat != "") {
			$assigns->surat_tugas_edit ( $fdata_id, $fno_surat, $ftanggal_surat, $fttd_id, $fjabatan_surat, $ftembusan );
			
			$Helper->js_alert_act ( 1 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "postkomentar" :
		$id_surat = $Helper->replacetext ( $_POST ["data_id"] );
		$status = $Helper->replacetext ( $_POST ["status"] );
		$fkomentar = $Helper->replacetext ( $_POST ["komentar"] );
		$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
		
		$notif_date = $Helper->dateSql(date("d-m-Y"));
		$Helper->hapus_notif($id_surat);
		
		if ($status != "") {
			$group_menu_id = "";
			if ($status != "") {
				if($status=='1') { //ajukan
					$group_menu_id = '121';
				}elseif ($status=='3'){//tolak
					$group_menu_id = '120';
				}
				if($group_menu_id!=""){
					$rs_user_accept = $Helper->notif_user_all_bygroup($group_menu_id);
					while($arr_user_accept = $rs_user_accept->FetchRow()){
						$Helper->insert_notif($id_surat, $ses_userId, $arr_user_accept['user_id'], 'surattugas', "(Surat Tugas) ".$fkomentar, $notif_date);
					}
				}
				$assigns->surat_tugas_update_status ( $id_surat, $status, $ftanggal );
			}			
		}
		
		if ($fkomentar != "") {
			$assigns->surat_tugas_add_komentar ( $id_surat, $fkomentar, $ftanggal );
			$Helper->js_alert_act ( 3 );
		}
		?>
		<script>window.open('<?=$def_page_request?>', '_self');</script>
		<?
		$page_request = "blank.php";
		break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$assigns->surat_tugas_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $assigns->surat_tugas_count ( $ses_assign_id, $key_search, $val_search, $key_field);
		if($recordcount<>0) $iconAdd = "0";
		$rs = $assigns->surat_tugas_view_grid ( $ses_assign_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Surat Tugas";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
