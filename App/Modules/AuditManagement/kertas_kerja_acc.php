<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<?php 
require 'vendor/autoload.php';

use Carbon\Carbon;
 ?>	
<?
if (! empty ( $view_parrent ))
	include_once $view_parrent;
?>   
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
				<label class="col-sm-3 control-label">No Kertas Kerja Audit <span class="required">*</span></label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="no_kka" id="no_kka">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal Kertas Kerja Audit <span class="required">*</span></label>
				<div class="col-sm-5">
				<input type="text" class="form-control" name="kertas_kerja_date" id="kertas_kerja_date">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<div class="col-sm-12">
				<ul class="rtabs">
					<li><a href="#view1">Uraian</a></li>
					<li><a href="#view2">Kesimpulan</a></li>
				</ul>
				<div id="view1">
					<textarea class="ckeditor" cols="10" rows="40" name="kertas_kerja" id="kertas_kerja"></textarea>
<!-- 					<label>Lampiran :</label>
					<br> -->
				</div>
				<div id="view2">
					<textarea class="ckeditor" cols="10" rows="40" name="kesimpulan" id="kesimpulan"></textarea>
				</div>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<div class="col-sm-12">
					<button id="tambah_auditee" class="btn btn-success">
						<i class="fa fa-plus-circle"></i> Tambah File</button>
					<table id="tabel_auditee" class="table table-bordered table-hover mt-md" width="60%">
						<thead>
							<tr>
								<th class="text-center" width="1%">No.</th>
								<th class="text-left" width="30%">Lampiran</th>
								<th width="5%">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr id="1">
								<td class="text-center">1.</td>
								<td><input type="file" class="span4" name="kka_attach[]"></td>
								<td class="text-center">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				</div>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">No Kertas Kerja Audit</label> 
				<div class="col-sm-5"><input type="text"
					class="form-control" name="no_kka" id="no_kka"
					value="<?=$arr['kertas_kerja_no']?>">
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal Kertas Kerja Audit</label> 
				<div class="col-sm-5">
					<input type="text"
					class="form-control" name="kertas_kerja_date" id="kertas_kerja_date"
					value="<?=$Helper->dateIndo($arr['kertas_kerja_date'])?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<div class="col-sm-12">
				<ul class="rtabs">
					<li><a href="#view1">Uraian</a></li>
					<li><a href="#view2">Kesimpulan</a></li>
				</ul>
				<div id="view1">
					<textarea class="ckeditor" cols="10" rows="40" name="kertas_kerja" id="kertas_kerja"><?php echo $arr['kertas_kerja_desc']?></textarea>
				</div>
				<div id="view2">
					<textarea class="ckeditor" cols="10" rows="40" name="kesimpulan" id="kesimpulan"><?php echo $arr['kertas_kerja_kesimpulan']?></textarea>
				</div>
				</div>

			</fieldset>
			<fieldset class="form-group">
				<div class="col-sm-12">
					<button id="tambah_auditee" class="btn btn-success">
						<i class="fa fa-plus-circle"></i> Tambah File</button>
					<table id="tabel_auditee" class="table table-bordered table-hover mt-md" width="60%">
						<thead>
							<tr>
								<th class="text-center" width="5%">No.</th>
								<th class="text-left" width="30%">Lampiran</th>
								<th width="5%">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr id="1">
								<td class="text-center">1.</td>
								<td><input type="file" class="span4" name="kka_attach[]"></td>
								<td class="text-center">&nbsp;</td>
							</tr>
						</tbody>
					</table>
				<?php 
					$z=0;
					$rs_file = $kertas_kerjas->list_kka_lampiran($arr['kertas_kerja_id']);
					while($arr_file = $rs_file->FetchRow()){
					$z++;
					?>
						<input type="checkbox" name="nama_file_<?=$z?>" value="<?=$arr_file['kka_attach_filename']?>">
						<a href="#" onclick="window.open('<?=$Helper->baseurl("Upload_KKA").$arr_file['kka_attach_filename']?>','_blank')"><?=$arr_file['kka_attach_filename']?></a>
					<?php 
					}
					?><span class="required">* Centang Untuk Menghapus File</span>
				</div>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['kertas_kerja_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				$rs_komentar = $kertas_kerjas->kka_komentar_viewlist ( $arr ['kertas_kerja_id'] );
				?>
			<fieldset class="form-group">
				<table class="table table-bordered table-hover">
					<tr>
						<td width="120px">No KKA</td>
						<td>:</td>
						<td><?=$arr['kertas_kerja_no']?></td>
					</tr>
					<tr>
						<td>Tanggal KKA</td>
						<td>:</td>
						<td><?=$Helper->dateIndo($arr['kertas_kerja_date'])?></td>
					</tr>
					<tr>
						<td>Uraian</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['kertas_kerja_desc'])?></td>
					</tr>
					<tr>
						<td>kesimpulan</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['kertas_kerja_kesimpulan'])?></td>
					</tr>
					<tr>
						<td>File Kertas Kerja</td>
						<td>:</td>
						<td>
						<?php 
						$z=0;
						$rs_file = $kertas_kerjas->list_kka_lampiran($arr['kertas_kerja_id']);
						while($arr_file = $rs_file->FetchRow()){
						$z++;
						?>
							<a href="#" onclick="window.open('<?=$Helper->baseurl("Upload_KKA").$arr_file['kka_attach_filename']?>','_blank')"><u><strong><?=$arr_file['kka_attach_filename']?></strong></u></a><br>
						<?php 
						}
						?>
						</td>
					</tr>
					<tr>
						<td>Detail komentar</td>
						<td>:</td>
						<td>
							<table border="0">
						<?php 
						$z = 0;
						while ( $arr_komentar = $rs_komentar->FetchRow () ) {
							$z ++;
							Carbon::setLocale('id');
							$diff = new Carbon(date('Y-m-d H:i:s', $arr_komentar['kertas_kerja_comment_date']));
							?>
									<tr>
										<td><?= $z ?>. </td><td><?= $arr_komentar['auditor_name'] ?> :</td><td>"<?= $Helper->text_show($arr_komentar['kertas_kerja_comment_desc']) ?>"</td><td style="text-align: left;"><?= $diff->diffForHumans() ?></td>
									</tr>
							<?
							// echo $z.". ".$arr_komentar['auditor_name']." : ".$Helper->text_show($arr_komentar['kertas_kerja_comment_desc'])."&nbsp;<b>".$diff->diffForHumans()."</b><br>";
						}
						?>
						</table>
						</td>
					</tr>
				</table>
			</fieldset>
		<?
				break;
			case "getajukan_kka" :
			case "getapprove_kka" :
				$arr = $rs->FetchRow ();
				$rs_komentar = $kertas_kerjas->kka_komentar_viewlist ( $arr ['kertas_kerja_id'] );
				?>
			
			<fieldset class="form-group">
				<table class="table table-borderless">
					<tr>
						<td width="120px">No KKA</td>
						<td>:</td>
						<td><?=$arr['kertas_kerja_no']?></td>
					</tr>
					<tr>
						<td>Tanggal KKA</td>
						<td>:</td>
						<td><?=$Helper->dateIndo($arr['kertas_kerja_date'])?></td>
					</tr>
					<tr>
						<td>Uraian</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['kertas_kerja_desc'])?></td>
					</tr>
					<tr>
						<td>kesimpulan</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['kertas_kerja_kesimpulan'])?></td>
					</tr>
					<tr>
						<td>File Kertas Kerja</td>
						<td>:</td>
						<td>
						<?php 
						$z=0;
						$rs_file = $kertas_kerjas->list_kka_lampiran($arr['kertas_kerja_id']);
						while($arr_file = $rs_file->FetchRow()){
						$z++;
						?>
							<a href="#" onclick="window.open('<?=$Helper->baseurl("Upload_KKA").$arr_file['kka_attach_filename']?>','_blank')"><u><strong><?=$arr_file['kka_attach_filename']?></strong></u></a><br>
						<?php 
						}
						?>
						</td>
					</tr>
					<tr>
						<td>Detail komentar</td>
						<td>:</td>
						<td>
						<table border="0">
						<?php 
						$z = 0;
						while ( $arr_komentar = $rs_komentar->FetchRow () ) {
							$z ++;
							Carbon::setLocale('id');
							$diff = new Carbon(date('Y-m-d H:i:s', $arr_komentar['kertas_kerja_comment_date']));
							?>
									<tr>
										<td><?= $z ?>. </td><td><?= $arr_komentar['auditor_name'] ?> :</td><td>"<?= $Helper->text_show($arr_komentar['kertas_kerja_comment_desc']) ?>"</td><td style="text-align: left;"><?= $diff->diffForHumans() ?></td>
									</tr>
							<?
							// echo $z.". ".$arr_komentar['auditor_name']." : ".$Helper->text_show($arr_komentar['kertas_kerja_comment_desc'])."&nbsp;<b>".$diff->diffForHumans()."</b><br>";
						}
						?>
						</table>
						</td>
					</tr>
				</table>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Isi Komentar</label>
				<textarea id="komentar" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['kertas_kerja_id']?>">	
			<input type="hidden" name="status_kka" value="<?=$status?>">	
		<?
				break;
		}
		?>
			<fieldset class="form-group">
				<center>
				<?
				if($_action != "getajukan_kka" && $_action != "getapprove_kka"){
				?>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp;
				<?
				}
				if($_action != "getdetail"){
				?>
					<input type="submit" class="btn btn-success" value="Simpan">
				<?php 
				}else{
				?>	
					<input type="button" class="btn btn-primary" value="ms-word" onClick="window.open('App/Modules/AuditManagement/kertas_kerja_print.php?id=<?=$arr['kertas_kerja_id']?>', '_blank','toolbar=no,location=no,status=no,menubar=yes,scrollbars=yes,resizable=yes');">
				<?
				}
				?>
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
<script>
$('#tambah_auditee').on('click', function(e){
	e.preventDefault();
	var no = $('#tabel_auditee tr:last').attr('id');
	no++;
	var new_row = '<tr id="'+no+'">'
			+ '<td align="center">'+no+'.</td>'
			+ '<td><input type="file" class="span4" name="kka_attach[]"></td>'
			+ '<td class="text-center"><button class="btn btn-danger auditee_remove btn-circle"><i class="fa fa-trash-o"></i></button></td>'
		+ '</tr>';
	$('#tabel_auditee tbody').append(new_row);
});

