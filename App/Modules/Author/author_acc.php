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
				<label class="span3">Kode Author</label> <input type="text"
				class="span2" name="kode_author" id="kode_author"><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Nama Author</label> <input type="text"
				class="span5" name="nama_author" id="nama_author"><span class="required">*</span>
			</fieldset>
			<?
			break;
			case "getedit" :
			?>
			<fieldset class="form-group">
				<label class="span3">Kode Author</label> <input type="text"
				class="span2" name="kode_author" id="kode_author"
				value="<?=$arr['kode_author']?>"><span class="required">*</span>
			</fieldset>
			<fieldset class="hr" >
				<label class="span3">Nama Author</label> <input type="text"
				class="span5" name="nama_author" id="nama_author"
				value="<?=$arr['nama_author']?>"><span class="required">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['id_author']?>">
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
			kode_author: "required",
			nama_author: "required"
		},
		messages: {
			kode_author: "Silahkan masukan kode author",
			nama_author: "Silahkan masukan nama author"
				},
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>