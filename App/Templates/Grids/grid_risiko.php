<table class="table_grid" cellspacing="0" cellpadding="0">
	<tr>
		<?
		$jmlHeader = count ( $gridHeader );
		echo ("<th width='5%'>No</th>");
		for($j = 0; $j < $jmlHeader; $j ++) {
			echo ("<th width='" . $gridWidth [$j] . "%'>" . $gridHeader [$j] . "</th>");
		}
		if ($widthAksi != "0") {
			echo ("<th width='" . $widthAksi . "%'>Aksi</th>");
		}
		?>
	</tr>
	<?
	if ($recordcount != 0) {
		$i = 0;
		while ( $arr = $rs->FetchRow () ) {
			$i ++;
			?>
	<tr>
		<td><?=$i+$offset?></td> 
	<?
			for($j = 0; $j < count ( $gridDetail ); $j ++) {
				if ($gridHeader [$j] == "Identifikasi") {
					?>
		<td align="center">
			<?=$risks->identifikasi_count($arr[$gridDetail[$j]],"","","")?> Risiko 
			<?php
					if ($risk_identifikasi) {
						if ($arr ['penetapan_status'] == 0 || $arr ['penetapan_status'] == 3) {
							?>
			<br> <input type="image" src="Public/images/icn_search.png"
			title="View Identifikasi"
			Onclick="return set_action('risk_identifikasi', '<?=$arr[$gridDetail[$j]]?>', '')">
			<?php
						}
					}
					?>
		</td> 
	<?
				} elseif ($gridHeader [$j] == "Analisis") {
					$get_warna_risk = $risks->get_nama_risk ( 'par_risk_ri', 'ri_name', 'ri_warna', $arr [$gridDetail[$j]] );
					?>
		<td align="center" bgcolor="<?=$get_warna_risk?>">
			<?=$arr[$gridDetail[$j]]?>
			<?php
					if ($view_analisa) {
						if ($arr ['penetapan_status'] == 0 || $arr ['penetapan_status'] == 3) {
							?>
			<br> <input type="image" src="Public/images/icn_search.png"
			title="View Analisa"
			Onclick="return set_action('view_analisa', '<?=$arr[0]?>', '')">
			<?php
						}
					}
					?>
		</td> 
	<?
				} elseif ($gridHeader [$j] == "Evaluasi") {
					$get_warna_risk = $risks->get_nama_risk ( 'par_risk_rr', 'rr_name', 'rr_warna', $arr [$gridDetail[$j]] );
					?>
		<td align="center" bgcolor="<?=$get_warna_risk?>">
			<?=$arr[$gridDetail[$j]]?>
			<br>
			<?php
					if ($view_evaluasi) {
						if(!empty($arr['penetapan_profil_risk'])){
						?>
			<input type="image" src="Public/images/icn_search.png" title="View Evaluasi"
			Onclick="return set_action('view_evaluasi', '<?=$arr[0]?>', '')">
			<?php
						}
					}
					?>
		</td> 
	<?
				} elseif ($gridHeader [$j] == "Keputusan Penanganan") {
					?>
		<td align="center">
			<?
					$rs_penanganan = $params->risk_penanganan_data_viewlist ();
					while ( $arr_penanganan = $rs_penanganan->fetchRow () ) {
						$count_risk_penanganan = $risks->list_penanganan ( $arr_penanganan ['risk_penanganan_id'], $arr [$gridDetail [$j]] );
						echo $arr_penanganan ['risk_penanganan_jenis'] . " = " . $count_risk_penanganan . "<br>";
					}
					if ($view_penanganan) {
						if(!empty($arr['penetapan_profil_risk_residu'])){
						?>
			<input type="image" src="Public/images/icn_search.png"
			title="View Penanganan"
			Onclick="return set_action('view_penanganan', '<?=$arr[$gridDetail[$j]]?>', '')">
			<?php
						}
					}
					?>
		</td> 
	<?
				} elseif ($gridHeader [$j] == "Rencana Waktu") {
					?>
		<td align="center">
			<?php echo $Helper->dateIndo($arr[$gridDetail[$j]]);?>
		</td> 
	<?
				} else {
					?>
		<td><?=$arr[$gridDetail[$j]]?></td> 
	<?
				}
			}
			?>
		<td>
	<?
			if ($iconDetail) {
				if ($method == 'risk_reviu') {
					$action = "view_monitoring";
				}else{
					$action = "getdetail";
				}
				?>
			<input type="image" src="Public/images/icn_alert_info.png" title="Rincian Data" Onclick="return set_action('<?=$action?>', '<?=$arr[0]?>')">
			&nbsp;&nbsp;
	<?
			}
			if ($arr ['penetapan_status'] == 0 || $arr ['penetapan_status'] == 3 || ($method == 'risk_monitoring')) {
				if ($iconEdit) {
					?>
				<input type="image" src="Public/images/icn_edit.png" title="Ubah Data"
			Onclick="return set_action('getedit', '<?=$arr[0]?>')">
				&nbsp;&nbsp;
		<?
				}
				if ($iconDel) {
					?>
				<input type="image" src="Public/images/icn_trash.png" title="Hapus Data"
			Onclick="return set_action('getdelete', '<?=$arr[0]?>', '<?=$arr[1]?>')">
		<?
				}
			}
			if ($method == 'risk_result' && $set_perencanaan) {
				$cek_perencanaan = $plannings->cek_perencanaan($arr[0]);
				if($cek_perencanaan==0){
				?>
			<input type="button" title="Perencanaan Audit" Onclick="return set_action('getplan', '<?=$arr[0]?>')" value="Set PKAT">
	<?
				}
			}
			?>
		</td>
	</tr>
	<?
		}
	} else {
		?>
		<td colspan="<?=$jmlHeader+2?>">Tidak Ada Data</td> 
	<?
	}
	?>
</table>
<table width="100%">
	<tr>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td align="center" class="td_paging">
	<?
	$showPage = "";
	$jumPage = ceil ( $recordcount / $num_row );
	if ($noPage > 1)
		echo "<a href='" . $paging_request . "&page=" . ($noPage - 1) . "'> <<d </a>";
	for($page = 1; $page <= $jumPage; $page ++) {
		if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
			if (($showPage == 1) && ($page != 2))
				echo "<span class='titik_titik'>...</span>";
			if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
				echo "<span class='titik_titik'>...</span>";
			if ($page == $noPage)
				echo "<span class='paging_aktif'>" . $page . "</span> ";
			else
				echo " <a href='" . $paging_request . "&page=" . $page . "'>" . $page . "</a> ";
			$showPage = $page;
		}
	}
	if ($noPage < $jumPage)
		echo "<a href='" . $paging_request . "&page=" . ($noPage + 1) . "'> > </a>";
	?>
	</td>
	</tr>
</table>

