<?
include_once "App/Classes/risk_class.php";
include_once "App/Classes/param_class.php";

$risks = new risk ( $ses_userId );
$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$ses_penetapan_id = $_SESSION ['ses_penetapan_id'];

$paging_request = "main.php?method=risk_penetapantujuan";
$acc_page_request = "evaluasi_acc.php";

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

switch ($_action) {
	case "getadd" :
		$_nextaction = "postadd";
		$page_request = $acc_page_request;
		$page_title = "Evaluasi Risiko";
		break;
	case "postadd" :
		$no = 0;
		$rs_kategori = $params->risk_kategori_data_viewlist ();
		while ( $arr_kategori = $rs_kategori->FetchRow () ) {
			$x = 0;
			$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
			$countKat = $rs_iden->RecordCount ();
			while ( $arr_iden = $rs_iden->FetchRow () ) {
				$no ++;
				
				$rs_val_ri = $risks->cek_range_ri ( $arr_iden ['analisa_ri'] );
				$get_val_ri = $rs_val_ri->FetchRow ();
				
				$komponen = $Helper->replacetext ( $_POST ["komponen_$no"] );
				$pi = $Helper->replacetext ( $_POST ["pi_id_$no"] );
				$val_rr = $risks->get_val_rr ( $get_val_ri ['ri_value'], $pi );
				
				$get_nama_pi = $risks->get_nama_risk ( 'par_risk_pi', 'pi_value', 'pi_name', $pi );
				$get_nama_rr = $risks->get_nama_risk ( 'par_risk_rr', 'rr_value', 'rr_name', $val_rr );
				
				$risks->update_evaluasi ( $arr_iden ['identifikasi_id'], $komponen, $pi, $get_nama_pi, $val_rr, $get_nama_rr );
			}
		}
		
		$nilai_profil = 0;
		$rs_iden_kat = $risks->list_identifikasi_by_kat ( $ses_penetapan_id );
		while ( $arr_iden_kat = $rs_iden_kat->FetchRow () ) {
			$nilai_bobot_rr = $risks->sum_kategori_rr ( $arr_iden_kat ['identifikasi_kategori_id'], $ses_penetapan_id );
			$nilai_profil = $nilai_bobot_rr + $nilai_profil;
		}
		$cek_nilai_rr = $risks->cek_range_rr ( $nilai_profil );
		$risks->update_profil_rr ( $ses_penetapan_id, $cek_nilai_rr );
		$Helper->js_alert_act ( 3 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
}
include_once $page_request;
?>
