<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/audit_plann_class.php";
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/param_class.php";

$auditors = new auditor ( $ses_userId );
$auditees = new auditee ( $ses_userId );
$plannings = new planning ( $ses_userId );
$assigns = new assign ( $ses_userId );
$params = new param ( $ses_userId );

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

$paging_request = "main.php?method=auditplan";
$acc_page_request = "audit_plan_acc.php";
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

$view_parrent = "";
$grid = "App/Templates/Grids/grid_audit.php";
$gridHeader = array ("Nama Kegiatan", "Obyek Audit", "Tipe Audit", "Rencana Kegiatan", "Tim Audit", "Status");
$gridDetail = array ("3","0", "1", "0", "0", "2");
$gridWidth = array ("15", "20", "10", "15", "5", "10");

$key_by = array ("Nama Kegiatan");
$key_field = array ("audit_plan_kegiatan");

$widthAksi  = "15";
$iconEdit   = "1";
$iconDel    = "1";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "getajukan" :
	case "getapprove" :
		$_nextaction = "postkomentar";
		$page_request = $acc_page_request;
		$id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$status = $Helper->replacetext ( $_REQUEST ["status_plan"] );
		
		$rs = $plannings->planning_viewlist ( $id );
		$page_title = "Pengajuan Perencanaan Audit";
		break;
	case "postkomentar" :
		$from = $Helper->replacetext ( $_POST ["data_from"] );
		$id_plann = $Helper->replacetext ( $_POST ["data_id"] );
		$status = $Helper->replacetext ( $_POST ["status_plan"] );
		$fkomentar = $Helper->replacetext ( $_POST ["komentar"] );
		
		$notif_date = $Helper->dateSql(date("d-m-Y"));
		$Helper->hapus_notif($id_plann);
		
		if ($status != "") {
			$group_menu_id = "";
			if ($status != "") {
				if($status=='1') { //ajukan
					$group_menu_id = '42';
				}elseif ($status=='3'){//tolak
					$group_menu_id = '41';
				}
				if($group_menu_id!=""){
					$rs_user_accept = $Helper->notif_user_all_bygroup($group_menu_id);
					while($arr_user_accept = $rs_user_accept->FetchRow()){
						$Helper->insert_notif($id_plann, $ses_userId, $arr_user_accept['user_id'], 'auditplan', "(Perencanaan Audit) ".$fkomentar, $notif_date);
					}
				}
				$plannings->planning_update_status ( $id_plann, $status, $from );
			}			
		}
		
		if ($status == '2') {
			$plannings->planning_add_assign ( $id_plann );
		}
		
		$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
		if ($fkomentar != "") {
			$plannings->planning_add_komentar ( $id_plann, $fkomentar, $ftanggal );
			$Helper->js_alert_act ( 3 );
		}
		echo "<script>window.open('".$def_page_request."', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "anggota_plan" :
		$_SESSION ['ses_plan_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=anggota_plan', '_self');</script>
