<?php
include_once "App/Classes/auditee_class.php";
include_once "App/Classes/param_class.php";
$auditees = new auditee($ses_userId);
$params   = new param();
@$_action = $Helper->replacetext($_REQUEST["data_action"]);
if (isset($_POST["val_search"])) {
    @session_start();
    $_SESSION['key_search'] = $Helper->replacetext($_POST["key_search"]);
    $_SESSION['val_search'] = $Helper->replacetext($_POST["val_search"]);
    $_SESSION['val_method'] = $method;
}
$key_search = @$_SESSION['key_search'];
$val_search = @$_SESSION['val_search'];
$val_method = @$_SESSION['val_method'];
if (@$method != @$val_method) {
    $key_search = "";
    $val_search = "";
    $val_method = "";
}
$paging_request         = "main.php?method=auditeemgmt";
$acc_page_request       = "auditee_acc.php";
$acc_page_request_detil = "main.php?method=auditee_detil";
$list_page_request      = "auditee_view.php";
// ==== buat grid ===//
$num_row                = 10;
@$str_page = $Helper->replacetext($_GET['page']);
if (isset($str_page)) {
    if (is_numeric($str_page) && $str_page != 0) {
        $noPage = $str_page;
    } else {
        $noPage = 1;
    }
} else {
    $noPage = 1;
}
$offset           = ($noPage - 1) * $num_row;
$def_page_request = $paging_request . "&page=$noPage";
$grid             = "App/Templates/Grids/grid.php";
$gridHeader       = array(
    "Kode Auditee",
    "Nama Auditee",
    "Unit Penanggung Jawab",
    "Email"
);
$gridDetail       = array(
    "1",
    "2",
    "3",
    "4"
);
$gridWidth        = array(
    "10",
    "25",
    "25",
    "15"
);
// Untuk fungsi cari pada tampilan gridview
$key_by           = array(
    "Kode Auditee",
    "Nama Auditee",
    "Unit Penanggung Jawab",
    "email"
);
$key_field        = array(
    "auditee.auditee_kode",
    "auditee.auditee_name",
    "parrent.auditee_name",
    "auditee.auditee_email"
);
$widthAksi        = "15";
$iconDetail       = "1";
// === end grid ===//
switch ($_action) {
    case "getadd":
        $_nextaction  = "postadd";
        $page_request = $acc_page_request;
        $page_title   = "Tambah Auditee";
        break;
    case "getedit":
        $_nextaction  = "postedit";
        $page_request = $acc_page_request;
        $fdata_id     = $Helper->replacetext($_REQUEST["data_id"]);
        $rs           = $auditees->auditee_data_viewlist($fdata_id);
        $arr          = $rs->FetchRow();
        $page_title   = "Ubah Auditee";
        break;
    case "getdetail":
        $fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
        echo "<script>window.open('" . $acc_page_request_detil . "&auditee=" . $fdata_id . "', '_self');</script>";
        break;
    case "postadd":
        $fkode       = $Helper->replacetext($_POST["kode"]);
        $fname       = $Helper->replacetext($_POST["name"]);
        $fparrent_id = $Helper->replacetext($_POST["parrent_id"]);
        if ($fparrent_id == "")
            $fparrent_id = "0";
        $finspektorat_id = $Helper->replacetext($_POST["inspektorat_id"]);
        $fpropinsi_id    = $Helper->replacetext($_POST["propinsi_id"]);
        $fkabupaten_id   = $Helper->replacetext($_POST["kabupaten_id"]);
        $falamat         = $Helper->replacetext($_POST["alamat"]);
        $ftelp           = $Helper->replacetext($_POST["telp"]);
        $fext            = $Helper->replacetext($_POST["ext"]);
        $ffax            = $Helper->replacetext($_POST["fax"]);
        $femail          = $Helper->replacetext($_POST["email"]);
        
        if ($fkode != "" && $fname != "" && $fpropinsi_id != "") {
            $rs_cek      = $auditees->auidtee_cek_name($fkode);
            $arr_cek     = $rs_cek->FetchRow();
            $fauditee_id = $arr_cek['auditee_id'];
            $del_st      = $arr_cek['auditee_del_st'];
            if ($fauditee_id == "") {
                $auditees->auditee_add($fkode, $fname, $fparrent_id, $finspektorat_id, $fpropinsi_id, $fkabupaten_id, $falamat, $ftelp, $ffax, $fext, $femail);
                $Helper->js_alert_act(3);
            } else {
                if ($del_st == "0") {
                    $auditees->auditee_update_del_to_add($fauditee_id, $fkode, $fname, $fparrent_id, $finspektorat_id, $fpropinsi_id, $fkabupaten_id, $falamat, $ftelp, $ffax, $fext, $femail);
                    $Helper->js_alert_act(3);
                } else {
                    $Helper->js_alert_act(4, $fkode);
                }
            }
        } else {
            $Helper->js_alert_act(5);
        }
        echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
        $page_request = "blank.php";
        break;
    case "postedit":
        $fdata_id    = $Helper->replacetext($_POST["data_id"]);
        $fkode       = $Helper->replacetext($_POST["kode"]);
        $fname       = $Helper->replacetext($_POST["name"]);
        $fparrent_id = $Helper->replacetext($_POST["parrent_id"]);
        if ($fparrent_id == "")
            $fparrent_id = "0";
        $finspektorat_id = $Helper->replacetext($_POST["inspektorat_id"]);
        $fpropinsi_id    = $Helper->replacetext($_POST["propinsi_id"]);
        $fkabupaten_id   = $Helper->replacetext($_POST["kabupaten_id"]);
        $falamat         = $Helper->replacetext($_POST["alamat"]);
        $ftelp           = $Helper->replacetext($_POST["telp"]);
        $fext            = $Helper->replacetext($_POST["ext"]);
        $ffax            = $Helper->replacetext($_POST["fax"]);
        $femail          = $Helper->replacetext($_POST["email"]);
        
        if ($fkode != "" && $fname != "" && $fpropinsi_id != "") {
            $rs_cek      = $auditees->auidtee_cek_name($fkode, $fdata_id);
            $arr_cek     = $rs_cek->FetchRow();
            $fauditee_id = $arr_cek['auditee_id'];
            $del_st      = $arr_cek['auditee_del_st'];
            if ($fauditee_id == "") {
                $auditees->auditee_edit($fdata_id, $fkode, $fname, $fparrent_id, $finspektorat_id, $fpropinsi_id, $fkabupaten_id, $falamat, $ftelp, $ffax, $fext, $femail);
                $Helper->js_alert_act(1);
            } else {
                if ($del_st == "0") {
                    $auditees->auditee_update_del_to_add($fauditee_id, $fkode, $fname, $fparrent_id, $finspektorat_id, $fpropinsi_id, $fkabupaten_id, $falamat, $ftelp, $ffax, $fext, $femail);
                    $auditees->auditee_delete($fdata_id);
                    $Helper->js_alert_act(1);
                } else {
                    $Helper->js_alert_act(4, $fkode);
                }
            }
        } else {
            $Helper->js_alert_act(5);
        }
        echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
        $page_request = "blank.php";
        break;
    case "getdelete":
        $fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
        $auditees->auditee_delete($fdata_id);
        $Helper->js_alert_act(2);
        echo "<script>window.open('" . $def_page_request . "', '_self');</script>";
        $page_request = "blank.php";
        break;
    default:
        $recordcount  = $auditees->auditee_count($base_on_id_eks, $key_search, $val_search, $key_field);
        $rs           = $auditees->auditee_viewlist($base_on_id_eks, $key_search, $val_search, $key_field, $offset, $num_row);
        $page_title   = "Daftar Auditee";
        $page_request = $list_page_request;
        break;
}
include_once $page_request;
?>