<?
include_once "App/Classes/auditor_class.php";
$auditors = new auditor ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action_x"] );

$paging_request = "main.php?method=auditor_detil&auditor=" . $fdata_id;
$acc_page_request = "pendidikan_acc.php";
$list_page_request = "pendidikan_view.php";

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

$grid = "App/Templates/Grids/grid_form_x.php";
$gridHeader = array ("Tingkat Pendidikan", "Institusi", "Kota", "Negara", "Tahun", "Jurusan", "IPK");
$gridDetail = array ("1", "2", "3", "4", "5", "6", "7");
$gridWidth = array ("10", "20", "10", "10", "10", "15", "10");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd_x" :
		$_nextaction = "postadd_x";
		$page_request = $acc_page_request;
		$page_title = "Tambah Pendidikan";
		break;
	case "getedit_x" :
		$_nextaction = "postedit_x";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id_x"] );
		$rs = $auditors->pendidikan_data_viewlist ( $fdata_id );
		$page_title = "Ubah Pendidikan";
		break;
	case "postadd_x" :
		$fauditor_id = $Helper->replacetext ( $_POST ["auditor_id"] );
		$ftingkat_id = $Helper->replacetext ( $_POST ["tingkat_id"] );
		$fintiusi = $Helper->replacetext ( $_POST ["intiusi"] );
		$fkota = $Helper->replacetext ( $_POST ["kota"] );
		$fnegara = $Helper->replacetext ( $_POST ["negara"] );
		$ftahun = $Helper->replacetext ( $_POST ["tahun"] );
		$fjurusan = $Helper->replacetext ( $_POST ["jurusan"] );
		$fnilai = $Helper->replacetext ( $_POST ["nilai"] );
		if ($fauditor_id != "" && $ftingkat_id != "" && $fintiusi != "" && $fkota != "" && $fnegara != "" && $ftahun != "" && $fjurusan != "" && $fnilai != "") {
			$auditors->pendidikan_add ( $fauditor_id, $ftingkat_id, $fintiusi, $fkota, $fnegara, $ftahun, $fjurusan, $fnilai );
			$Helper->js_alert_act ( 3 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "postedit_x" :
		$fdata_id = $Helper->replacetext ( $_POST ["data_id_x"] );
		$ftingkat_id = $Helper->replacetext ( $_POST ["tingkat_id"] );
		$fintiusi = $Helper->replacetext ( $_POST ["intiusi"] );
		$fkota = $Helper->replacetext ( $_POST ["kota"] );
		$fnegara = $Helper->replacetext ( $_POST ["negara"] );
		$ftahun = $Helper->replacetext ( $_POST ["tahun"] );
		$fjurusan = $Helper->replacetext ( $_POST ["jurusan"] );
		$fnilai = $Helper->replacetext ( $_POST ["nilai"] );
		if ($fdata_id != "" && $ftingkat_id != "" && $fintiusi != "" && $fkota != "" && $fnegara != "" && $ftahun != "" && $fjurusan != "" && $fnilai != "") {
			$auditors->pendidikan_edit ( $fdata_id, $ftingkat_id, $fintiusi, $fkota, $fnegara, $ftahun, $fjurusan, $fnilai );
			$Helper->js_alert_act ( 1 );
		} else {
			$Helper->js_alert_act ( 5 );
		}
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "getdelete_x" :
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id_x"] );
		$auditors->pendidikan_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $auditors->pendidikan_count ( $fdata_id );
		$rs = $auditors->pendidikan_viewlist ( $fdata_id, $offset, $num_row );
		$page_title = "Daftar Pendidikan";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