<?
		break;
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Perencanaan Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $plannings->planning_viewlist ( $fdata_id );
		$page_title = "Ubah Perencanaan Audit";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $plannings->planning_viewlist ( $fdata_id );
		$page_title = "Rincian Perencanaan Audit";
		break;
	case "postadd" :
		$ftipe_audit 		= $Helper->replacetext ( $_POST ["tipe_audit"] );
		$fsub_type 			= $Helper->replacetext ( $_POST ["sub_type"] );
		$fauditee 			= $_POST ["auditee_id"];
		$ftahun 			= $Helper->replacetext ( $_POST ["tahun"] );
		$auto_num 			= mt_rand(100000, 999999);
		$kode_plan 			= $ftahun."_".$auto_num;
		$ftujuan 			= $Helper->replacetext ( $_POST ["tujuan"] );
		$fperiode 			= $Helper->replacetext ( $_POST ["periode"] );
		$fbiaya_audit 		= $Helper->replacetext ( $_POST ["biaya_audit"], true );
		$ftanggal_awal 		= $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir 	= $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$convert_tgl_awal 	= $Helper->date_db ($ftanggal_awal);
		$convert_tgl_akhir 	= $Helper->date_db ($ftanggal_akhir);
		$ftanggal_awal1 	= $Helper->date_db ($Helper->replacetext ( $_POST ["tanggal_awal"] ));
		$ftanggal_akhir1 	= $Helper->date_db ($Helper->replacetext ( $_POST ["tanggal_akhir"] ));
		$count_plan_date 	= (($convert_tgl_akhir - $convert_tgl_awal) / 86400) + 1;
		$count_weekend 		= $Helper->cek_holiday ( $convert_tgl_awal, $convert_tgl_akhir );
		$hari_kerja 		= $count_plan_date - $count_weekend;
		
		if ($ftipe_audit != "" && $ftahun != "" && $ftanggal_akhir != "") {
			$id_plann = $plannings->uniq_id ();
			$plannings->planning_add ( $id_plann, $kode_plan, $ftipe_audit, $ftahun, $ftanggal_awal, $ftanggal_akhir, $hari_kerja, $ftujuan, $fperiode, $fbiaya_audit, $fsub_type );
			//auditee
			$count_auditee = 0;
			$count_auditee = count($_POST ["auditee_id"]);
			for($i=0; $i<=$count_auditee ;$i++){
				@$fauditee_id 	= $Helper->replacetext ( $_POST ["auditee_id"][$i] );
				@$fjml_hari 		= $Helper->replacetext ( $_POST ["jml_hari"][$i] );
				if($fauditee_id!=""){
					$plannings->planning_add_auditee ( $id_plann, $fauditee_id, $fjml_hari );
				}
			}
			
			$Helper->js_alert_act ( 3 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		echo "<script>window.open('".$def_page_request."', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "postedit" :
		$fdata_id          = $Helper->replacetext ( $_POST ["data_id"] );
		$ftipe_audit       = $Helper->replacetext ( $_POST ["tipe_audit"] );
		$fsub_type         = $Helper->replacetext ( $_POST ["sub_type"] );
		$fauditee          = $_POST ["auditee_id"];
		$ftahun            = $Helper->replacetext ( $_POST ["tahun"] );
		$ftujuan           = $Helper->replacetext ( $_POST ["tujuan"] );
		$fperiode          = $Helper->replacetext ( $_POST ["periode"] );
		$fbiaya_audit      = $Helper->replacetext ( $_POST ["biaya_audit"], true );
		$ftanggal_awal     = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_awal"] ) );
		$ftanggal_akhir    = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal_akhir"] ) );
		$ftanggal_awal1    = $Helper->date_db ($Helper->replacetext ( $_POST ["tanggal_awal"] ));
		$ftanggal_akhir1   = $Helper->date_db ($Helper->replacetext ( $_POST ["tanggal_akhir"] ));
		$convert_tgl_awal  = $Helper->date_db ($ftanggal_awal);
		$convert_tgl_akhir = $Helper->date_db ($ftanggal_akhir);
		$count_plan_date   = (($convert_tgl_akhir - $convert_tgl_awal) / 86400) + 1;
		$count_weekend     = $Helper->cek_holiday ( $convert_tgl_awal, $convert_tgl_akhir );
		$hari_kerja        = $count_plan_date - $count_weekend;

		if ($ftipe_audit != "" && $ftahun != "" && $ftanggal_akhir != "") {
			$plannings->planning_edit ( $fdata_id, $ftipe_audit, $ftahun, $ftanggal_awal1, $ftanggal_akhir1, $hari_kerja, $ftujuan, $fperiode, $fbiaya_audit, $fsub_type );
			//auditee
			$count_auditee = 0;
			$count_auditee = count($fauditee);
			for($i=0;$i<=$count_auditee;$i++){
				$fid_plan_auditee = $Helper->replacetext ( $_POST ["plan_auditee_id"][$i] );
				$fauditee_id = $Helper->replacetext ( $_POST ["auditee_id"][$i] );
				$fjml_hari = $Helper->replacetext ( $_POST ["jml_hari"][$i] );
				if($fauditee_id!="" && $fid_plan_auditee!=""){
					$plannings->planning_edit_auditee ( $fid_plan_auditee, $fauditee_id, $fjml_hari);
				}else if($fauditee_id!="" && $fid_plan_auditee==""){
					$plannings->planning_add_auditee ( $fdata_id, $fauditee_id, $fjml_hari );
				}else{
					$plannings->planning_del_auditee( $fid_plan_auditee);
				}
			}
			$Helper->js_alert_act ( 1 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		// die();
		echo "<script>window.open('".$def_page_request."', '_self');</script>";
		$page_request = "blank.php";
		break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$plannings->planning_delete ( $fdata_id );
		$Helper->hapus_notif($fdata_id);
		$Helper->js_alert_act ( 2 );
		echo "<script>window.open('".$def_page_request."', '_self');</script>";
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $plannings->planning_count ($base_on_id_int, $key_search, $val_search, $key_field);
		$rs = $plannings->planning_view_grid ($base_on_id_int, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Perencanaan Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>