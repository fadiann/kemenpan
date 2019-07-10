<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="Public/js/jquery.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="Public/js/jquery.tree.js"></script>

<link rel="stylesheet" type="text/css" href="Public/css/jquery-ui.css" />
<link rel="stylesheet" type="text/css" href="Public/css/jquery.tree.css" />

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
			<label class="col-sm-3 control-label">Nama Group :</label> 
			<input type="text" class="form-control" name="name" id="name">
			</fieldset>
			<fieldset class="form-group">
			<label class="col-sm-3 control-label">Hak Akses :</label>
			</fieldset>
			<fieldset class="form-group">
				<table>
					<tr>
	<?php
				$rs_cek_parrent = $Helper->menu_list_parrent ();
				$i = 0;
				while ( $arr_cek_parrent = $rs_cek_parrent->FetchRow () ) {
					$i ++;
					?>
						<td valign="top" width="50%">
							<div id="tree_menu_<?=$i?>">
								<ul>
			<?
					$rs_menu_parrent = $Helper->menu_list_parrent ( $arr_cek_parrent['menu_id'] );
					while ( $arr_menu_parrent = $rs_menu_parrent->FetchRow () ) {
						?>
									<li><input type="checkbox" value="<?=$arr_menu_parrent['menu_id']?>"
										name="menu_<?=$arr_menu_parrent['menu_id']?>"><strong><?=strtoupper($arr_menu_parrent['menu_name'])?></strong>
										<ul>
				<?php if($arr_menu_parrent['menu_id']==1 || $arr_menu_parrent['menu_id'] ==2 || $arr_menu_parrent['menu_id']==3 || $arr_menu_parrent['menu_id'] ==4){ ?>
				
											<li>
												<select name="parrent_<?=$arr_menu_parrent['menu_id']?>">
													<option value="1">Semua Data</option>
													<option value="2">Sesuai User ID</option>
												</select>
											</li>
											<br><br>
				<?php }?>
					<?
						$rs_menu_child = $Helper->menu_list_all ( $arr_menu_parrent ['menu_id'] );
						while ( $arr_menu_child = $rs_menu_child->FetchRow () ) {
							?>
					<li><input type="checkbox" value="<?=$arr_menu_child['menu_id']?>"
												name="menu_<?=$arr_menu_child['menu_id']?>"><?=$arr_menu_child['menu_name']?>
						<?
							if ($Helper->cek_sub_menu ( $arr_menu_child ['menu_id'] ) != 0) {
								?>
						<ul>
							<?
								$rs_sub_1_menu_child = $Helper->menu_list_all ( $arr_menu_child ['menu_id'] );
								while ( $arr_sub_1_menu_child = $rs_sub_1_menu_child->FetchRow () ) {
									?>
							<li><input type="checkbox"
														value="<?=$arr_sub_1_menu_child['menu_id']?>"
														name="menu_<?=$arr_sub_1_menu_child['menu_id']?>"><?=$arr_sub_1_menu_child['menu_name']?>
								<?
									if ($Helper->cek_sub_menu ( $arr_sub_1_menu_child ['menu_id'] ) != 0) {
										?>
								<ul>
									<?
										$rs_sub_2_menu_child = $Helper->menu_list_all ( $arr_sub_1_menu_child ['menu_id'] );
										while ( $arr_sub_2_menu_child = $rs_sub_2_menu_child->FetchRow () ) {
											?>
									<li><input type="checkbox"
																value="<?=$arr_sub_2_menu_child['menu_id']?>"
																name="menu_<?=$arr_sub_2_menu_child['menu_id']?>"><?=$arr_sub_2_menu_child['menu_name']?>
										<?
											if ($Helper->cek_sub_menu ( $arr_sub_2_menu_child ['menu_id'] ) != 0) {
												?>
										<ul>
											<?
												$rs_sub_3_menu_child = $Helper->menu_list_all ( $arr_sub_2_menu_child ['menu_id'] );
												while ( $arr_sub_3_menu_child = $rs_sub_3_menu_child->FetchRow () ) {
													?>
											<li><input type="checkbox"
																		value="<?=$arr_sub_3_menu_child['menu_id']?>"
																		name="menu_<?=$arr_sub_3_menu_child['menu_id']?>"><?=$arr_sub_3_menu_child['menu_name']?>
												<?
													if ($Helper->cek_sub_menu ( $arr_sub_3_menu_child ['menu_id'] ) != 0) {
														?>
												<ul>
													<?
														$rs_sub_4_menu_child = $Helper->menu_list_all ( $arr_sub_3_menu_child ['menu_id'] );
														while ( $arr_sub_4_menu_child = $rs_sub_4_menu_child->FetchRow () ) {
															?>
													<li><input type="checkbox"
																				value="<?=$arr_sub_4_menu_child['menu_id']?>"
																				name="menu_<?=$arr_sub_4_menu_child['menu_id']?>"><?=$arr_sub_4_menu_child['menu_name']?>
														<?
															if ($Helper->cek_sub_menu ( $arr_sub_4_menu_child ['menu_id'] ) != 0) {
																?>
														<ul>
															<?
																$rs_sub_5_menu_child = $Helper->menu_list_all ( $arr_sub_4_menu_child ['menu_id'] );
																while ( $arr_sub_5_menu_child = $rs_sub_5_menu_child->FetchRow () ) {
																	?>
															<li><input type="checkbox"
																						value="<?=$arr_sub_5_menu_child['menu_id']?>"
																						name="menu_<?=$arr_sub_5_menu_child['menu_id']?>"><?=$arr_sub_5_menu_child['menu_name']?>
																<?
																	if ($Helper->cek_sub_menu ( $arr_sub_5_menu_child ['menu_id'] ) != 0) {
																		?>
																<ul>
																	<?
																		$rs_sub_6_menu_child = $Helper->menu_list_all ( $arr_sub_5_menu_child ['menu_id'] );
																		while ( $arr_sub_6_menu_child = $rs_sub_6_menu_child->FetchRow () ) {
																			?>
																	<li><input type="checkbox"
																								value="<?=$arr_sub_6_menu_child['menu_id']?>"
																								name="menu_<?=$arr_sub_6_menu_child['menu_id']?>"><?=$arr_sub_6_menu_child['menu_name']?></li>								
																	<?php
																		}
																		?>
																</ul>
																<?php
																	}
																	?>
															</li>								
															<?php
																}
																?>
														</ul>
														<?php
															}
															?>
													</li>								
													<?php
														}
														?>
												</ul>
												<?php
													}
													?>
											</li>								
											<?php
												}
												?>
										</ul>
										<?php
											}
											?>
									</li>							
									<?php
										}
										?>
								</ul>
								<?php
									}
									?>
							</li>
							<?php
								}
								?>
						</ul>
						<?php
							}
							?>
					</li>
					<?php
						}
						?>
				</ul></li>
			<?php
					}
					?>
			</ul>
							</div>
						</td>
	<?
					if ($i % 2 == 0) {
						echo "</tr><tr>";
					}
				}
				?>
	</tr>
				</table>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="form-group">
				<label class="col-sm-2">Nama Group :</label> 
				<div class="col-sm-5">
				<input type="text" class="form-control" name="name" id="name" value="<?=$arr['group_name']?>">
				</div>
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-2">Nama Menu :</label>
			</fieldset>
			<fieldset class="form-group">
				<table class="table_role" width="100%">
					<tr>
	<?php
				$rs_cek_parrent = $Helper->menu_list_parrent ();
				$i = 0;
				while ( $arr_cek_parrent = $rs_cek_parrent->FetchRow () ) {
					$i ++;
					?>
						<td valign="top" width="50%">
							<div id="tree_menu_<?=$i?>">
								<ul>
			<?
					$rs_menu_parrent = $Helper->menu_list_parrent ( $arr_cek_parrent['menu_id'] );
					while ( $arr_menu_parrent = $rs_menu_parrent->FetchRow () ) {
						$cek = $userms->cek_menu ( $arr_menu_parrent ['menu_id'], $arr ['group_id'] );
						$select = $userms->cek_data ( $arr_menu_parrent ['menu_id'], $arr ['group_id'] );
						?>
									<li><input type="checkbox" <?php if($cek=='1') echo "checked";?>
										value="<?=$arr_menu_parrent['menu_id']?>"
										name="menu_<?=$arr_menu_parrent['menu_id']?>"><strong><?=strtoupper($arr_menu_parrent['menu_name'])?></strong>
										<ul>
				<?php if($arr_menu_parrent['menu_id']==1 || $arr_menu_parrent['menu_id'] ==2 || $arr_menu_parrent['menu_id']==3 || $arr_menu_parrent['menu_id'] ==4){ ?>
				
											<li>
												<select name="parrent_<?=$arr_menu_parrent['menu_id']?>">
													<option value="1" <? if($select=='1') echo "selected"; ?>>Semua Data</option>
													<option value="2" <? if($select=='2') echo "selected"; ?>>Sesuai User ID</option>
												</select>
											</li><br><br>
				<?php }?>
					<?
						$rs_menu_child = $Helper->menu_list_all ( $arr_menu_parrent ['menu_id'] );
						while ( $arr_menu_child = $rs_menu_child->FetchRow () ) {
							$cek = $userms->cek_menu ( $arr_menu_child ['menu_id'], $arr ['group_id'] );
							?>
					<li><input type="checkbox" <?php if($cek=='1') echo "checked";?>
												value="<?=$arr_menu_child['menu_id']?>"
												name="menu_<?=$arr_menu_child['menu_id']?>"><?=$arr_menu_child['menu_name']?>
						<?
							if ($Helper->cek_sub_menu ( $arr_menu_child ['menu_id'] ) != 0) {
								?>
						<ul>
							<?
								$rs_sub_1_menu_child = $Helper->menu_list_all ( $arr_menu_child ['menu_id'] );
								while ( $arr_sub_1_menu_child = $rs_sub_1_menu_child->FetchRow () ) {
									$cek = $userms->cek_menu ( $arr_sub_1_menu_child ['menu_id'], $arr ['group_id'] );
									?>
							<li><input type="checkbox" <?php if($cek=='1') echo "checked";?>
														value="<?=$arr_sub_1_menu_child['menu_id']?>"
														name="menu_<?=$arr_sub_1_menu_child['menu_id']?>"><?=$arr_sub_1_menu_child['menu_name']?>
								<?
									if ($Helper->cek_sub_menu ( $arr_sub_1_menu_child ['menu_id'] ) != 0) {
										?>
								<ul>
									<?
										$rs_sub_2_menu_child = $Helper->menu_list_all ( $arr_sub_1_menu_child ['menu_id'] );
										while ( $arr_sub_2_menu_child = $rs_sub_2_menu_child->FetchRow () ) {
											$cek = $userms->cek_menu ( $arr_sub_2_menu_child ['menu_id'], $arr ['group_id'] );
											?>
									<li><input type="checkbox"
																<?php if($cek=='1') echo "checked";?>
																value="<?=$arr_sub_2_menu_child['menu_id']?>"
																name="menu_<?=$arr_sub_2_menu_child['menu_id']?>"><?=$arr_sub_2_menu_child['menu_name']?>
										<?
											if ($Helper->cek_sub_menu ( $arr_sub_2_menu_child ['menu_id'] ) != 0) {
												?>
										<ul>
											<?
												$rs_sub_3_menu_child = $Helper->menu_list_all ( $arr_sub_2_menu_child ['menu_id'] );
												while ( $arr_sub_3_menu_child = $rs_sub_3_menu_child->FetchRow () ) {
													$cek = $userms->cek_menu ( $arr_sub_3_menu_child ['menu_id'], $arr ['group_id'] );
													?>
											<li><input type="checkbox"
																		<?php if($cek=='1') echo "checked";?>
																		value="<?=$arr_sub_3_menu_child['menu_id']?>"
																		name="menu_<?=$arr_sub_3_menu_child['menu_id']?>"><?=$arr_sub_3_menu_child['menu_name']?>
												<?
													if ($Helper->cek_sub_menu ( $arr_sub_3_menu_child ['menu_id'] ) != 0) {
														?>
												<ul>
													<?
														$rs_sub_4_menu_child = $Helper->menu_list_all ( $arr_sub_3_menu_child ['menu_id'] );
														while ( $arr_sub_4_menu_child = $rs_sub_4_menu_child->FetchRow () ) {
															$cek = $userms->cek_menu ( $arr_sub_4_menu_child ['menu_id'], $arr ['group_id'] );
															?>
													<li><input type="checkbox"
																				<?php if($cek=='1') echo "checked";?>
																				<?php if($cek=='1') echo "checked";?>
																				value="<?=$arr_sub_4_menu_child['menu_id']?>"
																				name="menu_<?=$arr_sub_4_menu_child['menu_id']?>"><?=$arr_sub_4_menu_child['menu_name']?>
														<?
															if ($Helper->cek_sub_menu ( $arr_sub_4_menu_child ['menu_id'] ) != 0) {
																?>
														<ul>
															<?
																$rs_sub_5_menu_child = $Helper->menu_list_all ( $arr_sub_4_menu_child ['menu_id'] );
																while ( $arr_sub_5_menu_child = $rs_sub_5_menu_child->FetchRow () ) {
																	$cek = $userms->cek_menu ( $arr_sub_5_menu_child ['menu_id'], $arr ['group_id'] );
																	?>
															<li><input type="checkbox"
																						<?php if($cek=='1') echo "checked";?>
																						<?php if($cek=='1') echo "checked";?>
																						value="<?=$arr_sub_5_menu_child['menu_id']?>"
																						name="menu_<?=$arr_sub_5_menu_child['menu_id']?>"><?=$arr_sub_5_menu_child['menu_name']?>
																<?
																	if ($Helper->cek_sub_menu ( $arr_sub_5_menu_child ['menu_id'] ) != 0) {
																		?>
																<ul>
																	<?
																		$rs_sub_6_menu_child = $Helper->menu_list_all ( $arr_sub_5_menu_child ['menu_id'] );
																		while ( $arr_sub_6_menu_child = $rs_sub_6_menu_child->FetchRow () ) {
																			$cek = $userms->cek_menu ( $arr_sub_6_menu_child ['menu_id'], $arr ['group_id'] );
																			?>
																	<li><input type="checkbox"
																								<?php if($cek=='1') echo "checked";?>
																								<?php if($cek=='1') echo "checked";?>
																								value="<?=$arr_sub_6_menu_child['menu_id']?>"
																								name="menu_<?=$arr_sub_6_menu_child['menu_id']?>"><?=$arr_sub_6_menu_child['menu_name']?></li>								
																	<?php
																		}
																		?>
																</ul>
																<?php
																	}
																	?>
															</li>								
															<?php
																}
																?>
														</ul>
														<?php
															}
															?>
													</li>								
													<?php
														}
														?>
												</ul>
												<?php
													}
													?>
											</li>								
											<?php
												}
												?>
										</ul>
										<?php
											}
											?>
									</li>							
									<?php
										}
										?>
								</ul>
								<?php
									}
									?>
							</li>
							<?php
								}
								?>
						</ul>
						<?php
							}
							?>
					</li>
					<?php
						}
						?>
				</ul></li>
			<?php
					}
					?>
			</ul>
							</div>
						</td>
	<?
					if ($i % 2 == 0) {
						echo "</tr><tr>";
					}
				}
				?>
	</tr>
				</table>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['group_id']?>">	
		<?
				break;
		}
		?>
			<fieldset class="form-group mt-md">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'"> 
					<input type="submit" class="btn btn-success" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=@$_nextaction?>">
			</fieldset>
		</form>
			</div>
		</section>
	</div>
</div>
<script> 
<?php
$rs_cek_parrent = $Helper->menu_list_parrent ();
$i = 0;
while ( $arr_cek_parrent = $rs_cek_parrent->FetchRow () ) {
	$i ++;
	?>
$('#tree_menu_<?=$i?> ul:first').tree({
	onUncheck: {
		node: 'collapse'
	},
	onCheck: {
		node: 'expand'
	}
});
<?php
}
?>
</script>
<script>  

$(function() {
	$("#validation-form").validate({
		rules: {
			name: "required"
		},
		messages: {
			name: "Silahkan masukan Nama Group"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>