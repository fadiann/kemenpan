<?
$status_owner="";

$auditee_kka = "";
if ($method == 'finding_kka') {
	$rs_kka = $kertas_kerjas->kertas_kerja_viewlist ( $ses_kka_id );
	$arr_kka = $rs_kka->FetchRow ();
	$auditee_kka = $arr_kka ['auditee_id'];
	$prog_id_find = $arr_kka ['kertas_kerja_id_program'];

	$status_owner =  $kertas_kerjas->cek_owner_kka ($ses_kka_id, $ses_userId);
}

$rs_assign = $assigns->assign_viewlist ( $ses_assign_id );
$arr_assign = $rs_assign->FetchRow ();

$rs_id_auditee = $assigns->assign_auditee_viewlist ( $arr_assign ['assign_id'] );

$assign_auditee = "";
while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
	$assign_auditee .= $arr_id_auditee ['auditee_name'];

	if($method=='programaudit'){
		$assign_auditee .= "&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"#\" OnClick=\"return set_action('getcetak', '".$arr_id_auditee ['assign_auditee_id_auditee']."');\"><b>View PKA</b></a>";
		$assign_auditee .= "&nbsp;&nbsp;&nbsp;&nbsp; <a href=\"#\" OnClick=\"return set_action('getikhtisar', '".$arr_id_auditee ['assign_auditee_id_auditee']."');\"><b>View Ikhtisar Temuan</b></a>";
	}

	$assign_auditee .= "<br>";
}
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
			<table class="table table-borderless">
				<tr>
					<td width="15%">Tipe Audit</td>
					<td width="3%">:</td>
					<td><?=$arr_assign['audit_type_name']?></td>
				</tr>
				<tr>
					<td>Obyek Audit</td>
					<td>:</td>
					<td>
				<?php
				if ($method == 'finding_kka') {
					echo $arr_kka ['auditee_name'];
				} else {
					echo $assign_auditee;
				}
				?>
				</td>
				</tr>
				<tr>
					<td>Tahun Audit</td>
					<td>:</td>
					<td><?=$arr_assign['assign_tahun']?></td>
				</tr>
				<tr>
					<td>Tanggal Audit</td>
					<td>:</td>
					<td><?=$Helper->dateIndo($arr_assign['assign_start_date'])?> s/d <?=$Helper->dateIndo($arr_assign['assign_end_date'])?></td>
				</tr>
		<?php
		if ($method == 'finding_kka') {
		?>
				<tr>
					<td>No KKA</td>
					<td>:</td>
					<td><?=$arr_kka ['kertas_kerja_no']?></td>
				</tr>
				<tr>
					<td>Bidang Substansi</td>
					<td>:</td>
					<td><?=$arr_kka ['ref_program_title']?></td>
				</tr>
		<?php
		}
		?>
			</table>
		</fieldset>
		<?php
		if ($method == 'programaudit') {
		?>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Susunan Tim</label>
			<table border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed mb-none">
				<thead>
					<tr>
						<th width="80%">Nama Anggota</th>
						<th width="20%">Posisi</th>
					</tr>
				</thead>
				<tbody id="table_desc">
				<?
				$rs_detail = $assigns->view_auditor_assign ( $ses_assign_id );
				while ( $arr_detil = $rs_detail->FetchRow () ) {
				?>
					<tr class="row_item">
						<td><?=$arr_detil ['auditor_name']?></td>
						<td><?=$arr_detil ['posisi_name']?></td>
					</tr>
				<?
				}
				?>
				</tbody>
			</table>
		</fieldset>
		<?
		}
		?>
			</div>
		</section>
	</div>
</div>
