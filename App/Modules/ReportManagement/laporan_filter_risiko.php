<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?
include_once "App/Classes/risk_class.php";

$risks = new risk ( $ses_userId );
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Filter Pelaporan Risiko</h3>
		</header>
		<form method="post" name="f" action="main.php?method=risk_report" class="form-horizontal" id="validation-form">
			<fieldset class="hr">
				<label class="span2">Tahun</label>
				<?php
				$rs_tahun = $risks->risk_tahun_viewlist();
				$arr_tahun = $rs_tahun->GetArray ();
				echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Satuan Kerja</label>
				<?php
				$rs_auditee = $risks->risk_auditee_viewlist($base_on_id_eks);
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo ( "fil_satker_id", $arr_auditee, 0, 1, $base_on_id_eks, "", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nama Penetapan</label>
				<?php
				$rs_penetapan = $risks->penetapan_data();
				$arr_penetapan = $rs_penetapan->GetArray ();
				echo $Helper->buildCombo ( "fil_penetapan_id", $arr_penetapan, 0, 3, 'penetapan_nama', "", "", false, true, false );
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