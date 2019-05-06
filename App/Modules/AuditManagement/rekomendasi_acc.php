<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>

<section id="main" class="column">	
<?
if (! empty ( $view_parrent ))
	include_once $view_parrent;
?>   
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
				<label class="span2">Kelompok Rekomendasi</label>
				<?=$Helper->dbCombo("kode_rekomendasi", "par_kode_rekomendasi", "kode_rek_id", "concat(kode_rek_code,' - ',kode_rek_desc) as lengkap", "and kode_rek_del_st = '1' ", "", "", 1)?>
			</fieldset>
			<fieldset>
				<label class="span2">Rekomendasi</label>
			</fieldset>
			<fieldset class="hr">
				<textarea class="ckeditor" cols="10" rows="40" name="rekomendasi_desc" id="rekomendasi_desc"></textarea>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">PIC</label>
				<input type="text" class="span2" name="rekomendasi_pic" id="rekomendasi_pic">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Batas Waktu</label> 
				<input type="text" class="span1" name="target_date" id="target_date">
				<span class="mandatory">*</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Kelompok Rekomendasi</label>
				<?=$Helper->dbCombo("kode_rekomendasi", "par_kode_rekomendasi", "kode_rek_id", "concat(kode_rek_code,' - ',kode_rek_desc) as lengkap", "and kode_rek_del_st = '1' ", $arr['rekomendasi_id_code'], "", 1)?>
			</fieldset>
			<fieldset>
				<label class="span2">Rekomendasi</label>
			</fieldset>
			<fieldset class="hr">
				<textarea class="ckeditor" cols="10" rows="40"
					name="rekomendasi_desc" id="rekomendasi_desc"><?php echo $arr['rekomendasi_desc']?></textarea>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">PIC</label>
				<input type="text" class="span2" name="rekomendasi_pic" id="rekomendasi_pic" value="<?=$arr['rekomendasi_pic']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Batas Waktu</label>
				<input type="text" class="span1" name="target_date" id="target_date" value="<?=$Helper->dateIndo($arr['rekomendasi_dateline'])?>">
				<span class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['rekomendasi_id']?>">	
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
$("#target_date").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true
}); 

$(function() {
	$("#validation-form").validate({
		rules: {
			kode_rekomendasi: "required",
			rekomendasi_desc: "required",
			rekomendasi_pic: "required",
			target_date: "required"
		},
		messages: {
			kode_rekomendasi: "Silahkan pilih PIC",
			rekomendasi_desc: "Silahkan Isi Rekomendasi",
			rekomendasi_pic: "Silahkan pilih PIC",
			target_date: "Silahkan Masukan Target Date"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>