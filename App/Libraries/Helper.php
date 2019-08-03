<?php
if (@$position == 1) {
	include_once "App/Config/Databases.php";
} elseif (@$position == 2) {
	include_once "../../Config/Databases.php";
} else {
	include_once "../App/Config/Databases.php";
}

class Helper
{
    var $db;

    function __construct($userId = "")
    {
        $this->db = new Databases();
    }

    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    function basepath($folder_modul)
    {
        return $this->db->basepath . "Public/Upload/" . $folder_modul . "/";
    }

    function baseurl($folder_modul)
    {
        return $this->db->baseurl . "Public/Upload/" . $folder_modul . "/";
    }

    function baseurl_apps($folder_modul)
    {
        return $this->db->baseurl . "/";
    }

    function print_menu_recursive($parent_id)
    {
        $ret = "<ul>";
        $rs_menu = $this->menu_list_all($parent_id);
        while ($arr_menu = $rs_menu->FetchRow()) {
            $ret .= "<li><input type=\"checkbox\" value=\"" . $arr_menu['menu_id'] . "\" name=\"child_" . $arr_menu['menu_id'] . "\">" . $arr_menu['menu_name'] . "</li>";
            $cek_sub = $this->cek_sub_menu($arr_menu['menu_id']);
            // if($cek_sub!=0)
            $ret .= "<li>" . $this->print_menu_recursive($arr_menu['menu_id']) . "</li>";
        }
        return $ret .= "</ul>";
    }

    function notif_user_all_bygroup($group_id)
    {
        $sql = "select user_id from user_apps
				join role_group_menu on user_id_group = role_menu_group_id
				where role_menu_menu_id = '" . $group_id . "' ";
        $data = $this->db->_dbquery($sql);
        return $data;
    }

    function insert_notif($notif_data_id, $notif_from_user_id, $notif_to_user_id, $notif_method, $notif_desc, $notif_date)
    {
        $sql = "insert into notification (notif_id, notif_data_id, notif_from_user_id, notif_to_user_id, notif_method, notif_desc)
					values
				('" . $this->db->uniqid() . "', '" . $notif_data_id . "', '" . $notif_from_user_id . "', '" . $notif_to_user_id . "', '" . $notif_method . "', '" . $notif_desc . "')";
        $this->db->_dbquery($sql);
    }

    function hapus_notif($notif_data_id)
    {
        $sql = "delete from notification where notif_data_id = '" . $notif_data_id . "' ";
        $this->db->_dbquery($sql);
    }

    function list_notif($user_id)
    {
        $sql = "select notif_id, notif_data_id, user_username as from_auditor, notif_to_user_id, notif_method, notif_desc, notif_date, auditor_name
				from notification
				join user_apps on notif_from_user_id = user_id
                LEFT JOIN auditor ON user_apps.user_id_internal = auditor.auditor_id
				where notif_to_user_id = '" . $user_id . "' order by notif_date desc";
        $data = $this->db->_dbquery($sql);
        return $data;
    }

    function cek_sub_menu($parrent)
    {
        $sql = "select count(*) from par_menu where menu_parrent = '" . $parrent . "' ";
        $rs = $this->db->_dbquery($sql);
        $arr = $rs->FetchRow();
        return $arr[0];
    }

    function menu_akses($parrent = "")
    {
        $condition1 = "";
        $condition2 = "";
        if ($parrent != "") {
            $condition1 = ", akses_name, akses_id";
            $condition2 = "and akses_menu = '" . $parrent . "' ";
        }
        $sql = "select DISTINCT akses_menu" . $condition1 . " from par_audit_akses where 1=1 " . $condition2 . " order by akses_sort";
        $data = $this->db->_dbquery($sql);
        return $data;
    }

    function menu_list($parrent, $group_id = "")
    {
        $condition = "";
        if ($group_id != "") {
            $condition = " and role_menu_group_id = '" . $group_id . "' ";
        }

        $sql = "select DISTINCT menu_id, menu_name, menu_link, menu_parrent, menu_sort, menu_method from par_menu
				left join role_group_menu on menu_id = role_menu_menu_id
				where menu_del_st = 1 and menu_show = 1 and menu_parrent = '" . $parrent . "' " . $condition . "  order by menu_sort";
        $data = $this->db->_dbquery($sql);
        //echo $sql;
        return $data;
    }

    function menu_list_all($parrent)
    {
        $sql = "select DISTINCT menu_id, menu_name, menu_link, menu_parrent, menu_sort from par_menu
				left join role_group_menu on menu_id = role_menu_menu_id
				where menu_del_st = 1 and menu_parrent = '" . $parrent . "' order by menu_sort";
        $data = $this->db->_dbquery($sql);
        return $data;
    }

    function menu_list_view()
    {
        $sql = "select menu_id, menu_parrent from par_menu
				where menu_del_st = 1 ";
        $data = $this->db->_dbquery($sql);
        return $data;
    }

    function menu_list_parrent($id = "")
    {
        $condition = "";
        if ($id != "") {
            $condition = " and menu_id = '" . $id . "' ";
        }

        $sql = "select menu_id, menu_name
				from par_menu
				where menu_del_st = 1 and menu_parrent = '0' " . $condition . " order by menu_sort";
        $data = $this->db->_dbquery($sql);
        return $data;
    }

    function cek_akses($group, $method, $action)
    {
        $sql = "SELECT count(child.menu_id) as count_menu_id FROM role_group_menu
				join par_menu as child on role_menu_menu_id = child.menu_id
				join par_menu as parrent on child.menu_parrent = parrent.menu_id
				WHERE role_menu_group_id = '" . $group . "' and child.menu_method = '" . $action . "' and parrent.menu_method = '" . $method . "' "; // echo $sql;
        $rs = $this->db->_dbquery($sql);
        // echo $sql;
        $arr = $rs->FetchRow();
        return ($arr[0] == 0) ? false : true;
    }

