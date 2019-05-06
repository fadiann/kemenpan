<?
header("Content-Type: application/msword");
header("Content-Disposition: attachment; filename=laporan_hasil_audit.doc");
header("Pragma: no-cache");
header("Expires: 0");
define ("INBOARD",false);

include_once "../App/Classes/report_class.php";
include_once "../App/Classes/program_audit_class.php";
include_once "../App/Classes/auditee_class.php";
include_once "../App/Classes/assignment_class.php";
include_once "../App/Classes/finding_class.php";
include_once "../App/Libraries/Helper.php";

$reports = new report ();
$programaudits = new programaudit();
$auditees = new auditee();
$assigns = new assign ();
$findings = new finding ();
$Helper = new Helper ();

$fil_tahun_id = "";
$fil_auditee_id = "";

$fil_tahun_id = $Helper->replacetext ( $_GET ["fil_tahun_id"] );
$fil_auditee_id = $Helper->replacetext ( $_GET ["fil_auditee_id"] );

$assign_id = $reports->get_assignment_id($fil_auditee_id, $fil_tahun_id);

$rs = $assigns->assign_viewlist ( $assign_id );
$arr = $rs->FetchRow();

$rs_auditee = $assigns->auditee_detil ( $fil_auditee_id );
$arr_auditee = $rs_auditee->FetchRow();
$assign_id_auditee = $arr_auditee['auditee_id'];
$assign_nama_auditee = $arr_auditee['auditee_name'];

$rs_lha = $assigns->assign_lha_viewlist ( $arr ['assign_id'] );
$arr_lha = $rs_lha->FetchRow ();

$cek_posisi = $findings->cek_posisi($arr['assign_id']);

