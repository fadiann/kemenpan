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
			<fieldset class="hr">
				<label class="span1">Kode SBU</label> 
				<input type="text" class="span1" name="kode" id="kode"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Nama SBU</label> 
				<input type="text" class="span3" name="name" id="name"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Jumlah Hari</label>
				<select name="status">
					<option value="">Kosong</option>
					<option value="1">Sesuai Tanggal</option>
					<option value="2">Sesuai Tanggal - 1</option>
					<option value="3">1</option>
				</select>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">No Urut</label> 
				<input type="text" class="span0" name="sort" id="sort">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span1">Kode SBU</label> 
				<input type="text" class="span1" name="kode" id="kode" value="<?=$arr['sbu_kode']?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Nama SBU</label>
				<input type="text" class="span3" name="name" id="name" value="<?=$arr['sbu_name']?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">No Urut</label> 
				<input type="text" class="span0" name="sort" id="sort" value="<?=$arr['sbu_sort']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Jumlah Hari</label>
				<select name="status">
					<option value="0">Kosong</option>
					<option value="1" <? if($arr['sbu_status']=='1') echo "selected";?>>Sesuai Tanggal</option>
					<option value="2" <? if($arr['sbu_status']=='2') echo "selected";?>>Sesuai Tanggal - 1</option>
					<option value="3" <? if($arr['sbu_status']=='3') echo "selected";?>>1</option>
				</select>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['sbu_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
					<input type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			kode: "required",
			name: "required"
		},
		messages: {
			kode: "Silahkan masukan Kode SBU",
			name: "Silahkan masukan Nama SBU"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>