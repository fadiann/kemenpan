<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
		<form method="post" name="f" action="#" class="form-horizontal"
			id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Posisi Penugasan</label> 
				<div class="col-sm-5"><input type="text"
					class="form-control" name="name" id="name"></div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Urutan</label> 
				<div class="col-sm-5"><input type="number"
					class="form-control" name="sort" id="sort"></div>
			</fieldset>
			<fieldset class="form-group">
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
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Posisi Penugasan</label> 
				<div class="col-sm-5"><input type="text"
					class="form-control" name="name" id="name"
					value="<?=$arr['posisi_name']?>"></div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Urutan</label> 
				<div class="col-sm-5"><input type="number"
					class="form-control" name="sort" id="sort"
					value="<?=$arr['posisi_sort']?>"></div>
			</fieldset>
			<fieldset class="form-group">
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
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali"
						onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; <input
						type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
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