    function cek_akses_data($group, $method)
    {
        $sql = "SELECT role_data_status FROM role_group_data
				WHERE role_data_method LIKE '%" . $method . "%' and role_data_id_group = '" . $group . "' ";
        $rs = $this->db->_dbquery($sql);
        $arr = $rs->FetchRow();
        return $arr['role_data_status'];
    }

    function statusCombo($def, $name)
    {
        $selNo = "";
        $selYes = "";
        if ($def == "0") {
            $selNo = "selected";
        }

        if ($def == "1") {
            $selYes = "selected";
        }

        $cb = "<select name=\"" . $name . "\">" . "<option value=\"0\" " . $selNo . " style=\"color:#FF0000\">No</option>" . "<option value=\"1\" " . $selYes . ">Yes</option>" . "</select>";
        return $cb;
    }
    function tahunCombo($name, $id, $value = '')
    {
        $tahun = date('Y');
        if($value == ''){
            $cb    = "<select name=\"" . $name . "\" id='".$id."' class='form-control'>";
            $cb   .= "<option value=''>--Tahun--</option>";
            for ($x = 2010; $x <= $tahun + 1; $x++) {
                $cb .= "<option value='" . $x . "'>" . $x . "</option>";
            }
            $cb .= "</select>";
        }else{
            $cb    = "<select name=\"" . $name . "\" id='".$id."'>";
            $cb   .= "<option value=''>--Tahun--</option>";
            for ($x = 2010; $x <= $tahun + 1; $x++) {
                if($x == $value){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
                $cb .= "<option value='" . $x . "'".$selected.">" . $x . "</option>";
            }
            $cb .= "</select>";
        }
        return $cb;
    }
    function tahunComboMulti($name, $id, $value = '')
    {
        $tahun = date('Y');
        if($value == ''){
            $cb    = "<select name=\"" . $name . "\" id='".$id."' class='form-control populate' required data-plugin-selectTwo>";
            $cb   .= "<option value=''>--Tahun--</option>";
            for ($x = 2010; $x <= $tahun + 1; $x++) {
                $cb .= "<option value='" . $x . "'>" . $x . "</option>";
            }
            $cb .= "</select>";
        }else{
            $cb    = "<select name=\"" . $name . "\" id='".$id."' class='form-control populate' data-plugin-selectTwo>";
            $cb   .= "<option value=''>--Tahun--</option>";
            for ($x = 2010; $x <= $tahun + 1; $x++) {
                if($x == $value){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
                $cb .= "<option value='" . $x . "'".$selected.">" . $x . "</option>";
            }
            $cb .= "</select>";
        }
        return $cb;
    }
    function tahunComboMultiRequired($name, $id, $value = '')
    {
        $tahun = date('Y');
        if($value == ''){
            $cb    = "<select name=\"" . $name . "\" id='".$id."' class='form-control populate' data-plugin-selectTwo required>";
            $cb   .= "<option value=''>-- Pilih Satu --</option>";
            for ($x = 2010; $x <= $tahun + 1; $x++) {
                $cb .= "<option value='" . $x . "'>" . $x . "</option>";
            }
            $cb .= "</select>";
        }else{
            $cb    = "<select name=\"" . $name . "\" id='".$id."' class='form-control populate' data-plugin-selectTwo>";
            $cb   .= "<option value=''>--Tahun--</option>";
            for ($x = 2010; $x <= $tahun + 1; $x++) {
                if($x == $value){
                    $selected = 'selected';
                }else{
                    $selected = '';
                }
                $cb .= "<option value='" . $x . "'".$selected.">" . $x . "</option>";
            }
            $cb .= "</select>";
        }
        return $cb;
    }

    function dbCombo($nama, $table, $id, $show, $where, $def, $other, $lit = false, $orderby = "", $parrent = false, $all = false, $class = '')
    {
        $combo = "";

        if ($lit) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($parrent) {
            $combo .= "<option value=\"\">-- Parrent --</option>\n";
        }

        if ($all) {
            $combo .= "<option value=\"\">-- All --</option>\n";
        }

        $html = "";
        $query = "SELECT " . $id . ", " . $show . " FROM " . $table . " WHERE 1=1 " . $where . $orderby;
		$data = $this->db->_dbquery($query);
		//echo $query;
        $html .= "<select name=\"" . $nama . "\" id=\"" . $nama . "\" class=\"form-control " . $class . "\" style=\"padding-bottom: 10px !important;\" data-plugin-selectTwo>";
        $html .= $combo;
        $rs_count = $data->RecordCount();
        if ($rs_count != 0) {
            while ($rs = $data->FetchRow()) {
                if ($rs[0] == $def) {
                    $selected = " selected ";
                } else {
                    $selected = "";
                }
                $html .= "<option value=\"" . $rs[0] . "\" " . $selected . ">" . $rs[1] . "</option>";
            }
        } else {
            $html .= "<option value=\"\" >No Record</option>";
        }
        $html .= "</select>";
        return $html;
    }
    function dbComboRequired($nama, $table, $id, $show, $where, $def, $other, $lit = false, $orderby = "", $parrent = false, $all = false, $class = '')
    {
        $combo = "";

        if ($lit) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($parrent) {
            $combo .= "<option value=\"\">-- Parrent --</option>\n";
        }

        if ($all) {
            $combo .= "<option value=\"\">-- All --</option>\n";
        }

        $html = "";
        $query = "SELECT " . $id . ", " . $show . " FROM " . $table . " WHERE 1=1 " . $where . $orderby;
		$data = $this->db->_dbquery($query);
		//echo $query;
        $html .= "<select name=\"" . $nama . "\" id=\"" . $nama . "\" class=\"form-control " . $class . "\" style=\"padding-bottom: 10px !important;\" data-plugin-selectTwo required>";
        $html .= $combo;
        $rs_count = $data->RecordCount();
        if ($rs_count != 0) {
            while ($rs = $data->FetchRow()) {
                if ($rs[0] == $def) {
                    $selected = " selected ";
                } else {
                    $selected = "";
                }
                $html .= "<option value=\"" . $rs[0] . "\" " . $selected . ">" . $rs[1] . "</option>";
            }
        } else {
            $html .= "<option value=\"\" >No Record</option>";
        }
        $html .= "</select>";
        return $html;
    }

    function dbComboXSelect($nama, $table, $id, $show, $where, $def, $other, $lit = false, $orderby = "", $parrent = false, $all = false, $class = '')
    {
        $combo = "";

        if ($lit) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($parrent) {
            $combo .= "<option value=\"\">-- Parrent --</option>\n";
        }

        if ($all) {
            $combo .= "<option value=\"\">-- All --</option>\n";
        }

        $html = "";
        $query = "select " . $id . ", " . $show . " from " . $table . " where 1=1 " . $where . $orderby;
        $data = $this->db->_dbquery($query);
        $html .= "<select name=\"" . $nama . "\" id=\"" . $nama . "\" class=\"form-control " . $class . "\" style=\"padding-bottom: 10px !important;\">";
        $html .= $combo;
        $rs_count = $data->RecordCount();
        if ($rs_count != 0) {
            while ($rs = $data->FetchRow()) {
                if ($rs[0] == $def) {
                    $selected = " selected ";
                } else {
                    $selected = "";
                }
                $html .= "<option value=\"" . $rs[0] . "\" " . $selected . ">" . $rs[1] . "</option>";
            }
        } else {
            $html .= "<option value=\"\" >No Record</option>";
        }
        $html .= "</select>";
        return $html;
    }

    function dbComboPerencanaan($nama, $table, $id, $show, $where, $def, $other, $lit = false, $orderby = "", $parrent = false, $all = false, $class = '')
    {
        $combo = "";

        if ($lit) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($parrent) {
            $combo .= "<option value=\"\">-- Parrent --</option>\n";
        }

        if ($all) {
            $combo .= "<option value=\"\">-- All --</option>\n";
        }

        $html = "";
        $query = "select " . $id . ", " . $show . " from " . $table . " where 1=1 " . $where . $orderby;
        $data = $this->db->_dbquery($query);
        $html .= "<select name=\"" . $nama . "\" id=\"" . $nama . "\" class='form-control'>";
        $html .= $combo;
        $rs_count = $data->RecordCount();
        if ($rs_count != 0) {
            while ($rs = $data->FetchRow()) {
                if ($rs[0] == $def) {
                    $selected = " selected ";
                } else {
                    $selected = "";
                }
                $html .= "<option value=\"" . $rs[0] . "\" " . $selected . ">" . $rs[1] . "</option>";
            }
        } else {
            $html .= "<option value=\"\" >No Record</option>";
        }
        $html .= "</select>";
        return $html;
    }
    function dbComboAuditor($nama, $table, $id, $show, $where, $def, $other, $lit = false, $orderby = "", $parrent = false, $all = false, $class = '')
    {
        $combo = "";

        if ($lit) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($parrent) {
            $combo .= "<option value=\"\">-- Parrent --</option>\n";
        }

        if ($all) {
            $combo .= "<option value=\"\">-- All --</option>\n";
        }

        $html = "";
        $query = "select " . $id . ", " . $show . " from " . $table . " where 1=1 " . $where . $orderby;
        $data = $this->db->_dbquery($query);
        $html .= "<select name=\"" . $nama . "\" id=\"" . $nama . "\" class=\"form-control " . $class . "\" style=\"padding-bottom: 10px !important;\">";
        $html .= $combo;
        $rs_count = $data->RecordCount();
        if ($rs_count != 0) {
            while ($rs = $data->FetchRow()) {
                if ($rs[0] == $def) {
                    $selected = " selected ";
                } else {
                    $selected = "";
                }
                $html .= "<option value=\"" . $rs[0] . "\" " . $selected . ">" . $rs[1] . "</option>";
            }
        } else {
            $html .= "<option value=\"\" >No Record</option>";
        }
        $html .= "</select>";
        return $html;
    }

    function buildCombo($objname, $data, $col_id, $col_show, $selected_id = "", $action_onchange = "", $style = "", $use_none = false, $use_head = false, $use_all = false, $other = "")
    {
        $combo = "";
        $combo .= "<select name=\"$objname\" id=\"$objname\" style=\"$style\"  class='form-control' onchange = \"return " . $action_onchange . "\">\n";
        if ($use_none) {
            $combo .= "<option value=\"\">==== Parent</option>\n";
        }

        if ($use_head) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($use_all) {
            $combo .= "<option value=\"\">-- All --</option>\n";
        }

        foreach ($data as $row) {
            if ($row[$col_id] == $selected_id) {
                $combo .= "<option value=\"$row[$col_id]\" selected>$row[$col_show]</option>\n";
            } else {
                $combo .= "<option value=\"$row[$col_id]\">$row[$col_show]</option>\n";
            }
        }
        $combo .= "</select>\n";
        return $combo;
    }

    function buildComboAuditor($objname, $data, $col_id, $col_show, $selected_id = "", $action_onchange = "", $style = "", $use_none = false, $use_head = false, $use_all = false, $other = "")
    {
        $combo = "";
        $combo .= "<select name=\"$objname\" id=\"$objname\" style=\"$style\"  class='form-control populate' onchange = \"return " . $action_onchange . "\" data-plugin-selectTwo>\n";
        if ($use_none) {
            $combo .= "<option value=\"\">==== Parent</option>\n";
        }

        if ($use_head) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($use_all) {
            $combo .= "<option value=\"\">-- All --</option>\n";
        }

        foreach ($data as $row) {
            if ($row[$col_id] == $selected_id) {
                $combo .= "<option value=\"$row[$col_id]\" selected>$row[$col_show]</option>\n";
            } else {
                $combo .= "<option value=\"$row[$col_id]\">$row[$col_show]</option>\n";
            }
        }
        $combo .= "</select>\n";
        return $combo;
    }
    function buildComboAuditorRequired($objname, $data, $col_id, $col_show, $selected_id = "", $action_onchange = "", $style = "", $use_none = false, $use_head = false, $use_all = false, $other = "")
    {
        $combo = "";
        $combo .= "<select name=\"$objname\" id=\"$objname\" style=\"$style\"  class='form-control populate' onchange = \"return " . $action_onchange . "\" data-plugin-selectTwo required>\n";
        if ($use_none) {
            $combo .= "<option value=\"\">==== Parent</option>\n";
        }

        if ($use_head) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($use_all) {
            $combo .= "<option value=\"\">-- All --</option>\n";
        }

        foreach ($data as $row) {
            if ($row[$col_id] == $selected_id) {
                $combo .= "<option value=\"$row[$col_id]\" selected>$row[$col_show]</option>\n";
            } else {
                $combo .= "<option value=\"$row[$col_id]\">$row[$col_show]</option>\n";
            }
        }
        $combo .= "</select>\n";
        return $combo;
    }

    function buildCombo_risk($objname, $data, $col_id, $col_show, $selected_id = "", $style = "", $use_none = false, $use_head = false, $use_all = false, $other = "", $classname="")
    {
        $combo = "";
        $combo .= "<select name=\"$objname\" id=\"$objname\" style=\"$style\"  class=\"form-control populate ".$classname."\">\n";
        if ($use_none) {
            $combo .= "<option value=\"\">==== Parent</option>\n";
        }

        if ($use_head) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($use_all) {
            $combo .= "<option value=\"\">==== All ====</option>\n";
        }

        foreach ($data as $row) {
            if ($row[$col_id] == $selected_id) {
                $combo .= "<option value=\"$row[$col_id]\" selected>$row[$col_show]</option>\n";
            } else {
                $combo .= "<option value=\"$row[$col_id]\">$row[$col_show]</option>\n";
            }
        }
        $combo .= "</select>\n";
        return $combo;
    }

    function buildCombo_risk_analisa($objname, $data, $col_id, $col_show, $selected_id = "", $style = "", $use_none = false, $use_head = false, $use_all = false, $other = "", $classname="")
    {
        $combo = "";
        $combo .= "<select name=\"$objname\" id=\"$objname\" style=\"$style\"  class=\"form-control ".$classname."\">\n";
        if ($use_none) {
            $combo .= "<option value=\"\">==== Parent</option>\n";
        }

        if ($use_head) {
            $combo .= "<option value=\"\">-- Pilih Satu --</option>\n";
        }

        if ($use_all) {
            $combo .= "<option value=\"\">==== All ====</option>\n";
        }

        foreach ($data as $row) {
            if ($row[$col_id] == $selected_id) {
                $combo .= "<option value=\"$row[$col_id]\" selected>$row[$col_show]</option>\n";
            } else {
                $combo .= "<option value=\"$row[$col_id]\">$row[$col_show]</option>\n";
            }
        }
        $combo .= "</select>\n";
        return $combo;
    }

    function buildMultipleCombo($objname, $data, $col_id, $col_show, $selected_id = "", $id_field = "")
    {
        $combo = "";
        $combo .= "<select name=\"$objname\" id=\"$id_field\" multiple=\"multiple\">\n";
        foreach ($data as $row) {
            $selected = "";
            if ($selected_id != "") {
                foreach ($selected_id as $row_select_id) {
                    if ($row[$col_id] == $row_select_id[1]) {
                        $selected = "selected";
                    }
                }
            }
            $combo .= "<option value=\"$row[$col_id]\" $selected>$row[$col_show]</option>\n";
        }
        $combo .= "</select>\n";
        return $combo;
    }

    function cek_holiday($start, $end)
    {
        $sql = "select count(*) FROM par_holiday where holiday_date >= '" . $start . "' and holiday_date <= '" . $end . "'";
        $data = $this->db->_dbquery($sql);
        $arr = $data->FetchRow();
        return $arr[0];
    }

    function dateSql($tgl)
    {
        if ($tgl != "") {
            $exp = explode("-", $tgl);
            $xxx = date("Y-m-d", mktime(0, 0, 0, $exp[1], $exp[0], $exp[2]));
            return $xxx;
        } else {
            return "";
        }
    }

    function dateTimeIndo($tgl)
    {
        if ($tgl != "") {
            $xxx = date("d-m-Y H:i:s", $tgl);
            return $xxx;
        } else {
            return "";
        }
    }

    function date_db($tgl)
    {
        if ($tgl != "") {
            $xxx = strtotime($tgl);
            return $xxx;
        } else {
            return "";
        }
    }

    function datedb_ori($tgl)
    {
        if ($tgl != "0000-00-00") {
            $xxx = date("Y-m-d", strtotime($tgl));
            return $xxx;
        }
    }

    function dateIndo($tgl)
    {
        if ($tgl > "0") {
            $xxx = date("d-m-Y", $tgl);
            return $xxx;
        } else {
            return "";
        }
    }

    function dateIndo2($tgl)
    {
        if ($tgl > "0") {
            $xxx = date("d-F-Y", $tgl);
            return $xxx;
        } else {
            return "";
        }
    }

    function dateIndo_ori($tgl)
    {
        if ($tgl != "0000-00-00") {
            $xxx = date("d-m-Y", strtotime($tgl));
            return $xxx;
        }
    }
    function selisih_tanggal($start, $end){
        $start = date("Y-m-d", $start);
        $end   = date("Y-m-d", $end);
        $start = strtotime($start);
        $end   = strtotime($end);
        $selisih = $end - $start;
        $hari = floor($selisih / (60 * 60 * 24));
        if($hari == 0){
            $hari = 1;
        }else{
            $hari = $hari;
        }
        return $hari;
    }

    function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
        }     		
        if($hasil == ''){
            $hasil = 1;
        }else{
            $hasil = $hasil;
        }
		return $hasil;
	}

