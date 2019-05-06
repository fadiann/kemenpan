<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="Public/js/jquery.maskMoney.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<link rel="stylesheet" href="Public/js/select2/select2.css" type="text/css" />
<script type="text/javascript" src="Public/js/select2/select2.min.js"></script>
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>

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
				<label class="span2">Nama Kegiatan</label>
				<input type="text" class="span7" name="tujuan" id="tujuan">
			</fieldset>
			<fieldset class="hr">
				<input type="button" id="tambah_auditee" class="btn" value="Tambah Obyek Audit">
				<table id="tabel_auditee" width="100%">
					<thead>
						<tr>
							<th align="left" width="3%">No.</th>
							<th align="left" width="40%">Obyek Audit</th>
							<th align="left" width="50%">Jumlah Hari</th>
							<th width="5%">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr id="1">
							<td align="center">1.</td>
							<td><?=$Helper->dbCombo("auditee_id[]", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1 ", "", "", 1)?></td>
							<td><input class="span9" type="text" name="jml_hari[]"></td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Audit</label>
				<?
				$rs_type = $params->audit_type_data_viewlist ();
				$arr_type = $rs_type->GetArray ();
				echo $Helper->buildCombo ("tipe_audit", $arr_type, 0, 1, "", "propinsiOnChange(this.value, 'sub_type')", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset>
				<label class="span2">Sub Tipe Audit</label>
				<select name="sub_type" id="sub_type">
					<option value="">Pilih Kelompok Temuan</option>
				</select>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tahun</label> <select class="span1"
					name="tahun" id="tahun">
					<option value="">Pilih Satu</option>
					<?
				$thn = date ( "Y" ) - 1;
				for($i = 1; $i <= 3; $i ++) {
					?>
					<option value="<?=$thn?>" <? if($thn==date("Y")) echo "selected";?>><?=$thn?></option>
					<?
					$thn ++;
				}
				?>
				</select><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Periode</label>
				<input type="text" class="span5" name="periode" id="periode">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Rencana Kegiatan</label> 
				<input type="text" class="span1" name="tanggal_awal" id="tanggal_awal"> 
				<label class="span0">s/d</label> 
				<input type="text" class="span1" name="tanggal_akhir" id="tanggal_akhir">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Total Biaya</label>
				<input type="text" class="span1" name="biaya_audit" id="biaya_audit">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			
			<fieldset class="hr">
				<label class="span2">Kode Perencanaan</label>
				<?=$arr['audit_plan_code']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nama Kegiatan</label>
				<input type="text" class="span7" name="tujuan" id="tujuan" value="<?=$arr['audit_plan_kegiatan']?>">
			</fieldset>
			<fieldset class="hr">
			<fieldset class="hr">
				<input type="button" id="tambah_auditee" class="btn" value="Tambah Obyek Audit">
				<table id="tabel_auditee" width="100%">
					<thead>
						<tr>
							<th align="left" width="3%">No.</th>
							<th align="left" width="40%">Obyek Audit</th>
							<th align="left" width="50%">Jumlah Hari</th>
							<th width="5%">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<?
						$no_auditee = 0;
						$rs_auditee = $plannings->planning_auditee_viewlist ( $arr ['audit_plan_id'] );
						while ( $arr_auditee = $rs_auditee->FetchRow () ) {
							$no_auditee++;
						?>
						<input type="hidden" name="plan_auditee_id[]" value="<?=$arr_auditee['audit_plan_auditee_id']?>">
						<tr id="<?=$no_auditee?>">
							<td align="center"><?=$no_auditee?>.</td>
							<td><?=$Helper->dbCombo("auditee_id[]", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1 ", $arr_auditee['audit_plan_auditee_id_auditee'], "", 1)?></td>
							<td><input class="span9" type="text" name="jml_hari[]" value="<?=$arr_auditee['audit_plan_auditee_hari']?>"></td>
							<td>&nbsp;</td>
						</tr>
						<?
						}
						?>
						<tr id="<?=$no_auditee+1?>">
							<td align="center"><?=$no_auditee+1?>.</td>
							<td><?=$Helper->dbCombo("auditee_id[]", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1 ", "", "", 1)?></td>
							<td><input class="span9" type="text" name="jml_hari[]"></td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Audit</label>
				<?
				$rs_type = $params->audit_type_data_viewlist ();
				$arr_type = $rs_type->GetArray ();
				echo $Helper->buildCombo ("tipe_audit", $arr_type, 0, 1, $arr['audit_plan_tipe_id'], "propinsiOnChange(this.value, 'sub_type')", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Sub Tipe Audit</label>
				<select name="sub_type" id="sub_type">
					<option value="">Pilih Sub Tipe</option>
					<?
					if($arr['audit_type_opsi']==1){
					?>
						<option value="Trip 1" <? if($arr['audit_plan_sub_tipe']=='Trip 1') echo 'selected' ?>>Trip 1</option>
						<option value="Trip 2" <? if($arr['audit_plan_sub_tipe']=='Trip 2') echo 'selected' ?>>Trip 2</option>
						<option value="Trip 3" <? if($arr['audit_plan_sub_tipe']=='Trip 3') echo 'selected' ?>>Trip 3</option>
						<option value="Trip 4" <? if($arr['audit_plan_sub_tipe']=='Trip 4') echo 'selected' ?>>Trip 4</option>
						<option value="Trip 5" <? if($arr['audit_plan_sub_tipe']=='Trip 5') echo 'selected' ?>>Trip 5</option>
						<option value="Trip 6" <? if($arr['audit_plan_sub_tipe']=='Trip 6') echo 'selected' ?>>Trip 6</option>
						<option value="Trip 7" <? if($arr['audit_plan_sub_tipe']=='Trip 7') echo 'selected' ?>>Trip 7</option>
						<option value="Trip 8" <? if($arr['audit_plan_sub_tipe']=='Trip 8') echo 'selected' ?>>Trip 8</option>
						<option value="Trip 9" <? if($arr['audit_plan_sub_tipe']=='Trip 9') echo 'selected' ?>>Trip 9</option>
						<option value="Trip 10" <? if($arr['audit_plan_sub_tipe']=='Trip 9') echo 'selected' ?>>Trip 10</option>
						<option value="Trip Audit Pusat" <? if($arr['audit_plan_sub_tipe']=='Trip Audit Pusat') echo 'selected' ?>>Trip Audit Pusat</option>
						<option value="Trip Cadangan" <? if($arr['audit_plan_sub_tipe']=='Trip Cadangan') echo 'selected' ?>>Trip Cadangan</option>
					<?
					}else if($arr['audit_type_opsi']!=1){
						$rs_sub = $params->sub_audit_type_list_by_tipe($arr['audit_plan_tipe_id']);
						while($arr_sub = $rs_sub->FetchRow()){
					?>
						<option value="<?=$arr_sub['sub_audit_type_id']?>" <? if($arr_sub['sub_audit_type_id']==$arr['audit_plan_sub_tipe']) echo 'selected' ?>><?=$arr_sub['sub_audit_type_name'];?></option>
					<?
						}
					}
					?>
				</select>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tahun</label> <select class="span1"
					name="tahun" id="tahun">
					<option value="">Pilih Satu</option>
					<?
				$thn = date ( "Y" ) - 1;
				for($i = 1; $i <= 3; $i ++) {
					?>
					<option value="<?=$thn?>"
						<? if($thn==$arr['audit_plan_tahun']) echo "selected";?>><?=$thn?></option>
					<?
					$thn ++;
				}
				?>
				</select><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Periode</label>
				<input type="text" class="span5" name="periode" id="periode" value="<?=$arr['audit_plan_periode']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Rencana Kegiatan</label> 
				<input type="text" class="span1" name="tanggal_awal" id="tanggal_awal" value="<?=$Helper->dateIndo($arr['audit_plan_start_date'])?>"> 
				<label class="span0">s/d</label> 
				<input type="text" class="span1" name="tanggal_akhir" id="tanggal_akhir" value="<?=$Helper->dateIndo($arr['audit_plan_end_date'])?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Total Biaya</label>
				<input type="text" class="span1" name="biaya_audit" id="biaya_audit" value="<?=$Helper->format_uang($arr['audit_plan_biaya'])?>">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['audit_plan_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
			<table class="table_detail">
				<tr>
					<td>Kode Perencanaan</td>
					<td>:</td>
					<td><?=$arr['audit_plan_code']?></td>
				</tr>
				<tr>
					<td>Obyek Audit</td>
					<td>:</td>
					<td>
					<?
					$rs_id_auditee = $plannings->planning_auditee_viewlist ( $arr ['audit_plan_id'] );
					$plan_id_auditee = "";
					while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
						echo $arr_id_auditee ['auditee_name']." (".$arr_id_auditee ['audit_plan_auditee_hari']." Hari),<br>";
					}
					?>
					</td>
				</tr>
				<tr>
					<td>Nama Kegiatan</td>
					<td>:</td>
					<td><?=$arr['audit_plan_kegiatan']?></td>
				</tr>
				<tr>
					<td>Tipe Audit</td>
					<td>:</td>
					<td><?=$arr['audit_type_name']?></td>
				</tr>
				<tr>
					<td>Sub Tipe Audit</td>
					<td>:</td>
					<td><?=$arr['sub_audit_type_name']?></td>
				</tr>
				<tr>
					<td>Tahun</td>
					<td>:</td>
					<td><?=$arr['audit_plan_tahun']?></td>
				</tr>
				<tr>
					<td>Periode</td>
					<td>:</td>
					<td><?=$arr['audit_plan_periode']?></td>
				</tr>
				<tr>
					<td>Rencana Kegiatan</td>
					<td>:</td>
					<td>
						<?=$Helper->dateIndo($arr['audit_plan_start_date'])?>
						s/d
						<?=$Helper->dateIndo($arr['audit_plan_end_date'])?>
					</td>
				</tr>
				<tr>
					<td>Total Biaya</td>
					<td>:</td>
					<td>Rp. <?=$Helper->format_uang($arr['audit_plan_biaya'])?></td>
				</tr>
				<tr>
					<td>Tim Audit</td>
					<td>:</td>
					<td>
						<?
						$rs_auditor = $plannings->planning_list_auditor ( $arr ['audit_plan_id'] );
						while ( $arr_auditor = $rs_auditor->FetchRow () ) {
							echo $arr_auditor ['auditor_name'] . " ( ". $arr_auditor ['posisi_name']." )<br>";
						}
						?>
					</td>
				</tr>
			</table>
		<?
				break;
			case "getajukan" :
			case "getapprove" :
				$arr = $rs->FetchRow ();
				$rs_id_auditee = $plannings->planning_auditee_viewlist ( $arr ['audit_plan_id'] );
				$rs_komentar = $plannings->planning_komentar_viewlist ( $arr ['audit_plan_id'] );
				$plan_id_auditee = "";
				?>
			<fieldset class="hr">
				<label class="span2">Nama Kegiatan</label>
					<?=$arr['audit_plan_kegiatan']?>
				</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Audit</label>
					<?=$arr['audit_type_name']?>
				</fieldset>
			<fieldset class="hr">
				<label class="span2">Obyek Audit</label>
					<?
				$z = 0;
				while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
					$z ++;
					echo $z . ". " . $arr_id_auditee ['auditee_name'] . "<br>";
				}
				?>
				</fieldset>
			<fieldset class="hr">
				<label class="span2">Tahun</label>
					<?=$arr['audit_plan_tahun']?>
				</fieldset>
			<fieldset class="hr">
				<label class="span2">Rencana Kegiatan</label>
					<?=$Helper->dateIndo($arr['audit_plan_start_date'])?> s/d <?=$Helper->dateIndo($arr['audit_plan_end_date'])?>
				</fieldset>
			<fieldset class="hr">
				<label class="span2">Total Biaya</label>
					Rp. <?=number_format($arr['audit_plan_biaya'])?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">detail komentar</label> 
				<table>
					<tbody>
						<?php
				$z = 0;
				while ( $arr_komentar = $rs_komentar->FetchRow () ) {
					$z ++;
					?>
						<tr>
							<td><?= $z ?>. </td><td><?= $arr_komentar['auditor_name']." : ".$arr_komentar['plan_comment_desc'] ?></td>
						</tr>
				<?php
				}
				?>	
					</tbody>
				</table>
			</fieldset>			
			<fieldset class="hr">
				<label class="span2">Isi Komentar</label><input type="text" class="span7" name="komentar">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['audit_plan_id']?>">
			<input type="hidden" name="status_plan" value="<?=$status?>">
			<input type="hidden" name="data_from" value="<?=$_action?>">
			<?
				break;
		}
		?>
			<fieldset>
				<center>
				<?
				if($_action != "getajukan" || $_action != "getapprove"){
				?>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp;
				<?
				}
				?>
				<?php if ($_action != "getdetail"): ?>
					<input type="submit" class="blue_btn" value="Simpan">
				<?php endif ?>
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
<script>
$(document).ready(function() {
	$('#tambah_auditee').on('click', function(e){
		e.preventDefault();
		var no = $('#tabel_auditee tr:last').attr('id');
		var select_auditee = $('#tabel_auditee tbody tr:last td:eq(1)').clone().html();
		no++;
		var new_row = '<tr id="'+no+'">'
			+ '<td align="center">'+no+'.</td>'
			+ '<td>'+select_auditee+'</td>'
			+ '<td><input class="span9" type="text" name="jml_hari[]"></td>'
			+ '<td><button class="btn auditee_remove">-</button></td>'
			+ '</tr>';
		$('#tabel_auditee tbody').append(new_row);
	});

	$("#tabel_auditee").on("click", ".auditee_remove", function(e){
		e.preventDefault();
		$(this).parents("tr").remove();
	});  

	$("#tanggal_awal").datepicker({
		dateFormat: 'dd-mm-yy',
		 nextText: "",
		 prevText: "",
		 changeYear: true,
		 changeMonth: true
	});  
	$("#tanggal_akhir").datepicker({
		dateFormat: 'dd-mm-yy',
		 nextText: "",
		 prevText: "",
		 changeYear: true,
		 changeMonth: true
	});  
	$("#biaya_audit").maskMoney({precision: 0});
	
	$(function() {
		$("#validation-form").validate({
			rules: {
				tipe_audit: "required",
				tahun: "required",
				tanggal_akhir: "required"
			},
			messages: {
				tipe_audit: "Silahkan Pilih Tipe Audit",
				tahun: "Silahkan Pilih Tahun",
				tanggal_akhir: "Silahkan Pilih Tanggal Awal dan Akhir Audit"
			},		
			submitHandler: function(form) {
				form.submit();
			}
		});
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
	
	selectAdd(objSel, "", "Pilih Sub Type");
	switch (objValue) {
	<?
		$rs1 = $params->audit_type_data_viewlist ();
		$arr1 = $rs1->GetArray();
		$rs1->Close();
		foreach ($arr1 as $value1) {
			echo("case \"$value1[0]\":\n");
			if($value1['audit_type_opsi']==1){
				$isSelected="false";
				echo("\tselectAdd(objSel, \"Trip 1\", \"Trip 1\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 2\", \"Trip 2\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 3\", \"Trip 3\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 4\", \"Trip 4\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 5\", \"Trip 5\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 6\", \"Trip 6\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 7\", \"Trip 7\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 8\", \"Trip 8\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 9\", \"Trip 9\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip 10\", \"Trip 10\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip Audit Pusat\", \"Trip Audit Pusat\", $isSelected);\n");
				echo("\tselectAdd(objSel, \"Trip Cadangan\", \"Trip Cadangan\", $isSelected);\n");
			}else if ($value1['audit_type_opsi']!=0){
				$rs2 = $params->sub_audit_type_list_by_tipe($value1[0]);
				$arr2 = $rs2->GetArray();
				$rs2->Close();
				foreach ($arr2 as $value2) {
					$isSelected="false";
					echo("\tselectAdd(objSel, \"$value2[0]\", \"$value2[1]\", $isSelected);\n");
				}
			}
				echo("\tbreak;\n");
		}
	?>
	}
}
</script>