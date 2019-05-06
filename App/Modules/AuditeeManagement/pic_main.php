<?
include_once "App/Classes/param_class.php";
$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=auditee_detil&auditee=" . $fdata_id;
$acc_page_request = "pic_acc.php";
$list_page_request = "pic_view.php";

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
$gridHeader = array (
		"NIP",
		"Nama",
		"Jabatan",
		"Email" 
);
$gridDetail = array (
		"1",
		"2",
		"3",
		"4" 
);
$gridWidth = array (
		"15",
		"25",
		"15",
		"20" 
);
$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Pejabat";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->pic_data_viewlist ( $fdata_id );
		$page_title = "Ubah Pejabat";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fdata_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $params->pic_data_viewlist ( $fdata_id );
		$page_title = "Rincian Pejabat";
		break;
	case "postadd" :
		$fauditee_id = $Helper->replacetext ( $_POST ["auditee_id"] );
		$fnip = $Helper->replacetext ( $_POST ["nip"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fjabatan_id = $Helper->replacetext ( $_POST ["jabatan_id"] );
		$fmobile = $Helper->replacetext ( $_POST ["mobile"] );
		$ftelp = $Helper->replacetext ( $_POST ["telp"] );
		$femail = $Helper->replacetext ( $_POST ["email_pic"] );
		if ($fnip != "" && $fname != "" && $fjabatan_id != "" && $femail != "") {
			$rs_nip = $params->cek_nip_pic ( $fnip );
			$arr_nip = $rs_nip->FetchRow ();
			$fpic_id = $arr_nip ['pic_id'];
			$del_st = $arr_nip ['pic_del_st'];
			if ($fpic_id == "") {
				$params->pic_add ( $fnip, $fname, $fjabatan_id, $fmobile, $ftelp, $femail, $fauditee_id );
				$Helper->js_alert_act ( 3 );
			} else {
				if ($del_st == "0") {
					$params->update_pic_del ( $fpic_id, $fnip, $fname, $fjabatan_id, $fmobile, $ftelp, $femail, $fauditee_id );
					$Helper->js_alert_act ( 3 );
				} else {
					$Helper->js_alert_act ( 4, $fname );
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
		$fauditee_id = $Helper->replacetext ( $_POST ["auditee_id"] );
		$fnip = $Helper->replacetext ( $_POST ["nip"] );
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fjabatan_id = $Helper->replacetext ( $_POST ["jabatan_id"] );
		$fmobile = $Helper->replacetext ( $_POST ["mobile"] );
		$ftelp = $Helper->replacetext ( $_POST ["telp"] );
		$femail = $Helper->replacetext ( $_POST ["email_pic"] );
		$fauditee_id = $Helper->replacetext ( $_POST ["auditee_id"] );
		if ($fnip != "" && $fname != "" && $fjabatan_id != "" && $femail != "") {
			$rs_nip = $params->cek_nip_pic ( $fnip, $fdata_id );
			$arr_nip = $rs_nip->FetchRow ();
			$fpic_id = $arr_nip ['pic_id'];
			$del_st = $arr_nip ['pic_del_st'];
			if ($fpic_id == "") {
				$params->pic_edit ( $fdata_id, $fnip, $fname, $fjabatan_id, $fmobile, $ftelp, $femail );
				$Helper->js_alert_act ( 1 );
			} else {
				if ($del_st == "0") {
					$params->update_pic_del ( $fpic_id, $fnip, $fname, $fjabatan_id, $fmobile, $ftelp, $femail, $fauditee_id );
					$params->pic_delete ( $fdata_id );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fname );
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
		$params->pic_delete ( $fdata_id );
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $params->pic_count ( $fdata_id );
		$rs = $params->pic_viewlist ( $fdata_id, $offset, $num_row );
		$page_title = "Daftar Pejabat Auditee";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
