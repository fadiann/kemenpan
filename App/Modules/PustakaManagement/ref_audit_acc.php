<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="hr">
				<label class="span2">Referensi Kategori</label>
				<?=$Helper->dbCombo("id_kategori", "par_kategori_ref", "kategori_ref_id", "kategori_ref_name", "and kategori_ref_del_st = 1 ", "", "", 1)?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nama Referensi</label> 
				<input type="text" class="span3" name="name" id="name"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Keterangan</label>
				<input type="text" class="span6" name="desc" id="desc">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Link Sumber (jika ada)</label>
				<input type="file" class="span4" name="linksumber" id="linksumber">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Lampiran</label>
				<input type="file" class="span4" name="attach" id="attach">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr =  $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Referensi Kategori</label>
				<?=$Helper->dbCombo("id_kategori", "par_kategori_ref", "kategori_ref_id", "kategori_ref_name", "and kategori_ref_del_st = 1 ", $arr['ref_audit_id_kategori'], "", 1)?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Nama Referensi</label> 
				<input type="text" class="span3" name="name" id="name" value="<?=$arr['ref_audit_nama']?>"><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Keterangan</label>
				<input type="text" class="span6" name="desc" id="desc" value="<?=$arr['ref_audit_desc']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Link Sumber (jika ada)</label>
				<input type="text" class="span4" name="linksumber" id="linksumber" value="<?=$arr['ref_audit_link']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Lampiran</label>
				<input type="hidden" class="span4" name="attach_old" value="<?=$arr['ref_audit_attach']?>"> 
				<input type="file" class="span4" name="attach" id="attach">
				<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Ref").$arr['ref_audit_attach']?>','_blank')"><?=$arr['ref_audit_attach']?></a></label>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['ref_audit_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
					<?
					if($_action!='getdetail'){
					?>
					<input type="submit" class="blue_btn" value="Simpan">
					<?
					}
					?>
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