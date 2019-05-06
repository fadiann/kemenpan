<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<?php 
require 'vendor/autoload.php';

use Carbon\Carbon;
?>
<section id="main" class="column">		
<?
if (! empty ( $view_parrent ))
	include_once $view_parrent;
?>   
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="hr">
				<label class="span2">No Temuan</label> <input type="text"
					class="span1" name="finding_no" id="finding_no" />
					<span class="mandatory">*</span>
			</fieldset>
			<fieldset>
				<label class="span2">Kelompok Temuan</label>
				<?
				$rs_kel = $params->finding_type_data_viewlist ();
				$arr_kel = $rs_kel->GetArray ();
				echo $Helper->buildCombo ( "finding_type", $arr_kel, 0, 2, "", "propinsiOnChange_1(this.value, 'finding_sub_id', 'finding_jenis_id')", "", false, true, false );
				?>
			</fieldset>
			<fieldset>
				<label class="span2">&nbsp;</label>
				<select name="finding_sub_id" id="finding_sub_id" onchange = "return propinsiOnChange_2(this.value, 'finding_jenis_id')">
					<option value="">Pilih Kelompok Temuan</option>
				</select>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">&nbsp;</label>
				<select name="finding_jenis_id" id="finding_jenis_id">
					<option value="">Pilih Kelompok Temuan</option>
				</select><span class="mandatory">*</span>
			</fieldset>
			<!-- <fieldset class="hr">
				<label class="span2">Temuan Dominan</label>
				<?=$Helper->dbCombo("finding_penyebab_id", "par_kode_penyebab", "kode_penyebab_id", "kode_penyebab_name", "and kode_penyebab_del_st = 1 ", "", "", 1)?>
			</fieldset> -->
			<fieldset class="hr">
				<label class="span2">Judul temuan</label> <input type="text" class="span7" name="finding_judul" id="finding_judul">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tanggal temuan</label> <input type="text"
					class="span1" name="finding_date" id="finding_date"><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset>
				<ul class="rtabs">
					<li><a href="#view1">Kondisi</a></li>
					<li><a href="#view2">Kriteria</a></li>
					<li><a href="#view3">Sebab</a></li>
					<li><a href="#view4">Akibat</a></li>
					<li><a href="#view5">Tanggapan Auditee</a></li>
					<li><a href="#view6">Tanggapan Auditor</a></li>
				</ul>
				<div id="view1">
					<textarea class="ckeditor" cols="10" rows="40" name="finding_kondisi" id="finding_kondisi"></textarea>
				</div>
				<div id="view2">
					<textarea class="ckeditor" cols="10" rows="40" name="finding_kriteria" id="finding_kriteria"></textarea>
				</div>
				<div id="view3">
					<textarea class="ckeditor" cols="10" rows="40" name="finding_sebab" id="finding_sebab"></textarea>
				</div>
				<div id="view4">
					<textarea class="ckeditor" cols="10" rows="40" name="finding_akibat" id="finding_akibat"></textarea>
				</div>
				<div id="view5">
					<textarea class="ckeditor" cols="10" rows="40" name="tanggapan_auditee" id="tanggapan_auditee"></textarea>
				</div>
				<div id="view6">
					<textarea class="ckeditor" cols="10" rows="40" name="tanggapan_auditor" id="tanggapan_auditor"></textarea>
				</div>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nilai temuan</label> <input type="text" class="span7" name="finding_nilai" id="finding_nilai">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Lampiran</label> <input type="file" class="span4" name="finding_attach" id="finding_attach">
			</fieldset>
			<input type="hidden" class="span1" name="finding_auditee" id="finding_auditee" value="<?=$auditee_kka?>" />
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">No Temuan</label> <input type="text"
					class="span1" name="finding_no" id="finding_no"
					value="<?=$arr['finding_no']?>" /><span class="mandatory">*</span>
			</fieldset>
			<fieldset>
				<label class="span2">Kelompok Temuan</label>
				<?
				$rs_kel = $params->finding_type_data_viewlist ();
				$arr_kel = $rs_kel->GetArray ();
				echo $Helper->buildCombo ( "finding_type", $arr_kel, 0, 2, $arr['finding_type_id'], "propinsiOnChange_1(this.value, 'finding_sub_id', 'finding_jenis_id')", "", false, true, false );
				?>
			</fieldset>
			<fieldset>
				<label class="span2">&nbsp;</label>
				<?
				$rs_sub = $params->kel_sub_kel ($arr['finding_type_id']);
				$arr_sub = $rs_sub->GetArray ();
				echo $Helper->buildCombo ( "finding_sub_id", $arr_sub, 0, 1, $arr['finding_sub_id'], "propinsiOnChange_2(this.value, 'finding_jenis_id')", "", false, true, false );
				?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">&nbsp;</label>
				<?
				$rs_jenis = $params->jenis_temuan_kel ($arr['finding_sub_id']);
				$arr_jenis = $rs_jenis->GetArray ();
				echo $Helper->buildCombo ( "finding_jenis_id", $arr_jenis, 0, 2, $arr['finding_jenis_id'], "", "", false, true, false );
				?>
				<span class="mandatory">*</span>
			</fieldset>
			<!-- <fieldset class="hr">
				<label class="span2">Temuan Dominan</label>
				<?=$Helper->dbCombo("finding_penyebab_id", "par_kode_penyebab", "kode_penyebab_id", "kode_penyebab_name", "and kode_penyebab_del_st = 1 ", $arr['finding_penyebab_id'], "", 1)?>
			</fieldset> -->
			<fieldset class="hr">
				<label class="span2">Judul temuan</label> <input type="text"
					class="span7" name="finding_judul" id="finding_judul"
					value="<?=$arr['finding_judul']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tanggal temuan</label> <input type="text"
					class="span1" name="finding_date" id="finding_date"
					value="<?=$Helper->dateIndo($arr['finding_date'])?>"><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset>
				<ul class="rtabs">
					<li><a href="#view1">Kondisi</a></li>
					<li><a href="#view2">Kriteria</a></li>
					<li><a href="#view3">Sebab</a></li>
					<li><a href="#view4">Akibat</a></li>
					<li><a href="#view5">Tanggapan Satuan Kerja</a></li>
					<li><a href="#view6">Tanggapan Auditor</a></li>
				</ul>
				<div id="view1">
					<textarea class="ckeditor" cols="10" rows="40" name="finding_kondisi" id="finding_kondisi"><?=$arr['finding_kondisi']?></textarea>
				</div>
				<div id="view2">
					<textarea class="ckeditor" cols="10" rows="40" name="finding_kriteria" id="finding_kriteria"><?=$arr['finding_kriteria']?></textarea>
				</div>
				<div id="view3">
					<textarea class="ckeditor" cols="10" rows="40" name="finding_sebab" id="finding_sebab"><?=$arr['finding_sebab']?></textarea>
				</div>
				<div id="view4">
					<textarea class="ckeditor" cols="10" rows="40" name="finding_akibat" id="finding_akibat"><?=$arr['finding_akibat']?></textarea>
				</div>
				<div id="view5">
					<textarea class="ckeditor" cols="10" rows="40" name="tanggapan_auditee" id="tanggapan_auditee"><?=$arr['finding_tanggapan_auditee']?></textarea>
				</div>
				<div id="view6">
					<textarea class="ckeditor" cols="10" rows="40" name="tanggapan_auditor" id="tanggapan_auditor"><?=$arr['finding_tanggapan_auditor']?></textarea>
				</div>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nilai temuan</label> <input type="text" class="span7" name="finding_nilai" id="finding_nilai" value="<?=$arr['finding_nilai']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Lampiran</label>
				<input type="hidden" class="span4" name="finding_attach_old" value="<?=$arr['finding_attachment']?>"> 
				<input type="file" class="span4" name="finding_attach" id="finding_attach">
				<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Temuan").$arr['finding_attachment']?>','_blank')"><?=$arr['finding_attachment']?></a></label>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['finding_id']?>">
			<input type="hidden" class="span1" name="finding_auditee" id="finding_auditee" value="<?=$auditee_kka?>" />
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<table class="view_parrent">
					<tr>
						<td width="150px">No Temuan</td>
						<td width="3px">:</td>
						<td><?=$arr['finding_no']?></td>
					</tr>
					<tr>
						<td>Kelompok Temuan</td>
						<td>:</td>
						<td><?=$arr['jenis_temuan_code']?> - <?=$arr['jenis_temuan_name']?></td>
					</tr>
					<tr>
						<td>Judul temuan</td>
						<td>:</td>
						<td><?=$arr['finding_judul']?></td>
					</tr>
					<tr>
						<td>Temuan Dominan</td>
						<td>:</td>
						<td><?=$arr['kode_penyebab_name']?></td>
					</tr>
					<tr>
						<td>Tanggal temuan</td>
						<td>:</td>
						<td><?=$Helper->dateIndo($arr['finding_date'])?></td>
					</tr>
					<tr>
						<td>Kondisi</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_kondisi'])?></td>
					</tr>
					<tr>
						<td>Kriteria</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_kriteria'])?></td>
					</tr>
					<tr>
						<td>Sebab</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_sebab'])?></td>
					</tr>
					<tr>
						<td>Akibat</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_akibat'])?></td>
					</tr>
					<tr>
						<td>Tanggapan Satuan Kerja</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_tanggapan_auditee'])?></td>
					</tr>
					<tr>
						<td>Lampiran</td>
						<td>:</td>
						<td><a href="#"
							Onclick="window.open('<?=$Helper->baseurl("Upload_Temuan").$arr['finding_attachment']?>','_blank')"><?=$arr['finding_attachment']?></a></td>
					</tr>
					<tr>
						<td>Detail komentar</td>
						<td>:</td>
						<td>
						<table border="0">
						<?php 
						$z = 0;
						$rs_komentar = $findings->finding_komentar_viewlist ( $arr ['finding_id'] );
						while ( $arr_komentar = $rs_komentar->FetchRow () ) {
							$z ++;
							Carbon::setLocale('id');
							$diff = new Carbon(date('Y-m-d H:i:s', $arr_komentar['find_comment_date']));
				// 			echo $z.". ".$arr_komentar['auditor_name']." : ".$Helper->text_show($arr_komentar['find_comment_desc'])."<br>";
							?>
								    <tr>
										<td><?= $z ?>. </td><td><?= $arr_komentar['auditor_name'] ?> :</td><td>"<?= $Helper->text_show($arr_komentar['find_comment_desc']) ?>"</td><td style="text-align: left;"><?= $diff->diffForHumans() ?></td>
									</tr>
							<?
						}
						?>
						</table>
						</td>
					</tr>
				</table>
			</fieldset>
		<?
				break;
			case "getajukan_temuan" :
			case "getapprove_temuan" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<table class="view_parrent">
					<tr>
						<td width="150px">No Temuan</td>
						<td width="3px">:</td>
						<td><?=$arr['finding_no']?></td>
					</tr>
					<tr>
						<td>Kelompok Temuan</td>
						<td>:</td>
						<td><?=$arr['jenis_temuan_code']?> - <?=$arr['jenis_temuan_name']?></td>
					</tr>
					<tr>
						<td>Judul temuan</td>
						<td>:</td>
						<td><?=$arr['finding_judul']?></td>
					</tr>
					<tr>
						<td>Tanggal temuan</td>
						<td>:</td>
						<td><?=$Helper->dateIndo($arr['finding_date'])?></td>
					</tr>
					<tr>
						<td>Kriteria</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_kriteria'])?></td>
					</tr>
					<tr>
						<td>Kondisi</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_kondisi'])?></td>
					</tr>
					<tr>
						<td>Sebab</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_sebab'])?></td>
					</tr>
					<tr>
						<td>Akibat</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_akibat'])?></td>
					</tr>
					<tr>
						<td>Tanggapan Auditee</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['finding_tanggapan_auditee'])?></td>
					</tr>
					<tr>
						<td>Lampiran</td>
						<td>:</td>
						<td><a href="#"
							Onclick="window.open('<?=$Helper->baseurl("Upload_Temuan").$arr['finding_attachment']?>','_blank')"><?=$arr['finding_attachment']?></a></td>
					</tr>
					<tr>
						<td>Detail komentar</td>
						<td>:</td>
						<td>
						 <table>
					   <?php 
						$z = 0;
						$rs_komentar = $findings->finding_komentar_viewlist ( $arr ['finding_id'] );
						while ( $arr_komentar = $rs_komentar->FetchRow () ) {
							$z ++;
							Carbon::setLocale('id');
							$diff = new Carbon(date('Y-m-d H:i:s', $arr_komentar['find_comment_date']));
				// 			echo $z.". ".$arr_komentar['auditor_name']." : ".$Helper->text_show($arr_komentar['find_comment_desc'])."<br>";
							?>
								    <tr>
										<td><?= $z ?>. </td><td><?= $arr_komentar['auditor_name'] ?> :</td><td>"<?= $Helper->text_show($arr_komentar['find_comment_desc']) ?>"</td><td style="text-align: left;"><?= $diff->diffForHumans() ?></td>
									</tr>
							<?
						}
						?>
						</table>
						</td>
					</tr>
				</table>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Isi Komentar</label>
				<textarea id="komentar" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['finding_id']?>">	
			<input type="hidden" name="program_id_find" value="<?=$prog_id_find?>">	
			<input type="hidden" name="status_temuan" value="<?=$status?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
					<?
					if($_action!='getdetail'){
					?>
					<input type="submit" class="blue_btn" value="Simpan">
					<?
					}
					?>
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
<script>
$("#finding_date").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true
}); 

