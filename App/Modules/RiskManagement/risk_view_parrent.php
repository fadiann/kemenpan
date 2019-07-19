<?
$rs_penetapan = $risks->penetapan_data_viewlist ( $ses_penetapan_id );
$arr_penetapan = $rs_penetapan->FetchRow ();
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
		<div class="panel-body">
		<table class="table table-borderless table-condensed table-hover">
			<tr>
				<td width="150">Satuan Kerja</td>
				<td width="5">:</td>
				<td><?=$arr_penetapan['auditee_name']?></td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>:</td>
				<td><?=$arr_penetapan['penetapan_tahun']?></td>
			</tr>
			<? /*
			<tr>
				<td>Nama Kegiatan</td>
				<td>:</td>
				<td><?=$arr_penetapan['penetapan_nama']?></td>
			</tr>
			<tr>
				<td>Tujuan Kegiatan</td>
				<td>:</td>
				<td><?=$arr_penetapan['penetapan_tujuan']?></td>
			</tr>
			*/ ?>
			<?php
			if($arr_penetapan['penetapan_profil_risk'] != "" || $arr_penetapan['penetapan_profil_risk_residu'] != ""):
			?>
			<tr>
				<td>Profil Risiko Inheren</td>
				<td>:</td>
				<td><?=$arr_penetapan['penetapan_profil_risk']?></td>
			</tr>
			<tr>
				<td>Profil Risiko Residu</td>
				<td>:</td>
				<td><?=$arr_penetapan['penetapan_profil_risk_residu']?></td>
			</tr>
			<?php endif; ?>
			<tr>
				<td>Status</td>
				<td>:</td>
				<td><?=$arr_penetapan['penetapan_status_name']?></td>
			</tr>
		</table>
		</div>
		</section>
	</div>
</div>