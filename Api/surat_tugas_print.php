<?php
header("Content-Type: application/msword");
header("Content-Disposition: attachment; filename=surat_tugas.doc");
header("Pragma: no-cache");
header("Expires: 0");
define ("INBOARD",false);

include_once "../App/Libraries/login_history.php";
include_once "../App/Libraries/Helper.php";
include_once "../App/Classes/assignment_class.php";
include_once "../App/Classes/report_class.php";
include_once "../App/Classes/param_class.php";
include_once "../App/Classes/audit_plann_class.php";

$Helper    = new Helper ();
$reports   = new report ($ses_userId);
$params    = new param ($ses_userId);
$plannings = new planning ($ses_userId);
$assigns   = new assign ( $ses_userId );

$id_surat 	= $_REQUEST['id_surat'];
$rs 		= $assigns->surat_assign_viewlist ( $id_surat );
$arr 		= $rs->FetchRow();
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
<table align="center" width="80%" class="table table-borderless">
			<? /*
			<tr>
				<!-- <td rowspan="2" width="10px"><img src="Public/images/logo.png" width="48"></td> -->
				<td align="center">
					<strong>
						<!-- <font size="5">Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia</font><br> -->
					</strong>
				</td>
			</tr>
			*/ ?>
			<tr>
				<td align="center">
					<!-- Jl. Jend. Sudirman Kav. 69 Jakarta Selatan - 12190 Indonesia<br>
					Telp. (+6221) 7398381 - 89 -->
					<br>
					<br>
					<br>
					<br>
					<br>
				</td>
			</tr>
			<!-- <tr>
				<td colspan="2"><hr></td>
			</tr> -->
		</table>
		<table align="center" width="70%">
			<tr>
				<td colspan="7" align="center"><strong><u>SURAT PERINTAH TUGAS<u></u></td>
			</tr>
			<tr>
				<td colspan="7" align="center">NOMOR : <?=$arr['assign_surat_no']?></td>
			</tr>
			<tr>
				<td colspan="7" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top" width="12%">Menimbang</td>
				<td valign="top" width="5%"align="center" valign="top">:</td>
				<td valign="top" colspan="4"><?=$arr['assign_surat_menimbang']?></td>
			</tr>
			<tr>
				<td valign="top">Dasar</td>
				<td valign="top"align="center" valign="top">:</td>
				<td valign="top" colspan="4"><?=$arr['assign_surat_dasar']?></td>
			</tr>
			<tr>
				<td valign="top"><br></td>
			</tr>
			<tr>
				<td colspan="7" align="center">&nbsp;</td>
			</tr>
			<!-- <tr>
				<td width="10%">&nbsp;</td>
				<td valign="top" width="15%">Dasar</td>
				<td align="center" valign="top" width="5%">:</td>
				<td colspan="4"><?//=$Helper->text_show($arr ['assign_dasar'])?></td>
			</tr> -->
			<tr>
				<td colspan="7" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="7" align="center"><strong>MEMBERI TUGAS</strong></td>
			</tr>
			<tr>
				<td colspan="7" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td valign="top" width="12%">Kepada</td>
				<td align="center" valign="top" width="5%">:</td>
				<td colspan="4">
					Daftar Terlampir
				</td>
			</tr>
			<tr>
				<td valign="top">Untuk</td>
				<td align="center" valign="top">:</td>
				<td colspan="4">
				<p>Melaksanakan <?=$Helper->text_show($arr['assign_kegiatan'])?> di Lingkungan Sekretariat Kementerian Tahun 2019 selama <?=$Helper->selisih_tanggal($arr['assign_start_date'], $arr['assign_end_date'])?> (<?//=$Helper->terbilang($Helper->selisih_tanggal($arr['assign_start_date'], $arr['assign_end_date']))?>) hari kerja, mulai tanggal <?=$Helper->dateIndoLengkap($arr['assign_start_date'])?> s.d. tanggal <?=$Helper->dateIndoLengkap($arr['assign_end_date'])?> dengan ketentuan:</p>
				<ol>
				<li>Melaksanakan Tugas dengan sebaik-baiknya dan penuh tanggung jawab serta melaporkan hasilnya;</li>
				<li>Biaya yang timbul atas diterbitkannya surat tugas ini dibebankan pada DIPA Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi tahun 2019 </li>
				</ol>
				<?//=$Helper->text_show($arr['assign_kegiatan'])?>
				</td>
			</tr>
			<? /*
			<tr>
				<td>&nbsp;</td>
				<td valign="top">Mulai Tanggal</td>
				<td align="center" valign="top">:</td>
				<td colspan="4"><?=$Helper->dateIndoLengkap($arr['assign_start_date'])?> s.d <?=$Helper->dateIndoLengkap($arr['assign_end_date'])?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td valign="top">Pendanaan</td>
				<td align="center" valign="top">:</td>
				<td colspan="4"><?=$Helper->text_show($arr['assign_pendanaan'])?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td valign="top">Ruang Lingkup</td>
				<td align="center" valign="top">:</td>
				<td colspan="4"><?=$Helper->text_show($arr['assign_keterangan'])?></td>
			</tr> */ ?>
		</table>
		<br><br><br><br><br>
		<table align="center" width="70%">
			<tr>
				<td width="60%">&nbsp;</td>
				<td>
					Ditetapkan di Jakarta<br>
					Pada Tanggal <?=$Helper->dateIndoLengkap($arr['assign_surat_tgl'])?><br><br>
					<?=$arr['jenis_jabatan_sub']?>,<br><br><br><br><br>
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
		<br><br><br><br><br><br><br><br><br><br><br><br>		
		<table cellpadding="0" cellspacing="0" width="70%" align="center">
		<tr>
			<th class="text-right" colspan='2' align="right" width="75%">&nbsp</th>
			<th align="left" valign="bottom" width="15%"><strong>Lampiran<br>Nomor </strong></th>
			<th align="left" valign="bottom" width="2%">:</th>
			<th align="left" valign="bottom"><?=$arr['assign_surat_no']?></th>
			<!-- <th colspan="3">Lama Tugas (Hari Kerja)</th> -->
		</tr>
		</table><br><br><br><br>
		<table border="1" cellpadding="0" cellspacing="0" width="70%" align="center">
		<tr>
			<th align="center" class="text-center">No</th>
			<th class="text-center">Nama</th>
			<!-- <th rowspan="2">Gol.</th> -->
			<th class="text-center">NIP</th>
			<th class="text-center">Peran</th>
			<!-- <th colspan="3">Lama Tugas (Hari Kerja)</th> -->
		</tr>
		<?
		$no=0;
		$rs_auditor = $assigns->view_auditor_assign ( $arr ['assign_surat_id_assign']);
		while ( $arr_auditor = $rs_auditor->FetchRow () ) {
			$no++
		?>
		<tr>
			<td align="center"><?=$no?>.</td>
			<td><?=$arr_auditor ['auditor_name']?></td>
			<!-- <td align="center"><?//=$arr_auditor ['pangkat_name']?></td> -->
			<td align="center"><?=$arr_auditor ['auditor_nip']?></td>
			<td align="center"><?=$arr_auditor ['posisi_name']?></td>
			<!-- <td align="center"><?//=$arr_auditor['assign_auditor_prepday']?></td>
			<td align="center"><?//=$arr_auditor['assign_auditor_execday']?></td>
			<td align="center"><?//=$arr_auditor['assign_auditor_reportday']?></td> -->
		</tr>
		<?php
		}
		?>
	</table>
		<br><br><br><br>
	<table width="70%" align="center">
		<tr>
			<td width="60%">&nbsp;</td>
			<td>
				Ditetapkan di Jakarta<br>
				Pada Tanggal <?=$Helper->dateIndoLengkap($arr['assign_surat_tgl'])?><br><br>
				<?=$arr['jenis_jabatan_sub']?>,<br><br><br><br><br>
				<u><?=$arr['auditor_name']?></u><br>
				NIP. <?=$arr['auditor_nip']?>
			</td>
		</tr>
	</table>
		<form method="post" name="f" action="#" class="form-horizontal" onsubmit="return cek_data()">
		<fieldset class="form-group">
			<table class="table table-borderless">
				<tr>
					<td>Detail komentar</td>
					<td>:</td>
					<td>
					<?php
					$z = 0;
					$rs_komentar = $assigns->surat_tugas_komentar_viewlist ( $arr ['assign_surat_id'] );
					while ( $arr_komentar = $rs_komentar->FetchRow () ) {
						$z ++;
						echo $z.". ".$arr_komentar['auditor_name']." : ".$arr_komentar['surat_comment_desc']."<br>";
					}
					?>
					</td>
				</tr>
			</table>
		<br><br><br><br>
	<table width="70%" align="center">
		<tr>
			<td width="60%">&nbsp;</td>
			<td>
				Ditetapkan di Jakarta<br>
				Pada Tanggal <?=$Helper->dateIndoLengkap($arr['assign_surat_tgl'])?><br><br>
				<?=$arr['assign_surat_jabatanTTD']?>,<br><br><br><br><br>
				<u><?=$arr['auditor_name']?></u><br>
				NIP. <?=$arr['auditor_nip']?>
			</td>
		</tr>
	</table>
		<br><br><br><br>
</body>
</html>
