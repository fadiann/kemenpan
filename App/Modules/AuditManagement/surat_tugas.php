<?php
$arr = $rs->FetchRow();
?>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title"><?=$page_title?></h2>
				</header>
				<div class="panel-body">
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
		<table align="center" width="90%">
			<tr>
				<td valign="top" width="10%">Menimbang</td>
				<td valign="top" width="1%">:</td>
				<td valign="top"><ol>
					<p align="justify">bahwa dalam rangka pelaksanaan Program Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya TA 2019, dipandang perlu menugaskan pegawai Kementerian PANRB, untuk melakukan Reviu Perjanjian Kinerja di Lingkungan Sekretariat Kementerian Tahun 2019.</p></ol></td>
			</tr>
			<tr>
				<td valign="top">Dasar</td>
				<td valign="top">:</td>
				<td valign="top"><ol><p align="justify">
					<li>Peraturan Pemerintah Nomor 60 Tahun 2008 tentang Sistem Pengendalian Internal Pemerintah;</li>
					<li>Peraturan Presiden Nomor 29 Tahun 2014 tentang Sistem Akuntabilitas Kinerja Instansi Pemerintah;</li>
					<li>Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 53 Tahun 2014 tentang Petunjuk Teknis Perjanjian Kinerja, Pelaporan Kinerja dan Tata Cara Reviu atas Laporan Kinerja Pemerintah;</li>
					<li>Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 3 Tahun 2016 sebagai mana telah diubah dengan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 12 Tahun 2017 tentang Perubahan Atas Peraturan Menteri Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi Republik Indonesia Nomor 3 Tahun 2016 Tentang Organisasi Dan Tata Kerja Kementerian Pendayagunaan Aparatur Negara Dan Reformasi Birokrasi</li>
					</p>
					</ol>
				</td>
			</tr>
			<tr>
				<td valign="top"><br></td>
			</tr>
		</table>
		<table align="center" width="75%">
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
							<th class="text-center">No</th>
							<th class="text-center">Nama</th>
							<!-- <th rowspan="2">Gol.</th> -->
							<th class="text-center">Peran</th>
							<!-- <th colspan="3">Lama Tugas (Hari Kerja)</th> -->
						</tr>
						<!-- <tr>
							<th>Persiapan</th>
							<th>Pelaksanaan</th>
							<th>Pelaporan</th>
						</tr> -->
			<?
				$no=0;
				$rs_auditor = $assigns->view_auditor_assign ( $arr ['assign_surat_id_assign']);
				while ( $arr_auditor = $rs_auditor->FetchRow () ) {
					$no++
			?>
						<tr>
							<td align="center"><?=$no?></td>
							<td><?=$arr_auditor ['auditor_name']?></td>
							<!-- <td align="center"><?=$arr_auditor ['pangkat_name']?></td> -->
							<td align="center"><?=$arr_auditor ['posisi_name']?></td>
							<!-- <td align="center"><?//=$arr_auditor['assign_auditor_prepday']?></td>
							<td align="center"><?//=$arr_auditor['assign_auditor_execday']?></td>
							<td align="center"><?//=$arr_auditor['assign_auditor_reportday']?></td> -->
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
							<th class="text-center">No.</th>
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
					Ditetapkan di Jakarta<br>
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
		</fieldset>
		<?
		if ($arr ['assign_surat_status'] != 2) {
		?>
		<fieldset class="form-group">
			<label class="col-sm-3 control-label">Isi Komentar</label>
			<textarea id="komentar" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
		</fieldset>
		<?
		}
		?>
		<fieldset class="form-group">
			<center>
				<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'">
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
				<!-- <input type="button" class="blue_btn" value="ms-word" onclick="window.open('Api/surat_tugas_print.php?id_surat=<? //=$arr['assign_surat_id']?>','toolbar=no, location=no, status=no, menubar=yes, scrollbars=yes, resizable=yes');"> -->
				<?
				}
				?>
				<input type="hidden" name="data_id" id="data_id" value="<?=$arr['assign_surat_id']?>">
				<input type="hidden" name="status" id="status" value="">
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
		</fieldset>
	</form>
				</div>
			</section>
		</div>
	</div>
<script>
function cek_data(){
	var data = document.getElementById('status').value;
	if(data==1) text = "Anda Yakin Akan Mengajukan?";
	if(data==2) text = "Anda Yakin Akan Menyetujui?";
	if(data==3) text = "Anda Yakin Akan Menolak?";
	return confirm(text);
}
</script>
