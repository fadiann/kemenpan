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
				<label class="span3">Kode Auditee</label> <input type="text"
					class="span2" name="kode" id="kode"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Nama Auditee</label> <input type="text"
					class="span5" name="name" id="name"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Unit Penanggung Jawab</label>
				<?=$Helper->dbCombo("parrent_id", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1", "", "",1)?>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Inspektorat Penanggung Jawab</label>
				<?=$Helper->dbCombo("inspektorat_id", "par_inspektorat", "inspektorat_id", "inspektorat_name", "and inspektorat_del_st = 1 ", "", "", 1)?>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Propinsi</label>
				<?
				$rs_prov = $params->propinsi_data_viewlist ();
				$arr_prov = $rs_prov->GetArray ();
				echo $Helper->buildCombo ( "propinsi_id", $arr_prov, 0, 1, "", "propinsiOnChange(this.value, 'kabupaten_id')", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Kabupaten/Kota</label>
				<select name="kabupaten_id" id="kabupaten_id">
					<option value="0">Pilih Propinsi</option>
				</select>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Alamat</label>
				<textarea name="alamat" class="span6"></textarea>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Telp</label> 
				<input type="text" class="span2" name="telp" id="telp">
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Ext</label> 
				<input type="text" class="span2" name="ext" id="ext">
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Fax</label> 
				<input type="text" class="span2" name="fax" id="fax">
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Email</label> 
				<input type="text" class="span2" name="email" id="email">
			</fieldset>
			<?
					break;
				case "getedit" :
					?>			
			<fieldset class="hr">
				<label class="span3">Kode Auditee</label> <input type="text"
					class="span2" name="kode" id="kode"
					value="<?=$arr['auditee_kode']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Nama Auditee</label> <input type="text"
					class="span5" name="name" id="name"
					value="<?=$arr['auditee_name']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Unit Penanggung Jawab</label>
				<?=$Helper->dbCombo("parrent_id", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1", $arr['auditee_parrent_id'], "",1)?>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Inspektorat Penanggung Jawab</label>
				<?=$Helper->dbCombo("inspektorat_id", "par_inspektorat", "inspektorat_id", "inspektorat_name", "and inspektorat_del_st = 1 ", $arr['auditee_inspektorat_id'], "", 1)?>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Propinsi</label>
				<?
				$rs_prov = $params->propinsi_data_viewlist ();
				$arr_prov = $rs_prov->GetArray ();
				echo $Helper->buildCombo ( "propinsi_id", $arr_prov, 0, 1, $arr['auditee_propinsi_id'], "propinsiOnChange(this.value, 'kabupaten_id')", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Kabupaten/Kota</label>
				<?
				$rs_kab = $params->propinsi_kabupaten ($arr['auditee_propinsi_id']);
				$arr_kab = $rs_kab->GetArray ();
				echo $Helper->buildCombo ( "kabupaten_id", $arr_kab, 0, 1, $arr['auditee_kabupaten_id'], "", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Alamat</label>
				<textarea name="alamat" class="span6"><?=$arr['auditee_alamat']?></textarea>
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Telp</label> 
				<input type="text" class="span2" name="telp" id="telp" value="<?=$arr['auditee_telp']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Ext</label> 
				<input type="text" class="span2" name="ext" id="ext" value="<?=$arr['auditee_ext']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Fax</label>
				<input type="text" class="span2" name="fax" id="fax" value="<?=$arr['auditee_fax']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span3">Email</label> 
				<input type="text" class="span2" name="email" id="email" value="<?=$arr['auditee_email']?>">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['auditee_id']?>">
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
			kode: "required",
			name: "required",
			password: {
                required: true,
                minlength: 8
            },
			propinsi_id : "required"
		},
		messages: {
			kode: "Silahkan masukan Kode Auditee",
			name: "Silahkan masukan Nama Auditee",
			propinsi_id : "Pilih Propinsi"
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
		$rs1 = $params->propinsi_data_viewlist ();
		$arr1 = $rs1->GetArray();
		$rs1->Close();
		foreach ($arr1 as $value1) {
			echo("case \"$value1[0]\":\n");
			$rs2 = $params->propinsi_kabupaten($value1[0]);
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