<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
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
						<label class="col-sm-3 control-label">User Name</label> 
						<div class="col-sm-5"><input type="text"
							class="form-control" name="name" id="name">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Password</label> 
						<div class="col-sm-5"><input type="password"
							class="form-control" name="password" id="password">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Konfirmasi Password</label> 
						<div class="col-sm-5"><input
							type="password" class="form-control" name="password_confirm"
							id="password_confirm">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Group</label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("nama_group", "par_group", "group_id", "group_name", "and group_del_st = 1 ", "", "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Login As</label> <label class="col-sm-2 control-label text-left"> <input
							type="radio" name="login_as" id="login_as" checked="" value="1">
							Internal
						</label>
						<div class="col-sm-5">
						<?
						$rs_auditor = $userms->list_auditor();
						$arr_auditor = $rs_auditor->GetArray ();
						echo $Helper->buildComboAuditor ( "internal_id", $arr_auditor, 0, 1, "", "", "", false, true, false );
						?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">&nbsp;</label> <label class="col-sm-2 control-label text-left"> <input
							type="radio" name="login_as" id="login_as" value="2"> Eksternal
						</label>
						
						<div class="col-sm-5">
						<?=$Helper->dbCombo("eksternal_id", "auditee_pic", "pic_id", "concat(pic_nip,' - ',pic_name) as lengkap", "and pic_del_st = 1 ", "", "", 1)?>
						</div>
					</fieldset>
					<?
							break;
						case "getedit" :
							?><fieldset class="form-group">
						<label class="col-sm-3 control-label">User Name</label> <input type="text"
							class="form-control" name="name" id="name"
							value="<?=$arr['user_username']?>">
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Password</label> <input type="password"
							class="form-control" name="password" id="password" value="xxxxxxxx">
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Konfirmasi Password</label> <input
							type="password" class="form-control" name="password_confirm"
							id="password_confirm" value="xxxxxxxx">
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Group</label>
						<?=$Helper->dbCombo("nama_group", "par_group", "group_id", "group_name", "and group_del_st = 1 ", $arr['user_id_group'], "", 1)?>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Login As</label> <label class="span1"> <input
							type="radio" name="login_as" id="login_as"
							<? if($arr['user_login_as']==1) echo "checked" ?> value="1">
							Internal
						</label>
						<?
						$rs_auditor = $userms->list_auditor($arr['user_id_internal']);
						$arr_auditor = $rs_auditor->GetArray ();
						echo $Helper->buildCombo ( "internal_id", $arr_auditor, 0, 1, $arr['user_id_internal'], "", "", false, true, false );
						?>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">&nbsp;</label> <label class="span1"> <input
							type="radio" name="login_as" id="login_as"
							<? if($arr['user_login_as']==2) echo "checked" ?> value="2">
							Eksternal
						</label>
						<?=$Helper->dbCombo("eksternal_id", "auditee_pic", "pic_id", "concat(pic_nip,' - ',pic_name) as lengkap", "and pic_del_st = 1 ", $arr['user_id_ekternal'], "", 1)?>	
						<input type="hidden" name="data_id" value="<?=$arr['user_id']?>">
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
</div>
<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			name: "required",
			password: {
                required: true,
                minlength: 8
            },
			password_confirm : {
				minlength : 8,
				equalTo : "#password"
			},
			nama_group : "required"
		},
		messages: {
			name: "Silahkan masukan User Name",
            password: {
                required: "Silahkan masukan Password",
                minlength: "Min 8 karakter"
            },
			password_confirm: {
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