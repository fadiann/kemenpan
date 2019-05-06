<?
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/finding_class.php";
include_once "App/Classes/kertas_kerja_class.php";
include_once "App/Classes/rekomendasi_class.php";
include_once "App/Classes/param_class.php";

$assigns = new assign ( $ses_userId );
$kertas_kerjas = new kertas_kerja ( $ses_userId );
$findings = new finding ( $ses_userId );
$rekomendasis = new rekomendasi ( $ses_userId );
$params = new param ( $ses_userId );

$ses_assign_id = $_SESSION ['ses_assign_id'];
@$ses_kka_id = $_SESSION ['ses_kka_id'];

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

if ($method == 'finding_kka') {
	$paging_request = "main.php?method=finding_kka";
} else {
	$paging_request = "main.php?method=finding";
}
$acc_page_request = "finding_acc.php";
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

$view_parrent = "assign_view_parrent.php";
$grid = "App/Templates/Grids/grid_finding.php";
$gridHeader = array ("No Temuan", "Judul Temuan", "Satuan Kerja", "Rekomendasi", "Status");
$gridDetail = array ("finding_no", "finding_judul", "auditee_name", "finding_id", "finding_status");
$gridWidth = array ("10", "40", "15", "10", "10");

$key_by = array ("No Temuan", "Judul Temuan", "Satuan Kerja");
$key_field = array ("finding_no", "finding_judul", "auditee_name");

