<section id="main" class="column">
<form method="post" name="f" action="#">
<?
if (! empty ( $view_parrent ))
	include_once $view_parrent;
?>
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		<?php
		if($iconAdd){
			if($method=='programaudit'){
				if($status_katim){
		?>
		<ul class="tabs">
			<li><a href="#" OnClick="return set_action('getadd');">Tambah</a></li>
		</ul>
		<?php
				}
			}elseif($method=='finding_kka' || $method=='kertas_kerja'){
				if($status_owner){
		?>
		<ul class="tabs">
			<li><a href="#" OnClick="return set_action('getadd');">Tambah</a></li>
		</ul>
		<?php
				}
			}else{
		?>
		<ul class="tabs">
			<li><a href="#" onclick="return set_action('getadd');">Tambah</a></li>
		</ul>
		<?php
			}
		}
		?>
		</header>
		<header>
			<ul class="tabs">
				<li>
					<select name="key_search" class="select_search">
						<?
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
				</li>
				<li><input type="text" name="val_search" id="val_search" class="text_search" value=<?=@$val_search?>></li>
				<li><a href="#" OnClick="return set_action('');">Cari</a></li>
			</ul>
		</header>
		<input type="hidden" value="" name="data_action" id="data_action">
		<input type="hidden" value="" name="status_plan" id="status_plan">
		<input type="hidden" value="" name="status_pka" id="status_pka">
		<input type="hidden" value="" name="status_kka" id="status_kka">
		<input type="hidden" value="" name="status_tl" id="status_tl">
		<input type="hidden" value="" name="status_penugasan" id="status_penugasan">
		<input type="hidden" value="" name="status_temuan" id="status_temuan">
		<input type="hidden" value="" name="status_surat_tugas" id="status_surat_tugas">
		<input type="hidden" value="" name="data_id" id="data_id">
</form>
<?
include_once $grid;
?>
	</article>
</section>
