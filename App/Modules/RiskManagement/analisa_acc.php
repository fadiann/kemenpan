<section id="main" class="column">
	<?
	include 'risk_view_parrent.php';
	?>
	<article class="module width_3_quarter">
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form">
			<?
			switch ($_action) {
				case "getadd":
					?>
				<table border='1' class="table_risk" cellspacing='0' cellpadding="0">
					<tr align="center">
						<th width="2%" rowspan="2">No</th>
						<th width="47%" colspan="6">Identifikasi Risiko</th>
						<th width="47%" colspan="6">Risiko Inheren</th>
					</tr>
					<tr align="center">
						<th>Kategori Risiko</th>
						<th>Sasaran Organisasi</th>
						<th>Indikator Kinerja</th>
						<!-- <th>No Risiko</th> -->
						<th>Kejadian Risiko</th>
						<th>Penyebab Risiko</th>
						<th>Dampak Risiko</th>
						<th>Level Kemungkinan</th>
						<th>Level Dampak</th>
						<th>Besaran Risiko</th>
						<!-- <th>Bobot<br>Risiko<br>(%)
						</th>
						<th>Nilai<br>Risiko<br>Inheren
						</th>
						<th>Bobot<br>Kategori<br>Risiko<br>(%)
						</th> -->
					</tr>
					<?php
					$i   = 0;
					$no  = 0;
					$kat = 'A';
					$rs_kategori = $params->risk_kategori_data_viewlist();
					while ($arr_kategori = $rs_kategori->FetchRow()) {
						$x = 0;
						$rs_iden = $risks->list_identifikasi($arr_kategori['risk_kategori_id'], $ses_penetapan_id);
						$countKat = $rs_iden->RecordCount();
						while ($arr_iden = $rs_iden->FetchRow()) {
							$x++;
							$no++;
							?>
							<input type="hidden" name="indentifikasi_id" value="<?= $arr_iden['identifikasi_id']; ?>">
							<tr>
								<?php
								if ($x == 1) {
									$i++;
									?>
									<td rowspan=<?= $countKat ?>><?= $i ?></td>
									<td rowspan=<?= $countKat ?>><?= $arr_iden['risk_kategori']; ?></td>
								<?php
							}
							?>
								<td><?= $arr_iden['sasaran_organisasi']; ?></td>
								<td><?= $arr_iden['indikator_kinerja']; ?></td>
								<? /*<td><?= $arr_iden['identifikasi_no_risiko']; ?></td> */ ?>
								<td><?= $arr_iden['identifikasi_nama_risiko']; ?></td>
								<td><?= $arr_iden['identifikasi_penyebab']; ?></td>
								<td><?= $arr_iden['identifikasi_selera']; ?></td>
								<td align="center">
									<?
									$rs_tk = $params->risk_tk_data_viewlist();
									$arr_tk = $rs_tk->GetArray();
									echo $Helper->buildCombo_risk("tk_id_" . $no, $arr_tk, 2, 3, $arr_iden['analisa_kemungkinan'], "font-size:8pt", false, true, false, "tingkat_kemungkinan");
									?>
								</td>
								<td align="center">
									<?
									$rs_td = $params->risk_td_data_viewlist();
									$arr_td = $rs_td->GetArray();
									echo $Helper->buildCombo("td_id_" . $no, $arr_td, 2, 3, $arr_iden['analisa_dampak'], "", "font-size:8pt", false, true, false, "tingkat_dampak");
									?>
								</td>
								<td align="center"><label class="ri"><?= $arr_iden['analisa_ri'] ?></label></td>
								<? /*
					<td align="center"><input type="text" name="bobot_risiko_<?=$no?>"
					id="bobot_risiko" size="2" class="cmb_risk bobot_ri_<?=$kat?>"
					maxlength="3" value="<?=$arr_iden['analisa_bobot_risk']?>"
					data-group="bobot_ri_<?=$kat?>"></td>
					<td align="center"><label class="nilai_inhern"><?=$arr_iden['analisa_nilai_ri']?></label></td>
					<?php
						if ($x == 1) {
							?>
					<td align="center" rowspan=<?=$countKat?>><input type="text" name="bobot_kat_risiko_<?=$no?>" size="2" class="txt_risk bobot_kat" maxlength="3" value="<?=$arr_iden['analisa_bobot_kat_risk']?>" data-group="bobot_kat"></td>
					<?php
						}
						?>
					*/ ?>
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
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?= $def_page_request ?>'"> &nbsp;&nbsp;&nbsp; <input type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?= $_nextaction ?>">
			</fieldset>
		</form>
	</article>
</section>
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