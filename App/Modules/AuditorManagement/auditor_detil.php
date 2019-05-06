<?
include_once "App/Classes/auditor_class.php";
$auditors = new auditor ( $ses_userId );

$fdata_id = $Helper->replacetext ( $_GET ['auditor'] );
$rs = $auditors->auditor_data_viewlist ( $fdata_id );
$arr = $rs->FetchRow ();
?>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<div id="demopage">
			<div class="container1">
				<ul class="rtabs">
					<li><a href="#view1">Rincian Pegawai</a></li>
					<li><a href="#view2">Riwayat Pelatihan</a></li>
					<li><a href="#view3">Riwayat Penugasan</a></li>
					<li><a href="#view4">Riwayat Pendidikan</a></li>
				</ul>
				<div class="panel-container">
					<div id="view1">
						<fieldset class="hr">
							<label class="span2">NIP</label> <label class="span2">: <?=$arr['auditor_nip']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Nama</label> <label class="span5">: <?=$arr['auditor_name']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Tempat, Tgl Lahir</label> <label
								class="span5">: <?=$arr['auditor_tempat_lahir']?>, <?=$arr['auditor_tgl_lahir']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Alamat Rumah</label>  <label class="span5">: <?=$arr['auditor_alamat']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Jenis Kelamin</label>  <label class="span5">: <?=$arr['auditor_jenis_kelamin']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Agama</label>  <label class="span5">: <?=$arr['auditor_agama']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Golongan/Pangkat</label> <label class="span5">: <?=$arr['auditor_pangkat']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">TMT</label> <label class="span5">: <?=$arr['auditor_tmt']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Jabatan</label> <label class="span5">: <?=$arr['jenis_jabatan_sub']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Golongan Biaya</label> <label class="span5">: <?=$arr['auditor_golongan']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Mobile</label> <label class="span5">: <?=$arr['auditor_mobile']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Telp</label> <label class="span6">: <?=$arr['auditor_telp']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Email</label> <label class="span2">: <?=$arr['auditor_email']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span2">Foto</label> <label class="span2">: <a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Foto").$arr['auditor_foto']?>','_blank')"><?=$arr['auditor_foto']?></a></label>
						</fieldset>
					</div>
					<div id="view2">
						<?php include 'pelatihan_main.php';?>	
					</div>
					<div id="view3">
						<article class="module width_3_quarter">
						<header>
							<h3 class="tabs_involved"><?=$page_title?></h3>
						</header>
						<table class="table_grid" cellspacing="0" cellpadding="0">
						<tr>
							<th width='10%'>No</th>
							<th width='30%'>No Surat Tugas</th>
							<th width='30%'>Satuan Kerja</th>
							<th width='30%'>Posisi Penugasan</th>
						</tr>
						<?
						$recordcount_auditor = $auditors->history_penugasan_count ( $fdata_id );
						$rs_auditor = $auditors->history_penugasan_viewlist ( $fdata_id );
						if ($recordcount_auditor != 0) {
							$i = 0;
							while ( $arr_auditor = $rs_auditor->FetchRow () ) {
								$i ++;
								?>
						<tr>
							<td><?=$i?></td> 
							<td><?=$arr_auditor['assign_surat_no']?></td> 
							<td><?=$arr_auditor['auditee_name']?></td> 
							<td><?=$arr_auditor['posisi_name']?></td> 
						</tr>
						<?php 
							}
						}else {
						?>
							<td colspan="4">Tidak Ada Data</td> 
						<?
						}
						?>
						</table>
						</article>
					</div>
					<div id="view4">
						<?php include 'pendidikan_main.php';?>	
					</div>
				</div>
			</div>
		</div>
	</article>
</section>