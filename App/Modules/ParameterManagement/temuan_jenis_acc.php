<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<section id="main" class="column">
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
			<fieldset class="hr">
				<label class="span2">Kelompok Temuan</label>
				<?
				$rs_kel = $params->finding_type_data_viewlist ();
				$arr_kel = $rs_kel->GetArray ();
				echo $Helper->buildCombo ( "kel_temuan", $arr_kel, 0, 2, "", "propinsiOnChange(this.value, 'sub_id')", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Sub Kelompok</label>
				<select name="sub_id" id="sub_id">
					<option value="0">Pilih Kelompok Temuan</option>
				</select>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Jenis Temuan</label> <input type="text" class="span1" name="code" id="code"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jenis Temuan</label> <input type="text" class="span5" name="name" id="name"><span class="mandatory">*</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				$rs_get_type =  $params->sub_kel_data_viewlist ( $arr['jenis_temuan_id_sub_type'] );
				$arr_get_type = $rs_get_type->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Kelompok Temuan</label>
				<?
				$rs_kel = $params->finding_type_data_viewlist ();
				$arr_kel = $rs_kel->GetArray ();
				echo $Helper->buildCombo ( "kel_temuan", $arr_kel, 0, 2, $arr_get_type['sub_type_id_type'], "propinsiOnChange(this.value, 'sub_id')", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Sub Kelompok</label>
				<?
				$rs_sub = $params->kel_sub_kel ($arr_get_type['sub_type_id_type']);
				$arr_sub = $rs_sub->GetArray ();
				echo $Helper->buildCombo ( "sub_id", $arr_sub, 0, 1, $arr['jenis_temuan_id_sub_type'], "", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Kode Jenis Temuan</label> <input type="text" class="span1" name="code" id="code" value="<?=$arr['jenis_temuan_code']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jenis Temuan</label> <input type="text" class="span5" name="name" id="name" value="<?=$arr['jenis_temuan_name']?>"><span class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['jenis_temuan_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali"
						onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; <input
						type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			propinsi: "required",
			kabupaten: "required"
		},
		messages: {
			propinsi: "Silahkan Pilih Propinsi",
			kabupaten: "Silahkan Masukan Nama Kabupaten/Kota"
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
	
	selectAdd(objSel, "0", "Pilih Satu");
	switch (objValue) {
	<?
		$rs1 = $params->finding_type_data_viewlist ();
		$arr1 = $rs1->GetArray();
		$rs1->Close();
		foreach ($arr1 as $value1) {
			echo("case \"$value1[0]\":\n");
			$rs2 = $params->kel_sub_kel($value1[0]);
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