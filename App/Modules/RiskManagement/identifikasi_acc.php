<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?= $page_title . " " . $arr_penetapan['auditee_name'] ?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal" id="validation-form">
			<?
			switch ($_action) {
				case "getadd":
					?>

				<!-- FIELD BARU -->
				<fieldset class="hr">
					<label class="span2">Sasaran Organisasi</label> <input type="text" class="span4" name="sasaran" id="sasaran"> <span class="mandatory">*</span>
				</fieldset>
				<fieldset class="hr">
					<label class="span2">Indikator Kinerja</label> <input type="text" class="span4" name="indikator" id="indikator"> <span class="mandatory">*</span>
				</fieldset>
				<!-- FIELD BARU -->
				<fieldset class="hr">
					<label class="span2">Kejadian Risiko</label> <input type="text" class="span4" name="nama" id="nama"> <span class="mandatory">*</span>
				</fieldset><!-- SEBELUMNYA NAMA RISIKO -->
				<fieldset class="hr">
					<label class="span2">Ketegori Risiko</label>
					<?= $Helper->dbCombo("kategori", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", "", "", 1) ?><span class="mandatory">*</span>
				</fieldset>
				<fieldset class="hr">
					<label class="span2">Penyebab Risiko</label>
					<textarea cols="10" rows="5" class="span4" name="penyebab" id="penyebab"></textarea><span class="mandatory">*</span>
				</fieldset>
				<fieldset class="hr">
					<label class="span2">Dampak Risiko</label>
					<!-- <textarea cols="10" rows="5" class="span4" name="dampak" id="dampak"></textarea><span class="mandatory">*</span> -->
					<select name="dampak" id="dampak" class="span3">
						<option value="">---Pilih Salah Satu---</option>
						<option value="Beban Keuangan Negara (Fraud)">Beban Keuangan Negara (Fraud)</option>
						<option value="Beban Keuangan Negara (Non Fraud)">Beban Keuangan Negara (Non Fraud)</option>
						<option value="Penurunan Reputasi">Penurunan Reputasi</option>
						<option value="Sanksi Pidana">Sanksi Pidana</option>
						<option value="Sanksi perdata">Sanksi perdata</option>
						<option value="Sanksi administratif">Sanksi administratif</option>
						<option value="Kecelakaan Kerja">Kecelakaan Kerja</option>
						<option value="Gangguan terhadap layanan organisasi">Gangguan terhadap layanan organisasi</option>
						<option value="Penurunan Kinerja">Penurunan Kinerja</option>
					</select>
				</fieldset>
				<? /*
			<fieldset class="hr">
				<label class="span2">Selera Risiko</label>
				<?=$Helper->dbCombo("selera", "par_risk_selera", "risk_selera", "risk_selera", "and risk_selera_del_st = 1 ", "", "", 1)?><span class="mandatory">*</span>
			</fieldset>
			*/ ?>
				<?
				break;
			case "getedit":
				$arr = $rs->FetchRow();
				?>
				<fieldset class="hr">
					<label class="span2">Nomor Risiko</label>
					<input type="text" class="span1" name="id_risiko" id="id_risiko" value="<?php echo $arr['identifikasi_no_risiko'] ?>" readonly>
				</fieldset>

				<!-- FIELD BARU -->
				<fieldset class="hr">
					<label class="span2">Sasaran Organisasi</label> <input type="text" class="span4" name="sasaran" id="sasaran" value="<?php echo $arr['sasaran_organisasi'] ?>"> <span class="mandatory">*</span>
				</fieldset>
				<fieldset class="hr">
					<label class="span2">Indikator Kinerja</label> <input type="text" class="span4" name="indikator" id="indikator" value="<?php echo $arr['indikator_kinerja'] ?>"> <span class="mandatory">*</span>
				</fieldset>
				<!-- FIELD BARU -->

				<fieldset class="hr">
					<label class="span2">Kejadian Risiko</label> <input type="text" class="span4" name="nama" id="nama" value="<?php echo $arr['identifikasi_nama_risiko'] ?>"><span class="mandatory">*</span>
				</fieldset>
				<fieldset class="hr">
					<label class="span2">Ketegori Risiko</label>
					<?= $Helper->dbCombo("kategori", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", $arr['identifikasi_kategori_id'], "", 1) ?><span class="mandatory">*</span>
				</fieldset>
				<? /*
				<fieldset class="hr">
					<label class="span2">Faktor Penyebab Risiko</label> <input type="text" class="span7" name="penyebab" id="penyebab" value="<?php echo $arr['identifikasi_penyebab'] ?>"> <span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Selera Risiko</label>
				<?= $Helper->dbCombo("selera", "par_risk_selera", "risk_selera", "risk_selera", "and risk_selera_del_st ", $arr['identifikasi_selera'], "", 1) ?><span class="mandatory">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?= $arr['identifikasi_id'] ?>">
			*/ ?>

				<fieldset class="hr">
					<label class="span2">Penyebab Risiko</label>
					<textarea cols="10" rows="5" class="span4" name="penyebab" id="penyebab"><?= $arr['identifikasi_penyebab'] ?></textarea>
					<span class="mandatory">*</span>
				</fieldset>

				<fieldset class="hr">
					<label class="span2">Dampak Risiko</label>
					<!-- <textarea cols="10" rows="5" class="span4" name="dampak" id="dampak"></textarea><span class="mandatory">*</span> -->
					<select name="dampak" id="dampak" class="span3">
						<option value="">---Pilih Salah Satu---</option>
						<option value="Beban Keuangan Negara (Fraud)" 
						<?php if ($arr['identifikasi_selera'] == 'Beban Keuangan Negara (Fraud)') { echo 'selected'; } ?>>
						Beban Keuangan Negara (Fraud)
						</option>
						<option value="Beban Keuangan Negara (Non Fraud)" 
						<?php if ($arr['identifikasi_selera'] == 'Beban Keuangan Negara (Non Fraud)') { echo 'selected'; } ?>>
						Beban Keuangan Negara (Non Fraud)
						</option>
						<option value="Penurunan Reputasi" 
						<?php if ($arr['identifikasi_selera'] == 'Penurunan Reputasi') { echo 'selected'; } ?>>
						Penurunan Reputasi
						</option>
						<option value="Sanksi Pidana" 
						<?php if ($arr['identifikasi_selera'] == 'Sanksi Pidana') { echo 'selected'; } ?>>
						Sanksi Pidana
						</option>
						<option value="Sanksi perdata" 
						<?php if ($arr['identifikasi_selera'] == 'Sanksi perdata') { echo 'selected'; } ?>>
						Sanksi perdata
						</option>
						<option value="Sanksi administratif" 
						<?php if ($arr['identifikasi_selera'] == 'Sanksi administratif') { echo 'selected'; } ?>>
						Sanksi administratif
						</option>
						<option value="Kecelakaan Kerja" 
						<?php if ($arr['identifikasi_selera'] == 'Kecelakaan Kerja') { echo 'selected'; } ?>>
						Kecelakaan Kerja
						</option>
						<option value="Gangguan terhadap layanan organisasi" 
						<?php if ($arr['identifikasi_selera'] == 'Gangguan terhadap layanan organisasi') { echo 'selected'; } ?>>
						Gangguan terhadap layanan organisasi
						</option>
						<option value="Penurunan Kinerja" 
						<?php if ($arr['identifikasi_selera'] == 'Penurunan Kinerja') { echo 'selected'; } ?>>
						Penurunan Kinerja
						</option>
					</select>
					<?//=$arr['identifikasi_selera']?>
				</fieldset>
				<? /*
				<fieldset class="hr">
					<label class="span2">Dampak Risiko</label>
					<textarea cols="10" rows="5" class="span4" name="dampak" id="dampak"><?= $arr['identifikasi_nama_risiko'] ?></textarea>
					<span class="mandatory">*</span>
				</fieldset>
				*/ ?>
				<input type="hidden" name="data_id" value="<?= $arr['identifikasi_id'] ?>">
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
		$("#validation-form").validate({
			rules: {
				sasaran: "required",
				indikator: "required",
				nama: "required",
				kategori: "required",
				penyebab: "required",
				dampak: "required"
			},
			messages: {
				sasaran: "Masukan Sasaran Risiko",
				indikator: "Masukan Indikator Risiko",
				nama: "Masukan Nama Risiko",
				kategori: "Pilih Kategori Risiko",
				penyebab: "Masukan Faktor Penyebab Risiko",
				dampak: "Masukkan Dampak Risiko",
			},
			submitHandler: function(form) {
				form.submit();
			}
		});
	});
</script>