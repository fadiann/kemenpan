<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="Public/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="Public/js/jquery.loadTemplate-1.4.1.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
		<form method="post" name="f" action="#" class="form-horizontal validation-form"
			id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
		?>
			
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Auditee <span class="required">*</span></label>
					<div class="col-sm-5">
					<?php
					$rs_auditee = $plannings->planning_auditee_viewlist ( $ses_plan_id );
					$arr_auditee = $rs_auditee->GetArray ();
					echo $Helper->buildCombo_risk ( "auditee_id", $arr_auditee, 1, 2, "", "", false, true, false );
					?>
					
					</div>
					<div class="col-sm-4 text-left">
						<a href="#" class="btn btn-primary" id="tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
						<a href="#" class="btn btn-danger" id="hapus"><i class="fa fa-trash-o"></i> Hapus</a>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Tanggal</label>
					<div class="col-sm-2">
					<input type="text" class="form-control tanggal_awal" name="tanggal_awal" id="tanggal_awal" value="<?=$Helper->dateIndo($arr_plan['audit_plan_start_date'])?>" autocomplete="off"> 
					<input type="hidden" class="form-control" name="tanggal_awal_ori" id="tanggal_awal_ori" value="<?=$Helper->date_db($arr_plan['audit_plan_start_date'])?>" autocomplete="off"> 
					</div>
					<div class="col-sm-1 text-center">s/d</div> 
					<div class="col-sm-2">
					<input type="text" class="form-control tanggal_akhir" name="tanggal_akhir" id="tanggal_akhir" value="<?=$Helper->dateIndo($arr_plan['audit_plan_end_date'])?>" autocomplete="off">
					<input type="hidden" class="form-control" name="tanggal_akhir_ori" id="tanggal_akhir_ori" value="<?=$Helper->date_db($arr_plan['audit_plan_end_date'])?>" autocomplete="off"> 
					</div>
				</fieldset>
			<div class="clone">
				<div class="child">
				<fieldset class="form-group">
					<div class="col-sm-10"><h5 class="text-center">------ AUDITOR ------</h5></div>
				</fieldset>
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Auditor <span class="mandatory">*</span></label>
					<div class="col-sm-5">
					<?=$Helper->dbComboAuditor("anggota_id[]", "auditor", "auditor_id", "auditor_name", "and auditor_del_st = 1 ", "", "", 1, "order by auditor_name", "", "", "selectsatu")?>
					<? /*
					<label class="form-control">Golongan : </label> 
					<label class="span0" id="gol"></label> <span class="required">*</span>
					*/ ?>
					</div>
				</fieldset>
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Posisi <span class="mandatory">*</span></label>
					<div class="col-sm-5">
					<?=$Helper->dbComboAuditor("posisi_id[]", "par_posisi_penugasan", "posisi_id", "posisi_name", "and posisi_del_st = 1 ", "", "", 1, "order by posisi_sort", "", "", "selectdua")?>
					</div>
				</fieldset>
				</div>
			</div>
			<div class="copy">
			</div>
			<script> 
				$(document).ready(function() {
					$('.selectsatu').select2();
					$('.selectdua').select2();
					$("#tambah").click(function() { 
						$('.selectsatu').select2('destroy');
						$('.selectdua').select2('destroy');
						var selectorParant = $('.clone').html();
						$(".copy").append(selectorParant); 
						$('.selectsatu').select2();
						$('.selectdua').select2();
					}); 
					$("#hapus").click(function() { 
						$(".copy .child:last-child").remove();
					}); 
				}); 
			</script> 
			<!-- <fieldset class="form-group">
				<label class="col-sm-3 control-label">Rincian Biaya</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed mb-none">
					<thead>
						<tr>
							<th width="40%">SBU</th>
							<th width="10%">Jumlah Hari</th>
							<th width="20%">Nilai Rupiah</th>
							<th width="20%">Total</th>
						</tr>
					</thead>
					<tbody id="table_sbu">

					</tbody>
				</table>
			</fieldset> -->
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>		
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Auditee <span class="mandatory">*</span></label>
					<div class="col-sm-5">
				<?php
				$rs_auditee = $plannings->planning_auditee_viewlist ( $ses_plan_id );
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo_risk ( "auditee_id", $arr_auditee, 1, 2, $arr ['plan_auditor_id_auditee'], "", false, true, false );
				?>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tanggal <span class="mandatory">*</span></label>
					<div class="col-sm-2">
				<input type="text" class="form-control tanggal_awal" name="tanggal_awal" id="tanggal_awal" value="<?=$Helper->dateIndo($arr['plan_auditor_start_date'])?>" autocomplete="off"> 
				<input type="hidden" class="form-control" name="tanggal_awal_ori" id="tanggal_awal_ori" value="<?=$arr['plan_auditor_start_date']?>"> 
					</div>
					<div class="col-sm-1 text-center">s/d</div> 
					<div class="col-sm-2">
				<input type="text" class="form-control tanggal_akhir" name="tanggal_akhir" id="tanggal_akhir" value="<?=$Helper->dateIndo($arr['plan_auditor_end_date'])?>" autocomplete="off">
				<input type="hidden" class="form-control" name="tanggal_akhir_ori" id="tanggal_akhir_ori" value="<?=$arr['plan_auditor_end_date']?>"> 
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Auditor <span class="mandatory">*</span></label>
					<div class="col-sm-5">
				<?=$Helper->dbCombo("anggota_id", "auditor", "auditor_id", "auditor_name", "and auditor_del_st = 1 ", $arr['plan_auditor_id_auditor'], "", 1, "order by auditor_name")?>
				<? /*
				<label class="form-control">Golongan : </label> 
				<label class="span0" id="gol"><?=$arr['auditor_golongan'];?></label> 
				<span class="required">*</span>
				
				*/ ?>
					</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Posisi <span class="mandatory">*</span></label>
					<div class="col-sm-5">
				<?=$Helper->dbCombo("posisi_id", "par_posisi_penugasan", "posisi_id", "posisi_name", "and posisi_del_st = 1 ",  $arr['plan_auditor_id_posisi'], "", 1)?>
				
					</div>
			</fieldset>
			<? /*
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Rincian Biaya</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed mb-none">
					<thead>
						<tr>
							<th width="40%">SBU</th>
							<th width="10%">Jumlah Hari</th>
							<th width="20%">Nilai Rupiah</th>
							<th width="20%">Total</th>
						</tr>
					</thead>
					<tbody id="table_sbu">
					<?php
				$rs_detail = $plannings->plan_auditor_detil_viewlist ( $arr ['plan_auditor_id'] );
				while ( $arr_detil = $rs_detail->FetchRow () ) {
				?>
					<tr class="row_item">
						<td><input type="hidden" class="idsbu" data-value="idsbu" name="idsbu[]" value="<?=$arr_detil ['anggota_plan_detil_nama_sbu']?>"/><span data-content="idsbu"><?=$arr_detil ['anggota_plan_detil_nama_sbu']?></span></td>
						<td class="text-right"><input type="text" class="form-control text-right jml_hari" data-value="jml_hari" name="jml_hari[]" value="<?=$arr_detil ['anggota_plan_detil_jml_hari']?>"/></td>
						<td class="text-right"><input type="text" class="form-control text-right nilai" data-value="nilai" name="nilai[]" readonly value="<?=$arr_detil ['anggota_plan_detil_nilai']?>"/></td>
						<td class="text-right"><input class="total_biaya" type="hidden" data-value="total_biaya" name="total_biaya[]"  value="<?=$arr_detil ['anggota_plan_detil_total']?>"/><span class="total_biaya" data-content="total_biaya"><?=$arr_detil ['anggota_plan_detil_total']?></span></td>
					</tr>
				<?
				}
				?>
					</tbody>
				</table>
			</fieldset>
			*/ ?>
			<input type="hidden" name="data_id"
				value="<?=$arr['plan_auditor_id']?>">	
		<?
				break;
		}
		?>
			<fieldset class="form-group mt-md">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> 
					<input type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=@$_nextaction?>">
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
<script>
$(".tanggal_awal").datepicker({
	dateFormat: 'dd-mm-yy',
	nextText: "",
	prevText: "",
	changeYear: true,
	changeMonth: true,
	minDate: '<?=$Helper->dateIndo($arr_plan['audit_plan_start_date'])?>',
	maxDate: '<?=$Helper->dateIndo($arr_plan['audit_plan_end_date'])?>'
});  
$(".tanggal_akhir").datepicker({
	dateFormat: 'dd-mm-yy',
	nextText: "",
	prevText: "",
	changeYear: true,
	changeMonth: true,
	minDate: '<?=$Helper->dateIndo($arr_plan['audit_plan_start_date'])?>',
	maxDate: '<?=$Helper->dateIndo($arr_plan['audit_plan_end_date'])?>'
});  

