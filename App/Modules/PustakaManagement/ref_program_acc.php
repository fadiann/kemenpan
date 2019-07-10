<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=$page_title?></h4>
			</header>
			<div class="panel-body wrap">
				<form method="post" name="f" action="#" class="form-horizontal"
					id="validation-form">
				<?
				switch ($_action) {
					case "getadd" :
						?>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Tipe Audit <span class="required">*</span></label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", "", "", 1)?>
						
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Kode Program Audit <span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text" class="form-control" name="code" id="code">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Aspek <span class="required">*</span></label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("aspek_id", "par_aspek", "aspek_id", "aspek_name", "and aspek_del_st  = 1 ", "", "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Sub Aspek <span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text" class="form-control" name="title" id="title">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Prosedur Audit</label>
						<div class="col-sm-7">
						<textarea class="ckeditor" cols="10" rows="40" name="procedure" id="procedure"></textarea>
						</div>
					</fieldset>
				<?
						break;
					case "getedit" :
						$arr =  $rs->FetchRow ();
						?>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Tipe Audit <span class="required">*</span></label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", $arr['ref_program_id_type'], "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Kode Program Audit <span class="required">*</span></label>
						<div class="col-sm-5">
						<input type="text" class="form-control" name="code" id="code" value="<?=$arr['ref_program_code']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Aspek <span class="required">*</span></label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("aspek_id", "par_aspek", "aspek_id", "aspek_name", "and aspek_del_st  = 1 ", $arr['ref_program_aspek_id'], "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Sub Aspek <span class="required">*</span></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title" id="title" value="<?=$arr['ref_program_title']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Prosedur Audit</label>
						<div class="col-sm-7">
						<textarea class="ckeditor" cols="10" rows="40" name="procedure" id="procedure"><?=$arr['ref_program_procedure']?></textarea>
						</div>
					</fieldset>
					<input type="hidden" name="data_id" value="<?=$arr['ref_program_id']?>">	
				<?
						break;
					case "getdetail" :
						$arr =  $rs->FetchRow ();
						?>
					<fieldset class="form-group">
						<label class="col-sm-3 text-right">Tipe Audit</label>
						<div class="col-sm-5">
						<?=$arr['audit_type_name']?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 text-right">Kode Program Audit</label> 
						<div class="col-sm-5">
						<?=$arr['ref_program_code']?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 text-right">Aspek</label>
						<div class="col-sm-5">
						<?=$arr['aspek_name']?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 text-right">Sub Aspek</label>
						<div class="col-sm-5">
						<?=$arr['ref_program_title']?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 text-right">Prosedur Audit</label>
						<div class="col-sm-7">
						<?=$arr['ref_program_procedure']?>
						</div>
					</fieldset>
					<input type="hidden" name="data_id" value="<?=$arr['ref_program_id']?>">	
				<?
						break;
				}
				?>
					<fieldset class="form-group">
						<center>
							<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
							<?
							if($_action!='getdetail'){
							?>
							<input type="submit" class="btn btn-success" value="Simpan">
							<?
							}
							?>
						</center>
						<input type="hidden" name="data_action" id="data_action"
							value="<?=$_nextaction?>">
					</fieldset>
				</form>
			</div>
		</section>
	</div>
</div>
				
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