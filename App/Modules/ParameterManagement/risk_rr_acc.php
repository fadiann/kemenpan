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
			<fieldset class="hr">
				<label class="span2">Tingkat Risiko Residu</label> <input
					type="text" class="span5" name="name" id="name">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nilai Bawah (>)</label> <input type="text"
					class="span3" name="bawah" id="bawah">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nilai Atas (<=)</label> <input type="text"
					class="span3" name="atas" id="atas">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nilai</label> <input type="text" class="span3"
					name="nilai" id="nilai">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Warna</label> <input type="text" class="color"
					name="warna" id="warna">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Tingkat Risiko Residu</label> <input
					type="text" class="span5" name="name" id="name"
					value="<?=$arr['rr_name']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nilai Bawah (>)</label> <input type="text"
					class="span3" name="bawah" id="bawah" value="<?=$arr['rr_bawah']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nilai Atas (<=)</label> <input type="text"
					class="span3" name="atas" id="atas" value="<?=$arr['rr_atas']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nilai</label> <input type="text" class="span3"
					name="nilai" id="nilai" value="<?=$arr['rr_value']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Warna</label> <input type="text" class="color"
					name="warna" id="warna" value="<?=$arr['rr_warna']?>">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['rr_id']?>">	
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
$(function() {
	$("#validation-form").validate({
		rules: {
			name: "required",
			atas: "required",
			bawah: "required",
			nilai: "required"
		},
		messages: {
			name: "Masukan Tingkat Risiko Residu",
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