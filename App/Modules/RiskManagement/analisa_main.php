<?php
include_once "App/Classes/risk_class.php";
include_once "App/Classes/param_class.php";

$risks  = new risk ( $ses_userId );
$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$ses_penetapan_id = $_SESSION ['ses_penetapan_id'];
$paging_request   = "main.php?method=risk_penetapantujuan";
$acc_page_request = "analisa_acc.php";

$num_row   = 10;
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
		$page_title = "Analisa Risiko";
		break;
	case "postadd" :
		$no = 0;
		$rs_kategori = $params->risk_kategori_data_viewlist ();
		while ( $arr_kategori = $rs_kategori->FetchRow () ) {
			$x = 0;
			$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
			while ( $arr_iden = $rs_iden->FetchRow () ) {
				$no ++;
				$tk = $Helper->replacetext ( $_POST ["tk_id_$no"] );
				$td = $Helper->replacetext ( $_POST ["td_id_$no"] );
				// $ri = $risks->cek_range_ri($tk*$td);
				$ri = $tk * $td;
				$bobot_ri = $Helper->replacetext ( $_POST ["bobot_risiko_$no"] );
				$nilai_ri = round ( $ri * $bobot_ri / 100, 2 );
				$bobot_kat_ri = $Helper->replacetext ( $_POST ["bobot_kat_risiko_$no"] );
				
				$get_nama_tk = $risks->get_nama_risk ( 'par_risk_tk', 'tk_value', 'tk_name', $tk );
				$get_nama_td = $risks->get_nama_risk ( 'par_risk_td', 'td_value', 'td_name', $td );
				$rs_nama_ri = $risks->cek_range_ri ( $ri );
				$get_nama_ri = $rs_nama_ri->FetchRow ();
				
				$risks->update_analisa ( $arr_iden ['identifikasi_id'], $tk, $td, $ri, $get_nama_tk, $get_nama_td, $get_nama_ri ['ri_name'], $bobot_ri, $nilai_ri, $bobot_kat_ri );
			}
		}
		$nilai_profil = 0;
		$rs_iden_kat = $risks->list_identifikasi_by_kat ( $ses_penetapan_id );
		while ( $arr_iden_kat = $rs_iden_kat->FetchRow () ) {
			$rs_sum = $risks->sum_nilai_ri_by_kat ( $arr_iden_kat ['identifikasi_kategori_id'], $ses_penetapan_id );
			$arr_sum = $rs_sum->fetchRow ();
			$sum_nilai_ri = $arr_sum ['sum_nilai_ri'];
			$bobot_kat_ri = $arr_sum ['sum_bobot_kat'];
			$nilai_bobot = round ( $sum_nilai_ri * $bobot_kat_ri / 100, 2 );
			$nilai_profil = $nilai_bobot + $nilai_profil;
		}
	$risks->update_profil ( $ses_penetapan_id, $nilai_profil );
	$Helper->js_alert_act ( 3 );
	echo "<script>window.open('".$def_page_request."', '_self');</script>";
	$page_request = "blank.php";
		break;
}
include_once $page_request;
?>
