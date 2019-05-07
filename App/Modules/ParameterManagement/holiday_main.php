<?
include_once "App/Classes/param_class.php";

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

$paging_request = "main.php?method=par_holiday";
$acc_page_request = "holiday_acc.php";
$list_page_request = "param_view.php";

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
$gridHeader = array ("Tanggal", "Keterangan");
$gridDetail = array ("holiday_date", "holiday_desc");
$gridWidth = array ("30", "50");

$key_by = array ("Keterangan");
$key_field = array ("holiday_desc");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Hari Libur";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->holiday_data_viewlist ( $fdata_id );
		$page_title = "Ubah Hari Libur";
		break;
	case "postadd" :
		$ftanggal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal"] ) );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		if ($ftanggal != "") {
			$cek = $params->cek_tanggal ( $ftanggal );
			if ($cek == "") {
				$params->holiday_add ( $ftanggal, $fdesc );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($cek == "2") {
					$params->update_holiday_weekday ( $ftanggal, $fdesc, "1" );
					$Helper->js_alert_act ( 3 );
				} else {
					$Helper->js_alert_act ( 4, $_POST ["tanggal"] );
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
		$fdata_id = $Helper->replacetext ( $_POST ["data_id"] );
		$ftanggal = $Helper->date_db ( $Helper->replacetext ( $_POST ["tanggal"] ) );
		$fdesc = $Helper->replacetext ( $_POST ["desc"] );
		if ($ftanggal != "") {
			$cek = $params->cek_tanggal ( $ftanggal, $fdata_id );
			if ($cek == "") {
				$params->holiday_edit ( $fdata_id, $ftanggal, $fdesc );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($cek == "2") {
					$params->update_holiday_weekday ( $ftanggal, $fdesc, "1" );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $_POST ["tanggal"] );
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
		$params->holiday_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->holiday_count ($key_search, $val_search, $key_field);
		$rs = $params->holiday_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Hari Libur";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
