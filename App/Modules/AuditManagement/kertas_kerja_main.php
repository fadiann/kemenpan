<?
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/program_audit_class.php";
include_once "App/Classes/kertas_kerja_class.php";
include_once "App/Classes/finding_class.php";


$assigns = new assign ( $ses_userId );
$programaudits = new programaudit ( $ses_userId );
$kertas_kerjas = new kertas_kerja ( $ses_userId );
$findings = new finding ( $ses_userId );

$ses_program_id = $_SESSION ['ses_program_id'];

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

$paging_request = "main.php?method=kertas_kerja";
$acc_page_request = "kertas_kerja_acc.php";
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

$rs_assign = $kertas_kerjas->getdata_assign( $ses_program_id );
$arr_assign = $rs_assign->FetchRow();

$def_page_request = $paging_request . "&page=$noPage";

$view_parrent = "kertas_kerja_view_parrent.php";
$grid = "App/Templates/Grids/grid_kka.php";
$gridHeader = array ("No KKA", "Kesimpulan", "Tanggal", "Status", "Temuan Audit");
$gridDetail = array ("kertas_kerja_no", "kertas_kerja_kesimpulan", "kertas_kerja_date", "kertas_kerja_status", "kertas_kerja_id");
$gridWidth = array ("15", "35", "10", "10", "10");

$key_by = array ("No KKA", "Kesimpulan");
$key_field = array ("kertas_kerja_no", "kertas_kerja_kesimpulan");

$widthAksi = "15";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "getajukan_kka" :
	case "getapprove_kka" :
		$_nextaction = "postkomentar";
		$page_request = $acc_page_request;
		$id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$status = $Helper->replacetext ( $_REQUEST ["status_kka"] );
		$rs = $kertas_kerjas->kertas_kerja_viewlist ( $id );
		$page_title = "Reviu Kertas Kerja";
		break;
	case "postkomentar" :
		$id_kka = $Helper->replacetext ( $_POST ["data_id"] );
		
		$status = $Helper->replacetext ( $_POST ["status_kka"] );
		$fkomentar = $Helper->replacetext ( $_POST ["komentar"] );

		$Helper->hapus_notif($id_kka);
		if ($status != "") {
			if($status==1){ 
				$get_user_id = $kertas_kerjas->get_user_by_posisi($ses_program_id, '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7');
				$notif_to_user_id = $get_user_id; //ke katim
			}elseif($status==3){ 
				$get_user_id = $kertas_kerjas->get_user_owner($ses_program_id);
				$notif_to_user_id = $get_user_id; //ke anggota
			}
			if($notif_to_user_id!=""){
				$Helper->insert_notif($id_kka, $ses_userId, $notif_to_user_id, 'kertas_kerja', '(Kertas Kerja)...'.$fkomentar, $Helper->date_db(date('d-m-Y')));
			}
			
			$kertas_kerjas->kka_update_status ( $id_kka, $status );

			$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
			if ($fkomentar != "") {
				$kertas_kerjas->kka_add_komentar ( $id_kka, $fkomentar, $ftanggal );
				$Helper->js_alert_act ( 3 );
			}
		}else{
			$Helper->js_alert_act ( 10 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "finding_kka" :
		$_SESSION ['ses_kka_id'] = $Helper->replacetext ( $_REQUEST ["data_id"] );
		?>
<script>window.open('main.php?method=finding_kka', '_self');</script>
<?
		break;
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Kertas Kerja Audit";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $kertas_kerjas->kertas_kerja_viewlist ( $fdata_id );
		$page_title = "Ubah Kertas Kerja Audit";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $kertas_kerjas->kertas_kerja_viewlist ( $fdata_id );
		$page_title = "Rincian Kertas Kerja Audit";
		break;
	case "postadd" :
		$id_kka = $kertas_kerjas->uniq_id();
		$fno_kka = $Helper->replacetext ( $_POST ["no_kka"] );
		$fkertas_kerja = $Helper->replacetext ( $_POST ["kertas_kerja"] );
		$fkesimpulan = $Helper->replacetext ( $_POST ["kesimpulan"] );
		$fkertas_kerja_date = $Helper->date_db ( $Helper->replacetext ( $_POST ["kertas_kerja_date"] ) );
		$fkka_attach = $_FILES ["kka_attach"] ["name"];
		$jml_attach = count($fkka_attach);
		if ($fno_kka != "" && $fkertas_kerja_date != "") {
			$kertas_kerjas->kertas_kerja_add ( $id_kka, $ses_program_id, $fno_kka, $fkertas_kerja, $fkesimpulan, $fkertas_kerja_date, "Pindah ke table kka_attach" );
			for($i=0;$i<$jml_attach;$i++){
				if($fkka_attach[$i]!="") {
					$Helper->UploadFileMulti ( "Upload_KKA", "kka_attach");
					$kertas_kerjas->insert_lampiran_kka ($id_kka, $fkka_attach[$i] );
				}
			}
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
		$fno_kka = $Helper->replacetext ( $_POST ["no_kka"] );
		$fkertas_kerja = $Helper->replacetext ( $_POST ["kertas_kerja"] );
		$fkesimpulan = $Helper->replacetext ( $_POST ["kesimpulan"] );
		$fkertas_kerja_date = $Helper->date_db ( $Helper->replacetext ( $_POST ["kertas_kerja_date"] ) );
		$fkka_attach = $_FILES ["kka_attach"] ["name"];
		$jml_attach = count($fkka_attach);
		if ($fno_kka != "" && $fkertas_kerja_date != "") {
			$rs_file = $kertas_kerjas->list_kka_lampiran($fdata_id);
			$z=0;
			while($arr_file = $rs_file->FetchRow()){
			$z++;
				$nama_file = $Helper->replacetext ( @$_POST ["nama_file_".$z] );
				$kertas_kerjas->delete_lampiran_kka ($fdata_id, $nama_file);
				$Helper->HapusFile ( "Upload_KKA", $nama_file);
			}
			$kertas_kerjas->kertas_kerja_edit ( $fdata_id, $fno_kka, $fkertas_kerja, $fkesimpulan, $fkertas_kerja_date, "Pindah ke table kka_attach" );
			for($i=0;$i<$jml_attach;$i++){
				if($fkka_attach[$i]!="") {
					$Helper->UploadFileMulti ( "Upload_KKA", "kka_attach");
					$kertas_kerjas->insert_lampiran_kka ($fdata_id, $fkka_attach[$i] );
				}
			}
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
		$kertas_kerjas->kertas_kerja_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$back			= "window.open('main.php?method=programaudit', '_self');";
		$recordcount = $kertas_kerjas->kertas_kerja_count ( $ses_program_id, $key_search, $val_search, $key_field );
		$rs = $kertas_kerjas->kertas_kerja_view_grid ( $ses_program_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Kertas Kerja Audit";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>