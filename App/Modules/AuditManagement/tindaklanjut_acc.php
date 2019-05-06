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
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset>
				<label class="span2">Tindak Lanjut</label>
			</fieldset>
			<fieldset class="hr">
				<textarea class="ckeditor" cols="10" rows="40" name="tl_desc" id="tl_desc"></textarea>
			</fieldset>
			<fieldset class="hr">
				<br>
					<input type="button" id="tambah_auditee" class="blue_btn" value="Tambah Baris">
					<br>
					<br>
					<table id="tabel_auditee" width="60%">
						<thead>
							<tr>
								<th align="center" width="5%">No.</th>
								<th align="left" width="30%">Lampiran</th>
								<th width="5%">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr id="1">
								<td align="center">1.</td>
								<td><input type="file" class="span4" name="tl_attach[]"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset>
				<label class="span2">Tindak Lanjut</label>
			</fieldset>
			<fieldset class="hr">
				<textarea class="ckeditor" cols="10" rows="40" name="tl_desc" id="tl_desc"><?php echo $arr['tl_desc']?></textarea>
			</fieldset>
			<fieldset class="hr">
					<br>
					<input type="button" id="tambah_auditee" class="blue_btn" value="Tambah Baris">
					<br>
					<br>
					<table id="tabel_auditee" width="60%">
						<thead>
							<tr>
								<th align="center" width="5%">No.</th>
								<th align="left" width="30%">Lampiran</th>
								<th width="5%">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr id="1">
								<td align="center">1.</td>
								<td><input type="file" class="span4" name="tl_attach[]"></td>
								<td>&nbsp;</td>
							</tr>
						</tbody>
					</table>
					<br>
				<?php 
					$z=0;
					$rs_file = $tindaklanjuts->list_tl_lampiran($arr['tl_id']);
					while($arr_file = $rs_file->FetchRow()){
					$z++;
					?>
						<input type="checkbox" name="nama_file_<?=$z?>" value="<?=$arr_file['tl_attach_filename']?>">
						<a href="#" onclick="window.open('<?=$Helper->baseurl("Upload_Tindaklanjut").$arr_file['tl_attach_filename']?>','_blank')"><?=$arr_file['tl_attach_filename']?></a>
					<?php 
					}
					?>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['tl_id']?>">	
		<?
				break;
			case "getajukan_tl" :
			case "getapprove_tl" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<table class="view_parrent">
					<tr>
						<td width="120px">Tindak Lanjut</td>
						<td>:</td>
						<td><?=$Helper->text_show($arr['tl_desc'])?></td>
					</tr>
					<tr>
						<td width="120px">Lampiran</td>
						<td>:</td>
						<td><?php 
					$z=0;
					$rs_file = $tindaklanjuts->list_tl_lampiran($arr['tl_id']);
					while($arr_file = $rs_file->FetchRow()){
					$z++;
					?>
						<!--<input type="checkbox" name="nama_file_<?=$z?>" value="<?=$arr_file['tl_attach_filename']?>">-->
						<?= $z ?>. <a href="#" onclick="window.open('<?=$Helper->baseurl("Upload_Tindaklanjut").$arr_file['tl_attach_filename']?>','_blank')"><?=$arr_file['tl_attach_filename']?></a><br>
					<?php 
					}
					?></a></td>
					</tr>
					<tr>
						<td>Detail komentar</td>
						<td>:</td>
						<td>
						<?php 
						$z = 0;
						$rs_komentar = $tindaklanjuts->tindaklanjut_komentar_viewlist( $arr ['tl_id'] );
						while ( $arr_komentar = $rs_komentar->FetchRow () ) {
							$z ++;
							echo $z.". ".$arr_komentar['auditor_name']." : ".$arr_komentar['tl_comment_desc']."<br>";
						}
						?>
						</td>
					</tr>
				</table>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Isi Komentar</label>
				<textarea id="komentar" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
			</fieldset>
			<input type="hidden" name="status" value="<?=$status?>">
			<input type="hidden" name="data_id" value="<?=$arr['tl_id']?>">
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
					<input type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
<script>
$('#tambah_auditee').on('click', function(e){
	e.preventDefault();
	var no = $('#tabel_auditee tr:last').attr('id');
	no++;
	var new_row = '<tr id="'+no+'">'
			+ '<td align="center">'+no+'.</td>'
			+ '<td><input type="file" class="span4" name="tl_attach[]"></td>'
			+ '<td><button class="btn auditee_remove">-</button></td>'
		+ '</tr>';
	$('#tabel_auditee tbody').append(new_row);
});

$("#tabel_auditee").on("click", ".auditee_remove", function(e){
	e.preventDefault();
	$(this).parents("tr").remove();
});
$(function() {
	$("#validation-form").validate({
		rules: {
			tl_desc: "required"
		},
		messages: {
			tl_desc: "Silahkan Isi Tindak Lanjut"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>