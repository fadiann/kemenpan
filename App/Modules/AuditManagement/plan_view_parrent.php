<?
$rs_plan = $plannings->planning_viewlist ( $ses_plan_id );
$arr_plan = $rs_plan->FetchRow ();

$rs_id_auditee = $plannings->planning_auditee_viewlist ( $arr_plan ['audit_plan_id'] );
$plan_id_auditee = "";
while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
	$plan_id_auditee .= $arr_id_auditee ['auditee_name'] . "<br>";
}
?>
<article class="module width_3_quarter">
	<fieldset>
		<table class="view_parrent">
			<tr>
				<td width="150">Tipe Audit</td>
				<td>:</td>
				<td><?=$arr_plan['audit_type_name']?></td>
			</tr>
			<tr>
				<td>Obyek Audit</td>
				<td>:</td>
				<td><?=$plan_id_auditee?></td>
			</tr>
			<tr>
				<td>Tahun Audit</td>
				<td>:</td>
				<td><?=$arr_plan['audit_plan_tahun']?></td>
			</tr>
			<tr>
				<td>Tanggal Audit</td>
				<td>:</td>
				<td><?=$Helper->dateIndo($arr_plan['audit_plan_start_date'])?> s/d <?=$Helper->dateIndo($arr_plan['audit_plan_end_date'])?></td>
			</tr>
		</table>
	</fieldset>
</article>