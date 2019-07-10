<?
$status_owner="";

$auditee_kka = "";
if ($method == 'kertas_kerja') {	
	$status_owner =  $kertas_kerjas->cek_owner_program ( $ses_program_id, $ses_userId);
}

$rs_program = $programaudits->program_audit_viewlist ( $ses_program_id );
$arr_program = $rs_program->FetchRow ();
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
		<div class="panel-body">
		<table class="table table-borderless table-condensed table-hover">
			<tr>
				<td width="150px">Obyek Audit</td>
				<td>:</td>
				<td><?=$arr_program['auditee_name']?></td>
			</tr>
			<tr>
				<td>Auditor</td>
				<td>:</td>
				<td><?=$arr_program['auditor_name']?></td>
			</tr>
			<tr>
				<td>Bidang Substansi</td>
				<td>:</td>
				<td><?=$arr_program['ref_program_title']?></td>
			</tr>
			<tr>
				<td>Prosedur Audit</td>
				<td>:</td>
				<td><?=$Helper->text_show($arr_program['ref_program_procedure'])?></td>
			</tr>
		</table>
		</div>
		</section>
	</div>
</div>