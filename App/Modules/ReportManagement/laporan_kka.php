<?php 
include_once "App/Classes/report_class.php";
include_once "App/Classes/program_audit_class.php";
include_once "App/Classes/auditee_class.php";

$reports = new report ( $ses_userId );
$programaudits = new programaudit( $ses_userId );
$auditees = new auditee( $ses_userId );

$fil_tahun_id = "";
$fil_auditee_id = "";

$fil_tahun_id = $Helper->replacetext ( $_POST ["fil_tahun_id"] );
$fil_auditee_id = $Helper->replacetext ( $_POST ["fil_auditee_id"] );

$assign_id = $reports->get_assignment_id($fil_auditee_id, $fil_tahun_id);

$rs_auditee = $auditees->auditee_data_viewlist($fil_auditee_id);
$arr_auditee = $rs_auditee->FetchRow();

$katim = $reports->get_anggota($assign_id, $fil_auditee_id, "KT");

if($fil_tahun_id!="" && $fil_auditee_id!=""){
?>
<section id="main" class="column">	
	<article class="module width_3_quarter">
		<table border='1' class="table_risk" cellspacing='0' cellpadding="0">
			<tr>
				<td colspan="6" align="center">KERTAS KERJA AUDIT</td>
			</tr>
			<tr>
				<td colspan="3" style="border-bottom: 0;border-right:0">Satuan Kerja</td>
				<td colspan="3" style="border-bottom: 0;border-left:0">: <?=$arr_auditee['auditee_name'];?></td>
			</tr>
			<tr>
				<td colspan="3" style="border-top: 0;border-bottom: 0;border-right:0">Tahun</td>
				<td colspan="3" style="border-top: 0;border-bottom: 0;border-left:0">: <?=$fil_tahun_id?></td>
			</tr>
			<tr align="center">
				<th width="2%">No</th>
				<th width="8%">No KKA</th>
				<th width="10%">Ref Audit Program</th>
				<th width="35%">Uraian</th>
				<th width="35%">Kesimpulan</th>
				<th width="10%">Auditor</th>
			</tr>
			<?php
			$i=0;
			$rs_kka = $reports->kertas_kerja_list($assign_id, $fil_auditee_id);
			while($arr_kka = $rs_kka->FetchRow ()){
				$i++;
			?>
			<tr>
				<td><?=$i?></td>
				<td><?=$arr_kka['kertas_kerja_no']?></td>
				<td><?=$arr_kka['ref_program_title']?></td>
				<td><?=$Helper->text_show($arr_kka['kertas_kerja_desc'])?></td>
				<td><?=$Helper->text_show($arr_kka['kertas_kerja_kesimpulan'])?></td>
				<td><?=$arr_kka['auditor_name']?></td>
			</tr>
			<?
			}
			?>
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