<form method="post" name="f" action="#">
<?php
	include 'risk_view_parrent.php';
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body">
				<div class="form-inline text-right mt-sm">
				<?php if ($iconAdd == '1') { ?>
					<a class="btn btn-success modal-basic " data-toggle="modal" data-target="#addsasaran" style="cursor: pointer;"><i class="fa fa-plus"> </i> Tambah Sasaran</a>
					<a class="btn btn-success modal-basic " data-toggle="modal" data-target="#addindikator" style="cursor: pointer;"><i class="fa fa-plus"> </i> Tambah Indikator</a>
					<a class="btn btn-success modal-basic " data-toggle="modal" data-target="#addrisiko" style="cursor: pointer;"><i class="fa fa-plus"> </i> Tambah Risiko</a>
				<?php } ?>
				</div>
				<input type="hidden" value="" name="data_action" id="data_action">
				<input type="hidden" value="" name="data_id" id="data_id">
				<div class="table-responsive mt-md">
					<table class="table table-bordered table-striped table-condensed mb-none">
						<tr>
							<th class="text-center" width="6%">No.</th>
							<th class="text-center" width="60%">Sasaran</th>
							<th class="text-center" width="20%">Indikator</th>
							<th class="text-center" width="14%">#</th>
						</tr>
						<?php
						$x = 1;
						foreach($rs_sasaran as $row_sasaran):
							$rs_indikator    = $risks->indikator_view_bySasaran($row_sasaran['identifikasi_sasaran_id']);
							$count_indikator = $rs_indikator->recordCount();
						?>
						<tr>
							<td class="text-center"><?=$x++?>.</td>
							<td><?=$row_sasaran['identifikasi_sasaran']?></td>
							<td class="text-center">
								<?=$count_indikator?><br>
								<button class="btn btn-default btn-md btn-circle" onclick=""><i class="fa fa-search"></i></button>
							</td>
							<td class="text-center">
								<a class="btn btn-warning btn-md btn-circle" onclick="return set_action('getedit', '', '')"><i class="fa fa-pencil"></i></a>
								<a class="btn btn-danger btn-md btn-circle" onclick="return set_action('getdelete', '', '')"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</form>

<!-- MODAL TAMBAH SASARAN -->
<div class="modal fade" id="addsasaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Tambah Sasaran</h4>
		</div>
		<div class="modal-body">
				<div class="row wrapsasaran">
						<fieldset class="form-group">
							<div class="col-sm-12 text-center">
								<a class="btn btn-warning btn-md btn-circle tambahsasaran"><i class="fa fa-plus-circle"></i></a>
								<a class="btn btn-danger btn-md btn-circle hapussasaran"><i class="fa fa-times-circle"></i></a>
							</div>
						</fieldset>
					<div class="clonesasaran">
						<fieldset class="form-group mt-md">
							<label class="col-sm-3 control-label text-right">Sasaran<span class="required">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="sasaran[]" class="form-control">
							</div>
						</fieldset>
					</div>
					<div class="clonningsasaran"></div>
				</div>
				<input type="hidden" name="data_action" value="postsasaran" id="data_action">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="submit" name="simpan" class="btn btn-success btn-sm" value="Simpan">
		</div>
		</div>
	</div>
	</form>
</div>

<!-- MODAL TAMBAH INDIKATOR -->
<div class="modal fade" id="addindikator" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Tambah Indikator</h4>
		</div>
		<div class="modal-body">
			<div class="row wrapindikator">
					<fieldset class="form-group mt-md">
						<label class="col-sm-3 control-label text-right">Sasaran<span class="required">*</span></label>
						<div class="col-sm-6">
							<?=$Helper->dbCombo('id_sasaran', 'risk_identifikasi_sasaran', 'identifikasi_sasaran_id', 'identifikasi_sasaran', "AND identifikasi_penetapan_id = '".$ses_penetapan_id."'", '', '', 1); ?>
						</div>
						<div class="col-sm-3 text-center">
							<a class="btn btn-warning btn-md btn-circle tambahindikator"><i class="fa fa-plus-circle"></i></a>
							<a class="btn btn-danger btn-md btn-circle hapusindikator"><i class="fa fa-times-circle"></i></a>
						</div>
					</fieldset>
				<div class="cloneindikator">
					<fieldset class="form-group mt-md">
						<label class="col-sm-3 control-label text-right">Indikator<span class="required">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="indikator[]" class="form-control">
						</div>
					</fieldset>
				</div>
				<div class="clonningindikator"></div>
			</div>
			<input type="hidden" name="data_action" value="postindikator" id="data_action">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="submit" name="simpan" class="btn btn-success btn-sm" value="Simpan">
		</div>
		</div>
	</div>
	</form>
