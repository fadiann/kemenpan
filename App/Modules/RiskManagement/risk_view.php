<form method="post" name="f" action="#">
	<section id="main" class="column">
	<?php
	if ($method != 'risk_reviu') {
		if ($method != 'risk_penetapantujuan') {
			include 'risk_view_parrent.php';
		}
	}
	?>
	<article class="module width_3_quarter">
			<header>
				<h3 class="tabs_involved"><?=$page_title?></h3>
	<?php
	if ($method != 'risk_monitoring') {
		if ($iconAdd == '1') {
			?>
		<ul class="tabs">
					<li><a href="#" OnClick="return set_action('getadd');">Tambah</a></li>
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
	<input type="hidden" value="" name="data_id" id="data_id">
<?
include_once $grid;
?>   
	</article>
	</section>
</form>
