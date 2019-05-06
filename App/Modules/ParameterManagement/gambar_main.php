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

$paging_request = "main.php?method=par_gambar";
$acc_page_request = "gambar_acc.php";
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

$grid = "grid.php";
$gridHeader = array ("Nama Gambar", "Link", "Sort");
$gridDetail = array ("1", "1", "2");
$gridWidth = array ("15", "25", "5");
$widthAksi = "15";
$iconDetail = "0";
$iconDel = "1";
$key_by = array ("Nama Gambar");
$key_field = array ("gambar_name");
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Gambar";
		break;
	case "postadd" :
        $fgambar        = $_FILES["gambar_name"]["name"];
        $fsort = $_POST['sort'];
        $jml_gambar         = count($fgambar);
        if ($jml_gambar > 0) {
            for ($i = 0; $i < $jml_gambar; $i++) {
                if ($fgambar[$i] != "") {
                    $Helper->UploadFileMulti("Upload_Foto", "gambar_name");
                    $params->insert_gambar($fgambar[$i], $fsort[$i]);
                }
            }
            $Helper->js_alert_act(3);
        } else {
            $Helper->js_alert_act(5);
        }
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "getdelete" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$gambar_name = $params->gambar_viewlist($fdata_id);
		$params->delete_gambar ( $fdata_id, $gambar_name );
		$Helper->HapusFile("Upload_Foto", $gambar_name);
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->gambar_count ($key_search, $val_search, $key_field);
		$rs = $params->gambar_view_grid ($key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Gambar Dashboard";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
