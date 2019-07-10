<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data">
		<?
		switch ($_action) {
			case "getadd" :
				?>
            <fieldset class="form-group">
				<label class="col-sm-3 control-label">NIP <span class="required">*</span></label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="nip" id="nip">
				</div>
			</fieldset>	
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama <span class="required">*</span></label> 
				<div class="col-sm-5">
				<input type="text" class="form-control" name="name" id="name">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tempat, Tanggal Lahir</label> 
				<div class="col-sm-3">
					<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"> 
				</div>
				<div class="col-sm-2">
				<input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Alamat Rumah</label> 
				<div class="col-sm-5">
				<input type="text" class="form-control" name="alamat" id="alamat">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Jenis Kelamin</label>
				<div class="col-sm-5">
				<?=$Helper->combo_jenis_kelamin("jenis_kelamin", "")?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Agama</label>
				<div class="col-sm-5">
				<?=$Helper->combo_agama("agama", "")?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Golongan/Pangkat</label>
				<div class="col-sm-5">
				<?=$Helper->dbCombo("pangkat_id", "par_pangkat_auditor", "pangkat_id", "concat(pangkat_name,' - ',pangkat_desc) as lengkap", "and pangkat_del_st = 1 ", "", "", 1, " order by pangkat_name ")?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">TMT</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="tmt" id="tmt">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Jabatan</label>
				<div class="col-sm-5">
				<?=$Helper->dbCombo("jabatan", "par_jenis_jabatan", "jenis_jabatan_id", "concat(jenis_jabatan,' - ',jenis_jabatan_sub) as lengkap", "and jenis_jabatan_del_st = 1 ", "", "", 1, " order by jenis_jabatan_sort ")?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Golongan Biaya <span class="required">*</span></label>
				<div class="col-sm-5">
				<select name="golongan" id="golongan" class="form-control">
					<option value="">Pilih Satu</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
				</select>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Mobile</label> 
				<div class="col-sm-5">
				<input type="text" class="form-control" name="mobile" id="mobile">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Telp</label> 
				<div class="col-sm-5">
				<input type="text" class="form-control" name="telp" id="telp">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Email <span class="required">*</span></label> 
				<div class="col-sm-5">
				<input type="text" class="form-control" name="email_auditor" id="email_auditor">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Unggah Foto</label> 
				<div class="col-sm-5">
				<input type="file" class="form-control" name="foto" id="foto">
				</div>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
					<label class="col-sm-3 control-label">NIP <span class="required">*</span></label>
					<div class="col-sm-5">
				<input type="text" class="form-control" name="nip" id="nip" value="<?=$arr['auditor_nip']?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama <span class="required">*</span></label>
				<div class="col-sm-5">
					<input type="text" class="form-control" name="name" id="name" value="<?=$arr['auditor_name']?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tempat, Tangga Lahir</label> 
				<div class="col-sm-3">
				<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?=$arr['auditor_tempat_lahir']?>"> 
				</div>
				<div class="col-sm-2">
				<input type="text" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?=$arr['auditor_tgl_lahir']?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Alamat Rumah</label> 
				<div class="col-sm-5">
				<input type="text" class="form-control" name="alamat" id="alamat" value="<?=$arr['auditor_alamat']?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Jenis Kelamin</label>
				<div class="col-sm-5">
				<?=$Helper->combo_jenis_kelamin("jenis_kelamin", $arr['auditor_jenis_kelamin'])?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Agama</label>
				<div class="col-sm-5">
				<?=$Helper->combo_agama("agama", $arr['auditor_agama'])?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Golongan/Pangkat</label>
				<div class="col-sm-5">
				<?=$Helper->dbCombo("pangkat_id", "par_pangkat_auditor", "pangkat_id", "concat(pangkat_name,' - ',pangkat_desc) as lengkap", "and pangkat_del_st = 1 ", $arr['auditor_id_pangkat'], "", 1, " order by pangkat_name ")?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">TMT</label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="tmt" id="tmt" value="<?=$arr['auditor_tmt']?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Jabatan</label>
				<div class="col-sm-5">
				<?=$Helper->dbCombo("jabatan", "par_jenis_jabatan", "jenis_jabatan_id", "concat(jenis_jabatan,' - ',jenis_jabatan_sub) as lengkap", "and jenis_jabatan_del_st = 1 ", $arr['auditor_id_jabatan'], "", 1, " order by jenis_jabatan_sort ")?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Golongan Biaya <span class="required">*</span></label> 
				<div class="col-sm-5">
				<select name="golongan" class="form-control" id="golongan">
					<option value="">Pilih Golongan</option>
					<option value="A"
						<? if($arr['auditor_golongan']=="A") echo "selected";?>>A</option>
					<option value="B"
						<? if($arr['auditor_golongan']=="B") echo "selected";?>>B</option>
					<option value="C"
						<? if($arr['auditor_golongan']=="C") echo "selected";?>>C</option>
					<option value="D"
						<? if($arr['auditor_golongan']=="D") echo "selected";?>>D</option>
					<option value="E"
						<? if($arr['auditor_golongan']=="E") echo "selected";?>>E</option>
				</select>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Mobile</label> 
				<div class="col-sm-5"><input type="text" class="form-control"
					name="mobile" id="mobile" value="<?=$arr['auditor_mobile']?>">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Telp</label> 
				<div class="col-sm-5"><input type="text" class="form-control"
					name="telp" id="telp" value="<?=$arr['auditor_telp']?>">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Email <span class="required">*</span></label> 
				<div class="col-sm-5"><input type="text" class="form-control"
					name="email_auditor" id="email_auditor"
					value="<?=$arr['auditor_email']?>">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Unggah Foto</label> 
				<div class="col-sm-4">
				<input type="hidden" class="form-control" name="foto_old" value="<?=$arr['auditor_foto']?>"> 
				<input type="file" class="form-control" name="foto" id="foto"> 
				</div>
				<label class="col-sm-3 control-label"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Foto").$arr['auditor_foto']?>','_blank')"><?=$arr['auditor_foto']?></a></label>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['auditor_id']?>">	
		<?
				break;
		}
		?>
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali"
						onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; <input
						type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
<script>
$("#tanggal_lahir, #tmt").datepicker({
	dateFormat: 'yy-mm-dd',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true
});  
$(function() {
	$("#validation-form").validate({
		rules: {
			nip: "required",
			name: "required",
			golongan: "required",
			email_auditor: {
				  required: true,
				  email: true
			}
		},
		messages: {
			nip: "Silahkan masukan NIP Auditor",
			name: "Silahkan masukan Nama Auditor",
			golongan: "Silahkan Pilih Golongan",
			email_auditor: {
				  required: "Silahkan Masukan Email",
				  email: "Silahkan Masukan Email Dengan Benar"
			}
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>