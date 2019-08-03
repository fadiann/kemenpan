<section id="main" class="column">	
<?
include "risk_view_parrent.php";
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">IDENTIFIKASI RISIKO</h2>
			</header>
			<div class="panel-body wrap">
				<table class="table table-bordered table-striped table-condensed mb-none">
					<tr>
						<th width="2%" rowspan="2" class="text-center">No.</th>
						<th width="15%" rowspan="2" class="text-center">Sasaran Organisasi</th>
						<th width="10%" colspan="2" class="text-center">Indikator Kinerja</th>
						<th width="20%" colspan="4" class="text-center">Identifikasi Risiko</th>
						<th width="10%" rowspan="2" class="text-center">Kategori Risiko</th>
					</tr>
					<tr>
						<th width="2%" class="text-center">No.</th>
						<th width="10%" class="text-center">Indikator Kinerja</th>
						<th class="text-center">No.</th>
						<th width="20%" class="text-center">Kejadian Risiko</th>
						<th width="20%" class="text-center">Penyebab Risiko</th>
						<th width="20%" class="text-center">Dampak Risiko</th>
					</tr>
					<?php
						$x = 0;
						$y = 0;
						$rs_identifikasi  = $risks->identifikasi_sasaran_viewlist($ses_penetapan_id);
						foreach($rs_identifikasi as $row_sasaran):
							$x++;
							$rowspan_sasaran = $risks->rowspanSasaran($row_sasaran['identifikasi_sasaran_id']);
							$rs_indikator    = $risks->indikator_view_bySasaran($row_sasaran['identifikasi_sasaran_id']);
							$count_indikator = $rs_indikator->recordCount();
							$jumlah_indikator = $risks->cek_jumlah_indikator($row_sasaran['identifikasi_sasaran_id']);
							//$cek_jumlah_indikator = $risks->cek_jumlah_indikator($row_sasaran['identifikasi_sasaran_id']);
							if($rowspan_sasaran == 0){
								$jumlah_indikator = $risks->cek_jumlah_indikator($row_sasaran['identifikasi_sasaran_id']);
								if($jumlah_indikator != 0){
									$rowspan_sasaran = $jumlah_indikator;
								}else{
									$rowspan_sasaran = 1;
								}
							}
						?>
						<tr>
							<td class="text-center" rowspan="<?=$rowspan_sasaran?>"><?=$x?>.</td>
							<td rowspan="<?=$rowspan_sasaran?>">
								<?=$row_sasaran['identifikasi_sasaran']?>
							</td>
							<?php
							$no_indikator = 0;
							foreach($rs_indikator as $row_indikator):
								$rowspan_indikator  = $risks->rowspanIndikator($row_indikator['identifikasi_indikator_id']);
								$rs_identifikasi    = $risks->identifikasi_view_byIndikator($row_indikator['identifikasi_indikator_id']);
								$count_identifikasi = $rs_identifikasi->recordCount();
								if($rowspan_indikator == 0){
									$rowspan_indikator = 1;
								}
								$no_indikator++;
							?>
								<td rowspan="<?=$rowspan_indikator?>" class="text-center">
									<?=$no_indikator?>
								</td>
								<td rowspan="<?=$rowspan_indikator?>">
									<?=$row_indikator['identifikasi_indikator_name']?>
								</td>
									<?php 
									$no_risiko = 0;
									foreach($rs_identifikasi as $row_identifikasi):
										$y++;
										$no_risiko++;
									?>	
										<td width="3%" class="text-center"><?=$no_risiko?>.</td>
										<td>
											<?=$row_identifikasi['identifikasi_nama_risiko']?>
										</td>
										<td><?=$row_identifikasi['identifikasi_penyebab']?></td>
										<td><?=$row_identifikasi['identifikasi_dampak']?></td>
										<td><?=$row_identifikasi['risk_kategori']?></td>
										</tr>
									<?php endforeach ?>
								</tr>
							<?php endforeach ?>
						<?php endforeach ?>
					</table>
			</div>
		</section>
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">ANALISIS DAN EVALUASI</h2>
			</header>
			<div class="panel-body wrap">
		
				<table class="table table-bordered table-striped table-condensed mb-none">
					<tr>
						<th width="5%" rowspan="2" class="text-center">No.</th>
						<th width="20%" colspan="3" class="text-center">Identifikasi Risiko</th>
						<th width="10%" rowspan="2" class="text-center">Kategori Risiko</th>
						<th width="10%" colspan="2" class="text-center">Analisis Dan Evaluasi</th>
					</tr>
					<tr>
						<th width="20%" class="text-center">Kejadian Risiko</th>
						<th width="20%" class="text-center">Penyebab Risiko</th>
						<th width="20%" class="text-center">Dampak Risiko</th>
						<th width="5%" class="text-center">Besaran Risiko</th>
						<th width="20%" class="text-center">Level Risiko</th>
					</tr>
					<?php
						$x = 0;
						$y = 0;
						$rs_analisis  = $risks->identifikasi_sasaran_viewlist($ses_penetapan_id);
						foreach($rs_analisis as $row_analisis):
							$x++;
							$rowspan_sasaran = $risks->rowspanSasaran($row_analisis['identifikasi_sasaran_id']);
							$rs_indikator    = $risks->indikator_view_bySasaran($row_analisis['identifikasi_sasaran_id']);
							$count_indikator = $rs_indikator->recordCount();
							$jumlah_indikator = $risks->cek_jumlah_indikator($row_analisis['identifikasi_sasaran_id']);
							//$cek_jumlah_indikator = $risks->cek_jumlah_indikator($row_sasaran['identifikasi_sasaran_id']);
							if($rowspan_sasaran == 0){
								$jumlah_indikator = $risks->cek_jumlah_indikator($row_analisis['identifikasi_sasaran_id']);
								if($jumlah_indikator != 0){
									$rowspan_sasaran = $jumlah_indikator;
								}else{
									$rowspan_sasaran = 1;
								}
							}
						?>
						<tr>
							<?php
							$no_indikator = 0;
							foreach($rs_indikator as $row_indikator):
								$rowspan_indikator  = $risks->rowspanIndikator($row_indikator['identifikasi_indikator_id']);
								$rs_identifikasi    = $risks->identifikasi_view_byIndikator($row_indikator['identifikasi_indikator_id']);
								$count_identifikasi = $rs_identifikasi->recordCount();
								if($rowspan_indikator == 0){
									$rowspan_indikator = 1;
								}
								$no_indikator++;
							?>
									<?php 
									$no_risiko = 0;
									foreach($rs_identifikasi as $row_identifikasi):
										$y++;
										$no_risiko++;
									?>	
										<td width="5%" class="text-center"><?=$x.".".$no_indikator.".".$no_risiko?>.</td>
										<td>
											<?=$row_identifikasi['identifikasi_nama_risiko']?>
										</td>
										<td><?=$row_identifikasi['identifikasi_penyebab']?></td>
										<td><?=$row_identifikasi['identifikasi_dampak']?></td>
										<td class="text-center"><?=$row_identifikasi['risk_kategori']?></td>

										<td class="text-center"><?=$row_identifikasi['analisa_ri'] ?></td><?php
										$risk_level = $row_identifikasi['analisa_ri'];
										if ($risk_level == '' || $risk_level == 0) {
											echo "<td align='center'>";
											echo "<label class='levelrisk'>";
											echo "Belum Terhitung";
											echo "</label>";
											echo "</td>";
										} elseif ($risk_level > 0 && $risk_level <= 5) {
											echo "<td align='center' style='background-color: blue; color: #FFFFFF'>";
											echo "<label class='levelrisk'>";
											echo "Sangat Rendah";
											echo "</label>";
											echo "</td>";
										} elseif ($risk_level >= 6 && $risk_level <= 11) {
											echo "<td align='center' style='background-color: green; color: #FFFFFF'>";
											echo "<label class='levelrisk'>";
											echo "Rendah";
											echo "</label>";
											echo "</td>";
										} elseif ($risk_level >= 12 && $risk_level <= 15) {
											echo "<td align='center' style='background-color: yellow; color: #FFFFFF'>";
											echo "<label class='levelrisk'>";
											echo "Sedang";
											echo "</label>";
											echo "</td>";
										} elseif ($risk_level >= 16 && $risk_level <= 19) {
											echo "<td align='center' style='background-color: orange; color: #FFFFFF'>";
											echo "<label class='levelrisk'>";
											echo "Tinggi";
											echo "</label>";
											echo "</td>";
										} elseif ($risk_level >= 20 && $risk_level <= 25) {
											echo "<td align='center' style='background-color: red; color: #FFFFFF'>";
											echo "<label class='levelrisk'>";
											echo "Sangat Tinggi";
											echo "</label>";
											echo "</td>";
										}
										?>
										</tr>
									<?php endforeach ?>
								</tr>
							<?php endforeach ?>
						<?php endforeach ?>
				</table>
			</div>
		</section>
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">PENANGANAN RISIKO</h2>
			</header>
			<div class="panel-body wrap">
			<table class="table table-bordered table-striped table-condensed mb-none">
					<tr>
						<th width="5%" rowspan="2" class="text-center">No.</th>
						<th width="10%" rowspan="2" class="text-center">Kategori Risiko</th>
						<th width="20%" colspan="2" class="text-center">Hasil Analisis Risiko</th>
						<th width="10%" colspan="2" class="text-center">Tindak Pengendalian</th>
					</tr>
					<tr>
						<th width="20%" class="text-center">Kejadian Risiko</th>
						<th width="5%" class="text-center">Besaran Risiko</th>
						<th width="20%" class="text-center">Penanganan</th>
						<th width="20%" class="text-center">Mitigasi</th>
					</tr>
					<?php
						$x = 0;
						$y = 0;
						$rs_penanganan  = $risks->identifikasi_sasaran_viewlist($ses_penetapan_id);
						foreach($rs_penanganan as $row_penanganan):
							$x++;
							$rowspan_sasaran = $risks->rowspanSasaran($row_penanganan['identifikasi_sasaran_id']);
							$rs_indikator    = $risks->indikator_view_bySasaran($row_penanganan['identifikasi_sasaran_id']);
							$count_indikator = $rs_indikator->recordCount();
							$jumlah_indikator = $risks->cek_jumlah_indikator($row_penanganan['identifikasi_sasaran_id']);
							//$cek_jumlah_indikator = $risks->cek_jumlah_indikator($row_sasaran['identifikasi_sasaran_id']);
							if($rowspan_sasaran == 0){
								$jumlah_indikator = $risks->cek_jumlah_indikator($row_penanganan['identifikasi_sasaran_id']);
								if($jumlah_indikator != 0){
									$rowspan_sasaran = $jumlah_indikator;
								}else{
									$rowspan_sasaran = 1;
								}
							}
						?>
						<tr>
							<?php
							$no_indikator = 0;
							foreach($rs_indikator as $row_indikator):
								$rowspan_indikator  = $risks->rowspanIndikator($row_indikator['identifikasi_indikator_id']);
								$rs_identifikasi    = $risks->identifikasi_view_byIndikator($row_indikator['identifikasi_indikator_id']);
								$count_identifikasi = $rs_identifikasi->recordCount();
								if($rowspan_indikator == 0){
									$rowspan_indikator = 1;
								}
								$no_indikator++;
							?>
									<?php 
									$no_risiko = 0;
									foreach($rs_identifikasi as $row_identifikasi):
										$y++;
										$no_risiko++;
									?>	
										<td width="5%" class="text-center"><?=$x.".".$no_indikator.".".$no_risiko?>.</td>
										<td><?=$row_identifikasi['risk_kategori']?></td>
										<td>
											<?=$row_identifikasi['identifikasi_nama_risiko']?>
										</td>
										<td class="text-center"><?=$row_identifikasi['analisa_ri'] ?></td>
										<td class="text-center">
											<?php
											if($row_identifikasi['penanganan_risiko_id'] == ''){

											}else{
											?>
											<?=$params->risk_penanganan_data_viewlist($row_identifikasi['penanganan_risiko_id'])->FetchRow()['risk_penanganan_jenis']?>
											<?//=$row_identifikasi['penanganan_risiko_id'] ?>
											<?php } ?>
										</td>
										<td class="text-center"><?=$row_identifikasi['penanganan_plan'] ?></td>
										</tr>
									<?php endforeach ?>
								</tr>
							<?php endforeach ?>
						<?php endforeach ?>
				</table>
			</div>
		</section>
