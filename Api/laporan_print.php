<?php
header("Content-Type: application/msword");
header("Content-Disposition: attachment; filename=laporan.doc");
header("Pragma: no-cache");
header("Expires: 0");
define ("INBOARD",false);
@$actual_link = "E-MAS-KEMENPANRB";
@$by 		  = "Dicetak Melalui <i>electronic Manajemen Audit Sistem</i>";
include_once "../App/Libraries/login_history.php";
include_once "../App/Libraries/Helper.php";
include_once "../App/Classes/assignment_class.php";
include_once "../App/Classes/report_class.php";
include_once "../App/Classes/param_class.php";
include_once "../App/Classes/audit_plann_class.php";

$Helper    = new Helper ();
$reports   = new report ($ses_userId);
$params    = new param ($ses_userId);
$plannings = new planning ($ses_userId);
$assigns   = new assign ( $ses_userId );
$laporan_id = $Helper->replacetext($_GET['id']);
$row_laporan	  = $assigns->ambil_laporan_for_edit($laporan_id);
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<link href="https://fonts.googleapis.com/css?family=Libre+Barcode+128&display=swap" rel="stylesheet">
<style>
body{
	width:210mm;
	font-family: Arial, 'Libre Barcode 128', cursive;
	font-size: 12;
}
@media all {
.page-break { display: block; page-break-before: always; }
.divFooter {
	/* font-family: 'Libre Barcode 128'; */
    /* position: fixed; */
    bottom: 0;
	font-size: 60px;
  }
.divFooter2 {
	font-family: Arial;
    /* position: fixed; */
    bottom: 0;
	font-size: 14px;
  }
/* .divHeader {
	font-family: 'Libre Barcode 128', cursive;
    position: fixed;
    top: 0;
	font-size: 60px;
  } */
}

@media print {
.page-break { display: block; page-break-before: always; }
.divFooter {
	/* font-family: 'Libre Barcode 128'; */
    /* position: fixed; */
    bottom: 0;
	margin-bottom: 20px;
	font-size: 60px;
  }
.divFooter img {
	/* font-family: 'Libre Barcode 128'; */
    width: 320px;
	margin: 0px;
	padding: 0px;
  }
.divFooter2 {
	font-family: Arial;
    /* position: fixed; */
    bottom: 0;
	font-size: 14px;
  }
/* .divHeader {
	font-family: 'Libre Barcode 128', cursive;
    position: fixed;
    top: 0;
	font-size: 60px;
  } */
}
@media screen {
.divFooter {
	/* font-family: 'Libre Barcode 128'; */
    display: none;
  }
} 
</style>
<body>
    <h3>RINGKASAN HASIL REVIU</h3>
    <?=$Helper->showHtml($row_laporan['ringkasan'])?>
    <h3>DASAR HUKUM</h3>
    <?=$Helper->showHtml($row_laporan['dasar'])?>
    <h3>TUJUAN REVIU</h3>
    <?=$Helper->showHtml($row_laporan['tujuan'])?>
    <h3>RUANG LINGKUP</h3>
    <?=$Helper->showHtml($row_laporan['ruang'])?>
    <h3>METODOLOGI REVIU</h3>
    <?=$Helper->showHtml($row_laporan['metodologi'])?>
    <h3>URAIAN HASIL REVIU</h3>
    <?=$Helper->showHtml($row_laporan['uraian'])?>
    <h3>REKOMENDASI</h3>
    <?=$Helper->showHtml($row_laporan['rekomendasi'])?>
    <h3>HAL-HAL LAIN YANG PERLU DIUNGKAPKAN</h3>
    <?=$Helper->showHtml($row_laporan['lainlain'])?>
    <h3>APRESIASI</h3>
    <?=$Helper->showHtml($row_laporan['apresiasi'])?>
	<table width="90%" align="center">
		<tr>
			<td width="60%" align="left" valign="bottom">
	<img src="http://e-mas.hekya.id/Api/Barcode.php?text=<?=$actual_link?>" alt="<?=$actual_link?>" />
	<div class="divFooter2"><?=$by?></div></td>
			<td>
				<table>
					<tr>
						<td>Ditetapkan di&nbsp;</td>
						<td>&nbsp;:&nbsp;</td>
						<td>&nbsp;Jakarta</td>
					</tr>
					<tr>
						<td>Pada Tanggal&nbsp;</td>
						<td>&nbsp;:&nbsp;</td>
						<td>&nbsp;<?//=$Helper->dateIndoLengkap($arr['assign_surat_tgl'])?></td>
					</tr>
					<tr>
						<td><strong><?//=$arr['jenis_jabatan_sub']?></strong></td>
						<td></td>
						<td></td>
					</tr>
				</table>
				<br><br><br><br>
				<u>Budi Prawira</u><br>
				NIP. 196501201985031001
			</td>
		</tr>
	</table>
	
</body>
</html>
<script type="text/javascript">
<!--
// window.close();
//-->
</script>