    function combo_hari_indo($hari, $name)
    {
        $senin = "";
        $selasa = "";
        $rabu = "";
        $kamis = "";
        $jumat = "";
        $sabtu = "";
        $minggu = "";
        if ($hari == "1") {
            $senin = "selected";
        }

        if ($hari == "2") {
            $selasa = "selected";
        }

        if ($hari == "3") {
            $rabu = "selected";
        }

        if ($hari == "4") {
            $kamis = "selected";
        }

        if ($hari == "5") {
            $jumat = "selected";
        }

        if ($hari == "6") {
            $sabtu = "selected";
        }

        if ($hari == "7") {
            $minggu = "selected";
        }

        $cb = "<select name=\"" . $name . "\">" . "<option value=\"1\" " . $senin . ">Senin</option>" . "<option value=\"2\" " . $selasa . ">Selasa</option>" . "<option value=\"3\" " . $rabu . ">Rabu</option>" . "<option value=\"4\" " . $kamis . ">Kamis</option>" . "<option value=\"5\" " . $jumat . ">Jum'at</option>" . "<option value=\"6\" " . $sabtu . ">Sabtu</option>" . "<option value=\"7\" " . $minggu . ">Minggu</option>" . "</select>";
        return $cb;
    }

    function dateIndoLengkap($tgl)
    {
        if ($tgl != "") {
            $tgl = $this->dateIndo($tgl);
            $exp = explode("-", $tgl);
            $tgl = @$exp[0];
            $thn = @$exp[2];
            $bln = @$exp[1];
            if ($bln == 1) {
                $bln = "Januari";
            }
            if ($bln == 2) {
                $bln = "Februari";
            }
            if ($bln == 3) {
                $bln = "Maret";
            }
            if ($bln == 4) {
                $bln = "April";
            }
            if ($bln == 5) {
                $bln = "Mei";
            }
            if ($bln == 6) {
                $bln = "Juni";
            }
            if ($bln == 7) {
                $bln = "Juli";
            }
            if ($bln == 8) {
                $bln = "Agustus";
            }
            if ($bln == 9) {
                $bln = "September";
            }
            if ($bln == 10) {
                $bln = "Oktober";
            }
            if ($bln == 11) {
                $bln = "November";
            }
            if ($bln == 12) {
                $bln = "Desember";
            }
            $xxx = "$tgl $bln $thn";
            return $xxx;
        }
    }

