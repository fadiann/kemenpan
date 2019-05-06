<?php
include_once "App/Classes/author_class.php";
$authors = new author($ses_userId);

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

if (@$method!=@$val_method) {
    $key_search = "";
    $val_search = "";
    $val_method = "";
}

$paging_request = "main.php?method=author";
$acc_page_request = "author_acc.php";
$acc_page_request_detil = "main.php?method=author_detil";
$list_page_request = "author_view.php";

// ==== buat grid ===//
$num_row = 10;
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
$offset = ($noPage - 1) * $num_row;

$def_page_request = $paging_request . "&page=$noPage";

$grid = "grid.php";
$gridHeader = array("Kode Author", "Nama Author");
$gridDetail = array("1", "2");
$gridWidth = array("10", "25");

// Untuk fungsi cari combobox pada tampilan gridview cari
$key_by = array("Kode Author", "Nama Author");
$key_field = array("author.kode_author", "author.nama_author");

$widthAksi = "15";
$iconDetail = "1";
// === end grid ===//

switch ($_action) {
    case "getadd":
        $_nextaction = "postadd";
        $page_request = $acc_page_request;
        $page_title = "Tambah Author";
        break;
    case "getedit":
        $_nextaction = "postedit";
        $page_request = $acc_page_request;
        $fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
        $rs = $authors->author_data_viewlist($fdata_id);
        $arr = $rs->FetchRow();
        $page_title = "Ubah Author";
        break;
    case "getdetail":
        $fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
        echo "<script>window.open('" . $acc_page_request_detil . "&author=" . $fdata_id . "', '_self');</script>";
        break;
    case "postadd":
        $fkode_author = $Helper->replacetext($_POST["kode_author"]);
        $fnama_author = $Helper->replacetext($_POST["nama_author"]);

        if ($fkode_author != "" && $fnama_author != "") {
            $rs_cek = $authors->author_cek_name($fkode_author);
            $arr_cek = $rs_cek->FetchRow();
            $fid_author = $arr_cek['id_author'];
            if ($fid_author == "") {
                $authors->author_add($fkode_author, $fnama_author);
                $Helper->js_alert_act(3);
            } else {
                $Helper->js_alert_act(4, $fkode_author);
            }
        } else {
            $Helper->js_alert_act(5);
        }

        ?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?php
        $page_request = "blank.php";
        break;
    case "postedit":
        $fdata_id = $Helper->replacetext($_POST["data_id"]);
        $fkode_author = $Helper->replacetext($_POST["kode_author"]);
        $fnama_author = $Helper->replacetext($_POST["nama_author"]);

        if ($fkode_author != "" && $fnama_author != "") {
            $rs_cek = $authors->author_cek_name($fkode_author, $fdata_id);
            $arr_cek = $rs_cek->FetchRow();
            $fid_author = $arr_cek['id_author'];
            if ($fid_author != "") {
                $authors->author_edit($fdata_id, $fkode_author, $fnama_author);
                $Helper->js_alert_act(1);
            }
        } else {
            $Helper->js_alert_act(5);
        }
        ?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?php
        $page_request = "blank.php";
        break;
    case "getdelete":
        $fdata_id = $Helper->replacetext($_REQUEST["data_id"]);
        // $authors->_db->conn->BeginTrans();
        $authors->author_delete($fdata_id);
        // $authors->_db->conn->CommitTrans();
        $Helper->js_alert_act(2);
                // echo "del";
        ?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?php
        $page_request = "blank.php";
        break;
    default:
        $recordcount = $authors->author_count($base_on_id_eks, $key_search, $val_search, $key_field);
        $rs = $authors->author_viewlist($base_on_id_eks, $key_search, $val_search, $key_field, $offset, $num_row);
        $page_title = "Daftar Author";
        $page_request = $list_page_request;
        break;
}
include_once $page_request;
?>
