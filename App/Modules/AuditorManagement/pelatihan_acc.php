<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
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
			<label class="span2">Jenis Pelatihan</label>
				<?=$Helper->dbCombo("kompetensi_id", "par_kompetensi", "kompetensi_id", "kompetensi_name", "and kompetensi_del_st = 1 ", "", "", 1)?>
			</fieldset>
		<fieldset class="hr">
			<label class="span2">Nama Pelatihan</label> <input type="text"
				class="span4" name="name" id="name"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Durasi (Jam)</label> <input type="text"
				class="span0" name="durasi" id="durasi"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Tanggal</label> <input type="text" class="span1"
				name="tanggal_awal" id="tanggal_awal"> <label class="span0">s/d</label>
			<input type="text" class="span1" name="tanggal_akhir"
				id="tanggal_akhir"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Penyelenggara</label> <input type="text"
				class="span7" name="penyelenggara" id="penyelenggara"><span
				class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Unggah Sertifikat</label> <input type="file" class="span4" name="sertifikat" id="sertifikat">
		</fieldset>
		<input type="hidden" name="auditor_id" value="<?=$fdata_id?>">
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
			<label class="span2">Jenis Pelatihan</label>
				<?=$Helper->dbCombo("kompetensi_id", "par_kompetensi", "kompetensi_id", "kompetensi_name", "and kompetensi_del_st = 1 ", $arr['pelatihan_kompetensi_id'], "", 1)?>
			</fieldset>
		<fieldset class="hr">
			<label class="span2">Nama Pelatihan</label> <input type="text"
				class="span4" name="name" id="name"
				value="<?=$arr['pelatihan_nama']?>"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Durasi (Jam)</label> <input type="text"
				class="span0" name="durasi" id="durasi"
				value="<?=$arr['pelatihan_durasi']?>"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Tanggal</label> <input type="text" class="span1"
				name="tanggal_awal" id="tanggal_awal"
				value="<?=$Helper->dateIndo($arr['pelatihan_tanggal_awal'])?>"> <label
				class="span0">s/d</label> <input type="text" class="span1"
				name="tanggal_akhir" id="tanggal_akhir"
				value="<?=$Helper->dateIndo($arr['pelatihan_tanggal_akhir'])?>"><span
				class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Penyelenggara</label> <input type="text"
				class="span7" name="penyelenggara" id="penyelenggara"
				value="<?=$arr['pelatihan_penyelenggara']?>"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Unggah Sertifikat</label> 
			<input type="hidden" class="span4" name="sertifikat_old" value="<?=$arr['pelatihan_sertifikat']?>"> 
			<input type="file" class="span4" name="sertifikat" id="sertifikat"> 
			<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Sertifikat").$arr['pelatihan_sertifikat']?>','_blank')"><?=$arr['pelatihan_sertifikat']?></a></label>
		</fieldset>
		<input type="hidden" name="data_id" value="<?=$arr['pelatihan_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
		<fieldset class="hr">
			<label class="span2">Jenis Pelatihan</label>
			<?=$arr['kompetensi_name']?>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Nama Pelatihan</label>
			<?=$arr['pelatihan_nama']?>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Durasi (Jam)</label>
			<?=$arr['pelatihan_durasi']?> Jam
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Tanggal</label>
			<?=$Helper->dateIndo($arr['pelatihan_tanggal_awal'])?> s/d <?=$Helper->dateIndo($arr['pelatihan_tanggal_akhir'])?>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Penyelenggara</label>
			<?=$arr['pelatihan_penyelenggara']?>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Unggah Sertifikat</label>
			<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Sertifikat").$arr['pelatihan_sertifikat']?>','_blank')"><?=$arr['pelatihan_sertifikat']?></a></label>
		</fieldset>
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
<script> 
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
$(function() {
	$("#validation-form").validate({
		rules: {
			kompetensi_id: "required",
			name: "required",
			durasi: "required",
			tanggal_akhir: "required",
			penyelenggara:"required"
		},
		messages: {
			kompetensi_id: "Pilih Kompetensi",
			name: "Masukan Nama Pelatihan",
			durasi: "Masukan Durasi Pelatihan",
			tanggal_akhir: "Silahkan Pilih Tanggal Awal dan Akhir Audit",
			penyelenggara: "Masukan Penyelenggara Pelatihan"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>