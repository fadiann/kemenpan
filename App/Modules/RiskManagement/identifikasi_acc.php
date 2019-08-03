<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
			<form method="post" name="f" action="#" class="form-horizontal" id="validation-form">
				<?php
				switch ($_action) {
					case "getadd":
				?>
					<!-- FIELD BARU -->
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Sasaran Organisasi<span class="required">*</span></label> 
						<div class="col-sm-5">
							<input type="text" class="form-control" name="sasaran" id="sasaran">
						</div>
						<div class="col-sm-2">
							<a class="btn btn-warning btn-md btn-circle tambah"><i class="fa fa-plus-circle"></i></a>
							<a class="btn btn-danger btn-md btn-circle hapus"><i class="fa fa-times-circle"></i></a>
						</div>
					</fieldset>
					<!-- FIELD BARU -->
					<div class="clone">
					<fieldset class="form-group mt-md">
						<label class="col-sm-3 control-label">Indikator Kinerja<span class="required">*</span></label> 
						<div class="col-sm-5">
							<input type="text" class="form-control" name="indikator[]" id="indikator"> 
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Kejadian Risiko<span class="required">*</span></label> 
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nama[]" id="nama"> 
						</div>
					</fieldset>
					<!-- SEBELUMNYA NAMA RISIKO -->
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Ketegori Risiko<span class="required">*</span></label>
						<div class="col-sm-5">
						<?= $Helper->dbComboXSelect("kategori[]", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", "", "", 1) ?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Penyebab Risiko<span class="required">*</span></label>
						
						<div class="col-sm-5">
							<textarea cols="10" rows="5" class="form-control" name="penyebab[]" id="penyebab"></textarea>
						</div>
							
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Dampak Risiko<span class="required">*</span></label>
						<div class="col-sm-5">
							<select name="dampak[]" id="dampak" class="form-control">
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
						</div>
					</fieldset>
					</div>
					<div class="clonning"></div>
					<?
					break;
				case "getedit":
					$arr = $rs->FetchRow();
					?>

					<!-- FIELD BARU -->
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Sasaran Organisasi<span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text" class="form-control" name="sasaran" id="sasaran" value="<?=$arr['identifikasi_sasaran'] ?>" readonly > </div> <!--selera digunakan sebagai sasaran-->
						<div class="col-sm-5"><input type="hidden" class="form-control" name="sasaran" id="sasaran" value="<?=$arr['identifikasi_sasaran_id'] ?>" readonly > </div> <!--selera digunakan sebagai sasaran-->
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Indikator Kinerja<span class="required">*</span></label> 
						<div class="col-sm-5">
							<input type="text" class="form-control" name="indikator" id="indikator" value="<?=$arr['identifikasi_indikator_name'] ?>" readonly> 
							<input type="hidden" class="form-control" name="indikator" id="indikator" value="<?=$arr['identifikasi_indikator_id'] ?>" readonly> 
						</div>
					</fieldset>
					<fieldset class="form-group mt-md">
						<label class="col-sm-3 control-label">Kejadian Risiko<span class="required">*</span></label> 
						<div class="col-sm-5"><input type="text" class="form-control" name="nama" id="nama" value="<?=$arr['identifikasi_nama_risiko']?>"></div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Ketegori Risiko<span class="required">*</span></label>
						<div class="col-sm-5">
						<?= $Helper->dbComboXSelect("kategori", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", $arr['identifikasi_kategori_id'], "", 1) ?>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Penyebab Risiko<span class="required">*</span></label>
						<div class="col-sm-5">
						<textarea cols="10" rows="5" class="form-control" name="penyebab" id="penyebab"><?= $arr['identifikasi_penyebab'] ?></textarea>
						</div>
					</fieldset>

					<fieldset class="form-group">
						<label class="col-sm-3 control-label">Dampak Risiko<span class="required">*</span></label>
						<div class="col-sm-5">
						<select name="dampak" id="dampak" class="form-control">
							<option value="">---Pilih Salah Satu---</option>
							<option value="Beban Keuangan Negara (Fraud)" 
							<?php if ($arr['identifikasi_dampak'] == 'Beban Keuangan Negara (Fraud)') { echo 'selected'; } ?>>
							Beban Keuangan Negara (Fraud)
							</option>
							<option value="Beban Keuangan Negara (Non Fraud)" 
							<?php if ($arr['identifikasi_dampak'] == 'Beban Keuangan Negara (Non Fraud)') { echo 'selected'; } ?>>
							Beban Keuangan Negara (Non Fraud)
							</option>
							<option value="Penurunan Reputasi" 
							<?php if ($arr['identifikasi_dampak'] == 'Penurunan Reputasi') { echo 'selected'; } ?>>
							Penurunan Reputasi
							</option>
							<option value="Sanksi Pidana" 
							<?php if ($arr['identifikasi_dampak'] == 'Sanksi Pidana') { echo 'selected'; } ?>>
							Sanksi Pidana
							</option>
							<option value="Sanksi perdata" 
							<?php if ($arr['identifikasi_dampak'] == 'Sanksi perdata') { echo 'selected'; } ?>>
							Sanksi perdata
							</option>
							<option value="Sanksi administratif" 
							<?php if ($arr['identifikasi_dampak'] == 'Sanksi administratif') { echo 'selected'; } ?>>
							Sanksi administratif
							</option>
							<option value="Kecelakaan Kerja" 
							<?php if ($arr['identifikasi_dampak'] == 'Kecelakaan Kerja') { echo 'selected'; } ?>>
							Kecelakaan Kerja
							</option>
							<option value="Gangguan terhadap layanan organisasi" 
							<?php if ($arr['identifikasi_dampak'] == 'Gangguan terhadap layanan organisasi') { echo 'selected'; } ?>>
							Gangguan terhadap layanan organisasi
							</option>
							<option value="Penurunan Kinerja" 
							<?php if ($arr['identifikasi_dampak'] == 'Penurunan Kinerja') { echo 'selected'; } ?>>
							Penurunan Kinerja
							</option>
						</select>
						</div>
					</fieldset>
					<input type="hidden" name="data_id" value="<?= $arr['identifikasi_id'] ?>">
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
	// $("#tambah").click(function(){
	// 	$("#clone").clone().appendTo("#clonning");
	// });
	$('.hapus').click(function() {
		$('.hapus').closest('.wrap').find('.clone').not(':first').last().remove();
	});
	$('.tambah').click(function() {
		$('.tambah').closest('.wrap').find('.clone').first().clone().appendTo('.clonning');
	});
</script>
<script>
function hapus(id, id_idn) {
//hide submit button
$(".loading").show();
// console.log(id);
$.ajax({
      type: 'POST',
      data: 'data_action=delete_identifikasi&id='+id+'&id_idn='+id_idn,
      url: 'App/Modules/RiskManagement/ajax.php',
      success: function(result) {
        if(result == 0){     
  			$('#clone').remove();
			$(".loading").hide();
          	alert('Data Berhasil Di Hapus!');
        }else{               
			$(".loading").hide();  
          	alert('Data Tidak Dapat Di Hapus!');
        }
      }
    });
 }
</script>