    function nama_hari_indo($hari)
    {
        if ($hari == 1) {
            $hari = "Senin";
        }
        if ($hari == 2) {
            $hari = "Selasa";
        }
        if ($hari == 3) {
            $hari = "Rabu";
        }
        if ($hari == 4) {
            $hari = "Kamis";
        }
        if ($hari == 5) {
            $hari = "Jum'at";
        }
        if ($hari == 6) {
            $hari = "Sabtu";
        }
        if ($hari == 7) {
            $hari = "Minggu";
        }
        return $hari;
    }

    function weekNumberOfMonth($date)
    {
        $tgl = date_parse($date);
        $tanggal = $tgl['day'];
        $bulan = $tgl['month'];
        $tahun = $tgl['year'];
        // tanggal 1 tiap bulan
        $tanggalAwalBulan = mktime(0, 0, 0, $bulan, 1, $tahun);
        $mingguAwalBulan = (int)date('W', $tanggalAwalBulan);
        // tanggal sekarang
        $tanggalYangDicari = mktime(0, 0, 0, $bulan, $tanggal, $tahun);
        $mingguTanggalYangDicari = (int)date('W', $tanggalYangDicari);
        $mingguKe = $mingguTanggalYangDicari - $mingguAwalBulan + 1;
        return $mingguKe;
    }

