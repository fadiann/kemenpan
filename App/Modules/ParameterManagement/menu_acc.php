<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=$page_title?></h4>
			</header>
			<div class="panel-body wrap">
				<form method="post" name="f" action="#" class="form-horizontal"
					id="validation-form">
				<?
				switch ($_action) {
					case "getadd" :
						?>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Nama Menu</label> 
							<div class="col-sm-5">
								<input type="text"
							class="form-control" name="name" id="name">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Link</label> 
							<div class="col-sm-5">
								<input type="text" class="form-control"
							name="link" id="link">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Method</label> 
							<div class="col-sm-5">
								<input type="text" class="form-control"
							name="method" id="method">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Nama File</label> 
							<div class="col-sm-5">
								<input type="text"
							class="form-control" name="file" id="file">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Sort</label> 
							<div class="col-sm-5">
								<input type="number" class="form-control"
							name="sort" id="sort">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Status</label> 
							<div class="col-sm-5">
								<select name="status" class="form-control">
									<option value="">Pilih Satu</option>
									<option value="1">Show</option>
									<option value="0">Hidden</option>
								</select>
							</div>
					</fieldset>
					<input type="hidden" name="parrent_id" value="<?=$parrent?>">	
				<?
						break;
					case "getedit" :
						$arr = $rs->FetchRow ();
						?>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Nama Menu</label> 
							<div class="col-sm-5">
								<input type="text"
							class="form-control" name="name" id="name" value="<?=$arr['menu_name']?>">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Link</label> 
							<div class="col-sm-5">
								<input type="text" class="form-control"
							name="link" id="link" value="<?=$arr['menu_link']?>">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Method</label> 
							<div class="col-sm-5">
								<input type="text" class="form-control"
							name="method" id="method" value="<?=$arr['menu_method']?>">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Nama File</label> 
							<div class="col-sm-5">
								<input type="text"
							class="form-control" name="file" id="file" value="<?=$arr['menu_file']?>">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Sort</label> 
							<div class="col-sm-5">
								<input type="number" class="form-control"
							name="sort" id="sort" value="<?=$arr['menu_sort']?>">
							</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Status</label> 
							<div class="col-sm-5">
								<select name="status" class="form-control">
									<option value="">Pilih Satu</option>
									<option value="1" <?php if($arr['menu_show']==1) echo "selected";?>>Show</option>
									<option value="0" <?php if($arr['menu_show']==0) echo "selected";?>>Hidden</option>
								</select>
							</div>
					</fieldset>
					<input type="hidden" name="data_id" value="<?=$arr['menu_id']?>">	
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
			</div>
		</section>
	</div>
</div>
<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			name: "required",
			link: "required",
			method: "required",
			file: "required",
			sort: "required",
			status: "required"
		},
		messages: {
			name: "Masukan Nama Menu",
			link: "Masukan Link Menu",
			method: "Masukan Nama Method",
			file: "Masukan Nama File",
			sort: "Masukan Urutan Menu",
			status: "Pilih Status Menu"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>