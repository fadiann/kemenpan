<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?
include_once "App/Classes/risk_class.php";

$risks = new risk ( $ses_userId );
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Filter Laporan Risiko</h2>
			</header>
			<div class="panel-body wrap">
		<form method="post" name="f" action="main.php?method=risk_report" class="form-horizontal" id="validation-form">
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tahun <span class="required">*</span></label>
					<div class="col-sm-5">
				<?php
				$rs_tahun = $risks->risk_tahun_viewlist();
				$arr_tahun = $rs_tahun->GetArray ();
				echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "", "", false, true, false );
				?>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja <span class="required">*</span></label>
					<div class="col-sm-5">
				<?php
				$rs_auditee = $risks->risk_auditee_viewlist($base_on_id_eks);
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo ( "fil_satker_id", $arr_auditee, 0, 1, $base_on_id_eks, "", "", false, true, false );
				?>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama Penetapan <span class="required">*</span></label>
					<div class="col-sm-5">
				<?php
				$rs_penetapan = $risks->penetapan_data();
				$arr_penetapan = $rs_penetapan->GetArray ();
				echo $Helper->buildCombo ( "fil_penetapan_id", $arr_penetapan, 0, 3, 'penetapan_nama', "", "", false, true, false );
				?>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<center>
					<input type="submit" class="btn btn-success" value="Lihat">
				</center>
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
			fil_tahun_id: "required",
			fil_satker_id: "required",
			fil_penetapan_id: "required"
		},
		messages: {
			fil_tahun_id: "Silahkan Pilih Tahun",
			fil_satker_id: "Silahkan Pilih Satker",
			fil_penetapan_id: "Silahkan Pilih Nama Penetapan"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>