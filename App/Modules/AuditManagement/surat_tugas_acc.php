<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="Public/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="Public/js/jquery.loadTemplate-1.4.1.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=$page_title?></h4>
			</header>
			<div class="panel-body wrap">
		<form method="post" name="f" action="#" class="form-horizontal"
			id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja </label>
				<div class="col-sm-5 control-label" style="text-align:left !important;">
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				while($arr_auditee = $rs_auditee->FetchRow()){
					echo $arr_auditee['auditee_name']."<br>";
				}
				?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal Audit </label>
				<div class="col-sm-5 control-label" style="text-align:left !important;">
				<?= $Helper->dateIndo ( $arr_assign ['assign_start_date'] ) . " s.d " . $Helper->dateIndo ( $arr_assign ['assign_end_date'] );?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">No Surat Tugas <span class="required">*</span></label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="no_surat" id="no_surat">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal Surat Tugas <span class="required">*</span></label>
				<div class="col-sm-3">
				<input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Penandatangan <span class="required">*</span></label>
				<div class="col-sm-5">
				<?=$Helper->dbCombo("ttd_id", "auditor", "auditor_id", "auditor_name", "and auditor_del_st = 1 ", "", "", 1, "order by auditor_name")?>
				</div>
				<input type="hidden" class="form-control" name="jabatan_surat" id="jabatan_surat" value="-">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tembusan</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="tembusan" id="tembusan">
				<span class="note">Gunakan koma (,) sebagai pemisah</span>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Uraian</label>
				<div class="col-md-8">
					<div class="tabs">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#menimbang" data-toggle="tab">Menimbang</a>
							</li>
							<li>
								<a href="#dasar" data-toggle="tab">Dasar</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="menimbang" class="tab-pane active">
								<textarea class="ckeditor" cols="10" rows="40" name="menimbang">
								Bahwa dalam rangka pelaksanaan Program Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya TA 2019, dipandang perlu menugaskan pegawai Kementerian PANRB, untuk melakukan ..............................
								</textarea>
							</div>
							<div id="dasar" class="tab-pane">
								<textarea class="ckeditor" cols="10" rows="40" name="dasar">
								<ol>
									<li>Peraturan Pemerintah Nomor 60 Tahun 2008 tentang Sistem Pengendalian Internal Pemerintah;</li>
									<li>Peraturan Presiden Nomor 29 Tahun 2014 tentang Sistem Akuntabilitas Kinerja Instansi Pemerintah;</li>
									<li>Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 53 Tahun 2014 tentang Petunjuk Teknis Perjanjian Kinerja, Pelaporan Kinerja dan Tata Cara Reviu atas Laporan Kinerja Pemerintah;</li>
									<li>Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 3 Tahun 2016 sebagai mana telah diubah dengan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 12 Tahun 2017 tentang Perubahan Atas Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Republik Indonesia Nomor 3 Tahun 2016 Tentang Organisasi Dan Tata Kerja Kementerian Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi
									<ol>
									</ol>
									</li>
								</ol>
								</textarea>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja</label>
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				while($arr_auditee = $rs_auditee->FetchRow()){
					echo $arr_auditee['auditee_name']."<br>";
				}
				?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal Audit</label>
				<div class="col-sm-5">
				<?= $Helper->dateIndo ( $arr_assign ['assign_start_date'] ) . " s.d " . $Helper->dateIndo ( $arr_assign ['assign_end_date'] );?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">No Surat Tugas <span class="required">*</span></label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="no_surat" id="no_surat" value="<?=$arr['assign_surat_no']?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal Surat Tugas <span class="required">*</span></label> 
				<div class="col-sm-3">
				<input type="text" class="form-control" name="tanggal_surat" id="tanggal_surat" value="<?=$Helper->dateIndo($arr['assign_surat_tgl'])?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Penandatangan <span class="required">*</span></label>
				<div class="col-sm-5">
				<?=$Helper->dbCombo("ttd_id", "auditor", "auditor_id", "auditor_name", "and auditor_del_st = 1 ", $arr['assign_surat_id_auditorTTD'], "", 1, "order by auditor_name")?>
				</div>
			</fieldset>
			<input type="hidden" class="form-control" name="jabatan_surat" id="jabatan_surat" value="<?=$arr['assign_surat_jabatanTTD']?>">
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tembusan</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="tembusan" id="tembusan" value="<?=$arr['assign_surat_tembusan']?>">
				<span class="note">Gunakan koma (,) sebagai pemisah</span>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Uraian</label>
				<div class="col-md-8">
					<div class="tabs">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#menimbang" data-toggle="tab">Menimbang</a>
							</li>
							<li>
								<a href="#dasar" data-toggle="tab">Dasar</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="menimbang" class="tab-pane active">
								<textarea class="ckeditor" cols="10" rows="40" name="menimbang"><?=$arr['assign_surat_menimbang']?></textarea>
							</div>
							<div id="dasar" class="tab-pane">
								<textarea class="ckeditor" cols="10" rows="40" name="dasar"><?=$arr['assign_surat_dasar']?></textarea>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['assign_surat_id']?>">	
		<?
				break;
			case "getajukan_surat_tugas" :
			case "getapprove_surat_tugas" :
				$arr = $rs->FetchRow ();
				$rs_komentar = $assigns->surat_tugas_komentar_viewlist ( $arr ['assign_surat_id'] );
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja</label>
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				while($arr_auditee = $rs_auditee->FetchRow()){
					echo $arr_auditee['auditee_name']."<br>";
				}
				?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal Audit</label>
				<?=$Helper->dateIndo ( $arr_assign ['assign_start_date'] ) . " s.d " . $Helper->dateIndo ( $arr_assign ['assign_end_date'] );?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">No Surat Tugas</label>
				<?=$arr['assign_surat_no']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal Surat Tugas</label> 
				<?=$Helper->dateIndo($arr['assign_surat_tgl'])?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Penandatangan</label>
				<?=$arr['auditor_name']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Jabatan Penandatangan</label>
				<?=$arr['assign_surat_jabatanTTD']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tembusan</label>
				<?=$arr['assign_surat_tembusan']?>
			</fieldset>
				<?php
				$z = 0;
				while ( $arr_komentar = $rs_komentar->FetchRow () ) {
					$z ++;
					?>
			<fieldset class="form-group">
			<label class="col-sm-3 control-label">detail komentar</label> <label class="span7">
					<?php echo $z.". ".$arr_komentar['auditor_name']." : ".$arr_komentar['surat_comment_desc']."<br>";?>
				</label>
			</fieldset>
			<?php
			}
			?>				
			<fieldset class="form-group">
			<label class="col-sm-3 control-label">Isi Komentar</label> <input type="text" class="span7" name="komentar">
		</fieldset>
		<input type="hidden" name="data_id" value="<?=$arr['assign_surat_id']?>">
		<input type="hidden" name="status" value="<?=$status?>">
		<?
			break;
		}
		?>
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> 
					<input type="submit" class="btn btn-success" value="Simpan">
					<a href="main.php?method=surattugas&data_action=viewsurattugas&data_id=<?=$arr['assign_surat_id']?>" class="btn btn-warning" target="_blank"><i class="fa fa-eye-slash"></i> Lihat</a>
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
<script>
$(function() {
	$("#validation-form").validate({
		rules: {
			no_surat: "required",
			tanggal_surat: "required",
			ttd_id: "required",
			jabatan_surat: "required"
		},
		messages: {
			no_surat: "Silahkan Masukan No Surat Tugas",
			tanggal_surat: "Silahkan Pilih Tanggal Surat Tugas",
			ttd_id: "Silahkan Pilih Penandatangan",
			jabatan_surat: "Silahkan Masukan Jabatan Penandatangan Surat Tugas"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});

$("#tanggal_surat").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true,
	 maxDate: '<?=$Helper->dateIndo($arr_assign['assign_start_date'])?>'
});
</script>