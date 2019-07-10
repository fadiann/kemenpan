<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title"><?=$page_title?></h4>
			</header>
			<div class="panel-body wrap">
				<form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data">
				<?
				switch ($_action) {
					case "getadd" :
						?>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Referensi Kategori <span class="required">*</span></label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("id_kategori", "par_kategori_ref", "kategori_ref_id", "kategori_ref_name", "and kategori_ref_del_st = 1 ", "", "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Nama Referensi <span class="required">*</span></label>
						<div class="col-sm-5"> 
						<input type="text" class="form-control" name="name" id="name">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Keterangan</label>
						<div class="col-sm-5"> 
						<input type="text" class="form-control" name="desc" id="desc">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Link Sumber (jika ada)</label>
						<div class="col-sm-5"> 
						<input type="file" class="form-control" name="linksumber" id="linksumber">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Lampiran</label>
						<div class="col-sm-5"> 
						<input type="file" class="form-control" name="attach" id="attach">
						</div>
					</fieldset>
				<?
						break;
					case "getedit" :
						$arr =  $rs->FetchRow ();
						?>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Referensi Kategori <span class="required">*</span></label>
						<div class="col-sm-5">
						<?=$Helper->dbCombo("id_kategori", "par_kategori_ref", "kategori_ref_id", "kategori_ref_name", "and kategori_ref_del_st = 1 ", $arr['ref_audit_id_kategori'], "", 1)?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Nama Referensi <span class="required">*</span></label>
						<div class="col-sm-5">
						<input type="text" class="form-control" name="name" id="name" value="<?=$arr['ref_audit_nama']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Keterangan</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" name="desc" id="desc" value="<?=$arr['ref_audit_desc']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Link Sumber (jika ada)</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" name="linksumber" id="linksumber" value="<?=$arr['ref_audit_link']?>">
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Lampiran</label>
						<div class="col-sm-5">
						<input type="hidden" class="form-control" name="attach_old" value="<?=$arr['ref_audit_attach']?>"> 
						<input type="file" class="form-control" name="attach" id="attach">
						</div>
					</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label"></label>
							<div class="col-sm-5">
							<a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Ref").$arr['ref_audit_attach']?>','_blank')">(*) <?=$arr['ref_audit_attach']?></a></label>
						</div>
					</fieldset>
					<input type="hidden" name="data_id" value="<?=$arr['ref_audit_id']?>">	
				<?
						break;
				}
				?>
					<fieldset class="form-group">
						<center>
							<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
							<?
							if($_action!='getdetail'){
							?>
							<input type="submit" class="btn btn-success" value="Simpan">
							<?
							}
							?>
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
			id_kategori: "required",
			name: "required"
		},
		messages: {
			id_kategori: "Silahkan Pilih Kategori Referensi",
			name: "Silahkan Nama Refrensi"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>