$widthAksi = "15";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "getajukan_temuan" :
	case "getapprove_temuan" :
		$_nextaction = "postkomentar";
		$page_request = $acc_page_request;
		$id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$status = $Helper->replacetext ( $_REQUEST ["status_temuan"] );
		
		$rs = $findings->finding_viewlist ( $id );
		$page_title = "Reviu Temuan";
		break;
	case "postkomentar" :
		$id_temuan = $Helper->replacetext ( $_POST ["data_id"] );
		$fkomentar = $Helper->replacetext ( $_POST ["komentar"] );
		$status = $Helper->replacetext ( $_POST ["status_temuan"] );
		$program_id_find = $Helper->replacetext ( $_POST ["program_id_find"] );
		
		$Helper->hapus_notif($id_temuan);
		if ($status != "") {
			if($status==1){ 
				$get_user_id = $kertas_kerjas->get_user_by_posisi($program_id_find, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
				$notif_to_user_id = $get_user_id; //ke katim
			}elseif($status==2){ 
				$get_user_id = $kertas_kerjas->get_user_by_posisi($program_id_find, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
				$notif_to_user_id = $get_user_id; //ke dalnis
			}elseif($status==5){ 
				$get_user_id = $kertas_kerjas->get_user_owner($program_id_find);
				$notif_to_user_id = $get_user_id; //ke anggota
			}elseif($status==3){ 
				$get_user_id = $kertas_kerjas->get_user_by_posisi($program_id_find, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
				$notif_to_user_id = $get_user_id; //ke daltu
			}elseif($status==6){ 
				$get_user_id = $kertas_kerjas->get_user_by_posisi($program_id_find, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
				$notif_to_user_id = $get_user_id; //ke katim
			}elseif($status==7){ 
				$get_user_id = $kertas_kerjas->get_user_by_posisi($program_id_find, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
				$notif_to_user_id = $get_user_id; //ke dalnis
			}
			if($notif_to_user_id!=""){
				$Helper->insert_notif($id_temuan, $ses_userId, $notif_to_user_id, 'kertas_kerja', '(Temuan)...'.$fkomentar, $Helper->date_db(date('d-m-Y')));
			}
			$findings->finding_update_status ( $id_temuan, $status );
		}
		
		$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
		if ($fkomentar != "") {
			$findings->finding_add_komentar ( $id_temuan, $fkomentar, $ftanggal );
			$Helper->js_alert_act ( 3 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "rekomendasi" :
		$_SESSION ['ses_finding_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=rekomendasi', '_self');</script>
<?
		break;
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Temuan Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $findings->finding_viewlist ( $fdata_id );
		$page_title = "Ubah Temuan Audit";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $findings->finding_viewlist ( $fdata_id );
		$page_title = "Rincian Temuan Audit";
		break;
	case "postadd" :
		$ffinding_auditee = $Helper->replacetext ( $_POST ["finding_auditee"] );
		$ffinding_no = $Helper->replacetext ( $_POST ["finding_no"] );
		$ffinding_type = $Helper->replacetext ( $_POST ["finding_type"] );
		$ffinding_sub_id = $Helper->replacetext ( $_POST ["finding_sub_id"] );
		$ffinding_jenis_id = $Helper->replacetext ( $_POST ["finding_jenis_id"] );
		$ffinding_penyebab_id = $Helper->replacetext ( $_POST ["finding_penyebab_id"] );
		$ffinding_judul = $Helper->replacetext ( $_POST ["finding_judul"] );
		$ffinding_date = $Helper->date_db ( $Helper->replacetext ( $_POST ["finding_date"] ) );
		$ffinding_kondisi = $Helper->replacetext ( $_POST ["finding_kondisi"] );
		$ffinding_kriteria = $Helper->replacetext ( $_POST ["finding_kriteria"] );
		$ffinding_sebab = $Helper->replacetext ( $_POST ["finding_sebab"] );
		$ffinding_akibat = $Helper->replacetext ( $_POST ["finding_akibat"] );
		$ftanggapan_auditee = $Helper->replacetext ( $_POST ["tanggapan_auditee"] );
		$ftanggapan_auditor = $Helper->replacetext ( $_POST ["tanggapan_auditor"] );
		$ffinding_nilai = $Helper->replacetext ( $_POST ["finding_nilai"] );
		$ffinding_attachment = $Helper->replacetext ( $_FILES ["finding_attach"] ["name"] );
		if ($ffinding_auditee != "" && $ffinding_no != "" && $ffinding_judul != "" && $ffinding_date != "" && $ffinding_jenis_id != "") {
			$findings->finding_add ( $ses_assign_id, $ffinding_auditee, $ffinding_no, $ffinding_type, $ffinding_sub_id, $ffinding_jenis_id, $ffinding_judul, $ffinding_date, $ffinding_kondisi, $ffinding_kriteria, $ffinding_sebab, $ffinding_akibat, $ffinding_attachment, $ses_kka_id, $ftanggapan_auditee, $ftanggapan_auditor, $ffinding_penyebab_id, $ffinding_nilai );
			$Helper->UploadFile ( "Upload_Temuan", "finding_attach", "" );
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
		$ffinding_auditee = $Helper->replacetext ( $_POST ["finding_auditee"] );
		$ffinding_no = $Helper->replacetext ( $_POST ["finding_no"] );
		$ffinding_type = $Helper->replacetext ( $_POST ["finding_type"] );
		$ffinding_sub_id = $Helper->replacetext ( $_POST ["finding_sub_id"] );
		$ffinding_jenis_id = $Helper->replacetext ( $_POST ["finding_jenis_id"] );
		$ffinding_penyebab_id = $Helper->replacetext ( $_POST ["finding_penyebab_id"] );
		$ffinding_judul = $Helper->replacetext ( $_POST ["finding_judul"] );
		$ffinding_date = $Helper->date_db ( $Helper->replacetext ( $_POST ["finding_date"] ) );
		$ffinding_kondisi = $Helper->replacetext ( $_POST ["finding_kondisi"] );
		$ffinding_kriteria = $Helper->replacetext ( $_POST ["finding_kriteria"] );
		$ffinding_sebab = $Helper->replacetext ( $_POST ["finding_sebab"] );
		$ffinding_akibat = $Helper->replacetext ( $_POST ["finding_akibat"] );
		$ftanggapan_auditee = $Helper->replacetext ( $_POST ["tanggapan_auditee"] );
		$ftanggapan_auditor = $Helper->replacetext ( $_POST ["tanggapan_auditor"] );
		$ffinding_nilai = $Helper->replacetext ( $_POST ["finding_nilai"] );
		$ffinding_attachment = $Helper->replacetext ( $_FILES ["finding_attach"] ["name"] );
		$ffinding_attach_old = $Helper->replacetext ( $_POST ["finding_attach_old"] );
		if ($ffinding_auditee != "" && $ffinding_no != "" && $ffinding_judul != "" && $ffinding_date != "" && $ffinding_jenis_id != "") {
			if (! empty ( $ffinding_attachment )) {
				$Helper->UploadFile ( "Upload_Temuan", "finding_attach", $ffinding_attach_old );
			} else {
				$ffinding_attachment = $ffinding_attach_old;
			}
			$findings->finding_edit ( $fdata_id, $ffinding_auditee, $ffinding_no, $ffinding_type, $ffinding_sub_id, $ffinding_jenis_id, $ffinding_judul, $ffinding_date, $ffinding_kondisi, $ffinding_kriteria, $ffinding_sebab, $ffinding_akibat, $ffinding_attachment, $ftanggapan_auditee, $ftanggapan_auditor, $ffinding_penyebab_id, $ffinding_nilai );
			$Helper->js_alert_act ( 1 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$findings->finding_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $findings->finding_count ( $ses_assign_id, $ses_kka_id, $key_search, $val_search, $key_field );
		$rs = $findings->finding_view_grid ( $ses_assign_id, $ses_kka_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Temuan Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
