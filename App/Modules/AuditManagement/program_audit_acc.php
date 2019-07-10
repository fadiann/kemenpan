<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<!-- <script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script> -->
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<!-- <link rel="stylesheet" href="Public/js/select2/select2.css" type="text/css" />
<script type="text/javascript" src="Public/js/select2/select2.min.js"></script> -->
<script type="text/javascript" src="Public/js/jquery.loadTemplate-1.4.1.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">

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
				<label class="col-sm-3 control-label">Satuan Kerja <span class="required">*</span></label>
				<div class="col-sm-5">
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo ( "auditee", $arr_auditee, 0, 1, "", "", "", false, true, false );
				?>
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Auditor <span class="required">*</span></label>
				<div class="col-sm-5">
				<?php
				$rs_auditor = $assigns->view_auditor_assign ( $ses_assign_id );
				$arr_auditor = $rs_auditor->GetArray ();
				echo $Helper->buildCombo ( "auditor", $arr_auditor, 0, 1, "", "", "", false, true, false );
				?>
				</div>
			</fieldset>
			<!-- <fieldset class="form-group">
				<label class="col-sm-3 control-label">Waktu ( Jam ) <span class="required">*</span></label> 
				<div class="col-sm-2">
				<input type="number" class="form-control" name="jamm" id="jamm">
				</div>
			</fieldset> -->
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Aspek Program Audit</label>
				<div class="col-sm-5">
					<?=$Helper->dbCombo("aspek_id", "par_aspek", "aspek_id", "aspek_name", "and aspek_del_st  = 1 ", "", "", 1)?>
					<!-- <input type="hidden" name="ref_program" id="ref_program" class="select2 multiple form-control"/> -->
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col col-md-3 control-label">Referensi Program Audit</label>
				<span class="col col-md-9">
					<div id="daftar_pka"></div>
				</span>
			</fieldset>
			<!-- <fieldset class="form-group">
				<label class="col-sm-3 control-label">Referensi Program Audit</label>
				<div class="col-sm-5">
					<?=$Helper->dbCombo("aspek_id", "par_aspek", "aspek_id", "aspek_name", "and aspek_del_st  = 1 ", "", "", 1)?>
					<input type="hidden" name="ref_program" id="ref_program" class="select2 multiple form-control"/>
				</div>
			</fieldset> -->
			<!-- <fieldset class="form-group">
				<label class="col-sm-3 control-label">Rincian Ref</label>
				<div class="col-sm-5">
				<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed mb-none">
					<thead>
						<tr>
							<th width="10%">kode</th>
							<th width="30%">Judul</th>
							<th width="60%">Procedure</th>
						</tr>
					</thead>
					<tbody id="table_desc">

					</tbody>
				</table>
				</div> -->
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Lampiran</label>
				<div class="col-sm-5"><input type="file" class="form-control" name="attach" id="attach"></div>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja <span class="required">*</span></label>
				<div class="col-sm-5">
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo ( "auditee_id", $arr_auditee, 0, 1, $arr ['program_id_auditee'], "", "", false, true, false );
				?> 
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Auditor <span class="required">*</span></label>
				<div class="col-sm-5">
				<?php
				$rs_auditor = $assigns->view_auditor_assign ( $ses_assign_id );
				$arr_auditor = $rs_auditor->GetArray ();
				echo $Helper->buildCombo ( "auditor", $arr_auditor, 0, 1, $arr ['program_id_auditor'], "", "", false, true, false );
				?>
				</div>
			</fieldset>
			<!-- <fieldset class="form-group">
				<label class="col-sm-3 control-label">Waktu ( Jam ) <span class="required">*</span></label> 
				<div class="col-sm-2">
				<input type="number" class="form-control" name="jamm" id="jamm" value="<?=$arr['program_jam'];?>">
				</div>
			</fieldset> -->
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Aspek Program Audit</label>
				<div class="col-sm-5">
					<?=$Helper->dbCombo("aspek_id", "par_aspek", "aspek_id", "aspek_name", "and aspek_del_st  = 1 ", "", "", 1)?>
					<!-- <input type="hidden" name="ref_program" id="ref_program" class="select2 multiple form-control"/> -->
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col col-md-3 control-label">Referensi Program Audit</label>
				<span class="col col-md-9">
					<div id="daftar_pka"></div>
				</span>
			</fieldset>
			<fieldset class="form-group">
					<label class="col-md-3 control-label">Rincian Ref</label>
					<span class="col-md-9">
					<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th width="10%">kode</th>
								<th width="30%">Judul</th>
								<th width="60%">Procedure</th>
							</tr>
						</thead>
						<tbody id="table_desc">
						<?php
						$rs_detail = $params->get_ref_desc ( $arr ['program_id_ref'] );
						while ( $arr_detil = $rs_detail->FetchRow () ) {
						?>
						<tr class="row_item">
							<td><span data-content="kode"><?=$arr_detil ['ref_program_code']?></span></td>
							<td><span data-content="judul"><?=$arr_detil ['ref_program_title']?></span></td>
							<td><span data-content="procedure"><?=$arr_detil ['ref_program_procedure']?></span></td>
						</tr>
						<?
						}
						?>
						</tbody>
					</table>
					</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Lampiran</label>
				<div class="col-sm-5">
				<input type="hidden" class="form-control" name="attach_old" value="<?=$arr['program_lampiran']?>"> 
				<input type="file" class="form-control" name="attach" id="attach">
				<label class="col-sm-3 control-label"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_ProgramAudit").$arr['program_lampiran']?>','_blank')"><?=$arr['program_lampiran']?></a></label>
				</div>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['program_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
			
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja</label>
				<?=$arr['auditee_name']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Auditor</label>
				<?=$arr['auditor_name']?>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Waktu ( Jam )</label> <label class="col-md-5"><?=$arr['program_jam']?></label>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Referensi Program Audit</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed mb-none">
					<thead>
						<tr>
							<th width="10%">kode</th>
							<th width="30%">Judul</th>
							<th width="60%">Procedure</th>
						</tr>
					</thead>
					<tbody id="table_desc">
					<?php
					$rs_detail = $params->get_ref_desc ( $arr ['program_id_ref'] );
					while ( $arr_detil = $rs_detail->FetchRow () ) {
					?>
					<tr class="row_item">
						<td><span data-content="kode"><?=$arr_detil ['ref_program_code']?></span></td>
						<td><span data-content="judul"><?=$arr_detil ['ref_program_title']?></span></td>
						<td><span data-content="procedure"><?=$arr_detil ['ref_program_procedure']?></span></td>
					</tr>
					<?
					}
					?>
					</tbody>
				</table>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Lampiran</label>
				<label class="col-sm-3 control-label"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_ProgramAudit").$arr['program_lampiran']?>','_blank')"><?=$arr['program_lampiran']?></a></label>
			</fieldset>
		<?
				break;
			case "getajukan_pka" :
			case "getapprove_pka" :
				$arr = $rs->FetchRow ();
				?>
			
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Satuan Kerja</label>
				<label class="span7"><?=$arr['auditee_name']?></label>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Auditor</label>
				<label class="span07"><?=$arr['auditor_name']?></label>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Waktu ( Jam )</label> <label class="span0"><?=$arr['program_jam']?></label>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Referensi Program Audit</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed mb-none">
					<thead>
						<tr>
							<th width="10%">kode</th>
							<th width="30%">Judul</th>
							<th width="60%">Procedure</th>
						</tr>
					</thead>
					<tbody id="table_desc">
					<?php
					$rs_detail = $params->get_ref_desc ( $arr ['program_id_ref'] );
					while ( $arr_detil = $rs_detail->FetchRow () ) {
					?>
					<tr class="row_item">
						<td><span data-content="kode"><?=$arr_detil ['ref_program_code']?></span></td>
						<td><span data-content="judul"><?=$arr_detil ['ref_program_title']?></span></td>
						<td><span data-content="procedure"><?=$Helper->text_show($arr_detil ['ref_program_procedure'])?></span></td>
					</tr>
					<?
					}
					?>
					</tbody>
				</table>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Lampiran</label>
				<label class="col-sm-3 control-label"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_ProgramAudit").$arr['program_lampiran']?>','_blank')"><?=$arr['program_lampiran']?></a></label>
			</fieldset>		
			<?php
			$z = 0;
			$rs_komentar = $programaudits->program_audit_komentar_viewlist ( $arr ['program_id'] );
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">detail komentar</label>
					<table>
					<tbody>
						<?php
				$z = 0;
				while ( $arr_komentar = $rs_komentar->FetchRow () ) {
					$z ++;
					?>
						<tr>
							<td><?= $z ?>. </td><td><?= $arr_komentar['auditor_name']." : ".$arr_komentar['program_comment_desc'] ?></td>
						</tr>
				<?php
				}
				?>	
					</tbody>
				</table>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Isi Komentar</label> <input type="text" class="span7" name="komentar">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['program_id']?>">
			<input type="hidden" name="status_pka" value="<?=$status?>">
		<?
				break;
		}
		?>
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali"
						onclick="location='<?=$def_page_request?>'">
					<?php if($_action!='getdetail'){?>
					&nbsp;&nbsp;&nbsp;
					<input type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
					<?php }?>	
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
<script>
var data = [];
<?php
$rsRef = $params->ref_program_data_viewlist ();
$i = 0;
foreach ( $rsRef->GetArray () as $row ) :
?>
		data[<?php echo $i?>] = {"id":'<?php echo $row['ref_program_id']?>', "text":'<?=$row['ref_program_code']." - ".$row['ref_program_title']?>'};
