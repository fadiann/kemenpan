<?php
$rs_finding = $findings->finding_viewlist ( $ses_finding_id );
$arr_finding = $rs_finding->FetchRow ();

$rs_assign = $assigns->assign_viewlist ( $arr_finding['finding_assign_id'] );
$arr_assign = $rs_assign->FetchRow ();

?>
<article class="module width_3_quarter">
	<fieldset>
		<table class="view_parrent">
			<tr>
				<td width="150">Tipe Audit</td>
				<td>:</td>
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
	</fieldset>
</article>