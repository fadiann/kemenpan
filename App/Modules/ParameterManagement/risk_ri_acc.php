<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="Public/js/jscolor/jscolor.js" type="text/javascript"></script>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal"
			id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tingkat Risiko Inheren</label> <input
					type="text" class="span5" name="name" id="name">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nilai Bawah (>)</label> <input type="text"
					class="span3" name="bawah" id="bawah">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nilai Atas (<=)</label> <input type="text"
					class="span3" name="atas" id="atas">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nilai</label> <input type="text" class="span3"
					name="nilai" id="nilai">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Warna</label> <input type="text" class="color"
					name="warna" id="warna">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tingkat Risiko Inheren</label> <input
					type="text" class="span5" name="name" id="name"
					value="<?=$arr['ri_name']?>">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nilai Bawah (>)</label> <input type="text"
					class="span3" name="bawah" id="bawah" value="<?=$arr['ri_bawah']?>">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nilai Atas (<=)</label> <input type="text"
					class="span3" name="atas" id="atas" value="<?=$arr['ri_atas']?>">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nilai</label> <input type="text" class="span3"
					name="nilai" id="nilai" value="<?=$arr['ri_value']?>">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Warna</label> <input type="text" class="color"
					name="warna" id="warna" value="<?=$arr['ri_warna']?>">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['ri_id']?>">	
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
	</article>
</section>
<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			name: "required",
			atas: "required",
			bawah: "required",
			nilai: "required"
		},
		messages: {
			name: "Masukan Tingkat Risiko Inheren",
			atas: "Masukan Nilai Atas",
			bawah: "Masukan Nilai Bawah",
			nilai: "Masukan Nilai"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>