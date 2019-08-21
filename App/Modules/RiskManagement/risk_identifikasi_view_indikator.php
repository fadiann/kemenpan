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
					<a class="btn btn-success modal-basic " data-toggle="modal" data-target="#addindikator" style="cursor: pointer;"><i class="fa fa-plus"> </i> Tambah Indikator</a>
				<?php } ?>
				</div>
				<div class="table-responsive mt-md">
					<table class="table table-bordered table-striped table-condensed mb-none">
						<tr>
							<th class="text-center" width="6%">No.</th>
							<th class="text-center" width="30%">Indikator</th>
							<th class="text-center" width="20%">Risiko</th>
							<th class="text-center" width="14%">#</th>
						</tr>
						<?php
						$x = 1;
						foreach($rs_indikator as $row_indikator):
							$rs_identifikasi    = $risks->identifikasi_view_byIndikator($row_indikator['identifikasi_indikator_id']);
							$count_identifikasi = $rs_identifikasi->recordCount();
						?>
						<tr>
							<td class="text-center"><?=$x++?>.</td>
							<td><?=$row_indikator['identifikasi_indikator_name']?></td>
							<td class="text-center">
								<?=$count_identifikasi?><br>
                                <a class="btn btn-default btn-md btn-circle" onclick="return set_action('getrisiko', '<?=$row_indikator['identifikasi_indikator_id']?>', '');"><i class="fa fa-search"></i></a>
							</td>
							<td class="text-center">
								<!-- <a class="btn btn-warning btn-md btn-circle" onclick="return set_action('editindikator', '', '')"><i class="fa fa-pencil"></i></a> -->
								<a class="btn btn-danger btn-md btn-circle" onclick="return set_action('getdelete', '', '')"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php endforeach ?>
					</table>
					<?//=var_dump($row_indikator['identifikasi_indikator_id'])?>
				</div>
			</div>
		</div>
    </div>
    <input type="hidden" value="" name="data_action" id="data_action">
    <input type="hidden" value="" name="data_id" id="data_id">
</form>

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
							<?=$Helper->dbCombo('id_sasaran', 'risk_identifikasi_sasaran', 'identifikasi_sasaran_id', 'identifikasi_sasaran', "AND identifikasi_sasaran_id = '".$data_id."'", '', '', 1); ?>
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