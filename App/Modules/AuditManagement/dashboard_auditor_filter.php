<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?
include_once "App/Classes/assignment_class.php";

$assigns = new assign ( $ses_userId );
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Filter Dashboard Auditor</h2>
			</header>
			<div class="panel-body">
				<center>
					<form method="post" name="f" action="main.php?method=dashboardauditor" class="form-horizontal" id="validation-form">
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Tahun</label>
							<?php
							$rs_tahun = $assigns->assign_tahun_viewlist();
							$arr_tahun = $rs_tahun->GetArray ();
							echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "", "", false, true, false );
							?>
							<span class="required">*</span>
						</fieldset>
						<fieldset class="form-group">
							<center>
								<input type="submit" class="btn btn-success" value="Lihat">
							</center>
						</fieldset>
					</form>
				</center>
			</div>
		</section>
	</div>
</div>
<script>
$(function() {
	$("#validation-form").validate({
		rules: {
			fil_auditor_id: "required",
			fil_tahun_id: "required"
		},
		messages: {
			fil_auditor_id: "Silahkan Pilih Auditor",
			fil_tahun_id: "Silahkan Pilih Tahun"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>