<?php /*
<form method="post" name="f" action="#" class="form-horizontal" onsubmit="return cek_data()">
<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">KOMENTAR :</h2>
	</header>
	<div class="panel-body wrap">
	<table class="table table-borderless table-condensed table-hover">
		<tr>
			<td>Detail komentar</td>
			<td>:</td>
			<td>
			<?php 
			$z = 0;
			$rs_komentar = $risks->risk_komentar_viewlist ( $ses_penetapan_id );
			while ( $arr_komentar = $rs_komentar->FetchRow () ) {
				$z ++;
				echo $z.". ".$arr_komentar['pic_name']." : ".$arr_komentar['penetapan_comment_desc']."<br>";
			}
			?>
			</td>
		</tr>
	</table>
</fieldset>
	<?php 
switch ($_action) {
	case "poststatus" :
	?>
<fieldset class="form-group">
	<label class="col-sm-3 control-label">Isi Komentar</label>
	<textarea id="komentar" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
</fieldset>
<?
		break;
}
?>
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'">
			<?php
	if($_action!='poststatus'){
		if($cek_penanganan<>0){
			if($getajukan){
				if ($arr_penetapan ['penetapan_status'] == '0' || $arr_penetapan ['penetapan_status'] == '3') {
					echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Ajukan\" onclick=\"document.getElementById('status_risk').value=1\">";
				}
			}
			if($getapprove){
				if ($arr_penetapan ['penetapan_status'] == '1') {
					echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status_risk').value=3\">";
					echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Setujui\" onclick=\"document.getElementById('status_risk').value=2\">";
				}
			}
		}
	}else{
		echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Simpan\">";
	}
			?>
		</center>
				<input type="hidden" name="status_resiko" value="<?=@$fstatus_risiko?>">	
				<input type="hidden" name="penetapan_id" id="penetapan_id" value="<?=$ses_penetapan_id?>">
				<input type="hidden" name="status_risk" id="status_risk" value="">
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</fieldset>
		</form>
		*/ ?>
	</article>
	</div>
</div>

<script>
function cek_data(){
	var data = document.getElementById('status_risk').value;
	if(data==1) text = "Anda Yakin Akan Mengajukan?";
	if(data==2) text = "Anda Yakin Akan Menyetujui?";
	if(data==3) text = "Anda Yakin Akan Menolak?";
	return confirm(text);
}
</script>