<?
include_once "App/Classes/auditor_class.php";
$auditors = new auditor ( $ses_userId );

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

$paging_request = "main.php?method=auditormgmt";
$acc_page_request = "auditor_acc.php";
$acc_page_request_detil = "main.php?method=auditor_detil";
$list_page_request = "auditor_view.php";

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

$grid = "App/Templates/Grids/grid.php";
$gridHeader = array ("ID Contoh", "Nama", "Golongan/Pangkat/Coba", "Jabatan");
$gridDetail = array ("1", "2", "3", "4");
$gridWidth = array ("15", "30", "20", "17");

$key_by = array ("ID", "Nama", "Golongan Biaya", "Jabatan");
$key_field = array ("auditor_nip", "auditor_name", "auditor_golongan", "jenis_jabatan");

$widthAksi = "18";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction  = "postadd";
		$page_request = $acc_page_request;
		$page_title   = "Tambah Pegawai";
		break;
	case "getedit" :
		$_nextaction  = "postedit";
		$page_request = $acc_page_request;
		$fdata_id     = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs           = $auditors->auditor_data_viewlist ( $fdata_id );
		$page_title   = "Ubah Pegawai";
		break;
	case "getdetail" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		echo "<script>window.open('" . $acc_page_request_detil . "&auditor=" . $fdata_id . "', '_self');</script>";
		break;
	case "postadd" :
		$fnip           = $Helper->replacetext ( $_POST ["nip"] );
		$fname          = $Helper->replacetext ( $_POST ["name"] );
		$ftempat_lahir  = $Helper->replacetext ( $_POST ["tempat_lahir"] );
		$ftanggal_lahir = $Helper->replacetext ( $_POST ["tanggal_lahir"] );
		$falamat        = $Helper->replacetext ( $_POST ["alamat"] );
		$fjenis_kelamin = $Helper->replacetext ( $_POST ["jenis_kelamin"] );
		$fagama         = $Helper->replacetext ( $_POST ["agama"] );
		$fpangkat_id    = $Helper->replacetext ( $_POST ["pangkat_id"] );
		$ftmt           = $Helper->replacetext ( $_POST ["tmt"] );
		$fjabatan       = $Helper->replacetext ( $_POST ["jabatan"] );
		$fgolongan      = $Helper->replacetext ( $_POST ["golongan"] );
		$fmobile        = $Helper->replacetext ( $_POST ["mobile"] );
		$ftelp          = $Helper->replacetext ( $_POST ["telp"] );
		$femail         = $Helper->replacetext ( $_POST ["email_auditor"] );
		$ffoto          = $Helper->replacetext ( $_FILES ["foto"] ["name"] );
		if ($fnip != "" && $fname != "" && $fgolongan != "" && $femail != "") {
			$rs_nip = $auditors->cek_nip_auditor ( $fnip );
			$arr_nip = $rs_nip->FetchRow ();
			$fauditor_id = $arr_nip ['auditor_id'];
			$del_st = $arr_nip ['auditor_del_st'];
			if ($fauditor_id == "") {
				$auditors->auditor_add ( $fnip, $fname, $ftempat_lahir, $ftanggal_lahir, $fpangkat_id, $fjabatan, $fgolongan, $fmobile, $ftelp, $femail, $falamat, $fjenis_kelamin, $fagama, $ffoto, $ftmt );
				$Helper->UploadFile ( "Upload_Foto", "foto", "" );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$auditors->update_auditor_del ( $fauditor_id, $fnip, $fname, $ftempat_lahir, $ftanggal_lahir, $fpangkat_id, $fjabatan, $fgolongan, $fmobile, $ftelp, $femail, $falamat, $fjenis_kelamin, $fagama, $ffoto, $ftmt );
					$Helper->js_alert_act ( 3 );
				} else {
					$Helper->js_alert_act ( 4, $fnip );
				}
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
		$fdata_id       = $Helper->replacetext ( $_POST ["data_id"] );
		$fnip           = $Helper->replacetext ( $_POST ["nip"] );
		$fname          = $Helper->replacetext ( $_POST ["name"] );
		$ftempat_lahir  = $Helper->replacetext ( $_POST ["tempat_lahir"] );
		$ftanggal_lahir = $Helper->replacetext ( $_POST ["tanggal_lahir"] );
		$falamat        = $Helper->replacetext ( $_POST ["alamat"] );
		$fjenis_kelamin = $Helper->replacetext ( $_POST ["jenis_kelamin"] );
		$fagama         = $Helper->replacetext ( $_POST ["agama"] );
		$fpangkat_id    = $Helper->replacetext ( $_POST ["pangkat_id"] );
		$ftmt           = $Helper->replacetext ( $_POST ["tmt"] );
		$fjabatan       = $Helper->replacetext ( $_POST ["jabatan"] );
		$fgolongan      = $Helper->replacetext ( $_POST ["golongan"] );
		$fmobile        = $Helper->replacetext ( $_POST ["mobile"] );
		$ftelp          = $Helper->replacetext ( $_POST ["telp"] );
		$femail         = $Helper->replacetext ( $_POST ["email_auditor"] );
		$ffoto          = $Helper->replacetext ( $_FILES ["foto"] ["name"] );
		$ffoto_old      = $Helper->replacetext ( $_POST ["foto_old"] );
		if ($fnip != "" && $fname != "" && $fgolongan != "" && $femail != "") {
			$rs_nip = $auditors->cek_nip_auditor ( $fnip, $fdata_id );
			$arr_nip = $rs_nip->FetchRow ();
			$fauditor_id = $arr_nip ['auditor_id'];
			$del_st = $arr_nip ['auditor_del_st'];
			if ($fauditor_id == "") {
				if (! empty ( $ffoto )) {
					$Helper->UploadFile ( "Upload_Foto", "foto", $ffoto_old );
				} else {
					$ffoto = $ffoto_old;
				}
				$auditors->auditor_edit ( $fdata_id, $fnip, $fname, $ftempat_lahir, $ftanggal_lahir, $fpangkat_id, $fjabatan, $fgolongan, $fmobile, $ftelp, $femail, $falamat, $fjenis_kelamin, $fagama, $ffoto, $ftmt );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					if (! empty ( $ffoto )) {
						$Helper->UploadFile ( "Upload_Foto", "foto", $ffoto_old );
					} else {
						$ffoto = $ffoto_old;
					}
					$auditors->update_auditor_del ( $fauditor_id, $fnip, $fname, $ftempat_lahir, $ftanggal_lahir, $fpangkat_id, $fjabatan, $fgolongan, $fmobile, $ftelp, $femail, $falamat, $fjenis_kelamin, $fagama, $ffoto, $ftmt );
					$auditors->auditor_delete ( $fdata_id );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fnip );
				}
			}
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
		$auditors->auditor_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount  = $auditors->auditor_count ($base_on_id_int, $key_search, $val_search, $key_field);
		$rs           = $auditors->auditor_viewlist ( $base_on_id_int, $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title   = "Daftar Pegawai Kemenpan RB";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