$("#tabel_auditee").on("click", ".auditee_remove", function(e){
	e.preventDefault();
	$(this).parents("tr").remove();
});

$("#kertas_kerja_date").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true
}); 

$('textarea').focus(function () {
   checkContentSize("komentar");
});
$('textarea').focusout(function(){
    $(this).animate({ height: "3em" }, 500); 
});
$('textarea').keypress(function (e) {
  if (e.which == 13) {
     checkContentSize("komentar");
  }
});

function has_scrollbar(elem_id){ 
    elem = document.getElementById(elem_id); 
    if (elem.clientHeight < elem.scrollHeight){
        alert("The element #" + elem_id + " has a vertical scrollbar!"); 
    }else{
        alert("The element #" + elem_id + " doesn't have a vertical");
    } ;
}

function checkContentSize(elem_id){
 	elem = document.getElementById(elem_id); 
    console.log(elem.clientHeight);
    if (elem.clientHeight < elem.scrollHeight){
        $( "#" + elem_id + "" ).animate({ height: elem.scrollHeight + 5}, 500); 
    }
}

$(function() {
	$("#validation-form").validate({
			rules: {
				no_kka: "required",
				kertas_kerja_date: "required"
				// kertas_kerja_jam: "required"
			},
			messages: {
					no_kka: "Masukan Nomor Kertas Kerja",
					kertas_kerja_date : "Silahkan Masukan Tanggal KKA"
					// kertas_kerja_jam : "Silahkan Masukan Jumlah Jam KKA"
					},
			submitHandler: function(form) {
				form.submit();
			}
		});
});
</script>