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
				if ($gridHeader [$j] == "Obyek Audit") {
					?>
		<td>
	<?
					$rs_id_auditee = $assigns->assign_auditee_viewlist ( $arr [$gridDetail [$j]] );
					$z = 0;
					while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
						$z ++;
						echo $z . ". " . $arr_id_auditee ['auditee_name'] . "<br>";
					}
					?>
		</td>
	<?
				} else if ($gridHeader [$j] == "Temuan Audit") {
					?>
		<td align="center">
	<?
					echo "Selesai : ".$findings->finding_tl_count ( $arr [$gridDetail [$j]], "1", "", "", "" )."<br>";
					echo "Belum Selesai : ".$findings->finding_tl_count ( $arr [$gridDetail [$j]], "2", "", "", "" );
					?>
			<br>
			<input type="image" src="Public/images/icn_search.png" title="View Temuan"
			Onclick="return set_action('view_finding', '<?=$arr[$gridDetail[$j]]?>', '')">
		</td>
	<?
				} else if ($gridHeader [$j] == "Rekomendasi") {
					?>
		<td align="center">
	<?
					echo "Selesai : ".$rekomendasis->rekomendasi_count ( $arr [$gridDetail [$j]], "1", "", "", "" )."<br>";
					echo "Belum Selesai : ".$rekomendasis->rekomendasi_count ( $arr [$gridDetail [$j]], "0", "", "", "" );
						?>
			<br> <input type="image" src="Public/images/icn_search.png"
			title="View Rekomendasi"
			Onclick="return set_action('view_rekomendasi', '<?=$arr[0]?>', '<?=$arr[1]?>')">
	<?
					?>
		</td>
	<?
				} else if ($gridHeader [$j] == "Tindak Lanjut") {
					?>
		<td align="center">
	<?
					echo $tindaklanjuts->tindaklanjut_count ( $arr [$gridDetail [$j]], "", "", "" );
						?>
			<br> <input type="image" src="Public/images/icn_search.png"
			title="View Rekomendasi"
			Onclick="return set_action('tindaklanjut', '<?=$arr[0]?>', '<?=$arr[1]?>')">
	<?
					?>
		</td>
	<?
				} else if ($gridHeader [$j] == "Target Date" || $gridHeader [$j] == "Tanggal" || $gridHeader [$j] == "Batas Waktu") {
					?>
		<td>
	<?
					echo $Helper->dateIndo ( $arr[$gridDetail[$j]] );
					?>
		</td>
	<?
				} elseif ($gridHeader [$j] == "Status TL") {
					?>
		<td align="center">
	<?
					if ($arr[$gridDetail[$j]]==0) {
						echo "Belum Diajukan";
					}
					if ($arr[$gridDetail[$j]]==1) {
						echo "Sedang Menunggu Persetujuan";
					}
					if ($arr[$gridDetail[$j]]==2 || $arr[$gridDetail[$j]]==4) {
						$iconEdit = 0;
						$iconDel = 0;
						echo "Selesai";
					}else{
						$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
						$iconDel = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );
					}
					if ($arr[$gridDetail[$j]]==3) {
						echo "Dalam Proses";
					}
					?>
		</td>
	<?
				} else if ($gridHeader [$j] == "Upload Data Awal") {
					?>
		<td align="center">
			<input type="image" src="Public/images/icn_search.png" title="Upload Data Awal" Onclick="return set_action('upload_data', '<?=$arr[$gridDetail[$j]]?>', '')">
		</td>
	<?
				} else if ($gridHeader [$j] == "Matriks TL") {
					?>
		<td align="center">
			<input type="image" src="Public/images/icn_search.png" title="View Matriks TL" Onclick="return set_action('view_matriks', '<?=$arr[$gridDetail[$j]]?>', '')">
		</td>
	<?
				} else {
					?>
		<td><?=$Helper->text_show($arr[$gridDetail[$j]])?></td>
	<?
				}
			}
			?>
		<td>
			<?php
			if($method=='tindaklanjut'){
				if($getajukan_tl){
					if ($arr ['tl_status'] == 0) {
					?>
			<fieldset>
				<select name="status"
					onchange="return set_action('getajukan_tl', '<?=$arr[0]?>', this.value)">
					<option>Pilih Status</option>
					<option value="1">Ajukan</option>
				</select>
			</fieldset>
			<?php
					}
				}
				if($getapprove_tl){
					if ($arr ['tl_status'] == 1 || $arr ['tl_status'] == 3) {
					?>
			<fieldset>
				<select name="status"
					onchange="return set_action('getapprove_tl', '<?=$arr[0]?>', this.value)">
					<option>Pilih Status</option>
					<option value="3">Dalam Proses</option>
					<option value="2">Selesai</option>
				</select>
			</fieldset>
			<?php
					}
				}
			}

			if ($iconDetail) {
				?>
			<input type="image" src="Public/images/icn_alert_info.png"
			title="Rincian Data"
			Onclick="return set_action('getdetail', '<?=$arr[0]?>')">
			&nbsp;&nbsp;
	<?
			}
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
			Onclick="return set_action('getdelete', '<?=$arr[0]?>', '<?=$Helper->text_show($arr[1])?>')">
	<?
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
