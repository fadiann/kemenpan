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
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja</label>
				<?php
				$rs_auditee = $auditees->auditee_data_viewlist ();
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo_risk ( "satker", $arr_auditee, 0, 2, "", "", false, true, false );
				?><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tahun</label> <select class="form-control"
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
				</select><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama Kegiatan</label> <input type="text"
					class="span4" name="nama" id="nama"> <span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tujuan Kegiatan</label> <input type="text"
					class="span7" name="tujuan" id="tujuan"> <span class="required">*</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja</label>
				<?php
				$rs_auditee = $auditees->auditee_data_viewlist ();
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo_risk ( "satker", $arr_auditee, 0, 2, $arr ['penetapan_auditee_id'], "", false, true, false );
				?><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tahun</label> <select class="form-control"
					name="tahun" id="tahun">
					<option value="">Pilih Satu</option>
					<?
				$thn = date ( "Y" ) - 1;
				for($i = 1; $i <= 3; $i ++) {
					?>
					<option value="<?=$thn?>"
						<? if($thn==$arr['penetapan_tahun']) echo "selected";?>><?=$thn?></option>
					<?
					$thn ++;
				}
				?>
				</select><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama Kegiatan</label> <input type="text"
					class="span4" name="nama" id="nama"
					value="<?=$arr['penetapan_nama']?>"> <span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tujuan Kegiatan</label> <input type="text"
					class="span7" name="tujuan" id="tujuan"
					value="<?=$arr['penetapan_tujuan']?>"> <span class="required">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['penetapan_id']?>">	
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
	</article>
</section>
<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			satker: "required",
			tahun: "required",
			nama: "required",
			tujuan: "required"
		},
		messages: {
			satker: "Pilih Satuan Kerja",
			tahun: "Pilih Tahun",
			nama: "Masukan Nama",
			tujuan: "Masukan Tujuan"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>