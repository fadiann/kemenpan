<?
include_once "App/Classes/auditor_class.php";
include_once "App/Classes/finding_class.php";
include_once "App/Classes/rekomendasi_class.php";
include_once "App/Classes/tindaklanjut_class.php";

$auditors = new auditor ( $ses_userId );
$findings = new finding ( $ses_userId );
$rekomendasis = new rekomendasi ( $ses_userId );
$tindaklanjuts = new tindaklanjut ( $ses_userId );

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

if($method=='matrikstindaklanjut'){
	$method='tindaklanjut';	
	$iconAdd = $Helper->cek_akses ( $ses_group_id, $method, 'getadd' );
	$_SESSION ['ses_rekomendasi_id'] = $Helper->replacetext ( $_REQUEST ["idRec"] );
	$paging_request = "main.php?method=matrikstindaklanjut&idRec=".$_SESSION ['ses_rekomendasi_id'];
}else{
	$paging_request = "main.php?method=tindaklanjut";
}

$ses_rekomendasi_id = $_SESSION ['ses_rekomendasi_id'];

$acc_page_request = "tindaklanjut_acc.php";
$list_page_request = "tindaklanjut_view.php";
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

$view_parrent = "tindaklanjut_view_parrent.php";
$grid = "App/Templates/Grids/grid_monitoring.php";
$gridHeader = array ("Tindak Lanjut ", "Tanggal", "Status TL");
$gridDetail = array ("1", "2", "3");
$gridWidth = array ("50", "15", "15");

$key_by = array ("Tindak Lanjut");
$key_field = array ("jenis_jabatan", "jenis_jabatan_sub");

$widthAksi = "15";
$iconDetail = "0";
/*
if($method=='matrikstindaklanjut'){
	$iconAdd = $Helper->cek_akses ( $ses_group_id, "tindaklanjut", 'getadd' );
	$iconEdit = $Helper->cek_akses ( $ses_group_id, "tindaklanjut", 'getedit' );
	$iconDel = $Helper->cek_akses ( $ses_group_id, "tindaklanjut", 'getdelete' );
}
*/
// === end grid ===//

switch ($_action) {
	case "update_status" :
		$rekomendasis->update_status_rekomendasi ( $ses_rekomendasi_id ) ;
		$id_temuan = $rekomendasis->get_temuan_id($ses_rekomendasi_id);
		$cek_rek_selesai = $rekomendasis->rekomendasi_count($id_temuan, '1', "", "", "");
		$cek_rek_all = $rekomendasis->rekomendasi_count($id_temuan, "", "", "", "");
		if($cek_rek_selesai==$cek_rek_all) $findings->finding_update_status($id_temuan, '8');
		$Helper->js_alert_act ( 1 );
		?>
		<script>window.open('<?=$def_page_request?>', '_self');</script>
		<?
		$page_request = "blank.php";
		break;
	case "getajukan_tl" :
	case "getapprove_tl" :
		$_nextaction = "postkomentar";
		$page_request = $acc_page_request;
		$id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$status = $Helper->replacetext ( $_REQUEST ["status_tl"] );
		$rs = $tindaklanjuts->tindaklanjut_viewlist ( $id );
		$page_title = "Reviu Tindak Lanjut";
		break;
	case "postkomentar" :
		$id_assign = $Helper->replacetext ( $_POST ["data_id"] );
		$fkomentar = $Helper->replacetext ( $_POST ["komentar"] );
		$status = $Helper->replacetext ( $_POST ["status"] );
		if ($status != "") {
			$tindaklanjuts->tindaklanjut_update_ststus ( $id_assign, $status );
		}
		$ftanggal = $Helper->date_db ( date ( "d-m-Y H:i:s" ) );
		if ($fkomentar != "") {
			$tindaklanjuts->tindaklanjut_add_komentar ( $id_assign, $fkomentar, $ftanggal );
			$Helper->js_alert_act ( 3 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Tindak Lanjut";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $tindaklanjuts->tindaklanjut_viewlist ( $fdata_id );
		$page_title = "Ubah Tindak Lanjut";
		break;
	case "postadd" :
	    $id_tl = $tindaklanjuts->uniq_id();
		$ftl_desc = $Helper->replacetext ( $_POST ["tl_desc"] );
		$ftl_date = $Helper->date_db ( date ( "d-m-Y" ) );
		$ftl_attachment =  $_FILES ["tl_attach"] ["name"];
		$jml_attach = count($ftl_attachment);
		if ($ftl_desc != "") {
			$tindaklanjuts->tindaklanjut_add ($id_tl, $ses_rekomendasi_id, $ftl_desc, $ftl_date, '');
			for($i=0;$i<$jml_attach;$i++){
				if($ftl_attachment[$i]!="") {
					$Helper->UploadFileMulti ( "Upload_Tindaklanjut", "tl_attach");
					$tindaklanjuts->insert_lampiran_tl ($id_tl, $ftl_attachment[$i] );
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
		$ftl_desc = $Helper->replacetext ( $_POST ["tl_desc"] );
		$ftl_date = $Helper->date_db ( date ( "d-m-Y" ) );
		$ftl_attachment =$_FILES ["tl_attach"] ["name"];
		$jml_attach = count($ftl_attachment);
// 		$ftl_attach_old = $Helper->replacetext ( $_POST ["tl_attach_old"] );
		if ($ftl_desc != "") {

			$tindaklanjuts->tindaklanjut_edit ( $fdata_id, $ftl_desc, $ftl_date, '' );
			$rs_file = $tindaklanjuts->list_tl_lampiran($fdata_id);
			$z=0;
			while($arr_file = $rs_file->FetchRow()){
			$z++;
				$nama_file = $Helper->replacetext ( @$_POST ["nama_file_".$z] );
				$tindaklanjuts->delete_lampiran_tl ($fdata_id, $nama_file);
				$Helper->HapusFile ( "Upload_Tindaklanjut", $nama_file);
			}
// 			$tindaklanjuts->kertas_kerja_edit ( $fdata_id, $fno_tl, $fkertas_kerja, $fkesimpulan, $fkertas_kerja_date, "Pindah ke table tl_attach" );
			for($i=0;$i<$jml_attach;$i++){
				if($ftl_attachment[$i]!="") {
					$Helper->UploadFileMulti ( "Upload_Tindaklanjut", "tl_attach");
					$tindaklanjuts->insert_lampiran_tl ($fdata_id, $ftl_attachment[$i] );
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
		$tindaklanjuts->tindaklanjut_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $tindaklanjuts->tindaklanjut_count ( $ses_rekomendasi_id, $key_search, $val_search, $key_field );
		$rs = $tindaklanjuts->tindaklanjut_view_grid ( $ses_rekomendasi_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Tindak Lanjut";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
