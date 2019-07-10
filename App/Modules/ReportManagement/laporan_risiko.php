<?
include_once "App/Classes/risk_class.php";
include_once "App/Classes/param_class.php";
include_once "App/Classes/auditee_class.php";

$risks = new risk ( $ses_userId );
$params = new param ( $ses_userId );
$auditees = new auditee ( $ses_userId );

$fil_tahun = $Helper->replacetext ( $_POST ["fil_tahun_id"] );
$fil_penetapan_id = $Helper->replacetext ( $_POST ["fil_penetapan_id"] );

$rs_penentapan = $risks->penetapan_data_viewlist($fil_penetapan_id);
$arr_risk = $rs_penentapan->FetchRow();
?>
<section id="main" class="column">	
	<article class="module width_3_quarter">
		<fieldset class="form-group">
			<label>LAPORAN RISIKO</label>
		</fieldset>
		<table border='0' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr>
				<td colspan="3" style="border:0" width="10%">Tahun</td>
				<td colspan="3" style="border:0">: <?=$fil_tahun?></td>
			</tr>
			<tr>
				<td colspan="3" style="border:0">Satuan Kerja</td>
				<td colspan="3" style="border:0">: <?=$arr_risk['auditee_name'];?></td>
			</tr>
			<tr>
				<td colspan="3" style="border:0">Kegiatan</td>
				<td colspan="3" style="border:0">: <?=$arr_risk['penetapan_nama'];?></td>
			</tr>
		</table>
		<br><br>
		<fieldset class="form-group">
			<label>ANALISIS RISIKO</label>
		</fieldset>
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr align="center">
				<th width="2%" rowspan="2">No</th>
				<th width="47%" colspan="5">Identifikasi Risiko</th>
				<th width="47%" colspan="6">Risiko Inheren</th>
			</tr>
			<tr align="center">
				<th>Kategori Risiko</th>
				<th>No Risiko</th>
				<th>Nama Risiko</th>
				<th>Faktor <br>Penyebab Risiko
				</th>
				<th>Selera Risiko</th>
				<th>TK</th>
				<th>TD</th>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;RI&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th>Bobot<br>Risiko
				</th>
				<th>Nilai<br>Risiko<br>Inhern
				</th>
				<th>Bobot<br>Kategori<br>Risiko
				</th>
			</tr>
		<?php
		$i = 0;
		$no = 0;
		$rs_kategori = $params->risk_kategori_data_viewlist ();
		while ( $arr_kategori = $rs_kategori->FetchRow () ) {
			$x = 0;
			$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $fil_penetapan_id );
			$countKat = $rs_iden->RecordCount ();
			while ( $arr_iden = $rs_iden->FetchRow () ) {
				$x ++;
				$no ++;
				$rs_val_ri = $risks->cek_range_ri ( $arr_iden ['analisa_ri'] );
				$get_val_ri = $rs_val_ri->FetchRow ();
				?>
			<input type="hidden" name="indentifikasi_id" value="<?=$arr_iden['identifikasi_id'];?>">
				<tr>
				<?php
				if ($x == 1) {
					$i ++;
					?>
				<td rowspan=<?=$countKat?>><?=$i?></td>
					<td rowspan=<?=$countKat?>><?=$arr_iden['risk_kategori'];?></td>
				<?php
				}
				?>
				<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_penyebab'];?></td>
					<td><?=$arr_iden['identifikasi_selera'];?></td>
					<td><?=$arr_iden['analisa_kemungkinan_name'];?> (<?=$arr_iden['analisa_kemungkinan'];?>)</td>
					<td><?=$arr_iden['analisa_dampak_name'];?> (<?=$arr_iden['analisa_dampak'];?>)</td>
					<td align="center"><label class="ri"><?=$get_val_ri['ri_name']?> (<?=$arr_iden['analisa_ri']?>)</label></td>
					<td align="center"><?=$arr_iden['analisa_bobot_risk']?> %</td>
					<td align="center"><label class="nilai_inhern"><?=$arr_iden['analisa_nilai_ri']?></label></td>	
				<?php
				if ($x == 1) {
					?>			
				<td align="center" rowspan=<?=$countKat?>><?=$arr_iden['analisa_bobot_kat_risk']?> %</td>
				<?php
				}
				?>
			</tr>
		<?php
			}
		}
		?>
		</table>
		<br>
		<fieldset class="form-group">
			<label>EVALUASI RISIKO</label>
		</fieldset>
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr align="center">
				<th width="2%" rowspan="2">No</th>
				<th width="58%" colspan="7">Risiko Inhern</th>
				<th width="30%" colspan="2">Pengendalian Internal</th>
				<th width="6%" rowspan="2">Risiko Residu</th>
			</tr>
			<tr align="center">
				<th>Kategori Risiko</th>
				<th>Bobot<br>Kategori<br>Risiko
				</th>
				<th>No Risiko</th>
				<th>Nama Risiko</th>
				<th>Selera Risiko</th>
				<th>RI</th>
				<th>Bobot<br>Risiko
				</th>
				<th>Komponen<br> Pengendalian
				</th>
				<th>Efektifitas<br>Pengendalian
				</th>
			</tr>
		<?php
		$i = 0;
		$no = 0;
		$rs_kategori = $params->risk_kategori_data_viewlist ();
		while ( $arr_kategori = $rs_kategori->FetchRow () ) {
			$x = 0;
			$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $fil_penetapan_id );
			$countKat = $rs_iden->RecordCount ();
			while ( $arr_iden = $rs_iden->FetchRow () ) {
				$x ++;
				$no ++;
				$rs_val_ri = $risks->cek_range_ri ( $arr_iden ['analisa_ri'] );
				$get_val_ri = $rs_val_ri->FetchRow ();
				?>
			<tr>
				<?php
				if ($x == 1) {
					$i ++;
					?>
				<td rowspan=<?=$countKat?>><?=$i?></td>
					<td rowspan=<?=$countKat?>><?=$arr_iden['risk_kategori'];?></td>
					<td rowspan=<?=$countKat?>><?=$arr_iden['analisa_bobot_kat_risk'];?> (%)</td>
				<?php
				}
				?>
				<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_selera'];?></td>
					<td><label class="label_ri"><?=$get_val_ri['ri_name'];?> (<?=$get_val_ri['ri_value'];?>)</label></td>
					<td><?=$arr_iden['analisa_bobot_risk'];?> %</td>
					<td><?=$arr_iden['evaluasi_komponen'];?></td>
					<td><?=$arr_iden['evaluasi_efektifitas_name'];?> (<?=$arr_iden['evaluasi_efektifitas'];?>)</td>
					<td><label class="rr"><?=$arr_iden['evaluasi_risiko_residu_name']?> (<?=$arr_iden['evaluasi_risiko_residu']?>)</label></td>
				</tr>
		<?php
			}
		}
		?>
		</table>
		<br>
		<fieldset class="form-group">
			<label>PENANGANAN RISIKO</label>
		</fieldset>
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
				<tr align="center">
					<th width="2%" rowspan="2">No</th>
					<th width="55%" colspan="5">Risiko Residu</th>
					<th width="10%" rowspan="2">Pilihan<br>Penanganan<br>Risiko
					</th>
					<th width="33%" colspan="3">Penanganan Risiko</th>
				</tr>
				<tr align="center">
					<th width="25">Kategori Risiko</th>
					<th>No Risiko</th>
					<th width="40">Nama Risiko</th>
					<th>Selera Risiko</th>
					<th>Nilai<br>Risiko<br>Residu
					</th>
					<th>Rencana<br>Aksi
					</th>
					<th>Rencana<br> Waktu
					</th>
					<th>Penanggung<br>Jawab
					</th>
				</tr>
		<?php
		$cek_penanganan = $risks->cek_penanganan($fil_penetapan_id);
		$i = 0;
		$no = 0;
		$rs_kategori = $params->risk_kategori_data_viewlist ();
		while ( $arr_kategori = $rs_kategori->FetchRow () ) {
			$x = 0;
			$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $fil_penetapan_id );
			$countKat = $rs_iden->RecordCount ();
			while ( $arr_iden = $rs_iden->FetchRow () ) {
				$x ++;
				$no ++;
				?>
			<tr>
				<?php
				if ($x == 1) {
					$i ++;
					?>
				<td rowspan=<?=$countKat?>><?=$i?></td>
					<td rowspan=<?=$countKat?>><?=$arr_iden['risk_kategori'];?></td>
				<?php
				}
				?>
				<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
					<td><?=$arr_iden['identifikasi_selera'];?></td>
					<td><?=$arr_iden['evaluasi_risiko_residu_name'];?> (<?=$arr_iden['evaluasi_risiko_residu'];?>)</td>
					<td><?=$arr_iden['risk_penanganan_jenis'];?></td>
					<td><?=$arr_iden['penanganan_plan']?></td>
					<td><?=$Helper->dateIndo($arr_iden['penanganan_date'])?></td>
					<td><?=$arr_iden['pic_name']?></td>
				</tr>
		<?php
			}
		}
		
		
		?>
		</table>
		<br><br>
		<table border='0' width="80%" class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr>
				<td style="border:0" width="70%">&nbsp;</td>
				<td style="border:0" width="30%">Pemilik Risiko <br>Kepala Satker</td>
			</tr>
			<tr>
				<td style="border:0">&nbsp;</td>
				<td style="border:0"><br><br><u>xxxxxxxxxxxxxx</u><br>NIP</td>
			</tr>
		</table>
	</article>
</section>