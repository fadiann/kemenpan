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
				<label class="span3">Kode Author</label> <input type="text"
				class="span2" name="kode_author" id="kode_author"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Nama Author</label> <input type="text"
				class="span5" name="nama_author" id="nama_author"><span class="mandatory">*</span>
			</fieldset>
			<?
			break;
			case "getedit" :
			?>
			<fieldset class="hr">
				<label class="span3">Kode Author</label> <input type="text"
				class="span2" name="kode_author" id="kode_author"
				value="<?=$arr['kode_author']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr" >
				<label class="span3">Nama Author</label> <input type="text"
				class="span5" name="nama_author" id="nama_author"
				value="<?=$arr['nama_author']?>"><span class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['id_author']?>">
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