if($fil_tahun_id!="" && $fil_auditee_id!=""){
?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<body>
	<table align="center" width="100%">
		<tr>
			<td align="center"><br><br><br><strong>PT. JIWASRAYA</strong></td>
		</tr>
		<tr>
			<td colspan="2"><hr></td>
		</tr>
		<tr>
			<td align="center"><br><br><br><strong>LAPORAN HASIL AUDIT KINERJA</strong></td>
		</tr>
		<tr>
			<td align="center"><br><br><br><strong><?=$assign_nama_auditee?></strong></td>
		</tr>
		<tr>
			<td style="padding-left:30%"><br><br><br><strong>Nomor : <?=$arr_lha['assign_no_lha']?></strong></td>
		</tr>
		<tr>
			<td style="padding-left:30%"d><strong>Tanggal :  <?=$Helper->dateIndo($arr_lha['assign_date_lha'])?></strong></td>
		</tr>
	</table>
	<br>
	<table align="center" width="100%">
		<tr>
			<td align="center"><strong>BAGIAN PERTAMA</strong></td>
		</tr>
		<tr>
			<td align="center"><strong>SIMPULAN HASIL AUDIT DAN REKOMENDASI</strong></td>
		</tr>
		<tr>
			<td align="justify"><?=$Helper->text_show($arr_lha['lha_ringkasan'])?></td>
		</tr>
	</table>
	<br>
	<table align="center" width="100%">
		<tr>
			<td align="center" colspan="4"><strong>BAGIAN KEDUA</strong></td>
		</tr>
		<tr>
			<td align="center" colspan="4"><strong>URAIAN HASIL AUDIT</strong><br></td>
		</tr>
		<tr>
			<td align="center" colspan="4"><strong>BAB I</strong></td>
		</tr>
		<tr>
			<td align="center" colspan="4"><strong>PENDAHULUAN</strong></td>
		</tr>
		<tr>
			<td width="2%">1.</td>
			<td colspan="2">Dasar Audit</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_dasar_audit'])?></td>
		</tr>
		<tr>
			<td>2.</td>
			<td colspan="2">Tujuan Audit</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_tujuan_audit'])?></td>
		</tr>
		<tr>
			<td>3.</td>
			<td colspan="2">Ruang Lingkup Audit</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_ruanglingkup'])?></td>
		</tr>
		<tr>
			<td>4.</td>
			<td colspan="2">Batasan Audit</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_batasan'])?></td>
		</tr>
		<tr>
			<td>5.</td>
			<td colspan="2">Metodologi Audit</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_metodologi'])?></td>
		</tr>
		<tr>
			<td>6.</td>
			<td colspan="2">Strategi pelaporan</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td  colspan="2"align="justify"><?=$Helper->text_show($arr_lha['lha_strategi_laporan'])?></td>
		</tr>
		<tr>
			<td>7.</td>
			<td colspan="2">Data umum Auditan</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_data_auditan'])?></td>
		</tr>
		<tr>
			<td>8.</td>
			<td colspan="2">Status Dan Tindak Lanjut Temuan Hasil Audit Yang Lalu</td>
		</tr>
		<?
		$no_assign_lama = "a";
		$count_temuan_tuntas = 0;
		$count_temuan_proses = 0;
		$total_temuan=0;
		$rs_get_assign_find_open = $findings->assign_find_open ( $assign_id_auditee, $arr_lha['assign_tahun'] );
		while($arr_assign_find_open = $rs_get_assign_find_open->FetchRow ()){
			$count_temuan_tuntas = $findings->get_jml_temuan_selesai ( $arr_assign_find_open['assign_id']);
			$count_temuan_proses = $findings->get_jml_temuan_proses ( $arr_assign_find_open['assign_id']);
			$total_temuan = $count_temuan_tuntas+$count_temuan_proses;
		?>
		<tr>
			<td>&nbsp;</td>
			<td valign="top"><?=$no_assign_lama?></td>
			<td align="justify">Rekomendasi terhadap <?=$total_temuan?> temuan hasil audit yang lalu, yakni: <?=$arr_assign_find_open['audit_type_name']?> T.A <?=$arr_assign_find_open['assign_tahun']?> dengan Nomor LHA: <?=$arr_assign_find_open['assign_no_lha']?> tanggal <?=$Helper->dateIndoLengkap($arr_assign_find_open['assign_date_lha'])?>; <?=$count_temuan_tuntas?> temuan dinyatakan Tuntas sedangkan <?=$count_temuan_proses?> temuan masih dinyatakan Proses, yaitu:</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>
				<table width="100%" border="1" cellspacing="0" cellpadding="0">
					<tr>
						<th width="10%">No</th>
						<th width="40%">Uraian Temuan</th>
						<th width="40%">Rekomendasi</th>
						<th width="10%">Status</th>
					</tr>
				<?
					$rs_temuan_proses = $findings->get_temuan_proses ( $arr_assign_find_open['assign_id']);
					while($arr_temuan_proses = $rs_temuan_proses->FetchRow()){
						$rs_rekomendasi_proses = $findings->get_rekomendasi_proses ( $arr_temuan_proses['finding_id']);
						$count_rek = $rs_rekomendasi_proses->RecordCount ();
						$no_rek = 0;
						while($arr_rekomendasi_proses = $rs_rekomendasi_proses->FetchRow()){	
							$no_rek++;
				?>
					<tr>
				<?
						if($no_rek==1){
				?>
						<td rowspan="<?=$count_rek?>" valign="top"><?=$arr_temuan_proses['finding_no']?></td>
						<td rowspan="<?=$count_rek?>" valign="top"><?=$arr_temuan_proses['finding_judul']?></td>
				<?
						}
				?>
						<td><?=$Helper->text_show($arr_rekomendasi_proses['rekomendasi_desc'])?></td>
						<td>Proses</td>
					</tr>									
				<?
						}
					}
				?>
				</table>
			</td>
		</tr>
		<?
			$no_assign_lama++;
		}
		?>
	</table>
	<br>
	<table align="center" width="100%">
		<tr>
			<td colspan="5" align="center"><strong>BAB II</strong></td>
		</tr>
		<tr>
			<td colspan="5" align="center"><strong>URAIAN HASIL AUDIT</strong></td>
		</tr>
		<tr>
			<td colspan="5" align="justify"><?=$Helper->text_show($arr_lha['lha_hasil'])?></td>
		</tr>
		<?
		$no_aspek=0;
		$rs_list_aspek = $programaudits->get_assign_aspek ( $arr_lha['assign_id'], $assign_id_auditee);
		while($arr_list_aspek = $rs_list_aspek->FetchRow()){
			$no_aspek++;
		?>
		<tr>
			<td width="2%"><?=$no_aspek?>.</td>
			<td colspan="4"><?=ucwords(strtolower($arr_list_aspek['aspek_name']))?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td width="2%">a.</td>
			<td colspan="3">Informasi Umum</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>b.</td>
			<td colspan="3">Temuan Dan Rekomendasi</td>
		</tr>
		<?
			$no_temuan=0;
			$rs_list_temuan = $findings->get_list_temuan_by_aspek ( $arr_list_aspek['aspek_id'], $arr_lha['assign_id'], $assign_id_auditee);
			while($arr_list_temuan = $rs_list_temuan->FetchRow()){
				$no_temuan++;
		?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="2%"><?=$no_temuan?>.</td>
			<td colspan="2"><strong><?=$arr_list_temuan['finding_judul']?></strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2"><?=$Helper->text_show($arr_list_temuan['finding_kondisi'])?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2"><strong>Tanggapan Auditan :</strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2"><?=$Helper->text_show($arr_list_temuan['finding_tanggapan_auditee'])?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td colspan="2"><strong>Rekomendasi :</strong></td>
		</tr>
		<?
				$rs_rekomendasi = $findings->get_rekomendasi_list ( $arr_list_temuan['finding_id']);
				$no_rek = 0;
				while($arr_rekomendasi = $rs_rekomendasi->FetchRow()){
					$no_rek++;
		?>
		<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td width="2%"><?=$no_rek?></td>
			<td><?=$Helper->text_show($arr_rekomendasi['rekomendasi_desc'])?></td>
		</tr>
		<?
				}
			}
		}
		?>
	</table>
	<br>
	<table align="center" width="100%">
		<tr>
			<td colspan="3" align="center"><strong>BAB III</strong></td>
		</tr>
		<tr>
			<td colspan="3" align="center"><strong>PENUTUP</strong></td>
		</tr>
	</table>
</body>
</html>
<?
}
?>