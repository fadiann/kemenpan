<form method="post" name="f" action="#">
	<?php
	if (! empty ( $view_parrent ))
		include_once $view_parrent;
	?>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title"><?=$page_title?></h2>
				</header>
				<div class="panel-body">
					<div class="form-inline text-right mt-sm">
					<?php
					if($iconAdd){
						if($method=='programaudit'){
							if($status_katim){
					?>
						<a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
					<?php
							}
						}elseif($method=='finding_kka' || $method=='kertas_kerja'){
							if($status_owner){
					?>
						<a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
					<?php
							}
						}else{
					?>
						<a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
					<?php
						}
					}
					?>
					<?php if($method == 'programaudit') : ?>
						<?php
						if(isset($back)){
							$back = $back;
						}else{
							$back = "window.open('main.php?method=auditassign', '_self');";
						}
						?>
							<a class="btn btn-info" href="#" onclick="<?=@$back?>">Kembali</a></li>
					<?php endif; ?>
					</div>

						<div class="form-inline text-right mt-sm">
						<select name="key_search" class="form-control">
							<?php
							if(count($key_by)!=1)
							?>
							<option value="">Semua Pilihan</option>
							<?php
							for($i=0;$i<count($key_by);$i++){
							?>
								<option value="<?=$key_field[$i]?>" <? if(@$key_search==$key_field[$i]) echo "selected";?>><?=$key_by[$i]?></option>
							<?php
							}
							?>
						</select>
						<input type="text" name="val_search" id="val_search" class="form-control" value=<?=@$val_search?>>
						<button type="submit OnClick="return set_action('');" class="btn btn-primary">Cari</button>
						</div>


					<input type="hidden" value="" name="data_action" id="data_action">
					<input type="hidden" value="" name="status_plan" id="status_plan">
					<input type="hidden" value="" name="status_pka" id="status_pka">
					<input type="hidden" value="" name="status_kka" id="status_kka">
					<input type="hidden" value="" name="status_tl" id="status_tl">
					<input type="hidden" value="" name="status_penugasan" id="status_penugasan">
					<input type="hidden" value="" name="status_temuan" id="status_temuan">
					<input type="hidden" value="" name="status_surat_tugas" id="status_surat_tugas">
					<input type="hidden" value="" name="data_id" id="data_id">
					
					<?php include_once $grid; ?>

				</div>
			</section>
		</div>
	</div>
</form>