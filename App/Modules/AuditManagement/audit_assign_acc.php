<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<link rel="stylesheet" href="Public/js/select2/select2.css" type="text/css" />
<script type="text/javascript" src="Public/js/select2/select2.min.js"></script>
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>

<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal"	id="validation-form" enctype="multipart/form-data">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="hr">
				<label class="span2">Nama Kegiatan</label>
				<input type="text" class="span7" name="kegiatan" id="kegiatan">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Audit</label>
				<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", "", "", 1)?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Obyek Audit</label>&nbsp;&nbsp;&nbsp;<input type="hidden" name="auditee" id="auditee" class="select2 multiple" /><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tahun</label> 
				<select class="span1" name="tahun" id="tahun">
					<option value="">Pilih Satu</option>
					<?
				$thn = date ( "Y" ) - 1;
				for($i = 1; $i <= 3; $i ++) {
					?>
					<option value="<?=$thn?>"><?=$thn?></option>
					<?
					$thn ++;
				}
				?>
				</select><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Periode</label>
				<input type="text" class="span5" name="periode" id="periode">
			</fieldset>
			<div id="periodes">
				<fieldset class="hr">
					<label class="span2">Tanggal Kegiatan</label> 
					<input type="text" class="span1" name="tanggal_awal" id="tanggal_awal"> 
					<label class="span0">s/d</label> 
					<input type="text" class="span1" name="tanggal_akhir" id="tanggal_akhir">
					<span class="mandatory">*</span>
				</fieldset>
				<fieldset class="hr">
					<label class="span2">Jumlah Hari Persiapan</label>
					<input type="text" class="span1" name="hari_persiapan" id="hari_persiapan">
					<label class="span2">Tanggal Persiapan</label> 
					<input type="text" class="span1" name="tanggal_persiapan_awal" id="tanggal_persiapan_awal"> 
					<label class="span0">s/d</label> 
					<input type="text" class="span1" name="tanggal_persiapan_akhir" id="tanggal_persiapan_akhir">
				</fieldset>
				<fieldset class="hr">
					<label class="span2">Jumlah Hari Pelaksanaan</label>
					<input type="text" class="span1" name="hari_pelaksanaan" id="hari_pelaksanaan">
					<label class="span2">Tanggal Pelaksanaan</label> 
					<input type="text" class="span1" name="tanggal_pelaksanaan_awal" id="tanggal_pelaksanaan_awal"> 
					<label class="span0">s/d</label> 
					<input type="text" class="span1" name="tanggal_pelaksanaan_akhir" id="tanggal_pelaksanaan_akhir">
				</fieldset>
				<fieldset class="hr">
					<label class="span2">Jumlah Hari Pelaporan</label>
					<input type="text" class="span1" name="hari_pelaporan" id="hari_pelaporan">
					<label class="span2">Tanggal Pelaporan</label> 
					<input type="text" class="span1" name="tanggal_pelaporan_awal" id="tanggal_pelaporan_awal"> 
					<label class="span0">s/d</label> 
					<input type="text" class="span1" name="tanggal_pelaporan_akhir" id="tanggal_pelaporan_akhir">
				</fieldset>
			</div>
			<fieldset class="hr">
				<ul class="rtabs">
					<li><a href="#view1">Dasar</a></li>
					<li><a href="#view2">Pendanaan</a></li>
					<li><a href="#view3">Keterangan lain</a></li>
				</ul>
				<div id="view1">
					<textarea class="ckeditor" cols="10" rows="40" name="dasar" id="dasar"></textarea>
				</div>
				<div id="view2">
					<textarea class="ckeditor" cols="10" rows="40" name="pendanaan" id="pendanaan"></textarea>
				</div>
				<div id="view3">
					<textarea class="ckeditor" cols="10" rows="40" name="keterangan" id="keterangan"></textarea>
				</div>
			</fieldset>
			<fieldset class="hr">
				<ul class="rtabs">
					<li><a href="#view4">Pendahuluan PKA</a></li>
					<li><a href="#view5">Tujuan Audit</a></li>
					<li><a href="#view6">Instruksi Khusus</a></li>
				</ul>
				<div id="view4">
					<textarea class="ckeditor" cols="10" rows="40" name="pedahuluan" id="pedahuluan"></textarea>
				</div>
				<div id="view5">
					<textarea class="ckeditor" cols="10" rows="40" name="tujuan" id="tujuan"></textarea>
				</div>
				<div id="view6">
					<textarea class="ckeditor" cols="10" rows="40" name="instruksi" id="instruksi"></textarea>
				</div>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Lampiran</label> <input type="file" class="span4" name="assign_attach" id="assign_attach">
			</fieldset>
			<input type="hidden" name="data_id" id="data_id" value="">
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				$rs_id_auditee = $assigns->assign_auditee_viewlist ( $arr ['assign_id'] );
				$assign_id_auditee = "";
				while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
					$assign_id_auditee .= $arr_id_auditee ['assign_auditee_id_auditee'] . ",";
				}
				?>
			<fieldset class="hr">
				<label class="span2">Nama Kegiatan</label>
				<input type="text" class="span7" name="kegiatan" id="kegiatan" value="<?=$arr['assign_kegiatan']?>" >
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Audit</label>
				<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", $arr['assign_tipe_id'], "", 1)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Obyek Audit</label> 
				&nbsp;&nbsp;&nbsp;<input type="hidden" name="auditee" id="auditee" class="select2 multiple" value="<?=$assign_id_auditee?>" />
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tahun</label> 
				<select class="span1" name="tahun" id="tahun">
					<option value="">Pilih Satu</option>
					<?
				$thn = date ( "Y" ) - 1;
				for($i = 1; $i <= 3; $i ++) {
					?>
					<option value="<?=$thn?>"
						<? if($thn==$arr['assign_tahun']) echo "selected";?>><?=$thn?></option>
					<?
					$thn ++;
				}
				?>
				</select><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Periode</label>
				<input type="text" class="span5" name="periode" id="periode" value="<?=$arr['assign_periode']?>">
			</fieldset>
			<div id="periodes">
				<fieldset class="hr">
				<label class="span2">Tanggal Kegiatan</label>
				<input type="text" class="span1" name="tanggal_awal" id="tanggal_awal" value="<?=$Helper->dateIndo($arr['assign_start_date'])?>"> 
				<label class="span0">s/d</label> 
				<input type="text" class="span1" name="tanggal_akhir" id="tanggal_akhir" value="<?=$Helper->dateIndo($arr['assign_end_date'])?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jumlah Hari Persiapan</label>
				<input type="text" class="span1" name="hari_persiapan" id="hari_persiapan" value="<?=$arr['assign_hari_persiapan']?>">
				<label class="span2">Tanggal Persiapan</label>
				<input type="text" class="span1" name="tanggal_persiapan_awal" id="tanggal_persiapan_awal" value="<?=$Helper->dateIndo($arr['assign_persiapan_awal'])?>"> 
				<label class="span0">s/d</label> 
				<input type="text" class="span1" name="tanggal_persiapan_akhir" id="tanggal_persiapan_akhir" value="<?=$Helper->dateIndo($arr['assign_persiapan_akhir'])?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jumlah Hari Pelaksanaan</label>
				<input type="text" class="span1" name="hari_pelaksanaan" id="hari_pelaksanaan" value="<?=$arr['assign_hari_pelaksanaan']?>">
				<label class="span2">Tanggal Pelaksanaan</label>
				<input type="text" class="span1" name="tanggal_pelaksanaan_awal" id="tanggal_pelaksanaan_awal" value="<?=$Helper->dateIndo($arr['assign_pelaksanaan_awal'])?>"> 
				<label class="span0">s/d</label> 
				<input type="text" class="span1" name="tanggal_pelaksanaan_akhir" id="tanggal_pelaksanaan_akhir" value="<?=$Helper->dateIndo($arr['assign_pelaksanaan_akhir'])?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jumlah Hari Pelaporan</label>
				<input type="text" class="span1" name="hari_pelaporan" id="hari_pelaporan" value="<?=$arr['assign_hari_pelaporan']?>">
				<label class="span2">Tanggal Pelaporan</label>
				<input type="text" class="span1" name="tanggal_pelaporan_awal" id="tanggal_pelaporan_awal" value="<?=$Helper->dateIndo($arr['assign_pelaporan_awal'])?>"> 
				<label class="span0">s/d</label> 
				<input type="text" class="span1" name="tanggal_pelaporan_akhir" id="tanggal_pelaporan_akhir" value="<?=$Helper->dateIndo($arr['assign_pelaporan_akhir'])?>">
			</fieldset>
			</div>
			<div id="dates">
				<script type="text/javascript">
				$("#tanggal_awal").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
					$("#tanggal_akhir").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
					$("#tanggal_surat").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
					
					$("#tanggal_persiapan_awal").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
					$("#tanggal_persiapan_akhir").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
					
					$("#tanggal_pelaksanaan_awal").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
					$("#tanggal_pelaksanaan_akhir").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
					
					$("#tanggal_pelaporan_awal").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
					$("#tanggal_pelaporan_akhir").datepicker({
					dateFormat: 'dd-mm-yy',
					nextText: "",
					prevText: "",
					changeYear: true,
					changeMonth: true
					});
			</script>
			</div>
			<fieldset class="hr">
				<ul class="rtabs">
					<li><a href="#view1">Dasar</a></li>
					<li><a href="#view2">Pendanaan</a></li>
					<li><a href="#view3">Keterangan Lain</a></li>
				</ul>
				<div id="view1">
					<textarea class="ckeditor" cols="10" rows="40" name="dasar" id="dasar"><?php echo $arr['assign_dasar'];?></textarea>
				</div>
				<div id="view2">
					<textarea class="ckeditor" cols="10" rows="40" name="pendanaan" id="pendanaan"><?php echo $arr['assign_pendanaan'];?></textarea>
				</div>
				<div id="view3">
					<textarea class="ckeditor" cols="10" rows="40" name="keterangan" id="keterangan"><?php echo $arr['assign_keterangan'];?></textarea>
				</div>
			</fieldset>
			<fieldset class="hr">
				<ul class="rtabs">
					<li><a href="#view4">Pendahuluan PKA</a></li>
					<li><a href="#view5">Tujuan Audit</a></li>
					<li><a href="#view6">Instruksi Khusus</a></li>
				</ul>
				<div id="view4">
					<textarea class="ckeditor" cols="10" rows="40" name="pedahuluan" id="pedahuluan"><?=$arr['assign_pendahuluan'];?></textarea>
				</div>
				<div id="view5">
					<textarea class="ckeditor" cols="10" rows="40" name="tujuan" id="tujuan"><?=$arr['assign_tujuan'];?></textarea>
				</div>
				<div id="view6">
					<textarea class="ckeditor" cols="10" rows="40" name="instruksi" id="instruksi"><?=$arr['assign_instruksi'];?></textarea>
				</div>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Lampiran</label>
				<input type="hidden" class="span4" name="assign_attach_old" value="<?=$arr['assign_file']?>"> 
				<input type="file" class="span4" name="assign_attach" id="assign_attach">
				<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Audit").$arr['assign_file']?>','_blank')"><?=$arr['assign_file']?></a></label>
			</fieldset>
			<input type="hidden" name="data_id" id="data_id" value="<?=$arr['assign_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				$rs_id_auditee = $assigns->assign_auditee_viewlist ( $arr ['assign_id'] );
				$assign_id_auditee = "";
				while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
					$assign_id_auditee .= $arr_id_auditee ['auditee_name'] . "<br>";
				}
				?>
			<fieldset class="hr">
				<table class="view_parrent">
					<tr>
						<td>Nama Kegiatan</td>
						<td>:</td>
						<td><?=$arr['assign_kegiatan']?></td>
					</tr>
					<tr>
						<td>Tipe Audit</td>
						<td>:</td>
						<td><?=$arr['audit_type_name']?></td>
					</tr>
					<tr>
						<td>Obyek Audit</td>
						<td>:</td>
						<td><?=$assign_id_auditee?></td>
					</tr>
					<tr>
						<td>Tahun</td>
						<td>:</td>
						<td><?=$arr['assign_tahun']?></td>
					</tr>
					<tr>
						<td>Tanggal Kegiatan</td>
						<td>:</td>
						<td><?=$Helper->dateIndo($arr['assign_start_date'])?> s/d <?=$Helper->dateIndo($arr['assign_end_date'])?></td>
					</tr>
					<tr>
						<td>Jumlah Hari Persiapan</td>
						<td>:</td>
						<td><?=$arr['assign_hari_persiapan']?> hari, Tanggal <?=$Helper->dateIndo($arr['assign_persiapan_awal'])?> s/d <?=$Helper->dateIndo($arr['assign_persiapan_akhir'])?></td>
					</tr>
					<tr>
						<td>Jumlah Hari Pelaksanaan</td>
						<td>:</td>
						<td><?=$arr['assign_hari_pelaksanaan']?> hari, Tanggal <?=$Helper->dateIndo($arr['assign_pelaksanaan_awal'])?> s/d <?=$Helper->dateIndo($arr['assign_pelaksanaan_akhir'])?></td>
					</tr>
					<tr>
						<td>Jumlah Hari Pelaporan</td>
						<td>:</td>
						<td><?=$arr['assign_hari_pelaporan']?> hari, Tanggal <?=$Helper->dateIndo($arr['assign_pelaporan_awal'])?> s/d <?=$Helper->dateIndo($arr['assign_pelaporan_akhir'])?></td>
					</tr>
					<tr>
						<td>Periode</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_periode']);?><td>
					</tr>
					<tr>
						<td>Dasar</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_dasar']);?></td>
					</tr>
					<tr>
						<td>Pendanaan</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_pendanaan']);?></td>
					</tr>
					<tr>
						<td>Keterangan Lain</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_keterangan']);?></td>
					</tr>
					<tr>
						<td>Pendahuluan PKA</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_pendahuluan']);?></td>
					</tr>
					<tr>
						<td>Tujuan Audit</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_tujuan']);?></td>
					</tr>
					<tr>
						<td>Instruksi Khusus</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_instruksi']);?></td>
					</tr>
					<tr>
						<td>Lampiran</td>
						<td>:</td>
						<td><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Audit").$arr['assign_file']?>','_blank')"><?=$arr['assign_file']?></a></td>
					</tr>
					<tr>
						<td>Detail komentar</td>
						<td>:</td>
						<td>
						<?php 
						$z = 0;
						$rs_komentar = $assigns->assign_komentar_viewlist ( $arr ['assign_id'] );
						while ( $arr_komentar = $rs_komentar->FetchRow () ) {
							$z ++;
							echo $z.". ".$arr_komentar['auditor_name']." : ".$arr_komentar['assign_comment_desc']."<br>";
						}
						?>
						</td>
					</tr>
					<tr>
						<td>Upload Data Awal</td>
						<td>:</td>
						<td>
						<?php 
						$no_file = 0;
						$rs_file = $assigns->assign_upload_viewlist ( $arr ['assign_id'] );
						while ( $arr_file = $rs_file->FetchRow () ) {
							$no_file++;
							echo "<a href=\"#\" Onclick=\"window.open('".$Helper->baseurl('Upload_Audit').$arr_file['upload_awal_nama_file']."','_blank')\">".$arr_file['upload_awal_nama_file']."</a><br>";
						}
						?>
						</td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<label class="span2">Susunan Tim</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table_risk">
					<thead>
						<tr>
							<th width="80%">Nama Anggota</th>
							<th width="20%">Posisi</th>
						</tr>
					</thead>
					<tbody id="table_desc">
					<?php
					$rs_detail = $assigns->view_auditor_assign ( $arr ['assign_id'] );
					while ( $arr_detil = $rs_detail->FetchRow () ) {
					?>
						<tr class="row_item">
							<td><?=$arr_detil ['auditor_name']?></td>
							<td><?=$arr_detil ['posisi_name']?></td>
						</tr>
					<?
					}
					?>
					</tbody>
				</table>
			</fieldset>
		<?
				break;
		case "getajukan_penugasan" :
		case "getapprove_penugasan" :
				$arr = $rs->FetchRow ();
				$rs_id_auditee = $assigns->assign_auditee_viewlist ( $arr ['assign_id'] );
				$assign_id_auditee = "";
				while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
					$assign_id_auditee .= $arr_id_auditee ['auditee_name'] . "<br>";
				}
				?>
			<fieldset class="hr">
				<table class="view_parrent">
					<tr>
						<td>Nama Kegiatan</td>
						<td>:</td>
						<td><?=$arr['assign_kegiatan']?></td>
					</tr>
					<tr>
						<td>Tipe Audit</td>
						<td>:</td>
						<td><?=$arr['audit_type_name']?></td>
					</tr>
					<tr>
						<td>Obyek Audit</td>
						<td>:</td>
						<td><?=$assign_id_auditee?></td>
					</tr>
					<tr>
						<td>Tahun</td>
						<td>:</td>
						<td><?=$arr['assign_tahun']?></td>
					</tr>
					<tr>
						<td>Tanggal Kegiatan</td>
						<td>:</td>
						<td><?=$Helper->dateIndo($arr['assign_start_date'])?> s/d <?=$Helper->dateIndo($arr['assign_end_date'])?></td>
					</tr>
					<tr>
						<td>Jumlah Hari Persiapan</td>
						<td>:</td>
						<td><?=$arr['assign_hari_persiapan']?></td>
					</tr>
					<tr>
						<td>Jumlah Hari Pelaksanaan</td>
						<td>:</td>
						<td><?=$arr['assign_hari_pelaksanaan']?></td>
					</tr>
					<tr>
						<td>Jumlah Hari Pelaporan</td>
						<td>:</td>
						<td><?=$arr['assign_hari_pelaporan']?></td>
					</tr>
					<tr>
						<td>Periode</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_periode']);?><td>
					</tr>
					<tr>
						<td>Dasar</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_dasar']);?></td>
					</tr>
					<tr>
						<td>Pendanaan</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_pendanaan']);?></td>
					</tr>
					<tr>
						<td>Keterangan Lain</td>
						<td>:</td>
						<td><?php echo $Helper->text_show($arr['assign_keterangan']);?></td>
					</tr>
					<tr>
						<td>Detail komentar</td>
						<td>:</td>
						<td>
						<?php 
						$z = 0;
						$rs_komentar = $assigns->assign_komentar_viewlist ( $arr ['assign_id'] );
						while ( $arr_komentar = $rs_komentar->FetchRow () ) {
							$z ++;
							echo $z.". ".$arr_komentar['auditor_name']." : ".$arr_komentar['assign_comment_desc']."<br>";
						}
						?>
						</td>
					</tr>
				</table>
			</fieldset>
			<fieldset>
				<label class="span2">Susunan Tim</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table_risk">
					<thead>
						<tr>
							<th width="80%">Nama Anggota</th>
							<th width="20%">Posisi</th>
						</tr>
					</thead>
					<tbody id="table_desc">
					<?php
					$rs_detail = $assigns->view_auditor_assign ( $arr ['assign_id'] );
					while ( $arr_detil = $rs_detail->FetchRow () ) {
					?>
						<tr class="row_item">
							<td><?=$arr_detil ['auditor_name']?></td>
							<td><?=$arr_detil ['posisi_name']?></td>
						</tr>
					<?
					}
					?>
					</tbody>
				</table>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Isi Komentar</label>
				<textarea id="komentar" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['assign_id']?>">	
			<input type="hidden" name="status_penugasan" value="<?=$status?>">	
		<?
				break;
			case "upload_data" :
				$arr = $rs->FetchRow ();
				$rs_file = $assigns->assign_upload_viewlist ( $arr ['assign_id'] );
				$file = array();
				while ( $arr_file = $rs_file->FetchRow () ) {
					$file[] = $arr_file ['upload_awal_nama_file'];
				}
				?>
			<fieldset class="hr">
				<label class="span1">File 1</label>
				<input type="hidden" class="span4" name="file_1_old" value="<?=$file[0]?>"> 
				<input type="file" class="span2" name="file_1" id="file_1">
				<label class="span3"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Audit").$file[0]?>','_blank')"><?=$file[0]?></a></label>
				<input type="checkbox" name="del_1" value="1"> Hapus File 1
			</fieldset>
			<fieldset class="hr">
				<label class="span1">File 2</label>
				<input type="hidden" class="span4" name="file_2_old" value="<?=$file[1]?>"> 
				<input type="file" class="span2" name="file_2" id="file_2">
				<label class="span3"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Audit").$file[1]?>','_blank')"><?=$file[1]?></a></label>
				<input type="checkbox" name="del_2" value="1"> Hapus File 2
			</fieldset>
			<fieldset class="hr">
				<label class="span1">File 3</label>
				<input type="hidden" class="span4" name="file_3_old" value="<?=$file[2]?>"> 
				<input type="file" class="span2" name="file_3" id="file_3">
				<label class="span3"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Audit").$file[2]?>','_blank')"><?=$file[2]?></a></label>
				<input type="checkbox" name="del_3" value="1"> Hapus File 3
			</fieldset>
			<fieldset class="hr">
				<label class="span1">File 4</label>
				<input type="hidden" class="span4" name="file_4_old" value="<?=$file[3]?>"> 
				<input type="file" class="span2" name="file_4" id="file_4">
				<label class="span3"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Audit").$file[3]?>','_blank')"><?=$file[3]?></a></label>
				<input type="checkbox" name="del_4" value="1"> Hapus File 4
			</fieldset>
			<fieldset class="hr">
				<label class="span1">File 5</label>
				<input type="hidden" class="span4" name="file_5_old" value="<?=$file[4]?>"> 
				<input type="file" class="span2" name="file_5" id="file_5">
				<label class="span3"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Audit").$file[4]?>','_blank')"><?=$file[4]?></a></label>
				<input type="checkbox" name="del_5" value="1"> Hapus File 5
			</fieldset>
			<input type="hidden" name="data_id" id="data_id" value="<?=$arr['assign_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
				<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp;
				<?
				if($_action != "getdetail"){
				?>
					<input type="submit" class="blue_btn" value="Simpan">
				<?
				}
				// if($_action != "getdetail"){
				?>
					
				<?php 
				// }
				?>
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
	<script>
