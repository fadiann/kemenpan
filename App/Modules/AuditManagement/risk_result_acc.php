<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
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
			case "getplan" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Satuan Kerja</label> 
				<?=$arr['auditee_name'];?>
				<input type="hidden" name="auditee_id" id="auditee_id" value="<?=$arr['penetapan_auditee_id'];?>" />
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Audit</label>
				<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", "", "", 1)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tahun Audit</label> <select class="span1"
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
			<fieldset>
				<label class="span2">Tujuan Audit</label>
			</fieldset>
			<fieldset class="hr">
				<textarea class="ckeditor" cols="10" rows="40" name="tujuan" id="tujuan"></textarea>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Periode Yang Diaudit</label>
				<input type="text" class="span5" name="periode" id="periode">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Rencana Audit</label> <input type="text"
					class="span1" name="tanggal_awal" id="tanggal_awal"> <label
					class="span0">s/d</label> <input type="text" class="span1"
					name="tanggal_akhir" id="tanggal_akhir"><span class="mandatory">*</span>
			</fieldset>
		<?
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali"
						onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; <input
						type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
				<input type="hidden" name="data_id" id="data_id" value="<?=$arr['penetapan_id'];?>">
			</fieldset>
		</form>
	</article>
<script>
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

$(function() {
	$("#validation-form").validate({
		rules: {
			tipe_audit: "required",
			tanggal_akhir: "required",
			tahun: "required"
		},
		messages: {
			tipe_audit: "Silahkan Pilih Tipe Audit",
			tanggal_akhir: "Silahkan Pilih Tanggal Awal dan Akhir Audit",
			tahun: "Silahkan Pilih Tahun Audit"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>