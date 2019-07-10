<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form">
			<?
			switch ($_action) {
				case "getedit" :
					?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">User Name</label>
					<div class="col-sm-6">
				<input type="text" class="form-control" name="name" id="name" value="<?=$ses_userName?>" readonly>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Password Lama</label>
					<div class="col-sm-6">
				<input type="password" class="form-control" name="password_old" id="password_old">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Password Baru</label>
					<div class="col-sm-6">
				<input type="password" class="form-control" name="password_new" id="password_new">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Konfirmasi Password Baru</label>
					<div class="col-sm-6">
				<input type="password" class="form-control" name="password_confirm_new" id="password_confirm_new">
					</div>
			</fieldset>
				<input type="hidden" name="cuser_id" id="cuser_id" value="<?=$ses_userId?>">
			<?
					break;
			}
			?>
			<fieldset class="form-group mt-md">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=@$def_page_request?>'"> 
					<input type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=@$_nextaction?>">
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
<script> 
$("#password_old").on('change', function(){
	var pass_old = $(this).val(),
		username = $("#name").val();

	console.log(username+"=="+pass_old);
	$.ajax({
		url: 'UserManagement/ajax.php?data_action=cek_old_pass',
		type: 'POST',
		dataType: 'text',
		data: {username:username, pass_old:pass_old},
		success: function(data) {
			console.log(data);
		}
	});
	
});
			
$(function() {
	
	$("#validation-form").validate({
		rules: {
			name: "required",
			password_old: {
                required: true,
                minlength: 8
            },
			password_new: {
                required: true,
                minlength: 8
            },
			password_confirm_new : {
				minlength : 8,
				equalTo : "#password_new"
			},
			nama_group : "required"
		},
		messages: {
			name: "Silahkan masukan User Name",
            password_old: {
                required: "Silahkan masukan Password",
                minlength: "Min 8 karakter"
            },
            password_new: {
                required: "Silahkan masukan Password",
                minlength: "Min 8 karakter"
            },
			password_confirm_new: {
                minlength: "Min 8 karakter",
				equalTo : "Password tidak cocok"
            },
			nama_group : "Pilih group"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>