<?
include_once "App/Classes/param_class.php";

$params = new param ( $ses_userId );

@$_action = $Helper->replacetext ( $_REQUEST ["data_action"] );

$paging_request = "main.php?method=par_risk_matrix_residu";
$acc_page_request = "risk_matrix_residu_acc.php";
$list_page_request = "param_view.php";

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
		"Nama",
		"Nilai",
		"Keterangan" 
);
$gridDetail = array (
		"1",
		"2",
		"3" 
);
$gridWidth = array (
		"30",
		"20",
		"30" 
);
$widthAksi = "15";
$iconEdit = "1";
$iconDel = "1";
$iconDetail = "0";
// === end grid ===//

switch ($_action) {
	case "getedit" :
		$_nextaction = "postedit";
		$page_request = $acc_page_request;
		$page_title = "Ubah Matrix Tingkat Risiko Residul";
		break;
	case "postedit" :
		$params->mapp_risk_residu_clean ();
		$rsImp = $params->risk_ri_data_viewlist ();
		$rsLike = $params->risk_pi_data_viewlist ();
		$arrIdImp = array ();
		$arrImpNama = array ();
		$arrValImp = array ();
		$arrIdLike = array ();
		$arrLikeNama = array ();
		$arrValLike = array ();
		$x = 0;
		while ( $arrImp = $rsImp->FetchRow () ) {
			$arrIdImp [$x] = $arrImp ['ri_id'];
			$arrImpNama [$x] = $arrImp ['ri_name'];
			$arrValImp [$x] = $arrImp ['ri_value'];
			$x ++;
		}
		$y = 0;
		while ( $arrLike = $rsLike->FetchRow () ) {
			$arrIdLike [$y] = $arrLike ['pi_id'];
			$arrLikeNama [$y] = $arrLike ['pi_name'];
			$arrValLike [$y] = $arrLike ['pi_value'];
			$y ++;
		}
		$jmlImp = count ( $arrIdImp );
		$jmlLike = count ( $arrIdLike );
		
		for($i = 0; $i < $jmlImp; $i ++) {
			for($j = 0; $j < $jmlLike; $j ++) {
				$hasil = $_POST [$arrIdImp [$i] . '_' . $arrIdLike [$j]];
				$params->mapp_risk_residu_add ( $arrIdImp [$i], $arrIdLike [$j], $hasil );
			}
		}
		$Helper->js_alert_act ( 1 );
		?>
<script>window.open('<?=$def_page_request?>', '_self');</script>
<?
		$page_request = "blank.php";
		break;
	default :
		$page_request = $acc_page_request;
		$page_title = "Matrix Tingkat Risiko Residu";
		break;
}
include_once $page_request;
?>