    function time_diff($dtSys, $dtfile)
    {
        $folder = "06082015";
        $y1 = substr($dtfile, 4, 4);
        $m1 = substr($dtfile, 2, 2);
        $d1 = substr($dtfile, 0, 2);
        $convert_datefile = $d1 . "-" . $m1 . "-" . $y1;
        $DateDiff = floor(strtotime($dtSys) - strtotime($convert_datefile)) / 86400;
        return $DateDiff;
    }

    function cek_week($date, $jadwal, $SyatemDate)
    {
        $cek_exp = date('d-m-Y', strtotime("-" . $jadwal . " week"));
        $y_exp = substr($cek_exp, 6, 4);
        $m_exp = substr($cek_exp, 3, 2);
        $w_exp = $this->weekNumberOfMonth($cek_exp);
        $y = substr($date, 3, 4);
        $m = substr($date, 1, 2);
        $w = substr($date, 0, 1);
        if ($y_exp <= $y) {
            if ($m_exp <= $m) {
                if ($w_exp <= $w) {
                    return "aktif";
                } else {
                    return "Hapus";
                }
            } else {
                return "Hapus";
            }
        } else {
            return "Hapus";
        }
    }

    function cek_month($date, $jadwal)
    {
        $cek_exp = date('01-m-Y', strtotime("-" . $jadwal . " month"));
        $y_exp = substr($cek_exp, 6, 4);
        $m_exp = substr($cek_exp, 3, 2);
        $y = substr($date, 2, 4);
        $m = substr($date, 0, 2);
        $date_file = strtotime("01-" . $m . "-" . $y);
        if ($date_file < strtotime($cek_exp)) {
            return "Hapus";
        } else {
            return "Aktif";
        }
    }

