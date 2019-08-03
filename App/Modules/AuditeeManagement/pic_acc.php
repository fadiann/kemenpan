<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<h4 class="panel-title"><?=$page_title?></h4>
			<div class="panel-body wrap">
	<form method="post" name="f" action="#" class="form-horizontal"
		id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="form-group">
			<label class="col-md-3 control-label">NIP <span class="required">*</span></label> 
			<div class="col-sm-5"><input type="text" class="form-control" name="nip" id="nip"></div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Nama <span class="required">*</span></label>  
						<div class="col-sm-5"><input type="text"
				class="form-control" name="name" id="name"></div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Jabatan <span class="required">*</span></label> 
						<div class="col-sm-5">
				<?=$Helper->dbCombo("jabatan_id", "par_jabatan_pic", "jabatan_pic_id", "jabatan_pic_name", "and jabatan_pic_del_st = 1 ", "", "order by jabatan_pic_sort", 1)?>
		</div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Mobile</label>  
						<div class="col-sm-5"><input type="text" class="form-control"
				name="mobile" id="mobile">
						</div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Telp</label>  
						<div class="col-sm-5"><input type="text" class="form-control"
				name="telp" id="telp"></div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Email <span class="required">*</span></label>  
						<div class="col-sm-5"><input type="text" class="form-control"
				name="email_pic" id="email_pic">
						</div>
		</fieldset>
		<input type="hidden" name="auditee_id" value="<?=$fdata_id?>">
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
			<label class="col-md-3 control-label">NIP <span class="required">*</span></label>  
						<div class="col-sm-5"><input type="text" class="form-control"
				name="nip" id="nip" value="<?=$arr['pic_nip']?>">
						</div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Nama <span class="required">*</span></label>  
						<div class="col-sm-5"><input type="text"
				class="form-control" name="name" id="name" value="<?=$arr['pic_name']?>">
						</div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Jabatan <span class="required">*</span></label>
						<div class="col-sm-5">
				<?=$Helper->dbCombo("jabatan_id", "par_jabatan_pic", "jabatan_pic_id", "jabatan_pic_name", "and jabatan_pic_del_st = 1 ", $arr['pic_jabatan_id'], "order by jabatan_pic_sort", 1)?>
						</div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Mobile</label> 
						<div class="col-sm-5"><input type="text" class="form-control"
				name="mobile" id="mobile" value="<?=$arr['pic_mobile']?>"></div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Telp</label> 
						<div class="col-sm-5"><input type="text" class="form-control"
				name="telp" id="telp" value="<?=$arr['pic_telp']?>"></div>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Email <span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text" class="form-control"
				name="email_pic" id="email_pic" value="<?=$arr['pic_email']?>"></div>
		</fieldset>
		<input type="hidden" name="auditee_id" value="<?=$fdata_id?>"> 
						<div class="col-sm-5"><input
			type="hidden" name="data_id" value="<?=$arr['pic_id']?>">	
						</div>
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
			<label class="col-md-3 control-label">NIP</label>
			<?=$arr['pic_nip']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Nama</label>
			<?=$arr['pic_name']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Jabatan</label>
			<?=$arr['jabatan_pic_name']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Mobile</label>
			<?=$arr['pic_mobile']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Telp</label>
			<?=$arr['pic_telp']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="col-md-3 control-label">Email</label>
			<?=$arr['pic_email']?>
		</fieldset>	
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
			</div>
		</section>
	</div>

<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			nip: "required",
			name: "required",
			jabatan_id: "required",
			email_pic: {
				  required: true,
				  email: true
			}
		},
		messages: {
			nip: "Silahkan masukan NIP PIC",
			name: "Silahkan masukan Nama PIC",
			jabatan_id: "Silahkan Pilih Jabatan PIC",
			email_pic: {
				  required: "Silahkan Masukan Email",
				  email: "Silahkan Masukan Email Dengan Benar"
			}
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>