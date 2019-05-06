<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data">
		<?
		switch ($_action) {
			case "getadd" :
				?>
            <fieldset class="hr">
				<label class="span2">NIP</label>
				<input type="text" class="span2" name="nip" id="nip"><span class="mandatory">*</span>
			</fieldset>	
			<fieldset class="hr">
				<label class="span2">Nama</label> 
				<input type="text" class="span3" name="name" id="name"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tempat, Tanggal Lahir</label> 
				<input type="text" class="span2" name="tempat_lahir" id="tempat_lahir"> 
				<input type="text" class="span1" name="tanggal_lahir" id="tanggal_lahir">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Alamat Rumah</label> 
				<input type="text" class="span7" name="alamat" id="alamat">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jenis Kelamin</label>
				<?=$Helper->combo_jenis_kelamin("jenis_kelamin", "")?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Agama</label>
				<?=$Helper->combo_agama("agama", "")?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Golongan/Pangkat</label>
				<?=$Helper->dbCombo("pangkat_id", "par_pangkat_auditor", "pangkat_id", "concat(pangkat_name,' - ',pangkat_desc) as lengkap", "and pangkat_del_st = 1 ", "", "", 1, " order by pangkat_name ")?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">TMT</label>
				<input type="text" class="span1" name="tmt" id="tmt">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jabatan</label>
				<?=$Helper->dbCombo("jabatan", "par_jenis_jabatan", "jenis_jabatan_id", "concat(jenis_jabatan,' - ',jenis_jabatan_sub) as lengkap", "and jenis_jabatan_del_st = 1 ", "", "", 1, " order by jenis_jabatan_sort ")?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Golongan Biaya</label>
				<select name="golongan" id="golongan">
					<option value="">Pilih Satu</option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
					<option value="D">D</option>
					<option value="E">E</option>
				</select><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Mobile</label> 
				<input type="text" class="span2" name="mobile" id="mobile">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Telp</label> 
				<input type="text" class="span2" name="telp" id="telp">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Email</label> 
				<input type="text" class="span2" name="email_auditor" id="email_auditor"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Unggah Foto</label> 
				<input type="file" class="span4" name="foto" id="foto">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">NIP</label> 
				<input type="text" class="span2" name="nip" id="nip" value="<?=$arr['auditor_nip']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nama</label> 
				<input type="text" class="span3" name="name" id="name" value="<?=$arr['auditor_name']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tempat, Tangga Lahir</label> 
				<input type="text" class="span2" name="tempat_lahir" id="tempat_lahir" value="<?=$arr['auditor_tempat_lahir']?>"> 
				<input type="text" class="span1" name="tanggal_lahir" id="tanggal_lahir" value="<?=$arr['auditor_tgl_lahir']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Alamat Rumah</label> 
				<input type="text" class="span7" name="alamat" id="alamat" value="<?=$arr['auditor_alamat']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jenis Kelamin</label>
				<?=$Helper->combo_jenis_kelamin("jenis_kelamin", $arr['auditor_jenis_kelamin'])?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Agama</label>
				<?=$Helper->combo_agama("agama", $arr['auditor_agama'])?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Golongan/Pangkat</label>
				<?=$Helper->dbCombo("pangkat_id", "par_pangkat_auditor", "pangkat_id", "concat(pangkat_name,' - ',pangkat_desc) as lengkap", "and pangkat_del_st = 1 ", $arr['auditor_id_pangkat'], "", 1, " order by pangkat_name ")?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">TMT</label>
				<input type="text" class="span1" name="tmt" id="tmt" value="<?=$arr['auditor_tmt']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jabatan</label>
				<?=$Helper->dbCombo("jabatan", "par_jenis_jabatan", "jenis_jabatan_id", "concat(jenis_jabatan,' - ',jenis_jabatan_sub) as lengkap", "and jenis_jabatan_del_st = 1 ", $arr['auditor_id_jabatan'], "", 1, " order by jenis_jabatan_sort ")?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Golongan Biaya</label> <select name="golongan"
					id="golongan">
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
				</select><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Mobile</label> <input type="text" class="span2"
					name="mobile" id="mobile" value="<?=$arr['auditor_mobile']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Telp</label> <input type="text" class="span2"
					name="telp" id="telp" value="<?=$arr['auditor_telp']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Email</label> <input type="text" class="span2"
					name="email_auditor" id="email_auditor"
					value="<?=$arr['auditor_email']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Unggah Foto</label> 
				<input type="hidden" class="span4" name="foto_old" value="<?=$arr['auditor_foto']?>"> 
				<input type="file" class="span4" name="foto" id="foto"> 
				<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Foto").$arr['auditor_foto']?>','_blank')"><?=$arr['auditor_foto']?></a></label>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['auditor_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali"
						onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; <input
						type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
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