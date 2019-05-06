<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<link rel="stylesheet" href="Public/js/select2/select2.css" type="text/css" />
<script type="text/javascript" src="Public/js/select2/select2.min.js"></script>
<script type="text/javascript" src="Public/js/jquery.loadTemplate-1.4.1.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">


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
				<label class="span2">Satuan Kerja</label>
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo ( "auditee", $arr_auditee, 0, 1, "", "", "", false, true, false );
				?><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Auditor</label>
				<?php
				$rs_auditor = $assigns->view_auditor_assign ( $ses_assign_id );
				$arr_auditor = $rs_auditor->GetArray ();
				echo $Helper->buildCombo ( "auditor", $arr_auditor, 0, 1, "", "", "", false, true, false );
				?><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Waktu ( Jam )</label> 
				<input type="text" class="span0" name="jamm" id="jamm">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Referensi Program Audit</label>
				&nbsp;&nbsp;&nbsp;<input type="hidden" name="ref_program" id="ref_program" class="select2 multiple"/>
			</fieldset>
			<fieldset>
				<label class="span2">Rincian Ref</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table_risk">
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
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Lampiran</label>
				&nbsp;&nbsp;&nbsp;<input type="file" class="span4" name="attach" id="attach">
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			
			<fieldset class="hr">
				<label class="span2">Satuan Kerja</label>
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				$arr_auditee = $rs_auditee->GetArray ();
				echo $Helper->buildCombo ( "auditee_id", $arr_auditee, 0, 1, $arr ['program_id_auditee'], "", "", false, true, false );
				?><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Auditor</label>
				<?php
				$rs_auditor = $assigns->view_auditor_assign ( $ses_assign_id );
				$arr_auditor = $rs_auditor->GetArray ();
				echo $Helper->buildCombo ( "auditor", $arr_auditor, 0, 1, $arr ['program_id_auditor'], "", "", false, true, false );
				?><span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Waktu ( Jam )</label> 
				<input type="text" class="span0" name="jamm" id="jamm" value="<?=$arr['program_jam'];?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Referensi Program Audit</label>
				<?php
				$rsRef = $params->ref_program_data_viewlist ();
				$arr_ref = $rsRef->GetArray ();
				echo $Helper->buildCombo_risk ( "ref_program", $arr_ref, 0, 2, $arr ['program_id_ref'], "", false, true, false );
				?>
			</fieldset>
			<fieldset>
				<label class="span2">Rincian Ref</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table_risk">
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
			<fieldset class="hr">
				<label class="span2">Lampiran</label>
				<input type="hidden" class="span4" name="attach_old" value="<?=$arr['program_lampiran']?>"> 
				<input type="file" class="span4" name="attach" id="attach">
				<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_ProgramAudit").$arr['program_lampiran']?>','_blank')"><?=$arr['program_lampiran']?></a></label>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['program_id']?>">	
		<?
				break;
			case "getdetail" :
				$arr = $rs->FetchRow ();
				?>
			
			<fieldset class="hr">
				<label class="span2">Satuan Kerja</label>
				<?=$arr['auditee_name']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Auditor</label>
				<?=$arr['auditor_name']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Waktu ( Jam )</label> <label class="span0"><?=$arr['program_jam']?></label>
			</fieldset>
			<fieldset>
				<label class="span2">Referensi Program Audit</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table_risk">
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
			<fieldset class="hr">
				<label class="span2">Lampiran</label>
				<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_ProgramAudit").$arr['program_lampiran']?>','_blank')"><?=$arr['program_lampiran']?></a></label>
			</fieldset>
		<?
				break;
			case "getajukan_pka" :
			case "getapprove_pka" :
				$arr = $rs->FetchRow ();
				?>
			
			<fieldset class="hr">
				<label class="span2">Satuan Kerja</label>
				<label class="span7"><?=$arr['auditee_name']?></label>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Auditor</label>
				<label class="span07"><?=$arr['auditor_name']?></label>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Waktu ( Jam )</label> <label class="span0"><?=$arr['program_jam']?></label>
			</fieldset>
			<fieldset>
				<label class="span2">Referensi Program Audit</label>
				<table border="1" cellpadding="0" cellspacing="0" class="table_risk">
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
			<fieldset class="hr">
				<label class="span2">Lampiran</label>
				<label class="span2"><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_ProgramAudit").$arr['program_lampiran']?>','_blank')"><?=$arr['program_lampiran']?></a></label>
			</fieldset>		
			<?php
			$z = 0;
			$rs_komentar = $programaudits->program_audit_komentar_viewlist ( $arr ['program_id'] );
				?>
			<fieldset>
				<label class="span2">detail komentar</label>
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
			<fieldset class="hr">
				<label class="span2">Isi Komentar</label> <input type="text" class="span7" name="komentar">
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['program_id']?>">
			<input type="hidden" name="status_pka" value="<?=$status?>">
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali"
						onclick="location='<?=$def_page_request?>'">
					<?php if($_action!='getdetail'){?>
					&nbsp;&nbsp;&nbsp;
					<input type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
					<?php }?>	
			</fieldset>
		</form>
	</article>
</section>
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
		url: 'AuditManagement/ajax.php?data_action=getDesc_refProg',
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
</script>
<script type="text/html" id="table_tmp">
	<tr class="row_item">
		<td><span data-content="kode"></span></td>
		<td><span data-content="judul"></span></td>
		<td><span data-content="procedure"></span></td>
	</tr>
</script>