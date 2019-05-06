<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
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
				<label class="span2">Jenis Penanganan</label> <input type="text"
					class="span3" name="jenis" id="jenis"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Keterangan</label> <input type="text"
					class="span7" name="desc" id="desc">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Penanganan</label> <select name="status">
					<option value="0">Tidak</option>
					<option value="1">Ya</option>
				</select>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Jenis Penanganan</label> <input type="text"
					class="span3" name="jenis" id="jenis"
					value="<?=$arr['risk_penanganan_jenis']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Keterangan</label> <input type="text"
					class="span7" name="desc" id="desc"
					value="<?=$arr['risk_penanganan_desc']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Penanganan</label> <select name="status">
					<option value="0"
						<?php if($arr['risk_penanganan_status']=="0") echo "selected"?>>Tidak</option>
					<option value="1"
						<?php if($arr['risk_penanganan_status']=="1") echo "selected"?>>Ya</option>
				</select>
			</fieldset>
			<input type="hidden" name="data_id"
				value="<?=$arr['risk_penanganan_id']?>">	
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
			name: "required"
		},
		messages: {
			name: "Masukan Level Risk"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>