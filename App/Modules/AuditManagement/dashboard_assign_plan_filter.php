<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?
include_once "App/Classes/assignment_class.php";

$assigns = new assign ( $ses_userId );
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Filter Dashboard Audit</h3>
		</header>
		<form method="post" name="f" action="main.php?method=dashboardassignplanaudit" class="form-horizontal" id="validation-form">
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
	</article>
</section>
<script>
$(function() {
	$("#validation-form").validate({
		rules: {
			fil_tahun_id: "required"
		},
		messages: {
			fil_tahun_id: "Silahkan Pilih Tahun"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>