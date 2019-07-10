<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<?
if (! empty ( $view_parrent ))
	include_once $view_parrent;
?>   
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
						<label class="col-sm-3 control-label">Kelompok Rekomendasi</label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("kode_rekomendasi", "par_kode_rekomendasi", "kode_rek_id", "concat(kode_rek_code,' - ',kode_rek_desc) as lengkap", "and kode_rek_del_st = '1' ", "", "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Rekomendasi</label>
						<div class="col-sm-7">
						<textarea class="ckeditor" cols="10" rows="40" name="rekomendasi_desc" id="rekomendasi_desc"></textarea>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">PIC</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" name="rekomendasi_pic" id="rekomendasi_pic">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Batas Waktu <span class="required">*</span></label> 
						<div class="col-sm-5">
						<input type="text" class="form-control" name="target_date" id="target_date">
						
						</div>
					</fieldset>
				<?
						break;
					case "getedit" :
						$arr = $rs->FetchRow ();
						?>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Kelompok Rekomendasi</label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("kode_rekomendasi", "par_kode_rekomendasi", "kode_rek_id", "concat(kode_rek_code,' - ',kode_rek_desc) as lengkap", "and kode_rek_del_st = '1' ", $arr['rekomendasi_id_code'], "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Rekomendasi</label>
						<div class="col-sm-7">
						<textarea class="ckeditor" cols="10" rows="40" name="rekomendasi_desc" id="rekomendasi_desc"><?php echo $arr['rekomendasi_desc']?></textarea>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">PIC</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" name="rekomendasi_pic" id="rekomendasi_pic" value="<?=$arr['rekomendasi_pic']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Batas Waktu <span class="required">*</span></label>
						<div class="col-sm-5">
						<input type="text" class="form-control" name="target_date" id="target_date" value="<?=$Helper->dateIndo($arr['rekomendasi_dateline'])?>">
						</div>
					</fieldset>
					<input type="hidden" name="data_id" value="<?=$arr['rekomendasi_id']?>">	
				<?
						break;
				}
				?>
					<fieldset class="form-group">
						<center>
							<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> 
							<input type="submit" class="btn btn-success" value="Simpan">
						</center>
						<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
					</fieldset>
				</form>
			</fieldset>
		</section>
	</div>
</div>
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