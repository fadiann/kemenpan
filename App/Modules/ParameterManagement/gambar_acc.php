<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/css/bootstrap.min.js"></script>
<section id="main" class="column">
	<?
	if (!empty($view_parrent)) {
	include_once $view_parrent;
	}
	?>
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data">
			<?
			switch ($_action) {
			case "getadd":
			?>
			<fieldset class="form-group">					
				<!-- <label>Lampiran</label> -->
				<!-- <br><br><br> -->
				<input type="button" id="tambah_auditee" class="blue_btn" value="Tambah Baris">
				<br>
				<br>
				<table id="tabel_auditee" width="60%">
					<thead>
						<tr>
							<th align="center" width="5%">No.</th>
							<th align="left" width="30%">Gambar</th>
							<th align="left" width="10%">Sort</th>
							<th width="5%">&nbsp;</th>
						</tr>
					</thead>
					<tbody>
						<tr id="1">
							<td align="center">1.</td>
							<td><input type="file" class="span4" name="gambar_name[]"></td>
							<td><input type="number" class="span4" name="sort[]"></td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
			</fieldset>
			<?
			break;
			}
			?>
			<fieldset class="form-group">
				<center>
				<?php
				// }
				if($_action != "getedit" && $_action != "getdetail"){
				?>
				<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'">
				<input type="submit" class="btn btn-success" value="Simpan">
				&nbsp;&nbsp;&nbsp;
				<?php } ?>
				<input type="hidden" name="data_id" value="<?= $ses_kka_id ?>">
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</form>
			</center>
		</fieldset>
	</article>
</section>
<script>
$('#tambah_auditee').on('click', function(e){
	e.preventDefault();
	var no = $('#tabel_auditee tr:last').attr('id');
	no++;
	var new_row = '<tr id="'+no+'">'
		+ '<td align="center">'+no+'.</td>'
		+ '<td><input type="file" class="span4" name="gambar_name[]"></td>'
		+ ''
		+ '<td><input type="number" class="span4" name="sort[]"></td>'
		+ '<td><button class="btn auditee_remove">-</button></td>'
		+ '</tr>';
	$('#tabel_auditee tbody').append(new_row);
});

$("#tabel_auditee").on("click", ".auditee_remove", function(e){
	e.preventDefault();
	$(this).parents("tr").remove();
});
$('#simpan_history').click(function(){
	var data = $("#validation-form").serialize();
	$.ajax({
		url: 'AuditManagement/history_kka.php',
		type: 'POST',
		data: data,
		success: function(data) {
			window.location.reload();
			alert('Berhasil menyimpan history KKA!');
		}
	});
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
	} else {
		alert("The element #" + elem_id + " doesn't have a vertical");
	}
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
			kertas_kerja_date: "required",
			kertas_kerja_jam: "required"
		},
		messages: {
				no_kka: "Masukan Nomor Kertas Kerja",
				kertas_kerja_date : "Silahkan Masukan Tanggal KKA",
				kertas_kerja_jam : "Silahkan Masukan Jumlah Jam KKA"
				},
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>