<?php
	$i ++;
endforeach
;
?>

$(document).ready(function() {
  $("#ref_program").select2({
    placeholder:"Ketikkan kode atau nama Refensi Program Audit",
    tokenSeparators: [",", " "],
    multiple: true,
    width:'317px',
    data: data
  });
});

$("#ref_program").on("change", function(){
	  var id_sub = $(this).val();
	  console.log(id_sub);
	  $.ajax({
		url: 'App/Modules/AuditManagement/ajax.php?data_action=getDesc_refProg',
		type: 'POST',
		dataType: 'json',
		data: {id_sub: id_sub},
		success: function(data) {
			 $("#table_desc").empty();
			$.each(data.desc, function(i, item) {				
				$("#table_desc").loadTemplate("#table_tmp", 
					{
						kode : item.kode,
						judul : item.judul,
						procedure : item.procedure
					},
					{
						prepend: true
					});
			});	
		}
	  });
});

$(function() {
	$("#validation-form").validate({
		rules: {
			auditee: "required",
			auditor: "required",
			jamm: "required"
		},
		messages: {
			auditee: "Silahkan Pilih Satuan Kerja",
			auditor: "Silahkan Pilih Auditor",
			jamm: "Silahkan Masukan Anggaran Waktu"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});

/*FUNGSI PKA*/
$('#aspek_id').change(function(){
    $.ajax({
		/*var id	= $(this).val();*/
		type: 'post',
		data: {'id':  $(this).val() },
		url: 'App/Modules/AuditManagement/ajax.php?data_action=getpka',
		dataType: 'html',
		success: function(res){
			/*console.log(res);*/
			$('#daftar_pka').empty();
		   	$('#daftar_pka').append(res);
		}
	});
});
function check_uncheck_checkbox(isChecked) {
	if(isChecked) {
		$('input[name="ref_program[]"]').each(function() {
			this.checked = true;
		});
	} else {
		$('input[name="ref_program[]"]').each(function() {
			this.checked = false;
		});
	}
}
</script>


<script type="text/html" id="table_tmp">
	<tr class="row_item">
		<td><span data-content="kode"></span></td>
		<td><span data-content="judul"></span></td>
		<td><span data-content="procedure"></span></td>
	</tr>
</script>