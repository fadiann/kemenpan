<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal"
			id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="hr">
				<label class="span2">Posisi Penugasan</label> <input type="text"
					class="span3" name="name" id="name">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Urutan</label> <input type="text"
					class="span7" name="sort" id="sort">
			</fieldset>
			<fieldset>
				<label class="span1">Hak Akses</label>
				<table>
					<tr>
						<td>
							<ul id="tree">
							<?
				$rs_menu_parrent = $Helper->menu_akses ();
				while ( $arr_menu_parrent = $rs_menu_parrent->FetchRow () ) {
					?>
								<li><?=$arr_menu_parrent['akses_menu']?></li>
								<ul>
								<?
					$rs_menu_child = $Helper->menu_akses ( $arr_menu_parrent ['akses_menu'] );
					while ( $arr_menu_child = $rs_menu_child->FetchRow () ) {
						?>
									<li>
										<input type="checkbox" value="<?=$arr_menu_child['akses_id']?>" name="child_<?=$arr_menu_child['akses_id']?>">
										<?=$arr_menu_child['akses_name']?>
									</li>
								<?
					}
					?>
								</ul>
							<?
				}
				?>	
							</ul>
						</td>
					</tr>
				</table>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Posisi Penugasan</label> <input type="text"
					class="span3" name="name" id="name"
					value="<?=$arr['posisi_name']?>">
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Urutan</label> <input type="text"
					class="span7" name="sort" id="sort"
					value="<?=$arr['posisi_sort']?>">
			</fieldset>
			<fieldset>
				<label class="span1">Hak Akses</label>
				<table>
					<tr>
						<td>
							<ul id="tree">
							<?
				$rs_menu_parrent = $Helper->menu_akses ();
				while ( $arr_menu_parrent = $rs_menu_parrent->FetchRow () ) {
					?>
								<li><?=$arr_menu_parrent['akses_menu']?></li>
								<ul>
								<?
					$rs_menu_child = $Helper->menu_akses ( $arr_menu_parrent ['akses_menu'] );
					while ( $arr_menu_child = $rs_menu_child->FetchRow () ) {
						$cek_posisi_akses = $params->cek_posisi_akses ( $arr ['posisi_id'], $arr_menu_child ['akses_id'] );
						?>
									<li><input type="checkbox"
										value="<?=$arr_menu_child['akses_id']?>"
										name="child_<?=$arr_menu_child['akses_id']?>"
										<? if($cek_posisi_akses!='0') echo "checked"; ?>><?=$arr_menu_child['akses_name']?></li>
								<?
					}
					?>
								</ul>
							<?
				}
				?>	
							</ul>
						</td>
					</tr>
				</table>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['posisi_id']?>">	
		<?
				break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali"
						onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; <input
						type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
<script>  
$(function() {
	$("#validation-form").validate({
		rules: {
			name: "required"
		},
		messages: {
			name: "Silahkan masukan Posisi Penugasan"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>