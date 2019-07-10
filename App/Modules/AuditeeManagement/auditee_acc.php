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
						<label class="col-md-3 control-label">Kode Auditee <span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text"
							class="form-control" name="kode" id="kode">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Nama Auditee <span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text"
							class="form-control" name="name" id="name">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Unit Penanggung Jawab</label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("parrent_id", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1", "", "",1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Inspektorat Penanggung Jawab</label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("inspektorat_id", "par_inspektorat", "inspektorat_id", "inspektorat_name", "and inspektorat_del_st = 1 ", "", "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Propinsi <span class="required">*</span></label>
						<div class="col-sm-5">
						<?
						$rs_prov = $params->propinsi_data_viewlist ();
						$arr_prov = $rs_prov->GetArray ();
						echo $Helper->buildCombo ( "propinsi_id", $arr_prov, 0, 1, "", "propinsiOnChange(this.value, 'kabupaten_id')", "", false, true, false );
						?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Kabupaten/Kota <span class="required">*</span></label>
						<div class="col-sm-5">
						<select name="kabupaten_id" id="kabupaten_id" class="form-control">
							<option value="0">Pilih Propinsi</option>
						</select>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Alamat</label>
						<div class="col-sm-5">
						<textarea name="alamat" class="form-control"></textarea>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Telp</label> 
						<div class="col-sm-5">
						<input type="text" class="form-control" name="telp" id="telp">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Ext</label> 
						<div class="col-sm-5">
						<input type="text" class="form-control" name="ext" id="ext">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Fax</label> 
						<div class="col-sm-5">
						<input type="text" class="form-control" name="fax" id="fax">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Email</label> 
						<div class="col-sm-5">
						<input type="text" class="form-control" name="email" id="email">
						</div>
					</fieldset>
					<?
							break;
						case "getedit" :
							?>			
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Kode Auditee <span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text"
							class="form-control" name="kode" id="kode"
							value="<?=$arr['auditee_kode']?>">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Nama Auditee <span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text"
							class="form-control" name="name" id="name"
							value="<?=$arr['auditee_name']?>">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Unit Penanggung Jawab</label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("parrent_id", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1", $arr['auditee_parrent_id'], "",1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Inspektorat Penanggung Jawab</label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("inspektorat_id", "par_inspektorat", "inspektorat_id", "inspektorat_name", "and inspektorat_del_st = 1 ", $arr['auditee_inspektorat_id'], "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Propinsi <span class="required">*</span></label>
						<div class="col-sm-5">
						<?
						$rs_prov = $params->propinsi_data_viewlist ();
						$arr_prov = $rs_prov->GetArray ();
						echo $Helper->buildCombo ( "propinsi_id", $arr_prov, 0, 1, $arr['auditee_propinsi_id'], "propinsiOnChange(this.value, 'kabupaten_id')", "", false, true, false );
						?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Kabupaten/Kota <span class="required">*</span></label>
						<div class="col-sm-5">
						<?
						$rs_kab = $params->propinsi_kabupaten ($arr['auditee_propinsi_id']);
						$arr_kab = $rs_kab->GetArray ();
						echo $Helper->buildCombo ( "kabupaten_id", $arr_kab, 0, 1, $arr['auditee_kabupaten_id'], "", "", false, true, false );
						?>
						</div>
						
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Alamat</label>
						<div class="col-sm-5">
						<textarea name="alamat" class="form-control"><?=$arr['auditee_alamat']?></textarea>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Telp</label> 
						<div class="col-sm-5">
						<input type="text" class="form-control" name="telp" id="telp" value="<?=$arr['auditee_telp']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Ext</label> 
						<div class="col-sm-5">
						<input type="text" class="form-control" name="ext" id="ext" value="<?=$arr['auditee_ext']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Fax</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" name="fax" id="fax" value="<?=$arr['auditee_fax']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-md-3 control-label">Email</label> 
						<div class="col-sm-5">
						<input type="text" class="form-control" name="email" id="email" value="<?=$arr['auditee_email']?>">
						</div>
					</fieldset>
					<input type="hidden" name="data_id" value="<?=$arr['auditee_id']?>">
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