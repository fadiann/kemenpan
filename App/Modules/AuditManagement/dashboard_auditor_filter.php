<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?
include_once "App/Classes/assignment_class.php";

$assigns = new assign ( $ses_userId );
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Filter Dashboard Auditor</h3>
		</header>
		<form method="post" name="f" action="main.php?method=dashboardauditor" class="form-horizontal" id="validation-form">
			<fieldset class="hr">
				<label class="span2">Tahun</label>
				<?php
				$rs_tahun = $assigns->assign_tahun_viewlist();
				$arr_tahun = $rs_tahun->GetArray ();
				echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset>
				<center>
					<input type="submit" class="blue_btn" value="Lihat">
				</center>
			</fieldset>
		</form>
	</article>
</section>
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