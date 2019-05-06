<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal"
			id="validation-form">
		<?
		$rsImp = $params->risk_ri_data_viewlist ();
		$rsLike = $params->risk_pi_data_viewlist ();
		$arrIdImp = array ();
		$arrImpNama = array ();
		$arrValImp = array ();
		$arrIdLike = array ();
		$arrLikeNama = array ();
		$arrValLike = array ();
		$x = 0;
		while ( $arrImp = $rsImp->FetchRow () ) {
			$arrIdImp [$x] = $arrImp ['ri_id'];
			$arrImpNama [$x] = $arrImp ['ri_name'];
			$arrValImp [$x] = $arrImp ['ri_value'];
			$x ++;
		}
		$y = 0;
		while ( $arrLike = $rsLike->FetchRow () ) {
			$arrIdLike [$y] = $arrLike ['pi_id'];
			$arrLikeNama [$y] = $arrLike ['pi_name'];
			$arrValLike [$y] = $arrLike ['pi_value'];
			$y ++;
		}
		$jmlImp = count ( $arrIdImp );
		$jmlLike = count ( $arrIdLike );
		switch ($_action) {
			case "getedit" :
				?>
		<table border='1' class="table_risk" cellspacing='0' cellpadding="0">
				<tr>
					<td rowspan="2" colspan="2">&nbsp;</td>
					<td colspan="<?=$jmlImp?>?>" align="center"><strong>Tingkat Risiko
							Inheren</strong></td>
				</tr>
				<tr>
					<td>
						<table border=0>
							<tr>
					<?
				for($k = 0; $k < $jmlImp; $k ++) {
					?>
						<td width="350" align=center><strong>
								<?=$arrValImp[$k]?><br>(<?=$arrImpNama[$k]?>)
							</strong></td>
					<?
				}
				?>
				  </tr>
						</table>
					</td>
				</tr>
				<tr align="center">
					<td rowspan="<?=$jmlLike?>" align="center" valign="middle"><strong>Pengendalian
							Internal</strong></td>
					<td>
						<table border=0>
					<?
				for($g = 0; $g < $jmlLike; $g ++) {
					?>
						<tr height="50">
								<td width="150" align=right><strong><?=$arrLikeNama[$g]?><br>(<?=$arrValLike[$g]?>)</strong>
								</td>
							</tr>
					<?
				}
				?>
					</table>
					</td>
					<td>
						<table border="1" align="center">
					<?
				for($i = 0; $i < $jmlImp; $i ++) {
					?>
						<tr height="50">
						<?
					for($j = 0; $j < $jmlLike; $j ++) {
						$rs_hasil = $params->get_matrix_residu_val ( $arrIdImp [$j], $arrIdLike [$i] );
						$arr_hasil = $rs_hasil->FetchRow ();
						?>
							<td width="350" align="center">
								<?=$Helper->dbCombo($arrIdImp[$j].'_'.$arrIdLike[$i], "par_risk_ri", "ri_id", "ri_name", "", $arr_hasil['ri_id'], "cmb_risk", 1)?>
							</td>
						<?
					}
					?>
						</tr>
					<?
				}
				?>
					</table>
					</td>
				</tr>
			</table>
		<?
				break;
			default :
				?>
		<table border='1' class="table_risk" cellspacing='0' cellpadding="0">
				<tr>
					<td rowspan="2" colspan="2">&nbsp;</td>
					<td colspan="<?=$jmlImp?>?>" align="center"><strong>Tingkat Risiko
							Inheren</strong></td>
				</tr>
				<tr>
					<td>
						<table border=0>
							<tr>
					<?
				for($k = 0; $k < $jmlImp; $k ++) {
					?>
						<td width="350" align=center><strong>
								<?=$arrValImp[$k]?><br>(<?=$arrImpNama[$k]?>)
							</strong></td>
					<?
				}
				?>
				  </tr>
						</table>
					</td>
				</tr>
				<tr align="center">
					<td rowspan="<?=$jmlLike?>" align="center" valign="middle"><strong>Pengendalian
							Internal</strong></td>
					<td>
						<table border=0>
					<?
				for($g = 0; $g < $jmlLike; $g ++) {
					?>
						<tr height="50">
								<td width="150" align=right><strong><?=$arrLikeNama[$g]?><br>(<?=$arrValLike[$g]?>)</strong>
								</td>
							</tr>
					<?
				}
				?>
					</table>
					</td>
					<td>
						<table border="1" align="center">
					<?
				for($i = 0; $i < $jmlImp; $i ++) {
					?>
						<tr height="50">
						<?
					for($j = 0; $j < $jmlLike; $j ++) {
						$rs_hasil = $params->get_matrix_residu_val ( $arrIdImp [$j], $arrIdLike [$i] );
						$arr_hasil = $rs_hasil->FetchRow ();
						?>
							<td width="350" align="center"
									bgcolor="<?=$arr_hasil['ri_warna'];?>"><?=$arr_hasil['ri_name'];?></td>
						<?
					}
					?>
						</tr>
					<?
				}
				?>
					</table>
					</td>
				</tr>
			</table>
		<?
				break;
		}
		?>
			<fieldset>
				<center>
				<?php
				if ($_action == "getedit") {
					?>
					<input type="button" class="blue_btn" value="Kembali"
						onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; <input
						type="submit" class="blue_btn" value="Simpan">	
				<?php
				} else {
					?>	
					<input type="button" class="blue_btn" value="Ubah"
						onclick="location='<?=$def_page_request?>&data_action=getedit'">
				<?php
				}
				?>
				</center>
				<input type="hidden" name="data_action" id="data_action"
					value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>