$(function() {
	$("#validation-form").validate({
		rules: {
			finding_auditee: "required",
			finding_no: "required",
			finding_judul: "required",
			finding_date: "required",
			finding_jenis_id: "required"
		},
		messages: {
			finding_auditee: "Silahkan Pilih Satuan Kerja",
			finding_no: "Silahkan Masukan No Temuan",
			finding_judul: "Silahkan Masukan Judul Temuan",
			finding_date: "Silahkan Masukan Tanggal Temuan",
			finding_jenis_id: "Pilih Kode Temuan"
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

function propinsiOnChange_1(objValue, cmbNext_1, cmbNext_2){
	objSel_1 = cmbNext_1;
	selectRemoveAll(objSel_1);
	
	objSel_2 = cmbNext_2;
	selectRemoveAll(objSel_2);

	selectAdd(objSel_1, "", "Pilih Satu");
	selectAdd(objSel_2, "", "Pilih Sub Kelompok");
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
					echo("\tselectAdd(objSel_1, \"$value2[0]\", \"$value2[1]\", $isSelected);\n");
				}
			echo("\tbreak;\n");
		}
	?>
	}
}

function propinsiOnChange_2(objValue, cmbNext){
	objSel = cmbNext;
	selectRemoveAll(objSel);
	
	selectAdd(objSel, "", "Pilih Satu");
	switch (objValue) {
	<?
		$rs1 = $params->kel_sub_kel ();
		$arr1 = $rs1->GetArray();
		$rs1->Close();
		foreach ($arr1 as $value1) {
			echo("case \"$value1[0]\":\n");
			$rs2 = $params->jenis_temuan_kel($value1[0]);
			$arr2 = $rs2->GetArray();
			$rs2->Close();
				foreach ($arr2 as $value2) {
					$isSelected="false";
					echo("\tselectAdd(objSel, \"$value2[0]\", \"$value2[2]\", $isSelected);\n");
				}
			echo("\tbreak;\n");
		}
	?>
	}
}
</script>