$(document).ready(function() {
	$("#tahun").change(function() {
		var value = $(this).val();
		var id = $("#data_id").val();
		$.ajax({
			url : 'AuditManagement/ajax.php?data_action=getyear',
			type : 'POST',
			data : {
				value: value,
				id : id
			},
			success : function(res) {
				
				var minDate = '';
                var maxDate = '';
                var html = '';
     
                $.each(JSON.parse(res), function(index, el) {
                    minDate = el.minDate;
                    maxDate = el.maxDate;
                    html = el.html;
                });

                $("#periodes").html(html);
			}
		})
	})
	var data = [];
	<?php
	$rsAuditee = $auditees->auditee_data_viewlist ();
	$i = 0;
	foreach ( $rsAuditee->GetArray () as $row ) :
		?>
			data[<?php echo $i?>] = {"id":'<?php echo $row['auditee_id']?>', "text":'<?=$row['auditee_kode']." - ".$row['auditee_name']?>'};
	<?php
		$i ++;
	endforeach
	;
	?>
  $("#auditee").select2({
    placeholder:"Ketikkan kode atau nama Obyek Audit",
    tokenSeparators: [",", " "],
    multiple: true,
    width:'317px',
    data: data
  });

});
  
$(function() {
	$("#validation-form").validate({
		rules: {
			tipe_audit: "required",
			tahun: "required",
			tanggal_akhir: "required"
		},
		messages: {
			tipe_audit: "Silahkan Pilih Tipe Audit",
			tahun: "Silahkan Pilih Tahun",
			tanggal_akhir: "Silahkan Pilih Tanggal Awal dan Akhir Audit"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>