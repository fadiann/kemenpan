<?php
include_once "App/Classes/backuprestore_class.php";
$backuprestores = new backuprestore($ses_userId);
@$_action = $Helper->replacetext($_REQUEST["data_action"]);
$paging_request = "main.php?method=backuprestore";
$list_page_request = "user_view.php";
// ==== buat grid ===//
$num_row = 10;
@$str_page = $Helper->replacetext($_GET['page']);
if (isset($str_page)) {
    if (is_numeric($str_page) && $str_page != 0) {
        $noPage = $str_page;
    } //is_numeric($str_page) && $str_page != 0
    else {
        $noPage = 1;
    }
} //isset($str_page)
else {
    $noPage = 1;
}
$offset = ($noPage - 1) * $num_row;
$def_page_request = $paging_request . "&page=$noPage";
$grid = "App/Templates/Grids/grid.php";
$gridHeader = array("Username", "Tanggal Backup");
$gridDetail = array("1", "2");
$gridWidth = array("40", "40");
$widthAksi = "15";
$iconEdit = "0";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//
//var_dump($_REQUEST);
switch ($_action) {
    case "restore_database":
        $fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
        $nama_file = $backuprestores->backup_viewlist($fdata_id);
        $backuprestores->restore_database($nama_file);
        $date = $Helper->date_db(date("d-m-Y H:i:s"));
        $backuprestores->backup_update_restore($fdata_id, $date);
        $Helper->js_alert_act(12);
        echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
        $page_request = "blank.php";
    break;
    case "backup_database":
        $nama_file = $Helper->date_db(date("d-m-Y H:i:s"));
        $backuprestores->backup_add_history($nama_file);
        $backuprestores->backupdatabase($nama_file);
        $Helper->js_alert_act(11);
        echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
        $page_request = "blank.php";
    break;
    case "getdelete":
        $fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
        $backuprestores->deletebackup($fdata_id);
        $Helper->js_alert_act(2);
        echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
        $page_request = "blank.php";
    break;
    default:
        $recordcount = $backuprestores->backup_count();
        $rs = $backuprestores->backup_view_grid($offset, $num_row);
        $page_title = "Daftar Backup Database";
        $page_request = $list_page_request;
    break;
} //$_action
include_once $page_request;
?>