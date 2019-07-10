<section id="main" class="column">	
<?
include "risk_result_view.php";
?>
<article class="module width_3_quarter">
		<fieldset class="form-group">
			<label>Analisa Risiko</label>
		</fieldset>
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr align="center">
				<th width="2%" rowspan="2">No</th>
				<th width="47%" colspan="5">Identifikasi Risiko</th>
				<th width="47%" colspan="6">Risiko Inhern</th>
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
				<th>Bobot<br>Risiko<br>(%)
				</th>
				<th>Nilai<br>Risiko<br>Inhern
				</th>
				<th>Bobot<br>Kategori<br>Risiko<br>(%)
				</th>
			</tr>
	<?php
	$i = 0;
	$no = 0;
	$rs_kategori = $params->risk_kategori_data_viewlist ();
	while ( $arr_kategori = $rs_kategori->FetchRow () ) {
		$x = 0;
		$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
		$countKat = $rs_iden->RecordCount ();
		while ( $arr_iden = $rs_iden->FetchRow () ) {
			$x ++;
			$no ++;
			?>
		<input type="hidden" name="indentifikasi_id"
				value="<?=$arr_iden['identifikasi_id'];?>">
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
				<td><?=$arr_iden['analisa_kemungkinan_name'];?></td>
				<td><?=$arr_iden['analisa_dampak_name'];?></td>
				<td align="center"><label class="ri"><?=$arr_iden['analisa_ri']?></label></td>
				<td align="center"><?=$arr_iden['analisa_bobot_risk']?></td>
				<td align="center"><label class="nilai_inhern"><?=$arr_iden['analisa_nilai_ri']?></label></td>	
			<?php
			if ($x == 1) {
				?>			
			<td align="center" rowspan=<?=$countKat?>><?=$arr_iden['analisa_bobot_kat_risk']?></td>
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
			<label>Evaluasi Risiko</label>
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
				<th>Bobot<br>Kategori<br>Risiko<br>(%)
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
		$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
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
				<td rowspan=<?=$countKat?>><?=$arr_iden['analisa_bobot_kat_risk'];?></td>
			<?php
			}
			?>
			<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
				<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
				<td><?=$arr_iden['identifikasi_selera'];?></td>
				<td><label class="label_ri"><?=$arr_iden['analisa_ri'];?></label></td>
				<td><?=$arr_iden['analisa_bobot_risk'];?> %</td>
				<td><?=$arr_iden['evaluasi_komponen'];?></td>
				<td><?=$arr_iden['evaluasi_efektifitas_name'];?></td>
				<td><label class="rr"><?=$arr_iden['evaluasi_risiko_residu_name']?></label></td>
			</tr>
	<?php
		}
	}
	?>
</table>
		<br>
		<fieldset class="form-group">
			<label>Penanganan Risiko</label>
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
	$i = 0;
	$no = 0;
	$rs_kategori = $params->risk_kategori_data_viewlist ();
	while ( $arr_kategori = $rs_kategori->FetchRow () ) {
		$x = 0;
		$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
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
				<td><?=$arr_iden['evaluasi_risiko_residu'];?></td>
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
		<form method="post" name="f" action="#" class="form-horizontal">
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> 
					<?php 
					$cek_perencanaan = $plannings->cek_perencanaan($ses_penetapan_id);
					if($cek_perencanaan==0){
					?>
					<input type="button" class="blue_btn" value="Set Perencanaan" Onclick="location='<?=$page_request_plan?>&data_id=<?=$ses_penetapan_id?>'">	
					<?php 
					}
					?>		
			</fieldset>
		</form>
	</article>
</section>