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
				<label class="span2">Sub Tipe Pengawasan</label> 
				<input type="text" class="span3" name="name" id="name">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Keterangan</label> 
				<input type="text" class="span7" name="desc" id="desc">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Pengawasan</label> 
				<?=$Helper->dbCombo("type_id", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", "", "", 1)?>
				<span class="mandatory">*</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Sub Tipe Pengawasan</label> 
				<input type="text" class="span3" name="name" id="name" value="<?=$arr['sub_audit_type_name']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Keterangan</label> 
				<input type="text" class="span7" name="desc" id="desc" value="<?=$arr['sub_audit_type_desc']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Pengawasan</label> 
				<?=$Helper->dbCombo("type_id", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1", $arr['sub_audit_type_id_type'], "", 1)?>
				<span class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['sub_audit_type_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
					<input type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			name: "required",			
			opsi: "required"
		},
		messages: {
			name: "Silahkan masukan Tipe Audit",			
			opsi: "Silakan Pilih Opsi"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>