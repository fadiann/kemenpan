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
				<label class="col-sm-3 control-label">Nama Jabatan</label> <input type="text"
					class="span3" name="name" id="name"><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Urutan</label> <input type="text"
					class="span1" name="sort" id="sort">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama Jabatan</label> <input type="text"
					class="span3" name="name" id="name"
					value="<?=$arr['jabatan_pic_name']?>"><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Urutan</label> <input type="text"
					class="span1" name="sort" id="sort"
					value="<?=$arr['jabatan_pic_sort']?>">
			</fieldset>
			<input type="hidden" name="data_id"
				value="<?=$arr['jabatan_pic_id']?>">	
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
			name: "required"
		},
		messages: {
			name: "Silahkan masukan Nama Jabatan"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>