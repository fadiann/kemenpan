<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?
include_once "App/Classes/audit_plann_class.php";

$plannings = new planning ( $ses_userId );
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Filter Rekap Perencanaan</h3>
		</header>
		<form method="post" name="f" action="main.php?method=laporan_rekap_perencanaan" class="form-horizontal" id="validation-form">
			<fieldset class="hr">
				<label class="span2">Tahun</label>
				<?php
				$rs_tahun = $plannings->plan_tahun_viewlist();
				$arr_tahun = $rs_tahun->GetArray ();
				echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "propinsiOnChange(this.value, 'fil_tipe_id')", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Pengawasan</label>
				<select name="fil_tipe_id" id="fil_tipe_id">
					<option value="">==== Pilih Tahun</option>
				</select>
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

function selectRemoveAll(objSel) {
	document.getElementById(objSel).options.length = 0;
}

function selectAdd(objSel, objVal, objCap, isSelected) {
	var nextLength = document.getElementById(objSel).options.length;
	document.getElementById(objSel).options[nextLength] = new Option(objCap, objVal, false, isSelected);
}

function propinsiOnChange(objValue, cmbNext){
	objSel = cmbNext;
	selectRemoveAll(objSel);
	
	selectAdd(objSel, "", "==== Semua Data");
	switch (objValue) {
	<?
		$rs1 = $plannings->plan_tahun_viewlist ();
		$arr1 = $rs1->GetArray();
		$rs1->Close();
		foreach ($arr1 as $value1) {
			echo("case \"$value1[0]\":\n");
				$rs2 = $plannings->plan_tipe_viewlist($value1[0]);
				$arr2 = $rs2->GetArray();
				$rs2->Close();
				foreach ($arr2 as $value2) {
					$isSelected="false";
					echo("\tselectAdd(objSel, \"$value2[0]\", \"$value2[1]\", $isSelected);\n");
				}
			echo("\tbreak;\n");
		}
	?>
	}
}
</script>