<?
header ( 'Content-Type: text/plain' );

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
include_once "../../Classes/risk_class.php";

$risks 	= new risk ();
$Helper = new Helper ();

$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );
switch ($_action) {
	case "cek_penanganan" :
		$status = $Helper->replacetext ( $_POST ["id_penanganan"] );
		$cek_status = $risks->cek_status_penanganan ( $status );
		echo $cek_status;
		exit ();
		break;
	
	case "getval_rr" :
		$fvalue_ri = $Helper->replacetext ( $_POST ["nilai_ri"] );
		$fvalue_pi = $Helper->replacetext ( $_POST ["nilai_pi"] );
		$val_rr = $risks->get_val_rr ( $fvalue_ri, $fvalue_pi );
		echo $val_rr;
		exit ();
		break;
	case "delete_identifikasi" :
		$id 		= $Helper->replacetext($_REQUEST['id']);
		$id_idn 	= $Helper->replacetext($_REQUEST['id_idn']);
		$count_idn	= $risks->cek_identifikasi($id_idn);
		if($count_idn > 1){
			$result = $risks->identifikasi_detail_delete($id);
		}else{
			$result	= 1;
		}
		echo $result;
		exit ();
		break;
 
	case "getindikator":
        $idsasaran      = $Helper->replacetext($_REQUEST['id']);
        @$ref_id_old    = $Helper->replacetext($_REQUEST['ref_id_old']);
        //echo $idbidang;
        $rs            = $params->ref_program_viewlist_byAspek($idbidang);
        echo "<table class='table table-bordered table-hover'>";
        $x = 0;
        echo "<tr><th width='5%' class='text-center'>No.</th><th width='5%' class='text-center'><label class='customcheck'><input type='checkbox' name='checkall' id='checkall' onClick='check_uncheck_checkbox(this.checked);'><span class='checkmark'></span></label></th><th class='text-center'>Kode & Judul</th></tr>";
        while ($row = $rs->FetchRow()):
            $x++;
            if($ref_id_old == $row['ref_program_id']){
                $checked = 'checked';
            }else{
                $checked = '';
            }
            echo "<tr><td width='5%' class='text-center'>" . $x . "</td><td width='5%' class='text-center'><label class='customcheck'><input type='checkbox' name='ref_program[]' value='" . $row['ref_program_id'] . "' ".$checked."><span class='checkmark'></span></label></td><td>" . $row['ref_program_procedure'] . "</td></tr>";
            //echo "<label class='customcheck'>One <input type='checkbox' checked='checked'><span class='checkmark'></span></label>";

        endwhile;
        echo "</table>";
        exit();
    break;
}
?>