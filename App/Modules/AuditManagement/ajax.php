<?
$position = 2;
include_once "../../Classes/report_class.php";
include_once "../../Classes/param_class.php";
include_once "../../Classes/auditor_class.php";
include_once "../../Classes/program_audit_class.php";
include_once "../../Libraries/Helper.php";
include_once "../../Classes/finding_class.php";
include_once "../../Classes/dashboard_class.php";
include_once "../../Classes/assignment_class.php";
include_once "../../Classes/rekomendasi_class.php";

session_start();
session_regenerate_id();
$ses_UserId = $_SESSION['ses_userId'];
session_write_close();

$reports       = new report($ses_UserId);
$params        = new param($ses_UserId);
$auditors      = new auditor($ses_UserId);
$Helper        = new Helper($ses_UserId);
$programaudits = new programaudit($ses_UserId);
$findings      = new finding($ses_UserId);
$dashboards    = new dashboard($ses_UserId);
$assigns       = new assign($ses_UserId);
$rekomendasis  = new rekomendasi($ses_UserId); 

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );
switch ($_action) {
	case "getsbu_rinci" :
		$idsatker = $Helper->replacetext ( $_POST ["idsatker"] );
		$golongan = $Helper->replacetext ( $_POST ["golongan"] );
		$rs = $params->get_sbu_rinci ( $idsatker, $golongan );
		$data = array ();
		while ( $row = $rs->FetchRow () ) {
			$data ["sbu_rinci"] [] = array (
					'sbu' => $row ['sbu_name'],
					'amount' => $row ['sbu_rinci_amount'],
					'status' => $row ['sbu_status']
			);
		}
		echo json_encode ( $data );
		exit ();
		break;
	case "getgol_auditor" :
		$id_auditor = $Helper->replacetext ( $_POST ["id_auditor"] );
		$rs = $auditors->auditor_data_viewlist ( $id_auditor );
		$row = $rs->FetchRow ();
		echo $row ['auditor_golongan'];
		exit ();
		break;
	case "getDesc_refProg" :
		$id_sub = $Helper->replacetext ( $_POST ["id_sub"] );
		$rs = $params->get_ref_desc ( $id_sub );
		$data = array ();
		while ( $row = $rs->FetchRow () ) {
			$data ["desc"] [] = array (
					'kode' => $row ['ref_program_code'],
					'judul' => $row ['ref_program_title'],
					'procedure' => $Helper->text_show($row ['ref_program_procedure'])
			);
		}
		echo json_encode ( $data );
		exit ();
		break;
	case "getTemuanCount":
        $finding_type_name     = $Helper->replacetext($_POST['name']);
        $tahun                 = $Helper->replacetext($_POST['tahun']);
        $tipe_audit            = $Helper->replacetext($_POST['tipe_audit']);
        $finding_sub_type_name = $dashboards->get_finding_sub_type($finding_type_name);
        $findings              = array();
        $html = '<canvas id="myChart2"></canvas>';
        foreach ($finding_sub_type_name->GetArray() as $finding) {
            array_push($findings, array(
                "finding_sub_type_name" => $finding['sub_type_name'],
                "counts"                => $dashboards->finding_type_finding_sub_count($finding['sub_type_id'], $tahun, $tipe_audit),
                "canvas" => $html

            ));
        }
        $json = $findings;
        echo json_encode($json);
        break;
    case "postmatrix":
        $assign_id      = $Helper->replacetext($_POST['assign_id']);
        $rs_list_temuan = $assigns->temuan_list_matrix($assign_id);
        $count          = array();
        foreach ($rs_list_temuan as $value) {
            $findings->finding_matrix_edit($_POST['finding_id_' . $value['finding_id']], $Helper->replacetext($_POST['finding_kondisi_' . $value['finding_id']]), $Helper->replacetext($_POST['finding_sebab_' . $value['finding_id']]), $Helper->replacetext($_POST['finding_akibat_' . $value['finding_id']]));
            $rs_list_rek = $findings->get_rekomendasi_list_matrix($value['finding_id']);
            foreach ($rs_list_rek as $rek) {
                $rekomendasis->rekomendasi_matrix_edit($_POST['rekomendasi_id_' . $rek['rekomendasi_id']], $_POST['rekomendasi_desc_' . $rek['rekomendasi_id']]);
            }
        }
        break;
    case "getassigndata":
        $html       = '';
        $param      = explode('-', $_REQUEST['params']);
        $tahun      = ($_REQUEST['tahun']) ? $_REQUEST['tahun'] : "";
        $tipe_audit = ($_REQUEST['tipe_audit']) ? $_REQUEST['tipe_audit'] : "";

        switch ($_REQUEST['labels']) {
            case "Jumlah Rekomendasi":
                $html .= "<center><h1>Daftar Rekomendasi {$param[1]}</h1></center>";
                $html .= "<br>";
                $html .= "<table class='table table-bordered table-striped table-condensed mb-none' border='1' cellspacing='0' cellpadding='0'";
                $html .= "<tr>";
                $html .= "<th align='center' width='5%'>No</th>";
                $html .= "<th>Kode</th>";
                $html .= "<th width='75%'>Rekomendasi</th>";
                $html .= "<th>Status</th>";
                $html .= "</tr>";
                $rs_list_rek = $dashboards->list_rekomendasi_per_assign($param[0], $tahun, $tipe_audit);
                foreach ($rs_list_rek as $key => $rek) {
                    $html .= "<tr>";
                    $html .= "<td align='center'>" . ++$key . "</td>";
                    $html .= "<td align='center'>" . $rek['kode_rek_code'] . "</td>";
                    $html .= "<td>" . $Helper->text_show($rek['rekomendasi_desc']) . "</td>";
                    $html .= "<td>" . $rek['rekomendasi_status'] . "</td>";
                    $html .= "</tr>";
                }
                $html .= "</table>";
                break;
            case "Jumlah Temuan":
                $html .= "<center><h1>Daftar Temuan {$param[1]}</h1></center>";
                $html .= "<br>";
                $html .= "<table class='table table-bordered table-striped table-condensed mb-none' border='1' cellspacing='0' cellpadding='0'";
                $html .= "<tr>";
                $html .= "<th align='center' width='5%'>No</th>";
                $html .= "<th width='10%'>Kode Temuan</th>";
                // $html .= "<th width='10%'>No Temuan</th>";
                $html .= "<th width='75%'>Judul</th>";
                $html .= "</tr>";
                $rs_list_tem = $dashboards->list_temuan_per_assign($param[0], $tahun, $tipe_audit);
                foreach ($rs_list_tem as $key => $tem) {
                    $html .= "<tr>";
                    $html .= "<td align='center'>" . ++$key . "</td>";
                    $html .= "<td align='center'>" . $tem['kode_temuan'] . "</td>";
                    // $html .= "<td align='center'>" . $tem['finding_no'] . "</td>";
                    $html .= "<td>" . $tem['finding_judul'] . "</td>";
                    $html .= "</tr>";
                }
                $html .= "</table>";
                break;
            case "Jumlah Tindak Lanjut":
                $html .= "<center><h1>Daftar Tindak Lanjut {$param[1]}</h1></center>";
                $html .= "<br>";
                $html .= "<table class='table table-bordered table-striped table-condensed mb-none' border='1' cellspacing='0' cellpadding='0'";
                $html .= "<tr>";
                $html .= "<th align='center' width='5%'>No</th>";
                $html .= "<th width='80%'>Tindak Lanjut</th>";
                $html .= "<th width='15%'>Status</th>";
                $html .= "</tr>";
                $rs_list_tl = $dashboards->list_tindak_lanjut_per_assign($param[0], $tahun, $tipe_audit);
                foreach ($rs_list_tl as $key => $tl) {
                    $html .= "<tr>";
                    $html .= "<td align='center'>" . ++$key . "</td>";
                    $html .= "<td>" . $Helper->text_show($tl['tl_desc']) . "</td>";
                    $html .= "<td align='center'>" . $tl['tl_status'] . "</td>";
                    $html .= "</tr>";
                }
                $html .= "</table>";
                break;
        }
        echo $html;
        break;


    case "getpka":
        $idbidang      = $Helper->replacetext($_REQUEST['id']);
        //echo $idbidang;
        $rs            = $params->ref_program_viewlist_byAspek($idbidang);
        echo "<table class='table table-bordered table-hover'>";
        $x = 0;
        echo "<tr><th width='5%' class='text-center'>No.</th><th width='5%' class='text-center'><label class='customcheck'><input type='checkbox' name='checkall' id='checkall' onClick='check_uncheck_checkbox(this.checked);'><span class='checkmark'></span></label></th><th class='text-center'>Kode & Judul</th></tr>";
        while ($row = $rs->FetchRow()):
            $x++;
            echo "<tr><td width='5%' class='text-center'>" . $x . "</td><td width='5%' class='text-center'><label class='customcheck'><input type='checkbox' name='ref_program[]' value='" . $row['ref_program_id'] . "'><span class='checkmark'></span></label></td><td>" . $row['ref_program_procedure'] . "</td></tr>";
            //echo "<label class='customcheck'>One <input type='checkbox' checked='checked'><span class='checkmark'></span></label>";

        endwhile;
        echo "</table>";
        exit();
        break;

    case "getyear":
        $year = $_REQUEST['value'];
        @$id = $_REQUEST['id'];
        if ($id != '') {
            $rs_assign = $assigns->assign_viewlist($id);
            $arr = $rs_assign->FetchRow();
            $html = '<fieldset class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Kegiatan</label>
                    <input type="text" class="form-control" name="tanggal_awal" id="tanggal_awal" value="'.$Helper->dateIndo($arr['assign_start_date']).'"> 
                    <label class="span0">s/d</label> 
                    <input type="text" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="'.$Helper->dateIndo($arr['assign_end_date']).'">
                    <span class="required">*</span>
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Hari Persiapan</label>
                    <input type="text" class="form-control" name="hari_persiapan" id="hari_persiapan" value="'.$arr['assign_hari_persiapan'].'">
                    <label class="col-sm-3 control-label">Tanggal Persiapan</label>
                    <input type="text" class="form-control" name="tanggal_persiapan_awal" id="tanggal_persiapan_awal" value="'.$Helper->dateIndo($arr['assign_persiapan_awal']).'"> 
                    <label class="span0">s/d</label> 
                    <input type="text" class="form-control" name="tanggal_persiapan_akhir" id="tanggal_persiapan_akhir" value="'.$Helper->dateIndo($arr['assign_persiapan_akhir']).'">
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Hari Pelaksanaan</label>
                    <input type="text" class="form-control" name="hari_pelaksanaan" id="hari_pelaksanaan" value="'.$arr['assign_hari_pelaksanaan'].'">
                    <label class="col-sm-3 control-label">Tanggal Pelaksanaan</label>
                    <input type="text" class="form-control" name="tanggal_pelaksanaan_awal" id="tanggal_pelaksanaan_awal" value="'.$Helper->dateIndo($arr['assign_pelaksanaan_awal']).'"> 
                    <label class="span0">s/d</label> 
                    <input type="text" class="form-control" name="tanggal_pelaksanaan_akhir" id="tanggal_pelaksanaan_akhir" value="'.$Helper->dateIndo($arr['assign_pelaksanaan_akhir']).'">
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Hari Pelaporan</label>
                    <input type="text" class="form-control" name="hari_pelaporan" id="hari_pelaporan" value="'.$arr['assign_hari_pelaporan'].'">
                    <label class="col-sm-3 control-label">Tanggal Pelaporan</label>
                    <input type="text" class="form-control" name="tanggal_pelaporan_awal" id="tanggal_pelaporan_awal" value="'.$Helper->dateIndo($arr['assign_pelaporan_awal']).'"> 
                    <label class="span0">s/d</label> 
                    <input type="text" class="form-control" name="tanggal_pelaporan_akhir" id="tanggal_pelaporan_akhir" value="'.$Helper->dateIndo($arr['assign_pelaporan_akhir']).'">
                </fieldset>
                <script>
                    $("#tanggal_awal").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_akhir").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_persiapan_awal").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_persiapan_akhir").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_pelaksanaan_awal").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_pelaksanaan_akhir").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_pelaporan_awal").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_pelaporan_akhir").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                </script>';
        } else {
            $html = '<fieldset class="form-group">
                    <label class="col-sm-3 control-label">Tanggal Kegiatan</label> 
                    <input type="text" class="form-control" name="tanggal_awal" id="tanggal_awal"> 
                    <label class="span0">s/d</label> 
                    <input type="text" class="form-control" name="tanggal_akhir" id="tanggal_akhir">
                    <span class="required">*</span>
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Hari Persiapan</label>
                    <input type="text" class="form-control" name="hari_persiapan" id="hari_persiapan">
                    <label class="col-sm-3 control-label">Tanggal Persiapan</label> 
                    <input type="text" class="form-control" name="tanggal_persiapan_awal" id="tanggal_persiapan_awal"> 
                    <label class="span0">s/d</label> 
                    <input type="text" class="form-control" name="tanggal_persiapan_akhir" id="tanggal_persiapan_akhir">
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Hari Pelaksanaan</label>
                    <input type="text" class="form-control" name="hari_pelaksanaan" id="hari_pelaksanaan">
                    <label class="col-sm-3 control-label">Tanggal Pelaksanaan</label> 
                    <input type="text" class="form-control" name="tanggal_pelaksanaan_awal" id="tanggal_pelaksanaan_awal"> 
                    <label class="span0">s/d</label> 
                    <input type="text" class="form-control" name="tanggal_pelaksanaan_akhir" id="tanggal_pelaksanaan_akhir">
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Jumlah Hari Pelaporan</label>
                    <input type="text" class="form-control" name="hari_pelaporan" id="hari_pelaporan">
                    <label class="col-sm-3 control-label">Tanggal Pelaporan</label> 
                    <input type="text" class="form-control" name="tanggal_pelaporan_awal" id="tanggal_pelaporan_awal"> 
                    <label class="span0">s/d</label> 
                    <input type="text" class="form-control" name="tanggal_pelaporan_akhir" id="tanggal_pelaporan_akhir">
                </fieldset>
                <script>
                    $("#tanggal_awal").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_akhir").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_persiapan_awal").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_persiapan_akhir").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_pelaksanaan_awal").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_pelaksanaan_akhir").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_pelaporan_awal").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                    $("#tanggal_pelaporan_akhir").datepicker({
                        dateFormat: "dd-mm-yy",
                         nextText: "",
                         prevText: "",
                         changeMonth: true,
                         minDate: "01-01-'.$year.'",
                         maxDate: "31-12-'.$year.'"
                    });
                </script>';
        }
        $array              = array();
        array_push($array, array(
            "minDate" => "01-01-".$year,
            "minDate" => "31-12-".$year,
            "html" => $html
        ));
        $json = $array;
        echo json_encode($json);
        break;
}
?>
