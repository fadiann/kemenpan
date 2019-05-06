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
				<label class="span2">Kode Kelompok Temuan</label> <input type="text" class="span2" name="code" id="code">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kelompok Temuan</label> <input type="text" class="span4" name="name" id="name">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Kode Kelompok Temuan</label> <input type="text"
					class="span2" name="code" id="" code"" value="<?=$arr['finding_type_code']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kelompok Temuan</label> <input type="text"
					class="span4" name="name" id="name" value="<?=$arr['finding_type_name']?>">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['finding_type_id']?>">	
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
			code: "required",
			name: "required"
		},
		messages: {
			code: "Silahkan masukan Kode Tipe Temuan",
			name: "Silahkan masukan Tipe Temuan"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>