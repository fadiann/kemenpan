<form method="post" name="f" action="#">
	<section id="main" class="column">
	<?php
	if ($method != 'risk_reviu') {
		if ($method != 'risk_penetapantujuan') {
			include 'risk_view_parrent.php';
		}
	}
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
					if ($method != 'risk_monitoring') {
						if ($iconAdd == '1') {
							?>
							<a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
					<?php
						}
					}
					?>
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
						<a href="#" OnClick="return set_action('');" class="btn btn-primary">Cari</a>
					</div>
					<input type="hidden" value="" name="data_action" id="data_action">
					<input type="hidden" value="" name="data_id" id="data_id">
					<?
					include_once $grid;
					?>   

				</div>
			</section>
		</div>
	</div>
</form>
