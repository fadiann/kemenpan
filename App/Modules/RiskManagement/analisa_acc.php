<section id="main" class="column">
	<?
	include 'risk_view_parrent.php';
	?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
				<form method="post" name="f" action="#" class="form-horizontal" id="validation-form">
					<?
					switch ($_action) {
						case "getadd":
							?>
						<table class="table table-bordered table-striped table-condensed mb-none">
							<tr>
								<th width="5%" rowspan="2" class="text-center">No.</th>
								<th width="50%" colspan="4" class="text-center">Identifikasi Risiko</th>
								<th width="45%" colspan="6" class="text-center">Hasil Analisis dan Evaluasi</th>
							</tr>
							<tr>
								<th width="5%">Kategori Risiko</th>
								<th width="10%">Kejadian Risiko</th>
								<th width="10%">Penyebab Risiko</th>
								<th width="10%">Dampak Risiko</th>
								<th width="10%">Level Kemungkinan</th>
								<th width="10%">Level Dampak</th>
								<th width="10%">Besaran Risiko</th>
								<th width="10%">Level Risiko</th>
							</tr>
							<?php
							$i           = 0;
							$no          = 0;
							$kat         = 0;
							$rs_sasaran = $risks->identifikasi_sasaran_viewlist($ses_penetapan_id);
							$rs_kategori = $params->risk_kategori_data_viewlist();
							while ($arr_kategori = $rs_kategori->FetchRow()) {
								$x = 0;
								$rs_iden 	= $risks->list_identifikasi($arr_kategori['risk_kategori_id'], $ses_penetapan_id);
								$countKat 	= $rs_iden->RecordCount();
								while ($arr_iden = $rs_iden->FetchRow()) {
									$x++;
									$no++;
									?>
									<input type="hidden" name="indentifikasi_id" value="<?= $arr_iden['identifikasi_id']; ?>">
									<tr>
										<td class="text-center"><?=$kat?>.<?= $x ?>.</td>
										<td><?= $arr_iden['risk_kategori']; ?></td>
										<td><?= $arr_iden['identifikasi_nama_risiko']; ?></td>
										<td><?= $arr_iden['identifikasi_penyebab']; ?></td>
										<td><?= $arr_iden['identifikasi_dampak']; ?></td>
										<td align="center">
											<?
											$rs_tk = $params->risk_tk_data_viewlist();
											$arr_tk = $rs_tk->GetArray();
											echo $Helper->buildCombo_risk_analisa("tk_id_" . $no, $arr_tk, 2, 3, $arr_iden['analisa_kemungkinan'], "font-size:8pt", false, true, false, "tingkat_kemungkinan");
											?>
										</td>
										<td align="center">
											<?
											$rs_td = $params->risk_td_data_viewlist();
											$arr_td = $rs_td->GetArray();
											echo $Helper->buildCombo_risk_analisa("td_id_" . $no, $arr_td, 2, 3, $arr_iden['analisa_dampak'], "font-size:8pt", false, true, false, "tingkat_dampak");
											?>
										</td>
										<td align="center"><label class="ri"><?= $arr_iden['analisa_ri'] ?></label></td>
										<?php
										$risk_level = $arr_iden['analisa_ri'];
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
								<?php
							}
							$kat++;
						}
						?>
						</table>
						<?
						break;
					case "getedit":
						$arr = $rs->FetchRow();
						?>
						<?
						break;
				}
				?>
					<fieldset class="form-group mt-md">
						<center>
							<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?= $def_page_request ?>'">
							<input type="submit" class="btn btn-success" value="Simpan">
						</center>
						<input type="hidden" name="data_action" id="data_action" value="<?= $_nextaction ?>">
					</fieldset>
				</form>
			</div>
		</section>
	</div>
</div>
<script>
	$(function() {
		$(".tingkat_kemungkinan").on("change", function() {
			var value1 = $(this).val(),
				value2 = $(this).parent().next().find(".tingkat_dampak").val(),
				label = $(this).parent().next().next().find(".ri");
			bobot = $(this).parent().next().next().next().find(".cmb_risk");

			if (value1 > 0 && value2 > 0) {
				label.text(value1 * value2);
				bobot.val("");
				//console.log("value1: " + value1 + ", value2: " + value2);
			}
		});

		$(".tingkat_dampak").on("change", function() {
			var value2 = $(this).val(),
				value1 = $(this).parent().prev().find(".tingkat_kemungkinan").val(),
				label = $(this).parent().next().find(".ri"),
				bobot = $(this).parent().next().next().find(".cmb_risk");

			if (value1 > 0 && value2 > 0) {
				label.text(value1 * value2);
				bobot.val("");
			}
		});

		$(".cmb_risk").on("change", function() {
			var value1 = $(this).val(),
				lebel1 = $(this).parent().prev().find(".ri").text(),
				label2 = $(this).parent().next().find(".nilai_inhern");
			label2.text(value1 * lebel1 / 100);

			var bobot_ri = $(this).attr("data-group"),
				input = $(".cmb_risk." + bobot_ri),
				jml_bobot_ri = 0;
			//console.log("Nilai : " + input.size());
			$.each(input, function() {
				var bobot = $(this);
				if (bobot.val().trim() != '')
					jml_bobot_ri += parseInt(bobot.val());
				//console.log("bobot: " + bobot.attr("class"));	
			});
			//console.log("bobot: " + jml_bobot);
			if (jml_bobot_ri > 100) {
				alert('Nilai Tidak Boleh Lebih Dari 100');
				input.val("");
			}
			if (jml_bobot_ri < 100) {
				alert('Nilai Masih ' + jml_bobot_ri + ' Kurang Dari 100');
			}
		});


		$(".txt_risk").on("change", function() {
			var bobot_kat = $(this).attr("data-group"),
				input = $(".txt_risk." + bobot_kat),
				jml_bobot = 0;
			//console.log("Nilai : " + input.size());
			$.each(input, function() {
				var bobot = $(this);
				if (bobot.val().trim() != '')
					jml_bobot += parseInt(bobot.val());
				//console.log("bobot: " + bobot.attr("class"));	
			});
			console.log("bobot: " + jml_bobot);
			if (jml_bobot > 100) {
				alert('Nilai Tidak Boleh Lebih Dari 100');
				input.val("");
			}
			if (jml_bobot < 100) {
				alert('Nilai Masih  ' + jml_bobot + ' Kurang Dari 100');
			}
		});
	});
</script>