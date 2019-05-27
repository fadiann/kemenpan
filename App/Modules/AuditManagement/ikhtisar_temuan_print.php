<?
header("Content-Type: application/msword");
header("Content-Disposition: attachment; filename=ikhtisar_temuan.doc");
header("Pragma: no-cache");
header("Expires: 0");
define ("INBOARD",false);

include_once "../App/Classes/program_audit_class.php";
include_once "../App/Classes/finding_class.php";
include_once "../App/Classes/report_class.php";
include_once "../App/Classes/assignment_class.php";

$reports = new report ($ses_userId);
$programaudits = new programaudit ($ses_userId);
$findings = new finding ($ses_userId);
$assigns = new assign ( $ses_userId );

$id_assign = $_REQUEST['id_assign'];
$id_auditee = $_REQUEST['id_auditee'];

$rs_assign = $assigns->assign_viewlist ($id_assign);
$arr = $rs_assign->FetchRow();

$rs_auditee = $assigns->assign_auditee_viewlist ( $id_assign, $id_auditee );
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<style>
body{
	width:210mm;
	font-family:Arial;
}
</style>
<body>
	<table align="center" width="100%">
		<?
			while($arr_auditee = $rs_auditee->FetchRow()){
				$katim = $reports->get_anggota($arr['assign_id'], $arr_auditee['assign_auditee_id_auditee'], 'KT');
				$dalnis = $reports->get_anggota($arr['assign_id'], $arr_auditee['assign_auditee_id_auditee'], 'PT');
		?>
		<table align="center" width="95%" border='0' cellspacing='0' cellpadding="0">
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
		<table align="center" width="95%" border="1">
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
		<table border='0' cellspacing='0' cellpadding="0">
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
	</table>
</body>
</html>
