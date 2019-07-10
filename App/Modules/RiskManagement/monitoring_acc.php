<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<section id="main" class="column">		
		<?
		include 'risk_view_parrent.php';
		?>
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal"
			id="validation-form" enctype="multipart/form-data">
		<?
		switch ($_action) {
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="span3">Kategori Risiko</label>
				<?php echo $arr['risk_kategori']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Nomor Risiko</label>
				<?php echo $arr['identifikasi_no_risiko']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Nama Risiko</label>
				<?php echo $arr['identifikasi_nama_risiko']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Nilai Risiko Residu</label>
				<?php echo $arr['evaluasi_risiko_residu']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Rencana Aksi</label>
				<?php echo $arr['penanganan_plan']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Rencana Waktu</label>
				<?php echo $Helper->dateIndo($arr['penanganan_date'])?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">PIC</label>
				<?php echo $arr['pic_name']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Penanganan Risiko Yang telah di lakukan</label>
				<textarea class="cmb_risk_1 span6" id="penanganan_risiko_yg_telah_dilakukan" name="penanganan_risiko_yg_telah_dilakukan" style="height: 3em; font-size: 8pt;"><?=$arr['monitoring_action']?></textarea>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Lampiran</label> <input type="file" class="span4" name="attach[]" id="attach" multiple="" onChange="makeFileList();"> 
				<label class="fileList_label"></label>
				<ul id="fileList">
					<li>No Files Selected</li>
				</ul>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">List Lampiran</label> 
					<?php 
					$rs_file = $risks->list_risk_attach($arr['identifikasi_id']);
					while($arr_file = $rs_file->FetchRow()){
					?>
						<a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Risk").$arr_file['iden_attach_name']?>','_blank')"><?=$arr_file['iden_attach_name']?></a>, &nbsp;&nbsp; 
					<?php 
					}
					?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Waktu Pelaksanaan</label> <input type="text"
					class="span1" name="pelaksanaan_date" id="pelaksanaan_date"
					value="<?=$Helper->dateIndo($arr['monitoring_date'])?>">
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Penanganan Risiko Yang Akan Dilaksanakan</label>
				<textarea class="cmb_risk_2 span6" id="penanganan_risiko_yg_akan_dilakukan" name="penanganan_risiko_yg_akan_dilakukan" style="height: 3em; font-size: 8pt;"><?=$arr['monitoring_plan_action']?></textarea>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Tenggat Waktu</label> <input type="text"
					class="span1" name="tenggat_date" id="tenggat_date"
					value="<?=$Helper->dateIndo($arr['monitoring_tenggat_waktu'])?>">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['identifikasi_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="span3">Kategori Risiko</label>
				<?php echo $arr['risk_kategori']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Nomor Risiko</label>
				<?php echo $arr['identifikasi_no_risiko']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Nama Risiko</label>
				<?php echo $arr['identifikasi_nama_risiko']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Nilai Risiko Risidu</label>
				<?php echo $arr['evaluasi_risiko_residu']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Rencana Aksi</label>
				<?php echo $arr['penanganan_plan']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Rencana Waktu</label>
				<?php echo $Helper->dateIndo($arr['penanganan_date'])?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">PIC</label>
				<?php echo $arr['pic_name']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Penanganan Risiko Yang telah di lakukan</label>
				<?php echo $arr['monitoring_action']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Lampiran</label> 
					<?php 
					$rs_file = $risks->list_risk_attach($arr['identifikasi_id']);
					while($arr_file = $rs_file->FetchRow()){
					?>
						<a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Risk").$arr_file['iden_attach_name']?>','_blank')"><?=$arr_file['iden_attach_name']?></a>, &nbsp;&nbsp; 
					<?php 
					}
					?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Waktu Pelaksanaan</label>
				<?=$Helper->dateIndo($arr['monitoring_date'])?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Penanganan Risiko Yang Akan Dilaksanakan</label>
				<?php echo $arr['monitoring_plan_action']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="span3">Tenggat Waktu</label>
				<?=$Helper->dateIndo($arr['monitoring_tenggat_waktu'])?>
			</fieldset>
		<?
				break;
		}
		?>
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali"
						onclick="location='<?=$def_page_request?>'">
					<?
					if ($_action != 'getdetail') {
						?>
					&nbsp;&nbsp;&nbsp;
					<input type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">	
					<?
					}
					?>
			</fieldset>
		</form>
	</article>
</section>
<script>
function makeFileList() {
	var input = document.getElementById("attach");
	var label = document.getElementById("fileList_label");
	var ul = document.getElementById("fileList");
	while (ul.hasChildNodes()) {
		ul.removeChild(ul.firstChild);
	}
	for (var i = 0; i < input.files.length; i++) {
		var li = document.createElement("li");
		label.text(input.files[i].name);
		li.innerHTML = input.files[i].name;
		ul.appendChild(li);
	}
	if(!ul.hasChildNodes()) {
		var li = document.createElement("li");
		li.innerHTML = 'No Files Selected';
		ul.appendChild(li);
	}
}

$("#pelaksanaan_date").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true
}); 
$("#tenggat_date").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true,
	 minDate:0
}); 

$('textarea.cmb_risk_1').focus(function () {
   	checkContentSize("penanganan_risiko_yg_telah_dilakukan");
});
$('textarea.cmb_risk_1').focusout(function(){
    $(this).animate({ height: "3em" }, 500); 
});
$('textarea.cmb_risk_1').keypress(function (e) {
  	if (e.which == 13) {
     	checkContentSize("penanganan_risiko_yg_telah_dilakukan");
  	}
});

$('textarea.cmb_risk_2').focus(function () {
   	checkContentSize("penanganan_risiko_yg_akan_dilakukan");
});
$('textarea.cmb_risk_2').focusout(function(){
    $(this).animate({ height: "3em" }, 500); 
});
$('textarea.cmb_risk_2').keypress(function (e) {
  	if (e.which == 13) {
     	checkContentSize("penanganan_risiko_yg_akan_dilakukan");
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
</script>