</div>

<!-- MODAL TAMBAH RISIKO -->
<div class="modal fade" id="addrisiko" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<form action="" method="post" enctype="multipart/form-data">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content" >
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Tambah Risiko</h4>
		</div>
		<div class="modal-body">
			<div class="row wraprisiko">
					<fieldset class="form-group mt-md">
						<label class="col-sm-3 control-label text-right">Indikator<span class="required">*</span></label>
						<div class="col-sm-6">
							<?=$Helper->dbCombo('indikator', 'risk_identifikasi_indikator', 'identifikasi_indikator_id', 'identifikasi_indikator_name', "AND identifikasi_penetapan_id = '".$ses_penetapan_id."'", '', '', 1); ?>
						</div>
						<div class="col-sm-3 text-center">
							<a class="btn btn-warning btn-md btn-circle tambahrisiko"><i class="fa fa-plus-circle"></i></a>
							<a class="btn btn-danger btn-md btn-circle hapusrisiko"><i class="fa fa-times-circle"></i></a>
						</div>
					</fieldset>
				<div class="clonerisiko">
					<fieldset class="form-group mt-md">
						<label class="col-sm-3 control-label text-right">Kejadian Risiko<span class="required">*</span></label> 
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nama[]" id="nama"> 
						</div>
					</fieldset>
					<!-- SEBELUMNYA NAMA RISIKO -->
					<fieldset class="form-group">
						<label class="col-sm-3 control-label text-right">Ketegori Risiko<span class="required">*</span></label>
						<div class="col-sm-6">
						<?= $Helper->dbComboXSelect("kategori[]", "par_risk_kategori", "risk_kategori_id", "risk_kategori", "and risk_kategori_del_st = 1 ", "", "", 1) ?>
						</div>
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label text-right">Penyebab Risiko<span class="required">*</span></label>
						
						<div class="col-sm-8">
							<textarea cols="10" rows="5" class="form-control" name="penyebab[]" id="penyebab"></textarea>
						</div>
							
					</fieldset>
					<fieldset class="form-group">
						<label class="col-sm-3 control-label text-right">Dampak Risiko<span class="required">*</span></label>
						<div class="col-sm-6">
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
				<div class="clonningrisiko"></div>
			</div>
			<input type="hidden" name="data_action" value="postrisiko" id="data_action">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			<input type="submit" name="simpan" class="btn btn-success btn-sm" value="Simpan">
		</div>
		</div>
	</div>
	</form>
</div>
<script>
$('.hapussasaran').click(function() {
	$('.hapussasaran').closest('.wrapsasaran').find('.clonesasaran').not(':first').last().remove();
});
$('.tambahsasaran').click(function() {
	$('.tambahsasaran').closest('.wrapsasaran').find('.clonesasaran').first().clone().appendTo('.clonningsasaran');
});
$('.hapusrisiko').click(function() {
	$('.hapusrisiko').closest('.wraprisiko').find('.clonerisiko').not(':first').last().remove();
});
$('.tambahrisiko').click(function() {
	$('.tambahrisiko').closest('.wraprisiko').find('.clonerisiko').first().clone().appendTo('.clonningrisiko');
});
$('.hapusindikator').click(function() {
	$('.hapusindikator').closest('.wrapindikator').find('.cloneindikator').not(':first').last().remove();
});
$('.tambahindikator').click(function() {
	$('.tambahindikator').closest('.wrapindikator').find('.cloneindikator').first().clone().appendTo('.clonningindikator');
});
</script>