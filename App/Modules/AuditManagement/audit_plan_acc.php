<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css"> -->
<link rel="stylesheet" href="Public/js/select2/select2.css" type="text/css" />

<!-- <script src="Public/js/jquery-ui.js"></script> -->


<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama Kegiatan</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="tujuan" id="tujuan" row='3'></textarea>
					</div>
			</fieldset>
			<fieldset class="form-group">
				
				<label class="col-sm-3 control-label">Objek Audit</label>
				<div class="col-md-8">
				<table id="tabel_auditee" class="table table-borderless" width="100%">
					<tbody>
						<tr id="1">
							<td align="center">1.</td>
							<td width="70%"><?=$Helper->dbComboPerencanaan("auditee_id[]", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1 ", "", "", 1)?>
							</td>
							<td><input class="form-control" type="number" name="jml_hari[]" size="5" placeholder="jumlah hari"></td>
							<td>
							<button id="tambah_auditee" class="btn btn-primary btn-circle"><i class="fa fa-plus-circle"></i></button>
							</td>
						</tr>
					</tbody>
				</table>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tipe Audit <span class="required">*</span></label>
					<div class="col-sm-5">
					<?
					$rs_type = $params->audit_type_data_viewlist ();
					$arr_type = $rs_type->GetArray ();
					echo $Helper->buildCombo ("tipe_audit", $arr_type, 0, 1, "", "propinsiOnChange(this.value, 'sub_type')", "", false, true, false );
				?>
					</div>
				
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Sub Tipe Audit</label>
					<div class="col-sm-5">
					<select name="sub_type" id="sub_type" class="form-control">
						<option value="">Pilih Kelompok Temuan</option>
					</select>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tahun <span class="required">*</span></label> 
					<div class="col-sm-5">
					<select class="form-control" name="tahun" id="tahun">
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
					</select>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Periode</label>
					<div class="col-sm-5">
				<input type="text" class="form-control" name="periode" id="periode">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Rencana Mulai Penugasan <span class="required">*</span></label> 
					<div class="col-sm-2">
				<input type="text" class="form-control" name="tanggal_awal" id="tanggal_awal" autocomplete="off">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Rencana Penerbitan Laporan <span class="required">*</span></label> 
					<div class="col-sm-2">
				<input type="text" class="form-control" name="tanggal_akhir" id="tanggal_akhir" autocomplete="off">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Total Biaya</label>
					<div class="col-sm-5">
				<input type="text" class="form-control" name="biaya_audit" id="biaya_audit" autocomplete="off">
					</div>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Kode Perencanaan</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" value="<?=$arr['audit_plan_code']?>" readonly>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama Kegiatan</label>
					<div class="col-sm-5">
						<textarea class="form-control" name="tujuan" id="tujuan" row='3'><?=$arr['audit_plan_kegiatan']?></textarea>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Obyek Audit</label>
				<div class="col-sm-5">
				<!-- <button id="tambah_auditee" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</button> -->
				<table id="tabel_auditee" width="100%" class="table table-borderless">
					<tbody>
						<?
						$no_auditee = 0;
						$rs_auditee = $plannings->planning_auditee_viewlist ( $arr ['audit_plan_id'] );
						while ( $arr_auditee = $rs_auditee->FetchRow () ) {
							$no_auditee++;
						?>
						<input type="hidden" name="plan_auditee_id[]" value="<?=$arr_auditee['audit_plan_auditee_id']?>">
						<tr id="<?=$no_auditee?>">
							<td align="center" width="10%"><?=$no_auditee?>.</td>
							<td><?=$Helper->dbComboPerencanaan("auditee_id[]", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1 ", $arr_auditee['audit_plan_auditee_id_auditee'], "", 1)?></td>
							<td>
								<input class="form-control" type="number" name="jml_hari[]" value="<?=$arr_auditee['audit_plan_auditee_hari']?>">
							</td>
							<td>&nbsp</td>
						</tr>
						<?
						}
						?>
						<tr id="<?=$no_auditee+1?>">
							<td align="center"><?=$no_auditee+1?>.</td>
							<td><?=$Helper->dbComboPerencanaan("auditee_id[]", "auditee", "auditee_id", "auditee_name", "and auditee_del_st = 1 ", "", "", 1)?></td>
							<td>
								<input class="form-control" type="number" name="jml_hari[]" placeholder="jumlah hari" value="">
							</td>
							<td><a id="tambah_auditee" class="btn btn-primary btn-circle"><i class="fa fa-plus-circle"></i></a></td>
						</tr>
					</tbody>
				</table>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tipe Audit <span class="required">*</span></label>
					<div class="col-sm-5">
				<?
				$rs_type = $params->audit_type_data_viewlist ();
				$arr_type = $rs_type->GetArray ();
				echo $Helper->buildCombo ("tipe_audit", $arr_type, 0, 1, $arr['audit_plan_tipe_id'], "propinsiOnChange(this.value, 'sub_type')", "", false, true, false );
				?>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Sub Tipe Audit</label>
					<div class="col-sm-5">
				<select name="sub_type" id="sub_type" class="form-control">
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
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tahun <span class="required">*</span></label> 
					<div class="col-sm-5">
				<select class="form-control" name="tahun" id="tahun">
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
				</select>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Periode</label>
					<div class="col-sm-5">
				<input type="text" class="form-control" name="periode" id="periode" value="<?=$arr['audit_plan_periode']?>">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Rencana Mulai Penugasan <span class="required">*</span></label> 
					<div class="col-sm-2">
				<input type="text" class="form-control" name="tanggal_awal" id="tanggal_awal" value="<?=$Helper->dateIndo($arr['audit_plan_start_date'])?>" autocomplete="off"> <?=$Helper->dateIndo($arr['audit_plan_start_date'])?>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Rencana Penerbitan Laporan <span class="required">*</span></label> 
					<div class="col-sm-2">
				<input type="text" class="form-control" name="tanggal_akhir" id="tanggal_akhir" value="<?=$Helper->dateIndo($arr['audit_plan_end_date'])?>" autocomplete="off">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Total Biaya</label>
					<div class="col-sm-5">
				<input type="text" class="form-control" name="biaya_audit" id="biaya_audit" value="<?=$Helper->format_uang($arr['audit_plan_biaya'])?>">
					</div>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['audit_plan_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
			<table class="table table-borderless">
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
					<td>Rencana Mulai Penugasan</td>
					<td>:</td>
					<td>
						<?=$Helper->dateIndo($arr['audit_plan_start_date'])?>
					</td>
				</tr>
				<tr>
					<td>Rencana Penerbitan Laporan</td>
					<td>:</td>
					<td>
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
			<fieldset class="form-group">
				<label class="col-sm-3 text-right">Nama Kegiatan :</label>
					<div class="col-sm-5">
					<?=$arr['audit_plan_kegiatan']?>
					</div>
				</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 text-right">Tipe Audit :</label>
					<div class="col-sm-5">
					<?=$arr['audit_type_name']?>
					</div>
				</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 text-right">Obyek Audit :</label>
					<div class="col-sm-5">
					<?
				$z = 0;
				while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
					$z ++;
					echo $z . ". " . $arr_id_auditee ['auditee_name'] . "<br>";
				}
				?>
					</div>
				</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 text-right">Tahun :</label>
					<div class="col-sm-5">
					<?=$arr['audit_plan_tahun']?>
					</div>
				</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 text-right">Rencana Kegiatan :</label>
					<div class="col-sm-5">
					<?=$Helper->dateIndo($arr['audit_plan_start_date'])?> s/d <?=$Helper->dateIndo($arr['audit_plan_end_date'])?>
					</div>
				</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 text-right">Total Biaya :</label>
					<div class="col-sm-5">
					Rp. <?=number_format($arr['audit_plan_biaya'])?>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 text-right">Detail komentar :</label> 
					<div class="col-sm-5">
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
					</div>
			</fieldset>			
			<fieldset class="form-group">
				<label class="col-sm-3 text-right">Isi Komentar :</label>
					<div class="col-sm-6">
						<textarea class="form-control" name="komentar" row="3" required></textarea>
					</div>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['audit_plan_id']?>">
			<input type="hidden" name="status_plan" value="<?=$status?>">
			<input type="hidden" name="data_from" value="<?=$_action?>">
			<?
				break;
		}
		?>
			<fieldset class="form-group">
				<center>
				<?
				if($_action != "getajukan" || $_action != "getapprove"){
				?>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp;
				<?
				}
				?>
				<?php if ($_action != "getdetail"): ?>
					<input type="submit" class="btn btn-success" value="Simpan">
				<?php endif ?>
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=@$_nextaction?>">
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
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
			+ '<td><input class="form-control" type="number" name="jml_hari[]" size="4" placeholder="jumlah hari"></td>'
			+ '<td><button class="btn btn-danger btn-circle auditee_remove"><i class="fa fa-times-circle"></i></button></td>'
			+ '</tr>';
		$('#tabel_auditee tbody').append(new_row);
	});

	$("#tabel_auditee").on("click", ".auditee_remove", function(e){
		e.preventDefault();
		$(this).parents("tr").remove();
	});  

	$("#tanggal_awal").datepicker({
		format: 'dd-mm-yyyy',
		 nextText: "",
		 prevText: "",
        autoClose: true
	});  
	$("#tanggal_akhir").datepicker({
		format: 'dd-mm-yyyy',
		 nextText: "",
		 prevText: "",
        autoClose: true
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

<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/select2/select2.min.js"></script>
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="Public/js/responsive-tabs.js"></script>
