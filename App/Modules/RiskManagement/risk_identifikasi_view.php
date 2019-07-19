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
					<a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
				<?php } ?>
				</div>
				<input type="hidden" value="" name="data_action" id="data_action">
				<input type="hidden" value="" name="data_id" id="data_id">
				<div class="table-responsive mt-md">
					<table class="table table-bordered table-striped table-condensed mb-none">
						<tr>
							<th class="text-center" width="5%" rowspan="2">No.</th>
							<th class="text-center" width="12%" rowspan="2">Sasaran</th>
							<th class="text-center" width="12%" rowspan="2">Indikator</th>
							<th class="text-center" width="12%" colspan="4">Risiko</th>
							<th class="text-center" width="12%" rowspan="2">Kategori</th>
							<th class="text-center" width="10%" rowspan="2">#</th>
						</tr>
						<tr>
							<th class="text-center" width="1%">No.</th>
							<th class="text-center" width="14%">Kejadian</th>
							<th class="text-center" width="14%">Penyebab</th>
							<th class="text-center" width="14%">Dampak</th>
						</tr>
						<?php
						$x = 0;
						$y = 0;
						foreach($rs_sasaran as $row_sasaran):
							$x++;
							$rowspan_sasaran = $risks->rowspanIndikator($row_sasaran['identifikasi_sasaran_id']);
							$rs_indikator    = $risks->indikator_view_bySasaran($row_sasaran['identifikasi_sasaran_id']);
							$count_indikator = $rs_indikator->recordCount();
						?>
						<tr>
							<td class="text-center" rowspan="<?=$rowspan_sasaran?>"><?=$x?>.</td>
							<td rowspan="<?=$rowspan_sasaran?>"><?=$row_sasaran['identifikasi_sasaran']?></td>
							<?php
							foreach($rs_indikator as $row_indikator):
								$rs_identifikasi    = $risks->identifikasi_view_byIndikator($row_indikator['identifikasi_indikator_id']);
								$count_identifikasi = $rs_identifikasi->recordCount();
							?>
								<td rowspan="<?=$count_identifikasi?>"><?=$row_indikator['identifikasi_indikator_name']?></td>
									<?php 
									foreach($rs_identifikasi as $row_identifikasi):
										$y++;
									?>	
										<td width="6%" class="text-center"><?=$y?>.</td>
										<td><?=$row_identifikasi['identifikasi_nama_risiko']?></td>
										<td><?=$row_identifikasi['identifikasi_penyebab']?></td>
										<td><?=$row_identifikasi['identifikasi_dampak']?></td>
										<td><?=$row_identifikasi['risk_kategori']?></td>
										<td class="text-center">
											<a class="btn btn-warning btn-md btn-circle" onclick="return set_action('getedit', '<?=$row_identifikasi['identifikasi_id']?>', '<?=$row_identifikasi['identifikasi_nama_risiko']?>')"><i class="fa fa-pencil"></i></a>
											<a class="btn btn-danger btn-md btn-circle" onclick="return set_action('getdelete', '<?=$row_identifikasi['identifikasi_id']?>', '<?=$row_identifikasi['identifikasi_nama_risiko']?>')"><i class="fa fa-trash-o"></i></a>
										</td>
										</tr>
									<?php endforeach ?>
								</tr>
							<?php endforeach ?>
						<?php endforeach ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</form>
