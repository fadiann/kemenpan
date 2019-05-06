<?php
$arr = $rs->FetchRow();
?>
<section id="main" class="column">
<article class="module width_3_quarter">
	<header>
		<h3 class="tabs_involved"><?=$page_title?></h3>
	</header>
		<table align="center" width="100%">
			<tr>
				<td rowspan="2" width="10px"><img src="Public/images/logo.png" width="50px"></td>
				<td align="center">
					<strong>
						<font size="5">PT. Tri Nindya Utama</font><br>
					</strong>
				</td>
			</tr>
			<tr>
				<td align="center">
					Jl. H. Sa'aba Raya Kav 1-2, Meruya Selatan, Kembangan Jakarta Barat 11650<br>
					Telp : (021) 5842138
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr></td>
			</tr>
		</table>
		<table align="center" width="95%">
			<tr>
				<td colspan="7" align="center"><strong><u>SURAT PERINTAH TUGAS<u></strong></td>
			</tr>
			<tr>
				<td colspan="7" align="center">NOMOR : <?=$arr['assign_surat_no']?></td>
			</tr>
			<tr>
				<td colspan="7" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td width="10%">&nbsp;</td>
				<td valign="top" width="15%">Dasar</td>
				<td align="center" valign="top" width="5%">:</td>
				<td colspan="4"><?=$Helper->text_show($arr ['assign_dasar'])?></td>
			</tr>
			<tr>
				<td colspan="7" align="center">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="7" align="center"><strong>MEMERINTAHKAN</strong></td>
			</tr>
			<tr>
				<td colspan="7" align="center">&nbsp;</td>
			</tr>
		<?
		if($arr['audit_type_opsi']=='1'){
		?>
			<tr>
				<td>&nbsp;</td>
				<td valign="top">Kepada</td>
				<td align="center" valign="top">:</td>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="6">
					<table border="1" cellpadding="0" cellspacing="0" width="100%">
						<tr>
							<th rowspan="2">No</th>
							<th rowspan="2">Nama</th>
							<th rowspan="2">Gol.</th>
							<th rowspan="2">Peran</th>
							<th colspan="3">Lama Tugas (Hari Kerja)</th>
						</tr>
						<tr>
							<th>Persiapan</th>
							<th>Pelaksanaan</th>
							<th>Pelaporan</th>
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
							<td align="center"><?=$arr_auditor ['posisi_name']?></td>
							<td align="center"><?=$arr_auditor['assign_auditor_prepday']?></td>
							<td align="center"><?=$arr_auditor['assign_auditor_execday']?></td>
							<td align="center"><?=$arr_auditor['assign_auditor_reportday']?></td>
						</tr>
			<?php
				}
			?>
					</table>
				</td>
			</tr>
		<?
		} else if ($arr['audit_type_opsi']=='2'){
		?>
			<tr>
				<td>&nbsp;</td>
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
				$rs_auditor = $assigns->view_auditor_assign ( $arr ['assign_surat_id_assign']);
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
				<td>&nbsp;</td>
				<td valign="top">Kepada</td>
				<td align="center" valign="top">:</td>
				<td colspan="4">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
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
				<td>&nbsp;</td>
				<td valign="top">Untuk</td>
				<td align="center" valign="top">:</td>
				<td colspan="4"><?=$Helper->text_show($arr['assign_kegiatan'])?></td>
			</tr>
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
			</tr>
		</table>
		<br>
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
		<br><br><br><br>
		<form method="post" name="f" action="#" class="form-horizontal" onsubmit="return cek_data()">
		<fieldset class="hr">
			<table class="view_parrent">
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
		</fieldset>
		<?
		if ($arr ['assign_surat_status'] != 2) {
		?>
		<fieldset class="hr">
			<label class="span2">Isi Komentar</label>
			<textarea id="komentar" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
		</fieldset>
		<?
		}
		?>
		<fieldset>
			<center>
				<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'">
				<?
				if ($arr ['assign_surat_status'] == 0 || $arr ['assign_surat_status'] == 3) {
					if($getajukan){
						echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Ajukan\" onclick=\"document.getElementById('status').value=1\">";
					}
				} else if ($arr ['assign_surat_status'] == 1) {
					if($getapprove){
						echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status').value=3\">";
						echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Setujui\" onclick=\"document.getElementById('status').value=2\">";
					}
				} else if($arr ['assign_surat_status'] == 2){
				?>
				<input type="button" class="blue_btn" value="ms-word" onclick="window.open('AuditManagement/surat_tugas_print.php?id_surat=<?=$arr['assign_surat_id']?>','toolbar=no, location=no, status=no, menubar=yes, scrollbars=yes, resizable=yes');">
				<?
				}
				?>
				<input type="hidden" name="data_id" id="data_id" value="<?=$arr['assign_surat_id']?>">
				<input type="hidden" name="status" id="status" value="">
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
		</fieldset>
	</form>
</article>
</section>
<script>
function cek_data(){
	var data = document.getElementById('status').value;
	if(data==1) text = "Anda Yakin Akan Mengajukan?";
	if(data==2) text = "Anda Yakin Akan Menyetujui?";
	if(data==3) text = "Anda Yakin Akan Menolak?";
	return confirm(text);
}
</script>
