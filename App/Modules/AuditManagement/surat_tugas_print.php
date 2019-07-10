<?
header("Content-Type: application/msword");
header("Content-Disposition: attachment; filename=surat_tugas.doc");
header("Pragma: no-cache");
header("Expires: 0");
define ("INBOARD",false);

include_once "../App/Libraries/login_history.php";
include_once "../App/Classes/assignment_class.php";

$assigns = new assign ( $ses_userId );

$id_surat = $_REQUEST['id_surat'];
$rs = $assigns->surat_assign_viewlist ( $id_surat );
$arr = $rs->FetchRow();
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<style>
body{
	width:210mm;
	font-family:Arial;
	font-size: 12;
}
</style>
<body>
	<table align="center" width="100%">
		<table align="center" width="95%">
			<tr>
				<td colspan="6" align="center"><strong><u>SURAT PERINTAH TUGAS</u></strong></td>
			</tr>
			<tr>
				<td colspan="6" align="center"><strong>NOMOR : <?=$arr['assign_surat_no']?></strong></td>
			</tr>
			<tr>
				<td colspan="6" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top" width="20%">Dasar</td>
				<td align="center" valign="top" width="5%">:</td>
				<td colspan="4"><?=$Helper->text_show($arr ['assign_dasar'])?></td>
			</tr>
			<tr>
				<td colspan="6" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="6" align="center"><strong>MEMERINTAHKAN</strong></td>
			</tr>
			<tr>
				<td colspan="6" align="center">&nbsp;</td>
			</tr>
		<?
		if($arr['audit_type_opsi']=='1'){
		?>
			<tr>
				<td valign="top">Kepada</td>
				<td align="center" valign="top">:</td>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="6">
					<table border="1" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Peran</th>
						</tr>
			<?
				$no=0;
				$rs_auditor = $assigns->view_auditor_assign ( $arr ['assign_surat_id_assign'], "pm");
				while ( $arr_auditor = $rs_auditor->FetchRow () ) {
					$no++
			?>
						<tr>
							<td align="center"><?=$no?></td>
							<td><?=$arr_auditor ['auditor_name']?></td>
							<td align="center"><?=$arr_auditor ['posisi_name']?></td>
						</tr>
			<?
				}
			?>
					</table>
				</td>
			</tr>
		<?
		} else if ($arr['audit_type_opsi']=='2'){
		?>
			<tr>
				<td valign="top">Kepada</td>
				<td align="center" valign="top">:</td>
				<td colspan="4">
					<table border="1" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Gol.</th>
							<th>Jabatan</th>
						</tr>
			<?
				$no=0;
				$rs_auditor = $assigns->view_auditor_assign ( $arr ['assign_surat_id_assign'], "pm");
				while ( $arr_auditor = $rs_auditor->FetchRow () ) {
					$no++
			?>
						<tr>
							<td align="center"><?=$no?></td>
							<td><?=$arr_auditor ['auditor_name']?></td>
							<td align="center"><?=$arr_auditor ['pangkat_name']?></td>
							<td align="center"><?=$arr_auditor ['jenis_jabatan_sub']?></td>
						</tr>
			<?
				}
			?>
					</table>
				</td>
			</tr>
		<?
		} else if($arr['audit_type_opsi']=='3'){
		?>
			<tr>
				<td valign="top">Kepada</td>
				<td align="center" valign="top">:</td>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="6">
					<table border="1" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Gol.</th>
							<th>Jabatan</th>
							<th>Lama Tugas (Hari Kerja)</th>
							<th>Ruang Lingkup</th>
						</tr>
			<?
				$no=0;
				$rs_auditor = $assigns->view_auditor_assign ( $arr ['assign_surat_id_assign']);
				while ( $arr_auditor = $rs_auditor->FetchRow () ) {
					$no++
			?>
						<tr>
							<td align="center"><?=$no?></td>
							<td><?=$arr_auditor ['auditor_name']?></td>
							<td align="center"><?=$arr_auditor ['pangkat_name']?></td>
							<td align="center"><?=$arr_auditor ['jenis_jabatan']?></td>
							<td align="center"><?=$arr ['assign_hari']?></td>
							<td align="center"><?=$arr_auditor ['posisi_name']?></td>
						</tr>
			<?php
				}
			?>
					</table>
				</td>
			</tr>
		<?
		}
		?>
			<tr>
				<td valign="top">Untuk</td>
				<td align="center" valign="top">:</td>
				<td colspan="4"><?=$Helper->text_show($arr['assign_kegiatan'])?></td>
			</tr>
			<tr>
				<td valign="top">Mulai Tanggal</td>
				<td align="center" valign="top">:</td>
				<td colspan="4"><?=$Helper->dateIndoLengkap($arr['assign_start_date'])?> s.d <?=$Helper->dateIndoLengkap($arr['assign_end_date'])?></td>
			</tr>
			<tr>
				<td valign="top">Pendanaan</td>
				<td align="center" valign="top">:</td>
				<td colspan="4"><?=$Helper->text_show($arr['assign_pendanaan'])?></td>
			</tr>
			<tr>
				<td valign="top">Keterangan lain</td>
				<td align="center" valign="top">:</td>
				<td colspan="4"><?=$Helper->text_show($arr['assign_keterangan'])?></td>
			</tr>
		</table>
		<br><br><br>
		<table align="center" width="90%">
			<tr>
				<td width="60%">&nbsp;</td>
				<td>
					Ditempatkan di Jakarta<br>
					Pada Tanggal <?=$Helper->dateIndoLengkap($arr['assign_surat_tgl'])?><br><br>
					<?=$arr['assign_surat_jabatanTTD']?>,<br><br><br><br><br>
					<u><?=$arr['auditor_name']?></u><br>
					NIP. <?=$arr['auditor_nip']?>
				</td>
			</tr>
			<?
			if($arr ['assign_surat_tembusan']!=""){
			?>
			<tr>
				<td colspan="2">
					Tembusan :<br>
					<?
					$cek_tem = explode(",", $arr ['assign_surat_tembusan'] );
					$cek_count = count($cek_tem);
					$notem = 0;
					for($x=0;$x<$cek_count;$x++){
						$notem++;
						echo $notem." .".trim($cek_tem[$x])."<br>";
					}
					?>
				</td>
			</tr>
			<?
			}
			?>
		</table>
	</table>
</body>
</html>
