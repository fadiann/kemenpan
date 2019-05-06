<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<article class="module width_3_quarter">
	<header>
		<h3 class="tabs_involved"><?=$page_title?></h3>
	</header>
	<form method="post" name="x" action="#" class="form-horizontal" id="validation-form">
		<?
		switch ($_action) {
			case "getadd_x" :
				?>
		<fieldset class="hr">
			<label class="span2">Tingkat Pendidikan</label> 
			<?=$Helper->combo_pendidikan("tingkat_id", "")?> <span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Instiusi</label> 
			<input type="text" class="span4" name="intiusi" id="intiusi"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Kota</label> 
			<input type="text" class="span3" name="kota" id="kota"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Negara</label> 
			<input type="text" class="span2" name="negara" id="negara"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Tahun</label> 
			<input type="text" class="span7" name="tahun" id="tahun"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Jurusan</label> 
			<input type="text" class="span4" name="jurusan" id="jurusan"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Nilai/IPK</label> 
			<input type="text" class="span7" name="nilai" id="nilai"><span class="mandatory">*</span>
		</fieldset>
		<input type="hidden" name="auditor_id" value="<?=$fdata_id?>">
		<?
				break;
			case "getedit_x" :
				$arr = $rs->FetchRow ();
				?>
		<fieldset class="hr">
			<label class="span2">Tingkat Pendidikan</label> 
			<?=$Helper->combo_pendidikan("tingkat_id", $arr['pendidikan_tingkat'])?> <span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Instiusi</label> 
			<input type="text" name="intiusi" value="<?=$arr['pendidikan_instuisi']?>"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Kota</label> 
			<input type="text" class="span3" name="kota" id="kota" value="<?=$arr['pendidikan_kota']?>"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Negara</label> 
			<input type="text" class="span2" name="negara" id="negara" value="<?=$arr['pendidikan_negara']?>"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Tahun</label> 
			<input type="text" class="span7" name="tahun" id="tahun" value="<?=$arr['pendidikan_tahun']?>"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Jurusan</label> 
			<input type="text" class="span4" name="jurusan" id="jurusan" value="<?=$arr['pendidikan_jurusan']?>"><span class="mandatory">*</span>
		</fieldset>
		<fieldset class="hr">
			<label class="span2">Nilai/IPK</label> 
			<input type="text" class="span7" name="nilai" id="nilai" value="<?=$arr['pendidikan_nilai']?>"><span class="mandatory">*</span>
		</fieldset>
		<input type="hidden" name="data_id_x" value="<?=$arr['pendidikan_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
			<center>
				<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
				<input type="submit" class="blue_btn" value="Simpan">
			</center>
			<input type="hidden" name="data_action_x" id="data_action_x" value="<?=$_nextaction?>">
		</fieldset>
	</form>
</article>
<script> 
$(function() {
	$("#validation-form").validate({
		rules: {
			tingkat_id: "required",
			intiusi: "required",
			kota: "required",
			negara: "required",
			tahun:"required",
			jurusan:"required",
			nilai:"required"
		},
		messages: {
			tingkat_id: "Pilih Tingkat Pendidikan",
			intiusi: "Masukan Intiusi",
			kota: "Masukan Kota Intiusi",
			negara: "Masukan Negara Intiusi",
			tahun: "Masukan tahun ajaran",
			jurusan: "Masukan Jurusan pendidikan",
			nilai: "Masukan Nilai Akhir"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>