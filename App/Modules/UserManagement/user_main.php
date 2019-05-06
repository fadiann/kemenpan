<?
include_once "App/Classes/users_class.php";
$userms = new userm ( $ses_userId );

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

$paging_request = "main.php?method=usermgmt";
$acc_page_request = "user_acc.php";
$list_page_request = "user_view.php";

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
$gridHeader = array ("User Name", "Group", "Login As", "Status Online");
$gridDetail = array ("1", "2", "3", "4");
$gridWidth = array ("30", "25", "15", "10");

$key_by = array ("User Name", "Group", "Login As");
$key_field = array ("user_username", "group_name", "auditor_name");

$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Tambah Pengguna";
		break;
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$fuser_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs = $userms->users_view_data ( $fuser_id );
		$arr = $rs->FetchRow ();
		$page_title = "Ubah Pengguna";
		break;
	case "getdetail" :
		$page_request = $acc_page_request;
		$fuser_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$rs_exist = $userms->users_view_data ( $fuser_id );
		$page_title = "Detail Pengguna";
		break;
	case "postadd" :
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fpassword = $Helper->replacetext ( $_POST ["password"] );
		$fpassword_confirm = $Helper->replacetext ( $_POST ["password_confirm"] );
		$fnama_group = $Helper->replacetext ( $_POST ["nama_group"] );
		$flogin_as = $Helper->replacetext ( $_POST ["login_as"] );
		$finternal_id = $Helper->replacetext ( $_POST ["internal_id"] );
		$feksternal_id = $Helper->replacetext ( $_POST ["eksternal_id"] );
		if ($flogin_as == '1')
			$feksternal_id = "0";
		if ($flogin_as == '2')
			$finternal_id = "0";
		
		if ($fname != "" && $fpassword != "") {
			if ($fpassword == $fpassword_confirm) {
				$rs_cek = $userms->users_cek_name ( $fname );
				$arr_cek = $rs_cek->FetchRow ();
				if ($arr_cek ['user_id'] == "") {
					$userms->users_add ( $fname, $fpassword, $fnama_group, $flogin_as, $finternal_id, $feksternal_id );
					$Helper->js_alert_act ( 3 );
				} else {
					if ($arr_cek ['user_status'] == "0") {
						$userms->users_update_del_to_add ( $arr_cek ['user_id'], $fname, $fpassword, $fnama_group, $flogin_as, $finternal_id, $feksternal_id );
						$Helper->js_alert_act ( 3 );
					} else {
						$Helper->js_alert_act ( 4, $fname );
					}
				}
			} else {
				$Helper->js_alert_act ( 6 );
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
		$fname = $Helper->replacetext ( $_POST ["name"] );
		$fpassword = $Helper->replacetext ( $_POST ["password"] );
		$fpassword_confirm = $Helper->replacetext ( $_POST ["password_confirm"] );
		$fnama_group = $Helper->replacetext ( $_POST ["nama_group"] );
		$flogin_as = $Helper->replacetext ( $_POST ["login_as"] );
		$finternal_id = $Helper->replacetext ( $_POST ["internal_id"] );
		$feksternal_id = $Helper->replacetext ( $_POST ["eksternal_id"] );
		if ($flogin_as == '1')
			$feksternal_id = "0";
		if ($flogin_as == '2')
			$finternal_id = "0";
		
		if ($fname != "" && $fpassword != "") {
			if ($fpassword == $fpassword_confirm) {
				if ($fpassword == "xxxxxxxx")
					$fpassword = "";
				$rs_cek = $userms->users_cek_name ( $fname, $fdata_id );
				$arr_cek = $rs_cek->FetchRow ();
				if ($arr_cek ['user_id'] == "") {
					$userms->users_edit ( $fdata_id, $fname, $fpassword, $fnama_group, $flogin_as, $finternal_id, $feksternal_id );
					$Helper->js_alert_act ( 1 );
				} else {
					$Helper->js_alert_act ( 4, $fname );
				}
			} else {
				$Helper->js_alert_act ( 6 );
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
		$fuser_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$userms->_db->conn->BeginTrans ();
		$userms->users_delete ( $fuser_id );
		$userms->_db->conn->CommitTrans ();
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	case "getKill" :
		$fuser_id = $Helper->replacetext ( $_REQUEST ["data_id"] );
		$userms->_db->conn->BeginTrans ();
		$userms->users_kill ( $fuser_id );
		$userms->_db->conn->CommitTrans ();
		$Helper->js_alert_act ( 2 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$recordcount = $userms->users_count ("", $key_search, $val_search, $key_field);
		$rs = $userms->users_viewlist ( $key_search, $val_search, $key_field, $offset, $num_row );
		$page_title = "Daftar Pengguna";
		$page_request = $list_page_request;
		break;
}
include_once $page_request;
?>
