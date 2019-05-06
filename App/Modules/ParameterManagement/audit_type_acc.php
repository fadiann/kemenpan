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
				<label class="span1">Tipe Pengawasan</label> 
				<input type="text" class="span3" name="name" id="name">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Keterangan</label> 
				<input type="text" class="span7" name="desc" id="desc">
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Opsi</label> 
				<select name="opsi" id="opsi">
					<option value="">=== Pilih Satu</option>
					<option value="1">Pengawasan Pemeriksaan</option>
					<option value="2">Pengawasan Non Pemeriksaan</option>
					<option value="3">Lain lain</option>
				</select>
				<span class="mandatory">*</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span1">Tipe Pengawasan</label> 
				<input type="text" class="span3" name="name" id="name" value="<?=$arr['audit_type_name']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Keterangan</label> 
				<input type="text" class="span7" name="desc" id="desc" value="<?=$arr['audit_type_desc']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span1">Opsi</label> 
				<select name="opsi" id="opsi">
					<option value="">=== Pilih Satu</option>
					<option value="1" <? if($arr['audit_type_opsi']==1) echo "selected";?>>Pengawasan Pemeriksaan</option>
					<option value="2" <? if($arr['audit_type_opsi']==2) echo "selected";?>>Pengawasan Non Pemeriksaan</option>
					<option value="3" <? if($arr['audit_type_opsi']==3) echo "selected";?>>Lain lain</option>
				</select>
				<span class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id"
				value="<?=$arr['audit_type_id']?>">	
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
			name: "required",			
			opsi: "required"
		},
		messages: {
			name: "Silahkan masukan Tipe Audit",			
			opsi: "Silakan Pilih Opsi"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>