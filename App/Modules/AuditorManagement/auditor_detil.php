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
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Detail Pegawai</h2>
			</header>
			<div class="panel-body wrap">
				<ul class="rtabs">
					<li><a href="#view1">Rincian Pegawai</a></li>
					<li><a href="#view2">Riwayat Pelatihan</a></li>
					<li><a href="#view3">Riwayat Penugasan</a></li>
					<li><a href="#view4">Riwayat Pendidikan</a></li>
				</ul>
				<div class="panel-container">
					<div id="view1">
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">NIP</label> <label class="col-sm-3 control-label">: <?=$arr['auditor_nip']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Nama</label> <label class="col-sm-3 control-label">: <?=$arr['auditor_name']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Tempat, Tgl Lahir</label> <label
								class="col-sm-3 control-label">: <?=$arr['auditor_tempat_lahir']?>, <?=$arr['auditor_tgl_lahir']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Alamat Rumah</label>  <label class="col-sm-3 control-label">: <?=$arr['auditor_alamat']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Jenis Kelamin</label>  <label class="col-sm-3 control-label">: <?=$arr['auditor_jenis_kelamin']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Agama</label>  <label class="col-sm-3 control-label">: <?=$arr['auditor_agama']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Golongan/Pangkat</label> <label class="col-sm-3 control-label">: <?=$arr['auditor_pangkat']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">TMT</label> <label class="col-sm-3 control-label">: <?=$arr['auditor_tmt']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Jabatan</label> <label class="col-sm-3 control-label">: <?=$arr['jenis_jabatan_sub']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Golongan Biaya</label> <label class="col-sm-3 control-label">: <?=$arr['auditor_golongan']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Mobile</label> <label class="col-sm-3 control-label">: <?=$arr['auditor_mobile']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Telp</label> <label class="col-sm-3 control-label">: <?=$arr['auditor_telp']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Email</label> <label class="col-sm-3 control-label">: <?=$arr['auditor_email']?></label>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Foto</label> <label class="col-sm-3 control-label">: <a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Foto").$arr['auditor_foto']?>','_blank')"><?=$arr['auditor_foto']?></a></label>
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
						<table class="table table-bordered table-striped" cellspacing="0" cellpadding="0">
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
		</section>
	</div>
</div>