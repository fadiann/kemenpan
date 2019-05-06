<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
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
				<label class="span2">Tipe Audit</label>
				<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", "", "", 1)?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Program Audit</label> <input type="text"
					class="span3" name="code" id="code"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Aspek</label>
				<?=$Helper->dbCombo("aspek_id", "par_aspek", "aspek_id", "aspek_name", "and aspek_del_st  = 1 ", "", "", 1)?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Sub Aspek</label> <input type="text" class="span7" name="title" id="title"><span class="mandatory">*</span>
			</fieldset>
			<fieldset>
				<label class="span2">Prosedur Audit</label>
			</fieldset>
			<fieldset class="hr">
				<textarea class="ckeditor" cols="10" rows="40" name="procedure" id="procedure"></textarea>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr =  $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Tipe Audit</label>
				<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", $arr['ref_program_id_type'], "", 1)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Program Audit</label> 
				<input type="text" class="span3" name="code" id="code" value="<?=$arr['ref_program_code']?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Aspek</label>
				<?=$Helper->dbCombo("aspek_id", "par_aspek", "aspek_id", "aspek_name", "and aspek_del_st  = 1 ", $arr['ref_program_aspek_id'], "", 1)?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Sub Aspek</label> <input type="text" class="span7" name="title" id="title" value="<?=$arr['ref_program_title']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset>
				<label class="span2">Prosedur Audit</label>
			</fieldset>
			<fieldset class="hr">
				<textarea class="ckeditor" cols="10" rows="40" name="procedure" id="procedure"><?=$arr['ref_program_procedure']?></textarea>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['ref_program_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr =  $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Tipe Audit</label>
				<?=$arr['audit_type_name']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Program Audit</label> 
				<?=$arr['ref_program_code']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Aspek</label>
				<?=$arr['aspek_name']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Sub Aspek</label>
				<?=$arr['ref_program_title']?>
			</fieldset>
			<fieldset>
				<label class="span2">Prosedur Audit</label>
			</fieldset>
			<fieldset class="hr">
				<?=$arr['ref_program_procedure']?>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['ref_program_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
					<?
					if($_action!='getdetail'){
					?>
					<input type="submit" class="blue_btn" value="Simpan">
					<?
					}
					?>
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
			code: "required",
			title: "required"
		},
		messages: {
			name: "Silahkan masukan Tipe Audit",
			code: "Silahkan masukan Kode Ref",
			title: "Silahkan masukan Judul Ref"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>