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

$paging_request = "main.php?method=par_sbu_rinci";
$acc_page_request = "sbu_rinci_acc.php";
$list_page_request = "budget_view.php";

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
$gridHeader = array ("Propinsi", "SBU", "Kode SBU", "Gol", "Jumlah");
$gridDetail = array ("propinsi_name", "sbu_name", "sbu_kode", "sbu_rinci_gol", "sbu_rinci_amount");
$gridWidth = array ("20", "20", "20", "8", "15");

$key_by = array ("Propinsi", "SBU", "Kode SBU", "Gol", "Jumlah");
$key_field = array ("propinsi_name", "sbu_name", "sbu_kode", "sbu_rinci_gol", "sbu_rinci_amount");

$widthAksi = "15";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah SBU Rinci";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->sbu_rinci_data_viewlist ( $fdata_id );
		$page_title = "Ubah SBU Rinci";
		break;
	case "postadd" :
		$fpropinsi = $Helper->replacetext ( $_POST ["propinsi"] );
		$rs_prov = $params->propinsi_data_viewlist ( $fpropinsi );
		$arr_prov = $rs_prov->FetchRow ();
		$fpropinsi_name = $arr_prov ['propinsi_name'];
		$fsbu = $Helper->replacetext ( $_POST ["sbu"] );
		$rs_sbu = $params->sbu_data_viewlist ( $fsbu );
		$arr_sbu = $rs_sbu->FetchRow ();
		$fsbu_name = $arr_sbu ['sbu_kode'];
		$fgolongan = $Helper->replacetext ( $_POST ["golongan"] );
		$famount = str_replace ( ",", "", $_POST ["amount"] );
		if ($fpropinsi != "" && $fsbu != "" && $famount != "") {
			$rs_cek = $params->cek_sbu_rinci ( $fpropinsi, $fsbu, $fgolongan );
			$arr_cek = $rs_cek->FetchRow ();
			$fsbu_rinci_id = $arr_cek ['sbu_rinci_id'];
			$del_st = $arr_cek ['sbu_rinci_del_st'];
			if ($fsbu_rinci_id == "") {
				$params->sbu_rinci_add ( $fpropinsi, $fsbu, $fgolongan, $famount );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_sbu_rinci_del ( $fsbu_rinci_id, $famount );
					$Helper->js_alert_act ( 3 );
				} else {
					$Helper->js_alert_act ( 4, $fpropinsi_name . " dengan kode sbu " . $fsbu_name . " dan golongan " . $fgolongan );
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
		$fpropinsi = $Helper->replacetext ( $_POST ["propinsi"] );
		$rs_prov = $params->propinsi_data_viewlist ( $fpropinsi );
		$arr_prov = $rs_prov->FetchRow ();
		$fpropinsi_name = $arr_prov ['propinsi_name'];
		$fsbu = $Helper->replacetext ( $_POST ["sbu"] );
		$rs_sbu = $params->sbu_data_viewlist ( $fsbu );
		$arr_sbu = $rs_sbu->FetchRow ();
		$fsbu_name = $arr_sbu ['sbu_kode'];
		$fgolongan = $Helper->replacetext ( $_POST ["golongan"] );
		$famount = str_replace ( ",", "", $_POST ["amount"] );
		if ($fpropinsi != "" && $fsbu != "" && $famount != "") {
			$rs_cek = $params->cek_sbu_rinci ( $fpropinsi, $fsbu, $fgolongan, $fdata_id );
			$arr_cek = $rs_cek->FetchRow ();
			$fsbu_rinci_id = $arr_cek ['sbu_rinci_id'];
			$del_st = $arr_cek ['sbu_rinci_del_st'];
			if ($fsbu_rinci_id == "") {
				$params->sbu_rinci_edit ( $fdata_id, $fpropinsi, $fsbu, $fgolongan, $famount );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_sbu_rinci_del ( $fsbu_rinci_id, $famount );
					$params->sbu_rinci_delete ( $fdata_id );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fpropinsi_name . " dengan kode sbu " . $fsbu_name . " dan golongan " . $fgolongan );
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
		$params->sbu_rinci_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->sbu_rinci_count ($key_search, $val_search, $key_field);
		$rs = $params->sbu_rinci_view_grid ( $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar SBU Rinci";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
