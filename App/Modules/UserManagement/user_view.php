<form method="post" name="f" action="#"><div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title"><?=$page_title?></h2>
				</header>
				<div class="panel-body">
					<div class="form-inline text-right mt-sm">
					<?php 
					if($method!='log_aktifitas'){
					?>
						<?php 
						if($method=='backuprestore'){
						?>
									<a href="#" OnClick="return set_action('backup_database');">Backup</a>
						<?php
						}else{
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
					<button type="submit OnClick="return set_action('');" class="btn btn-primary">Cari</button>
					<input type="hidden" value="" name="data_action" id="data_action">
					<input type="hidden" value="" name="data_id" id="data_id">
					</div>
				<?php include_once $grid; ?>   
			</div>
		</section>
	</div>
</div>
</form>