$("#biaya_audit").maskMoney({precision: 0});

$("#auditee_id").on('change', function(){
	$("#table_sbu").empty();
    getSbu();
});

$("#anggota_id").on('change', function(){
	$("#table_sbu").empty();
	var id_auditor = $(this).val();
	$.ajax({
		url: 'App/Modules/AuditManagement/ajax.php?data_action=getgol_auditor',
		type: 'POST',
		dataType: 'text',
		data: {id_auditor: id_auditor},
		success: function(data) {
			$("#gol").text(data);
		    getSbu();		
		}
	});
});

$(function() {
	$(".validation-form").validate({
		rules: {
			auditee_id: "required",
			anggota_id: "required",
			posisi_id: "required"
		},
		messages: {
			auditee_id: "Silahkan Pilih Auditee",
			anggota_id: "Silahkan Pilih Anggota",
			posisi_id: "Silahkan Pilih Posisi Anggota"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});

function getSbu(){
	var idsatker = $("#auditee_id option:selected").val(),
		golongan = $("#gol").text(),
		tanggal_awal = $("#tanggal_awal_ori").val(),
		tanggal_akhir = $("#tanggal_akhir_ori").val(),
		awal_akhir =  (tanggal_akhir-tanggal_awal)/86400,
		default_hari = 0;
		
	console.log('get prov : '+idsatker+", golongan : "+golongan);
	$.ajax({
		url: 'App/Modules/AuditManagement/ajax.php?data_action=getsbu_rinci',
		type: 'POST',
		dataType: 'json',
		data: {idsatker: idsatker, golongan:golongan},
		success: function(data) {	
			 $("#table_sbu").empty();
			 $.each(data.sbu_rinci, function(i, item) {
				 
				console.log(item.status+" = "+awal_akhir);
				if(item.status==1) default_hari = awal_akhir;
				else if(item.status==2) default_hari = awal_akhir-1;
				else if(item.status==3) default_hari = 1;
				else default_hari = 0;
				
				$("#table_sbu").loadTemplate("#table_sbu_tmpl", 
					{
						idsbu : item.sbu,
						jml_hari : default_hari,
						nilai : item.amount,
						total_biaya : default_hari*item.amount
					},
					{
						prepend: true
					});
			});

			$("#table_sbu").on('keyup', '.jml_hari', function(e){
				console.log('test');
				$row_item = $(e.currentTarget).closest(".row_item");

				value = $row_item.find('.jml_hari').val()*$row_item.find('.nilai').val();
				console.log(value);

				$row_item.find('span.total_biaya').text(value);
				$row_item.find('input.total_biaya').val(value);
			});
		}
	});
}

$(function() {
	$("#table_sbu").on('keyup', '.jml_hari', function(e){
		var jml_hari = $(this).val(),
		nilai = $(this).parent().next().find(".nilai").val(),
		total = $(this).parent().next().next().find(".total_biaya");

		value = jml_hari*nilai;
		console.log(value+"="+jml_hari+'*'+nilai);

		total.val(value);
		total.text(value);
	});
});

</script>

<script type="text/html" id="table_sbu_tmpl">
	<tr class="row_item">
		<td><input type="hidden" class="idsbu" data-value="idsbu" name="idsbu[]"/><span data-content="idsbu"></span></td>
		<td class="text-right"><input type="text" class="form-control text-right jml_hari" data-value="jml_hari" name="jml_hari[]"/></td>
		<td class="text-right"><input type="text" class="form-control text-right nilai" data-value="nilai" name="nilai[]" readonly/></td>
		<td class="text-right"><input class="total_biaya" type="hidden" data-value="total_biaya" name="total_biaya[]"/><span class="total_biaya" data-content="total_biaya"></span></td>
	</tr>
</script>