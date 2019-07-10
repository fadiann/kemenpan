<?php
$rs_finding = $findings->finding_viewlist ( $ses_finding_id );
$arr_finding = $rs_finding->FetchRow ();

$rs_assign = $assigns->assign_viewlist ( $arr_finding['finding_assign_id'] );
$arr_assign = $rs_assign->FetchRow ();

?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
				<table class="table table-borderless">
					<tr>
						<td width="20%">Tipe Audit</td>
						<td width="2%">:</td>
						<td><?=$arr_assign['audit_type_name']?></td>
					</tr>
					<tr>
						<td>Obyek Audit</td>
						<td>:</td>
						<td><?=$arr_finding ['auditee_name']?></td>
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
					<tr>
						<td>No Temuan</td>
						<td>:</td>
						<td><?=$arr_finding ['finding_no']?></td>
					</tr>
					<tr>
						<td>Judul Temuan</td>
						<td>:</td>
						<td><?=$arr_finding ['finding_judul']?></td>
					</tr>
				</table>
			</div>
		</section>
	</div>
</div>