<?php
header("Content-Type: application/msword");
header("Content-Disposition: attachment; filename=benturan_kepentingan.doc");
header("Pragma: no-cache");
header("Expires: 0");
if(isset($_GET['tahun']) && isset($_GET['auditee'])){
@$actual_link = "E-MAS-KEMENPANRB";
@$by 		  = "Dicetak Melalui <i>electronic Manajemen Audit Sistem</i>";
include_once "../App/Libraries/login_history.php";
include_once "../App/Libraries/Helper.php";
include_once "../App/Classes/assignment_class.php";
include_once "../App/Classes/report_class.php";
include_once "../App/Classes/param_class.php";
include_once "../App/Classes/audit_plann_class.php";
include_once "../App/Classes/risk_class.php";

$Helper         = new Helper ();
$reports        = new report ($ses_userId);
$params         = new param ($ses_userId);
$plannings      = new planning ($ses_userId);
$assigns        = new assign ( $ses_userId );
$risks          = new risk ( $ses_userId );
$tahun          = $Helper->getData('tahun');
$auditee_id     = $Helper->getData('auditee');
$row_auditee    = $risks->get_auditee_byId($auditee_id)->FetchRow();
$rs_parrent     = $risks->benturan_kepentingan_report($tahun, $auditee_id);
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<link href="https://fonts.googleapis.com/css?family=Libre+Barcode+128&display=swap" rel="stylesheet">
<style>
body{
	width:210mm;
	font-family: Arial, 'Libre Barcode 128', cursive;
	font-size: 12pt;
}
@media all {
.page-break { display: none; }
}

@media print {
.page-break { display: block; page-break-before: always; }
.divFooter {
	font-family: 'Libre Barcode 128', cursive;
    position: fixed;
    bottom: 0;
	font-size: 60px;
  }
.divFooter2 {
	font-family: Arial;
    position: fixed;
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
	font-family: 'Libre Barcode 128', cursive;
    display: none;
  }
} 
</style>
<body>
<table class="table table-borderless" align="center">
<tr>
    <td width="30%" class="text-right">Auditee</td>
    <td width="1%">:</td>
    <td width="69%"><?=$row_auditee['auditee_name']?></td>
</tr>
<tr>
    <td class="text-right">Tahun</td>
    <td>:</td>
    <td><?=$tahun?></td>
</tr>
</table>

<table border="1" width="100%" align="center">
<tr>
    <th>No.</th>
    <th>Uraian</th>
    <th>Pelaku</th>
    <th>Rencana Aksi</th>
</tr>
<?php 
$x = 1;
foreach($rs_parrent as $row):
?>
<tr>
    <td width="2%" class="text-center"><?=$x++?></td>
    <td width="39%"><?=$row['uraian']?></td>
    <td width="20%"><?=$row['pelaku']?></td>
    <td width="39%"><?=$row['rencana_aksi']?></td>
</tr>
<?php endforeach ?>
</table>
</body>
</html>

<script type="text/javascript">
window.close();
</script>

<?php }else{ ?>

<script type="text/javascript">
window.close();
</script>

<?php } ?>