    function js_alert_act($act_type, $nama = "")
    {
        if ($act_type == 1) {
            $str_alert = "Data telah diubah";
        } else if ($act_type == 2) {
            $str_alert = "Data telah dihapus";
        } else if ($act_type == 3) {
            $str_alert = "Data telah disimpan";
        } else if ($act_type == 4) {
            $str_alert = "Data " . $nama . " Sudah Terdaftar";
        } else if ($act_type == 5) {
            $str_alert = "Silahkan Isi Mandatory Field";
        } else if ($act_type == 6) {
            $str_alert = "Password tidak sama";
        } else if ($act_type == 7) {
            $str_alert = "Data Telah Diajukan";
        } else if ($act_type == 8) {
            $str_alert = "Data Telah Disetujui";
        } else if ($act_type == 9) {
            $str_alert = "Data Telah Ditolak";
        } else if ($act_type == 10) {
            $str_alert = "Data Gagal Disimpan";
        } else if ($act_type == 11) {
            $str_alert = "Database Berhasil Dibackup";
        } else if ($act_type == 12) {
            $str_alert = "Database Berhasil Direstore, Silahkan Logout dan Login Kembali";
        }
        echo "<script> alert('".$str_alert."');</script>";
    }

    function replacetext($text, $money = false)
    {
        $replaceText = @trim($text);
        $replaceText = str_replace("'", "\'", $replaceText);
        if ($money) {
            $replaceText = str_replace(",", "", $replaceText);
        }

        return $replaceText;
    }

    function text_show($text)
    {
        $text = str_replace("<p>", "", $text);
        $text = str_replace("</p>", "<br>", $text);
        return $text;
    }

    function xss_clean($data)
    {
        // Fix &entity\n;
        $data = str_replace(array(
            '&amp;',
            '&lt;',
            '&gt;',
        ), array(
            '&amp;amp;',
            '&amp;lt;',
            '&amp;gt;',
        ), $data);
        $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
        $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
        $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

        // Remove any attribute starting with "on" or xmlns
        $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

        // Remove javascript: and vbscript: protocols
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
        $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

        // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
        $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

        // Remove namespaced elements (we do not need them)
        $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

        do {
            // Remove really unwanted tags
            $old_data = $data;
            $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
        } while ($old_data !== $data);

        // we are done...
        return $data;
    }

    function format_uang($test = "", $mu = "")
    {
        if ($mu == "") {
            $mu = 0;
        }

        if ($test != "") {
            $x = "";
            $y = "";
            $jml = strlen($test);
            $sisa = $jml % 3;
            $bagi = ($jml - $sisa) / 3;
            $titik = $bagi - 1;
            $pos = array(3, 6, 9, 12, 15, 18, 21, 24, 27, 30, 33, 36, 39, 42, 45, 48, 51, 54, 57, 60);
            $mata = array("", "$", "?", "?", "");
            for ($i = 0; $i < $jml; $i++) {
                if ($i == $sisa && $i != 0) {
                    $x .= ",";
                } elseif ($i > $sisa) {
                    $y += 1;
                }
                for ($j = 0; $j < $titik; $j++) {
                    if ($y == $pos[$j]) {
                        $x .= ",";
                    }
                }
                $x .= substr($test, $i, 1);
            }
            return $mata[$mu] . "  " . $x;
        }
    }

    function UploadFile($folder, $nama_file, $nama_file_old)
    {
        $_UPLOAD_DIR = $this->basepath($folder);
        if ($nama_file_old != "") {
            $x = $_UPLOAD_DIR . $nama_file_old;
            if (file_exists($x)) {
                unlink($x);
            }
        }

        $uploadfile = $_UPLOAD_DIR . basename($_FILES[$nama_file]['name']);
        if (move_uploaded_file($_FILES[$nama_file]['tmp_name'], $uploadfile)) {
            return true;
        } else {
            return false;
        }
    }

    function HapusFile($folder, $nama_file)
    {
        $_UPLOAD_DIR = $this->basepath($folder);
        if ($nama_file != "") {
            $x = $_UPLOAD_DIR . $nama_file;
            if (file_exists($x)) {
                unlink($x);
            }
        }
    }

    function UploadFileMulti($folder, $nama_file)
    {
        $_UPLOAD_DIR = $this->basepath($folder);
        if (isset($_FILES[$nama_file]['tmp_name'])) {
            $num_files = count($_FILES[$nama_file]['tmp_name']);
            for ($i = 0; $i < $num_files; $i++) {
                if (is_uploaded_file($_FILES[$nama_file]['tmp_name'][$i])) {
                    @copy($_FILES[$nama_file]['tmp_name'][$i], $_UPLOAD_DIR . $_FILES[$nama_file]['name'][$i]);
                }
            }
        }
    }

