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

$rs_assign = $reports->assign_list($assign_id);
$arr_assign = $rs_assign->FetchRow();

if($fil_tahun_id!="" && $fil_auditee_id!=""){
?>
<section id="main" class="column">	
	<article class="module width_3_quarter">
		<div style="overflow-x: auto; width: 100%;">
			<table border='1' class="table_risk" cellspacing='0' cellpadding="0">
			<tr>
				<td colspan="10" align="center">MATRIKS TEMUAN</td>
			</tr>
			<tr>
				<td colspan="2" style="border-bottom: 0;border-right:0">Satuan Kerja</td>
				<td colspan="8" style="border-bottom: 0;border-left:0">: <?=$arr_auditee['auditee_name'];?></td>
			</tr>
			<tr>
				<td colspan="2" style="border-top: 0;border-bottom: 0;border-right:0">Tipe Pengawasan</td>
				<td colspan="8" style="border-top: 0;border-bottom: 0;border-left:0">: <?=$arr_assign['audit_type_name'];?></td>
			</tr>
			<tr>
				<td colspan="2" style="border-top: 0;border-bottom: 0;border-right:0">Periode Audit</td>
				<td colspan="8" style="border-top: 0;border-bottom: 0;border-left:0">: <?=$arr_assign['assign_periode']?></td>
			</tr>
			<tr>
				<td colspan="2" style="border-top: 0;border-bottom: 0;border-right:0">No Surat Tugas</td>
				<td colspan="8" style="border-top: 0;border-bottom: 0;border-left:0">: <?=$arr_assign['assign_surat_no']?></td>
			</tr>
			<tr>
				<td colspan="2" style="border-top: 0;border-bottom: 0;border-right:0">No LHA</td>
				<td colspan="8" style="border-top: 0;border-bottom: 0;border-left:0">: <?=$arr_assign['assign_no_lha']?></td>
			</tr>
			</tr>
			<tr align="center">
				<th width="2%">No</th>
				<th width="20%">Kondisi</th>
				<th width="20%">Kriteria</th>
				<th width="20%">Sebab</th>
				<th width="20%">Akibat</th>
				<th width="20%">Rekomendasi</th>
				<th width="20%">Komentar Satuan Kerja</th>
			</tr>
			<?php
			$i=0;
			$rs_temuan = $reports->temuan_list($assign_id, $fil_auditee_id);
			while($arr_temuan = $rs_temuan->FetchRow ()){
				$i++;
			?>
			<tr>
				<td><?=$i?></td>
				<td><?=$Helper->text_show($arr_temuan['finding_kondisi'])?></td>
				<td><?=$Helper->text_show($arr_temuan['finding_kriteria'])?></td>
				<td><?=$Helper->text_show($arr_temuan['finding_sebab'])?></td>
				<td><?=$Helper->text_show($arr_temuan['finding_akibat'])?></td>
				<td>
				<?php 
				$rs_rekomendasi = $reports->rekomendasi_list($arr_temuan['finding_id']);
				while($arr_rekomendasi = $rs_rekomendasi->FetchRow ()){
					echo $Helper->text_show($arr_rekomendasi['rekomendasi_desc'])."<br>";
				}
				?>
				</td>
				<td><?=$Helper->text_show($arr_temuan['finding_tanggapan_auditee'])?></td>
			</tr>
			<?
			}
			?>
		</table>
		</div>
		<br><br>
		<fieldset>
			<center>
				<input type="button" class="blue_btn" value="ms-excel" onclick="window.open('ReportManagement/laporan_temuan_excel.php?fil_tahun_id=<?= $fil_tahun_id ?>&fil_auditee_id=<?= $fil_auditee_id ?>','toolbar=no, location=no, status=no, menubar=yes, scrollbars=yes, resizable=yes');">
			</center>
		</fieldset>
	</article>
</section>
<?
}else{
	$Helper->js_alert_act ( 5 );
?>
	<script>window.open('main.php?method=laporan_temuan_filter', '_self');</script>
<?
}
?>