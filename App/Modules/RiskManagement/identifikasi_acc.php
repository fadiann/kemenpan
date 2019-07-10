<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
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
				<div class="clone">
				<fieldset class="form-group mt-md">
					<label class="col-sm-3 control-label">Indikator Kinerja<span class="required">*</span></label> 
					<div class="col-sm-5">
						<input type="text" class="form-control" name="indikator[]" id="indikator"> 
					</div>
				</fieldset>
				<!-- FIELD BARU -->
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Kejadian Risiko<span class="required">*</span></label> 
					<div class="col-sm-5">
						<input type="text" class="form-control" name="nama[]" id="nama"> 
				</div>
				</fieldset><!-- SEBELUMNYA NAMA RISIKO -->
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Ketegori Risiko<span class="required">*</span></label>
					<div class="col-sm-5">
					<?= $Helper->dbCombo("kategori[]", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", "", "", 1) ?>
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
					<!-- <textarea cols="10" rows="5" class="form-control" name="dampak" id="dampak"></textarea><span class="required">*</span> -->
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
				<? /*
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Selera Risiko</label>
				<?=$Helper->dbCombo("selera", "par_risk_selera", "risk_selera", "risk_selera", "and risk_selera_del_st = 1 ", "", "", 1)?><span class="required">*</span>
			</fieldset>
			*/ ?>
				<?
				break;
			case "getedit":
				$arr = $rs->FetchRow();
				?>
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Nomor Risiko<span class="required">*</span></label>
					<div class="col-sm-5">
					<input type="text" class="form-control" name="id_risiko" id="id_risiko" value="<?php echo $arr['identifikasi_no_risiko'] ?>" readonly>
					</div>
				</fieldset>

				<!-- FIELD BARU -->
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Sasaran Organisasi<span class="required">*</span></label> 
					<div class="col-sm-5"><input type="text" class="form-control" name="sasaran" id="sasaran" value="<?php echo $arr['identifikasi_selera'] ?>"> </div> <!--selera digunakan sebagai sasaran-->
				</fieldset>

				<?php 
				$rs_detail = $risks->get_identifikasi_detail_byId($arr['identifikasi_id']);
				while($row_detail = $rs_detail->fetchRow()):?>
				<div id="clone">
				<fieldset class="form-group mt-md">
					<label class="col-sm-3 control-label">Indikator Kinerja<span class="required">*</span></label> 
					<div class="col-sm-5"><input type="text" class="form-control" name="indikator" id="indikator" value="<?=$row_detail['indikator_kinerja']?>"> </div>
					<div class="col-sm-2">
						<a class="btn btn-danger btn-md btn-circle" onclick="hapus('<?=$row_detail['identifikasi_detail_id']?>', '<?=$row_detail['identifikasi_id']?>')"><i class="fa fa-times-circle"></i></a>
					</div>
				</fieldset>
				<!-- FIELD BARU -->
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Kejadian Risiko<span class="required">*</span></label> 
					<div class="col-sm-5"><input type="text" class="form-control" name="nama" id="nama" value="<?=$row_detail['kejadian_risiko']?>"></div>
				</fieldset>
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Ketegori Risiko<span class="required">*</span></label>
					<div class="col-sm-5">
					<?= $Helper->dbCombo("kategori", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", $row_detail['kategori_risiko'], "", 1) ?>
					</div>
				</fieldset>
				<? /*
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Faktor Penyebab Risiko</label> <input type="text" class="span7" name="penyebab" id="penyebab" value="<?php echo $arr['identifikasi_penyebab'] ?>"> <span class="required">*</span>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Selera Risiko</label>
				<?= $Helper->dbCombo("selera", "par_risk_selera", "risk_selera", "risk_selera", "and risk_selera_del_st ", $arr['identifikasi_selera'], "", 1) ?><span class="required">*</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?= $arr['identifikasi_id'] ?>">
			*/ ?>

				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Penyebab Risiko<span class="required">*</span></label>
					<div class="col-sm-5">
					<textarea cols="10" rows="5" class="form-control" name="penyebab" id="penyebab"><?= $row_detail['penyebab_risiko'] ?></textarea>
					</div>
				</fieldset>

				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Dampak Risiko<span class="required">*</span></label>
					<div class="col-sm-5">
					<!-- <textarea cols="10" rows="5" class="form-control" name="dampak" id="dampak"></textarea><span class="required">*</span> -->
					<select name="dampak" id="dampak" class="form-control">
						<option value="">---Pilih Salah Satu---</option>
						<option value="Beban Keuangan Negara (Fraud)" 
						<?php if ($row_detail['dampak_risiko'] == 'Beban Keuangan Negara (Fraud)') { echo 'selected'; } ?>>
						Beban Keuangan Negara (Fraud)
						</option>
						<option value="Beban Keuangan Negara (Non Fraud)" 
						<?php if ($row_detail['dampak_risiko'] == 'Beban Keuangan Negara (Non Fraud)') { echo 'selected'; } ?>>
						Beban Keuangan Negara (Non Fraud)
						</option>
						<option value="Penurunan Reputasi" 
						<?php if ($row_detail['dampak_risiko'] == 'Penurunan Reputasi') { echo 'selected'; } ?>>
						Penurunan Reputasi
						</option>
						<option value="Sanksi Pidana" 
						<?php if ($row_detail['dampak_risiko'] == 'Sanksi Pidana') { echo 'selected'; } ?>>
						Sanksi Pidana
						</option>
						<option value="Sanksi perdata" 
						<?php if ($row_detail['dampak_risiko'] == 'Sanksi perdata') { echo 'selected'; } ?>>
						Sanksi perdata
						</option>
						<option value="Sanksi administratif" 
						<?php if ($row_detail['dampak_risiko'] == 'Sanksi administratif') { echo 'selected'; } ?>>
						Sanksi administratif
						</option>
						<option value="Kecelakaan Kerja" 
						<?php if ($row_detail['dampak_risiko'] == 'Kecelakaan Kerja') { echo 'selected'; } ?>>
						Kecelakaan Kerja
						</option>
						<option value="Gangguan terhadap layanan organisasi" 
						<?php if ($row_detail['dampak_risiko'] == 'Gangguan terhadap layanan organisasi') { echo 'selected'; } ?>>
						Gangguan terhadap layanan organisasi
						</option>
						<option value="Penurunan Kinerja" 
						<?php if ($row_detail['dampak_risiko'] == 'Penurunan Kinerja') { echo 'selected'; } ?>>
						Penurunan Kinerja
						</option>
					</select>
					</div>
					<?//=$arr['identifikasi_selera']?>
				</fieldset>
				</div>
				<?php endwhile ?>
				<div class="clonning"></div>
				<? /*
				<fieldset class="form-group">
					<label class="col-sm-3 control-label">Dampak Risiko</label>
					<textarea cols="10" rows="5" class="form-control" name="dampak" id="dampak"><?= $arr['identifikasi_nama_risiko'] ?></textarea>
					<span class="required">*</span>
				</fieldset>
				*/ ?>
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