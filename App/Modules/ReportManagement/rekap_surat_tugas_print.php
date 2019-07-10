<?php
include_once "../App/Classes/report_class.php";
include_once "../App/Libraries/Helper.php";
error_reporting ( 0 );
$Helper = new Helper();
$reports = new report ();
$fil_tahun_id = "";
$fil_auditor_id = "";
$tipe_audit = "";
$fil_tahun_id = $Helper->replacetext ( $_REQUEST["fil_tahun_id"] );
$fil_auditor_id = $Helper->replacetext ( $_REQUEST["fil_auditor_id"] );
$tipe_audit = $Helper->replacetext ( $_REQUEST["tipe_audit"] );

if ($fil_tahun_id != "") {
	$word = ' TAHUN '. $fil_tahun_id;
}

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Type: image/jpg");
header('Content-Disposition: attachment; filename=LAPORAN SURAT TUGAS'.$word.'.xls');
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
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