    function combo_pendidikan($name, $selected)
    {
        $select_sd = "";
        $select_smp = "";
        $select_sma = "";
        $select_d1 = "";
        $select_d2 = "";
        $select_d3 = "";
        $select_d4 = "";
        $select_s1 = "";
        $select_s2 = "";
        $select_s3 = "";
        if ($selected == "SD") {
            $select_sd = "selected";
        }

        if ($selected == "SMP") {
            $select_smp = "selected";
        }

        if ($selected == "SMA") {
            $select_sma = "selected";
        }

        if ($selected == "D1") {
            $select_d1 = "selected";
        }

        if ($selected == "D2") {
            $select_d2 = "selected";
        }

        if ($selected == "D3") {
            $select_d3 = "selected";
        }

        if ($selected == "D4") {
            $select_d4 = "selected";
        }

        if ($selected == "S1") {
            $select_s1 = "selected";
        }

        if ($selected == "S2") {
            $select_s2 = "selected";
        }

        if ($selected == "S3") {
            $select_s3 = "selected";
        }

        $cb = "<select name=\"" . $name . "\" id=\"" . $name . "\">";
        $cb .= "<option value=\"\">=== Pilih Satu ===</option>";
        $cb .= "<option value=\"SD\" " . $select_sd . " >SD</option>";
        $cb .= "<option value=\"SMP\" " . $select_smp . ">SMP</option>";
        $cb .= "<option value=\"SMA\" " . $select_sma . ">SMA</option>";
        $cb .= "<option value=\"D1\" " . $select_d1 . ">D1</option>";
        $cb .= "<option value=\"D2\" " . $select_d2 . ">D2</option>";
        $cb .= "<option value=\"D3\" " . $select_d3 . ">D3</option>";
        $cb .= "<option value=\"D4\" " . $select_d4 . ">D4</option>";
        $cb .= "<option value=\"S1\" " . $select_s1 . ">S1</option>";
        $cb .= "<option value=\"S2\" " . $select_s2 . ">S2</option>";
        $cb .= "<option value=\"S3\" " . $select_s3 . ">S3</option>";
        $cb .= "</select>";
        return $cb;
    }

    function combo_jenis_kelamin($name, $selected)
    {
        $select_p = "";
        $select_l = "";
        if ($selected == "Laki Laki") {
            $select_p = "selected";
        }

        if ($selected == "Perempuan") {
            $select_l = "selected";
        }

        $cb = "<select name=\"" . $name . "\" id=\"" . $name . "\" class='form-control'>";
        $cb .= "<option value=\"\">=== Pilih Satu ===</option>";
        $cb .= "<option value=\"Laki Laki\" " . $select_p . " >Laki Laki</option>";
        $cb .= "<option value=\"Perempuan\" " . $select_l . ">Perempuan</option>";
        $cb .= "</select>";
        return $cb;
    }

    function combo_agama($name, $selected)
    {
        $select_islam = "";
        $select_katolik = "";
        $select_kristen = "";
        $select_buddha = "";
        $select_hindu = "";

        if ($selected == "Islam") {
            $select_islam = "selected";
        }

        if ($selected == "Katolik") {
            $select_katolik = "selected";
        }

        if ($selected == "Kristen") {
            $select_kristen = "selected";
        }

        if ($selected == "Buddha") {
            $select_buddha = "selected";
        }

        if ($selected == "Hindu") {
            $select_hindu = "selected";
        }

        $cb = "<select name=\"" . $name . "\" id=\"" . $name . "\" class='form-control'>";
        $cb .= "<option value=\"\">=== Pilih Satu ===</option>";
        $cb .= "<option value=\"Islam\" " . $select_islam . " >Islam</option>";
        $cb .= "<option value=\"Katolik\" " . $select_katolik . ">Katolik</option>";
        $cb .= "<option value=\"Kristen\" " . $select_kristen . ">Kristen</option>";
        $cb .= "<option value=\"Buddha\" " . $select_buddha . ">Buddha</option>";
        $cb .= "<option value=\"Hindu\" " . $select_hindu . ">Hindu</option>";
        $cb .= "</select>";
        return $cb;
    }

    function image($sesUserId)
    {
        $sql = "SELECT auditor_foto FROM `auditor` LEFT JOIN user_apps ON user_apps.user_id_internal = auditor.auditor_id where user_apps.user_id = '$sesUserId'";

        $data = $this->db->_dbquery($sql);
        $arr = $data->FetchRow();

        return $arr[0];
    }

    function name($sesUserId)
    {
        $sql = "SELECT auditor_name FROM `auditor` LEFT JOIN user_apps ON user_apps.user_id_internal = auditor.auditor_id where user_apps.user_id = '$sesUserId'";

        $data = $this->db->_dbquery($sql);
        $arr = $data->FetchRow();

        return $arr[0];
    }

