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
				<label class="col-sm-3 control-label">Jenis Jabatan</label>
					<select name="type" id="type">
						<option	value="">Pilih Satu</option>
						<option	value="Struktural">Struktural</option>
						<option	value="Fungsional">Fungsional</option>
					</select>
					<span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama Jabatan</label> <input type="text" class="span3" name="name" id="name"><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Urutan</label> <input type="text" class="form-control" name="sort" id="sort">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Jenis Jabatan</label>
					<select name="type" id="type">
						<option	value="">Pilih Satu</option>
						<option	value="Struktural" <?php if($arr['jenis_jabatan']=="struktural") echo "selected";?>>Struktural</option>
						<option	value="Fungsional" <?php if($arr['jenis_jabatan']=="fungsional") echo "selected";?>>Fungsional</option>
					</select>
					<span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Nama Jabatan</label> <input type="text"
					class="span3" name="name" id="name"
					value="<?=$arr['jenis_jabatan_sub']?>"><span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Urutan</label> <input type="text"
					class="span1" name="sort" id="sort"
					value="<?=$arr['jenis_jabatan_sort']?>">
			</fieldset>
			<input type="hidden" name="data_id"
				value="<?=$arr['jenis_jabatan_id']?>">	
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
			name: "required",
			type: "required"
		},
		messages: {
			type: "Silahkan Pilih Jenis Jabatan",
			name: "Silahkan masukan Nama Jabatan"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>