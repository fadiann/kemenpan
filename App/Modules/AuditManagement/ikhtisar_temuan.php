<?php
include_once "App/Classes/report_class.php";

$reports = new report ( $ses_userId );

$rs_auditee = $assigns->assign_auditee_viewlist ( $arr['assign_id'], $auditee_id );
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body">
		<?
		while($arr_auditee = $rs_auditee->FetchRow()){
			$katim = $reports->get_anggota($arr['assign_id'], $arr_auditee['assign_auditee_id_auditee'], 'KT');
			$dalnis = $reports->get_anggota($arr['assign_id'], $arr_auditee['assign_auditee_id_auditee'], 'PT');
		?>
		<table border='0' class="table_report" cellspacing='0' cellpadding="0">
			<tr>
				<td colspan="3">
					<center>
						<img src="Public/images/logo.png" width="48"/><br>
						Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia
					</center><br>
				</td>
			</tr>
			<tr>
				<td width="10%">Nama Auditan</td>
				<td width="5%" align="center">:</td>
				<td><?=$arr_auditee['auditee_name'];?></td>
			</tr>
			<tr>
				<td>Sasaran Audit</td>
				<td align="center">:</td>
				<td><?=$arr['audit_type_name'];?></td>
			</tr>
			<tr>
				<td>Periode Audit</td>
				<td align="center">:</td>
				<td><?=$arr['assign_tahun']?></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><br>IKHTISAR TEMUAN HASIL AUDIT</td>
			</tr>
		</table>
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr align="center">
				<th width="2%">No.</th>
				<th width="65%">URAIAN TEMUAN HASIL AUDIT</th>
				<th width="33%">TANGGAPAN AUDITAN</th>
			</tr>
			<?php
			$no_aspek="A";
			$rs_aspek = $programaudits->get_assign_aspek($arr['assign_id'], $arr_auditee['assign_auditee_id_auditee']);
			while($arr_aspek = $rs_aspek->FetchRow()){
			?>
			<tr>
				<td><?=$no_aspek?></td>
				<td><?=$arr_aspek['aspek_name']?></td>
				<td>&nbsp;</td>
			</tr>
			<?
				$no_temuan=0;
				$rs_temuan = $findings->get_list_temuan_by_aspek($arr_aspek['aspek_id'], $arr['assign_id'], $arr_auditee['assign_auditee_id_auditee']);
				while($arr_temuan = $rs_temuan->FetchRow()){
					$no_temuan++;
			?>
			<tr>
				<td><strong><?=$no_temuan?></strong></td>
				<td><strong><?=$arr_temuan['finding_judul']?></strong></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><?=$arr_temuan['finding_kondisi']?></td>
				<td><?=$arr_temuan['finding_tanggapan_auditee']?></td>
			</tr>
			<?
				}
				$no_aspek++;
			}
			?>
		</table>
		<?
		}
		?>
		<br>
		<table border='0' class="table_report" cellspacing='0' cellpadding="0">
			<tr>
				<td width="33%">Kepala <?=$arr_auditee['auditee_name'];?></td>
				<td width="33%">Pengendali Teknis</td>
				<td width="33%">Ketua Tim</td>
			</tr>
			<tr>
				<td>&nbsp;<br><br><br></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><?=$dalnis?></td>
				<td><?=$katim?></td>
			</tr>
		</table>
		<fieldset class="form-group">
			<center>
				<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'">
				<input type="button" class="btn btn-primary" value="ms-word" onClick="window.open('App/Modules/AuditManagement/ikhtisar_temuan_print.php?id_assign=<?=$arr['assign_id']?>&id_auditee=<?=$arr_auditee['assign_auditee_id_auditee']?>', '_blank','toolbar=no,location=no,status=no,menubar=yes,scrollbars=yes,resizable=yes');">
			</center>
		</fieldset>
			</div>
		</section>
	</div>
</div>
