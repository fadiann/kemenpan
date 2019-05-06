<?php 
include_once "App/Classes/report_class.php";
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/auditee_class.php";

$reports = new report ( $ses_userId );
$assigns = new assign( $ses_userId );
$auditees = new auditee( $ses_userId );

$fil_tahun_id = "";
$fil_auditee_id = "";

$fil_tahun_id = $Helper->replacetext ( $_POST ["fil_tahun_id"] );
$fil_auditee_id = $Helper->replacetext ( $_POST ["fil_auditee_id"] );

$rs_auditee = $auditees->auditee_data_viewlist($fil_auditee_id);
$arr_auditee = $rs_auditee->FetchRow();

$assign_id = $reports->get_assignment_id($fil_auditee_id, $fil_tahun_id);

$rs = $assigns->assign_viewlist($assign_id);
$arr = $rs->FetchRow();

if($fil_tahun_id!="" && $fil_auditee_id!=""){
?>
<section id="main" class="column">	
	<article class="module width_3_quarter">
		<table border='1' class="table_risk" cellspacing='0' cellpadding="0">
			<tr>
				<td colspan="5" align="center"><u>KARTU PENUGASAN</u><br>Nomor : <?=$arr['assign_surat_no']?></td>
			</tr>
			<tr>
				<td width="2%" rowspan="4" style="border: 0">1</td>
				<td width="2%" style="border: 0">a.</td>
				<td style="border: 0">Nama Auditi</td>
				<td width="2%" style="border: 0">:</td>
				<td style="border: 0"><?=$arr_auditee['auditee_name']?></td>
			</tr>
			<tr>
				<td style="border: 0">b.</td>
				<td style="border: 0">No File Permanen</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">c.</td>
				<td style="border: 0">Rencana Audit Nomor</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">d.</td>
				<td style="border: 0">Audit Terakhir Tahun</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">2</td>
				<td colspan="2" style="border: 0">Alamat dan Nomor Telepon</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">3</td>
				<td colspan="2" style="border: 0">Tingkat Risiko Unit/Aktifitas</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">4</td>
				<td colspan="2" style="border: 0">Tujuan Audit</td>
				<td style="border: 0">:</td>
				<td style="border: 0"><?=$arr['assign_kegiatan']?></td>
			</tr>
			<tr>
				<td rowspan="2" style="border: 0">5</td>
				<td style="border: 0">a.</td>
				<td style="border: 0">Nama Ketua Tim</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">b.</td>
				<td style="border: 0">Nama Anggota Tim</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td rowspan="2" style="border: 0">6</td>
				<td style="border: 0">a.</td>
				<td style="border: 0">Audit Dilakukan dengan Surat Tugas Nomor</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">b.</td>
				<td style="border: 0">Audit Direncanakan Mulai Tanggal dan selesai Tanggal</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">7</td>
				<td colspan="2" style="border: 0">Anggaran yang Diajukan</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">8</td>
				<td colspan="2" style="border: 0">Anggaran yang Disetujui</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
			<tr>
				<td style="border: 0">9</td>
				<td colspan="2" style="border: 0">Catatan Penting dari Pengendali Teknis/ pengendali Mutu</td>
				<td style="border: 0">:</td>
				<td style="border: 0">-</td>
			</tr>
		</table>
</section>
<?
}else{
	$Helper->js_alert_act ( 5 );
?>
	<script>window.open('main.php?method=risk_fil_report', '_self');</script>
<?
}
?>