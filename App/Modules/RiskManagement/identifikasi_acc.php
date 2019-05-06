<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title." ".$arr_penetapan['auditee_name']?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal"
			id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="hr">
				<label class="span2">Nama Risiko</label> <input type="text"
					class="span4" name="nama" id="nama"> <span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Ketegori Risiko</label>
				<?=$Helper->dbCombo("kategori", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", "", "", 1)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Faktor Penyebab Risiko</label> <input
					type="text" class="span7" name="penyebab" id="penyebab"> <span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Selera Risiko</label>
				<?=$Helper->dbCombo("selera", "par_risk_selera", "risk_selera", "risk_selera", "and risk_selera_del_st = 1 ", "", "", 1)?><span
					class="mandatory">*</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Nomor Risiko</label> <label class="span2"><?php echo $arr['identifikasi_no_risiko']?></label>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nama Risiko</label> <input type="text"
					class="span4" name="nama" id="nama"
					value="<?php echo $arr['identifikasi_nama_risiko']?>"><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Ketegori Risiko</label>
				<?=$Helper->dbCombo("kategori", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", $arr['identifikasi_kategori_id'], "", 1)?><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Faktor Penyebab Risiko</label> <input
					type="text" class="span7" name="penyebab" id="penyebab"
					value="<?php echo $arr['identifikasi_penyebab']?>"> <span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Selera Risiko</label>
				<?=$Helper->dbCombo("selera", "par_risk_selera", "risk_selera", "risk_selera", "and risk_selera_del_st ", $arr['identifikasi_selera'], "", 1)?><span
					class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id"
				value="<?=$arr['identifikasi_id']?>">	
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
			nama: "required",
			kategori: "required",
			penyebab: "required",
			selera: "required"
		},
		messages: {
			nama: "Masukan Nama Risiko",
			kategori: "Pilih Kategori Risiko",
			penyebab: "Masukan Faktor Penyebab Risiko",
			selera: "Pilih Selera Risiko"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>