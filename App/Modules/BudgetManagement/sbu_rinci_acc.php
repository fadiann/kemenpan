<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="Public/js/jquery.maskMoney.js"></script>
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
				<label class="span1">Propinsi</label>
				<?=$Helper->dbCombo("propinsi", "par_propinsi", "propinsi_id", "propinsi_name", " and propinsi_del_st = '1' ", "", "", true)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Kode SBU</label>
				<?=$Helper->dbCombo("sbu", "par_sbu", "sbu_id", "concat(sbu_kode, ' - ',sbu_name) as lengkap", " and sbu_del_st = '1' ", "", "", true)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Golongan</label>
				<?=$Helper->dbCombo("golongan", "auditor", "auditor_golongan", "auditor_golongan", " group by auditor_golongan ", "", "", true, "order by auditor_golongan")?>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Jumlah</label> <input type="text" class="span1"
					name="amount" id="amount"><span class="mandatory">*</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span1">Propinsi</label>
				<?=$Helper->dbCombo("propinsi", "par_propinsi", "propinsi_id", "propinsi_name", " and propinsi_del_st = '1' ", $arr['sbu_rinci_prov_id'], "", true)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Kode SBU</label>
				<?=$Helper->dbCombo("sbu", "par_sbu", "sbu_id", "sbu_name", " and sbu_del_st = '1' ", $arr['sbu_rinci_sbu_id'], "", true)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Golongan</label>
				<?=$Helper->dbCombo("golongan", "auditor", "auditor_golongan", "auditor_golongan", " group by auditor_golongan ", $arr['sbu_rinci_gol'], "", true, "order by auditor_golongan")?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Jumlah</label> <input type="text" class="span1"
					name="amount" id="amount" value="<?=$arr['sbu_rinci_amount']?>"><span
					class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['sbu_rinci_id']?>">	
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
$("#amount").maskMoney({precision: 0});
$(function() {
	$("#validation-form").validate({
		rules: {
			propinsi: "required",
			sbu: "required",
			amount: "required"
		},
		messages: {
			propinsi: "Silahkan Pilih Propinsi",
			sbu: "Silahkan Pilih SBU",
			amount: "Silahkan masukan Jumlah"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>