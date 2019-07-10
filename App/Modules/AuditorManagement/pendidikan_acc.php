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
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Tingkat Pendidikan</label> 
			<?=$Helper->combo_pendidikan("tingkat_id", "")?> <span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Instiusi</label> 
			<input type="text" class="form-control" name="intiusi" id="intiusi"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Kota</label> 
			<input type="text" class="span3" name="kota" id="kota"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Negara</label> 
			<input type="text" class="span2" name="negara" id="negara"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Tahun</label> 
			<input type="text" class="span7" name="tahun" id="tahun"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Jurusan</label> 
			<input type="text" class="form-control" name="jurusan" id="jurusan"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Nilai/IPK</label> 
			<input type="text" class="span7" name="nilai" id="nilai"><span class="required">*</span>
		</fieldset>
		<input type="hidden" name="auditor_id" value="<?=$fdata_id?>">
		<?
				break;
			case "getedit_x" :
				$arr = $rs->FetchRow ();
				?>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Tingkat Pendidikan</label> 
			<?=$Helper->combo_pendidikan("tingkat_id", $arr['pendidikan_tingkat'])?> <span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Instiusi</label> 
			<input type="text" name="intiusi" value="<?=$arr['pendidikan_instuisi']?>"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Kota</label> 
			<input type="text" class="span3" name="kota" id="kota" value="<?=$arr['pendidikan_kota']?>"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Negara</label> 
			<input type="text" class="span2" name="negara" id="negara" value="<?=$arr['pendidikan_negara']?>"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Tahun</label> 
			<input type="text" class="span7" name="tahun" id="tahun" value="<?=$arr['pendidikan_tahun']?>"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Jurusan</label> 
			<input type="text" class="form-control" name="jurusan" id="jurusan" value="<?=$arr['pendidikan_jurusan']?>"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Nilai/IPK</label> 
			<input type="text" class="span7" name="nilai" id="nilai" value="<?=$arr['pendidikan_nilai']?>"><span class="required">*</span>
		</fieldset>
		<input type="hidden" name="data_id_x" value="<?=$arr['pendidikan_id']?>">	
		<?
				break;
		}
		?>
			<fieldset class="form-group">
			<center>
				<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
				<input type="submit" class="btn btn-success" value="Simpan">
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