    function combo_tahapan($name, $selected)
    {
        $select_pendahuluan = "";
        $select_rinci = "";
        $select_pelaksanaan = "";

        if ($selected == "PKA Pendahuluan") {
            $select_pendahuluan = "selected";
        }

        if ($selected == "PKA Pelaksanaan") {
            $select_pelaksanaan = "selected";
        }

        if ($selected == "PKA Rinci") {
            $select_rinci = "selected";
        }

        $cb = "<select name=\"" . $name . "\" id=\"" . $name . "\">";
        $cb .= "<option value=\"\">=== Pilih Satu ===</option>";
        $cb .= "<option value=\"PKA Pendahuluan\" " . $select_pendahuluan . " >PKA Pendahuluan</option>";
        $cb .= "<option value=\"PKA Pelaksanaan\" " . $select_pelaksanaan . ">PKA Pelaksanaan</option>";
        $cb .= "<option value=\"PKA Rinci\" " . $select_rinci . ">PKA Rinci</option>";
        $cb .= "</select>";
        return $cb;
    }
    function KonDecRomawi($angka)
    {
        $hsl = "";
        if ($angka < 1 || $angka > 5000) {
            // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
            $hsl = "Batas Angka 1 s/d 5000";
        } else {
            while ($angka >= 1000) {
                // While itu termasuk kedalam statement perulangan
                // Jadi misal variable angka lebih dari sama dengan 1000
                // Kondisi ini akan di jalankan
                $hsl .= "M";
                // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
                // Varible hsl
                $angka -= 1000;
                // Lalu setelah itu varible angka di kurangi 1000 ,
                // Kenapa di kurangi
                // Karena statment ini mengambil 1000 untuk di konversi menjadi M
            }
        }
        if ($angka >= 500) {
            // statement di atas akan bernilai true / benar
            // Jika var angka lebih dari sama dengan 500
            if ($angka > 500) {
                if ($angka >= 900) {
                    $hsl .= "CM";
                    $angka -= 900;
                } else {
                    $hsl .= "D";
                    $angka -= 500;
                }
            }
        }
        while ($angka >= 100) {
            if ($angka >= 400) {
                $hsl .= "CD";
                $angka -= 400;
            } else {
                $angka -= 100;
            }
        }
        if ($angka >= 50) {
            if ($angka >= 90) {
                $hsl .= "XC";
                $angka -= 90;
            } else {
                $hsl .= "L";
                $angka -= 50;
            }
        }
        while ($angka >= 10) {
            if ($angka >= 40) {
                $hsl .= "XL";
                $angka -= 40;
            } else {
                $hsl .= "X";
                $angka -= 10;
            }
        }
        if ($angka >= 5) {
            if ($angka == 9) {
                $hsl .= "IX";
                $angka -= 9;
            } else {
                $hsl .= "V";
                $angka -= 5;
            }
        }
        while ($angka >= 1) {
            if ($angka == 4) {
                $hsl .= "IV";
                $angka -= 4;
            } else {
                $hsl .= "I";
                $angka -= 1;
            }
        }
        return ($hsl);
    }

    function urlImage($path)
    {
        return $this->db->weburl . $path;
    }

    function filter($data)
    {
        $filter = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
        return $filter;
    }

    public function postData($name)
    {
        $data   = $this->filter($_POST[$name]);
        return $data;
    }
    public function getData($name)
    {
        $data   = $this->filter($_GET[$name]);
        return $data;
    }
    function unixid()
    {
        $a = sha1(microtime());
        return $a;
    }

    public function deleteData($table, $key, $id) {
        $sql = "DELETE FROM ".$table." WHERE ".$key."='".$id."'";
        $this->db->_dbquery($sql);
    }

    /*FUNGSI USER*/
    public function cekAction($group_id)
    {
        if($group_id == 'a38c99db8e8777d33b3b358d59a47ae1a0c69d66' || $group_id == '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0' || $group_id == '46e8d25b481a17e5fe2ac046b4c734fd27d3491b'){ //jika grup nya vendor, admin, atau inspektur bisa Mengedit Dan Menghapus
            $action = 1;
        }else{ //selain itu Tidak bisa Mengedit Dan Menghapus
            $action = 0;
        }
        return $action;
    }

    public function hitungRisiko($kemungkinan, $dampak ) {
        $deretnilai = array(
                        9, 15, 16, 23, 25, 
                        6, 12, 16, 19, 24, 
                        4, 10, 14, 17, 22, 
                        2, 7, 11, 13, 21,
                        1, 3, 5, 8, 20
                    );
        $x           = 0;
        $jumlahderet = 6;
        $kemungkinan = $jumlahderet - $kemungkinan;
        for($i=1; $i <=5; $i++){
            for($j=1; $j<=5; $j++){
                $y[$i][$j] = $deretnilai[$x];
                if($i == $kemungkinan && $j == $dampak){
                    $nilaiRisiko = $y[$i][$j];
                }
                $x++;
            }
        }
        return $nilaiRisiko;
    }
    public function bulanTahun($date){
        $tanggal = explode(" ", $date);
        $out     = $tanggal[1]."-".$tanggal[2];
        return $out;
    }
    public function jumlahHari($nilai) {
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        if($nilai==0){
            return "Kosong";
        }elseif ($nilai < 12&$nilai!=0) {
            return "" . $huruf[$nilai];
        } elseif ($nilai < 20) {
            return $this->jumlahHari($nilai - 10) . " Belas ";
        } elseif ($nilai < 100) {
            return $this->jumlahHari($nilai / 10) . " Puluh " . $this->jumlahHari($nilai % 10);
        } elseif ($nilai < 200) {
            return " Seratus " . $this->jumlahHari($nilai - 100);
        } elseif ($nilai < 1000) {
            return $this->jumlahHari($nilai / 100) . " Ratus " . $this->jumlahHari($nilai % 100);
        } elseif ($nilai < 2000) {
            return " Seribu " . $this->jumlahHari($nilai - 1000);
        } elseif ($nilai < 1000000) {
            return $this->jumlahHari($nilai / 1000) . " Ribu " . $this->jumlahHari($nilai % 1000);
        } elseif ($nilai < 1000000000) {
            return $this->jumlahHari($nilai / 1000000) . " Juta " . $this->jumlahHari($nilai % 1000000);
        }elseif ($nilai < 1000000000000) {
            return $this->jumlahHari($nilai / 1000000000) . " Milyar " . $this->jumlahHari($nilai % 1000000000);
        }elseif ($nilai < 100000000000000) {
            return $this->jumlahHari($nilai / 1000000000000) . " Trilyun " . $this->jumlahHari($nilai % 1000000000000);
        }elseif ($nilai <= 100000000000000) {
            return "Maaf Tidak Dapat di Prose Karena Jumlah nilai Terlalu Besar ";
        }
    }
    function filterCk($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function showHtml($data) {
        $data = htmlspecialchars_decode(htmlspecialchars_decode($data));
        return $data;
    }
}
?>