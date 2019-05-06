<?
include_once "App/Classes/risk_class.php";
include_once "App/Classes/auditee_class.php";

$risks = new risk ( $ses_userId );
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

$ses_penetapan_id = $_SESSION ['ses_penetapan_id'];

$paging_request = "main.php?method=risk_monitoring";
$acc_page_request = "monitoring_acc.php";
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
$gridHeader = array ("Ketegori Risiko", "Nomor Risiko", "Nama Risiko", "Nilai Residu", "Rencana Aksi", "Rencana Waktu", "PIC");
$gridDetail = array ("risk_kategori", "identifikasi_no_risiko", "identifikasi_nama_risiko", "evaluasi_risiko_residu_name", "penanganan_plan", "penanganan_date", "pic_name");
$gridWidth = array ("15", "10", "15", "10", "15", "10", "10");

$key_by = array ("Ketegori Risiko", "Nomor Risiko", "Nama Risiko", "Nilai Residu", "Rencana Aksi", "PIC");
$key_field = array ("risk_kategori", "identifikasi_no_risiko", "identifikasi_nama_risiko", "evaluasi_risiko_residu_name", "penanganan_plan", "pic_name");

$widthAksi = "10";
$iconEdit = "1";
$iconDel = "0";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $risks->monitoring_data_viewlist ( $fdata_id );
		$page_title = "Update Monitoring";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $risks->monitoring_data_viewlist ( $fdata_id );
		$page_title = "Rincian Monitoring";
		break;
	case "postedit" :
		$fdata_id = $Helper->replacetext ( $_POST ["data_id"] );
		$fpenanganan_action = $Helper->replacetext ( $_POST ["penanganan_risiko_yg_telah_dilakukan"] );
		//$fpenanganan_attachment_old = $Helper->replacetext ( $_POST ["attach_old"] );
		$fpenanganan_attachment = $_FILES ["attach"] ["name"];
		$jml_attach = count( $fpenanganan_attachment );
		$fpelaksanaan_date = $Helper->date_db ( $Helper->replacetext ( $_POST ["pelaksanaan_date"] ) );
		$fpenanganan_plan = $Helper->replacetext ( $_POST ["penanganan_risiko_yg_akan_dilakukan"] );
		$ftenggat_date = $Helper->date_db ( $Helper->replacetext ( $_POST ["tenggat_date"] ) );

		$Helper->UploadFileMulti ( "Upload_Risk", "attach");
		if ($jml_attach <> 0) {
			for($i=0;$i<$jml_attach;$i++){
				$risks->insert_attach_monitoring ( $fdata_id, $fpenanganan_attachment[$i] );
			}
		}
		$risks->update_monitoring ( $fdata_id, $fpenanganan_action, $fpelaksanaan_date, $fpenanganan_plan, $ftenggat_date );
		$Helper->js_alert_act ( 1 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $risks->monitoring_count ( $ses_penetapan_id, $key_search, $val_search, $key_field);
		$rs = $risks->monitoring_view_grid ( $ses_penetapan_id, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Identifikasi Risiko";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
