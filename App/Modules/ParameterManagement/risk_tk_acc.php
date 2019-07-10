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
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tingkat Kemungkinan</label> <input type="text"
					class="span5" name="name" id="name">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nilai</label> <input type="text" class="span3"
					name="nilai" id="nilai">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Keterangan</label> <input type="text"
					class="span7" name="desc" id="desc">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tingkat Kemungkinan</label> <input type="text"
					class="span5" name="name" id="name" value="<?=$arr['tk_name']?>">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nilai</label> <input type="text" class="span3"
					name="nilai" id="nilai" value="<?=$arr['tk_value']?>">
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Keterangan</label> <input type="text"
					class="span7" name="desc" id="desc" value="<?=$arr['tk_desc']?>">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['tk_id']?>">	
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
			nilai: "required"
		},
		messages: {
			name: "Masukan Tingkat Kemungkinan",
			nilai: "Masukan Nilai"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>