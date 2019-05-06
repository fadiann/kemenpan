<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
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
				<label class="span1">Tanggal Libur</label> <input type="text"
					class="span1" name="tanggal" id="tanggal"><span class="mandatory">* <?php echo date("N")?></span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Keterangan</label> <input type="text"
					class="span7" name="desc" id="desc">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span1">Tanggal Libur</label> <input type="text"
					class="span1" name="tanggal" id="tanggal"
					value="<?=$Helper->dateIndo($arr['holiday_date'])?>"><span
					class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Keterangan</label> <input type="text"
					class="span7" name="desc" id="desc"
					value="<?=$arr['holiday_desc']?>">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['holiday_id']?>">	
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
$("#tanggal").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true
}); 
$(function() {
	$("#validation-form").validate({
		rules: {
			name: "required"
		},
		messages: {
			name: "Silahkan masukan Tipe Audit"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>