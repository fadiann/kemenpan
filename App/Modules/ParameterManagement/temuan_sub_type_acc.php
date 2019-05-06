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
				<label class="span2">Kelompok Temuan</label>
				<?=$Helper->dbCombo("kel_temuan", "par_finding_type", "finding_type_id ", "finding_type_name", " and finding_type_del_st = '1' ", "", "", true)?><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Sub Kelompok</label> <input type="text" class="span1" name="code" id="code"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Sub Kelompok</label> <input type="text" class="span5" name="name" id="name"><span class="mandatory">*</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Kelompok Temuan</label>
				<?=$Helper->dbCombo("kel_temuan", "par_finding_type", "finding_type_id ", "finding_type_name", " and finding_type_del_st = '1' ", $arr['sub_type_id_type'], "", true)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Sub Kelompok</label> <input type="text" class="span1" name="code" id="code" value="<?=$arr['sub_type_code']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Sub Kelompok</label> <input type="text" class="span5" name="name" id="name" value="<?=$arr['sub_type_name']?>"><span class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['sub_type_id']?>">	
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
			propinsi: "required",
			kabupaten: "required"
		},
		messages: {
			propinsi: "Silahkan Pilih Propinsi",
			kabupaten: "Silahkan Masukan Nama Kabupaten/Kota"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>