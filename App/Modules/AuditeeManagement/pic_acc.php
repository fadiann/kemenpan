<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
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
			<label class="span1">NIP</label> <input type="text" class="span3"
				name="nip" id="nip"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Nama</label> <input type="text"
				class="span3" name="name" id="name"><span class="required">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Jabatan</label>
				<?=$Helper->dbCombo("jabatan_id", "par_jabatan_pic", "jabatan_pic_id", "jabatan_pic_name", "and jabatan_pic_del_st = 1 ", "", "order by jabatan_pic_sort", 1)?><span
				class="mandatory">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Mobile</label> <input type="text" class="span2"
				name="mobile" id="mobile">
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Telp</label> <input type="text" class="span2"
				name="telp" id="telp">
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Email</label> <input type="text" class="span2"
				name="email_pic" id="email_pic"><span class="required">*</span>
		</fieldset>
		<input type="hidden" name="auditee_id" value="<?=$fdata_id?>">
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
			<label class="span1">NIP</label> <input type="text" class="span3"
				name="nip" id="nip" value="<?=$arr['pic_nip']?>"><span
				class="mandatory">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Nama</label> <input type="text"
				class="span3" name="name" id="name" value="<?=$arr['pic_name']?>"><span
				class="mandatory">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Jabatan</label>
				<?=$Helper->dbCombo("jabatan_id", "par_jabatan_pic", "jabatan_pic_id", "jabatan_pic_name", "and jabatan_pic_del_st = 1 ", $arr['pic_jabatan_id'], "order by jabatan_pic_sort", 1)?><span
				class="mandatory">*</span>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Mobile</label> <input type="text" class="span2"
				name="mobile" id="mobile" value="<?=$arr['pic_mobile']?>">
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Telp</label> <input type="text" class="span2"
				name="telp" id="telp" value="<?=$arr['pic_telp']?>">
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Email</label> <input type="text" class="span2"
				name="email_pic" id="email_pic" value="<?=$arr['pic_email']?>"><span
				class="mandatory">*</span>
		</fieldset>
		<input type="hidden" name="auditee_id" value="<?=$fdata_id?>"> <input
			type="hidden" name="data_id" value="<?=$arr['pic_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
			<label class="span1">NIP</label>
			<?=$arr['pic_nip']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Nama</label>
			<?=$arr['pic_name']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Jabatan</label>
			<?=$arr['jabatan_pic_name']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Mobile</label>
			<?=$arr['pic_mobile']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Telp</label>
			<?=$arr['pic_telp']?>
		</fieldset>
		<fieldset class="form-group">
			<label class="span1">Email</label>
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
</article>
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