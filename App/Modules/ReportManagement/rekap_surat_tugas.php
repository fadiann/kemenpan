<?php 
include_once "App/Classes/report_class.php";

$reports = new report ( $ses_userId );

$fil_tahun_id = "";
$fil_auditor_id = "";
$tipe_audit = "";
$fil_tahun_id = $Helper->replacetext ( $_POST ["fil_tahun_id"] );
$fil_auditor_id = $Helper->replacetext ( $_POST ["fil_auditor_id"] );
$tipe_audit = $Helper->replacetext ( $_POST ["tipe_audit"] );

?>
<section id="main" class="column">	
	<article class="module width_3_quarter">
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr>
				<th width="2%">No</th>
				<th width="18%">No & Tanggal SPT</th>
				<th width="30%">Nama Kegiatan</th>
				<th width="10%">Tanggal Mulai</th>
				<th width="10%">Tanggal Selesai</th>
				<th width="2%">Lama Hari</th>
				<th width="10%">Jenis Audit</th>
				<th width="25%">Pegawai Inspektorat</th>
				<th width="15%">Posisi Penugasan</th>
			</tr>
			<?
			$i=0;
			$rs = $reports->list_auditor_per_assign($fil_tahun_id, $fil_auditor_id, $tipe_audit);
			while($arr = $rs->FetchRow()){
				$i++;
			?>
			<tr>
				<td align="center"><?=$i?></td>
				<td><?=$arr['assign_surat_no']?><?= ($arr['assign_surat_no']) ? " - " :"" ?><?=$Helper->dateIndoLengkap($arr['assign_surat_tgl'])?></td>
				<td><?= $arr['assign_kegiatan'] ?></td>
				<td><?=$Helper->dateIndoLengkap($arr['assign_auditor_start_date'])?></td>
				<td><?=$Helper->dateIndoLengkap($arr['assign_auditor_end_date'])?></td>
				<td align="center"><?=floor($arr['assign_auditor_end_date']-$arr['assign_auditor_start_date'])/86400?></td>
				<td><?=$arr['audit_type_name']?></td>
				<td><?=$arr['auditor_nip']?> - <?=$arr['auditor_name']?></td>
				<td><?= $arr['posisi_name'] ?></td>
			</tr>
			<?
			}
			?>
		</table>
		<br>
		<br>
		<fieldset class="form-group">
			<center>
				<input type="button" class="blue_btn" value="ms-excel" onclick="window.open('ReportManagement/rekap_surat_tugas_print.php?tahun=<?= $fil_tahun_id ?>&fil_auditor_id=<?= $fil_auditor_id ?>&tipe_audit=<?= $tipe_audit ?>','toolbar=no,location=no,status=no,menubar=yes,scrollbars=yes,resizable=yes');">
			</center>
		</fieldset>
	</article>
</section>