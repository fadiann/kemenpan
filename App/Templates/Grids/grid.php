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
				if ($gridHeader [$j] == "Tanggal") {
					?>
		<td>
	<?
					if($method=='log_aktifitas')
					echo $Helper->dateTimeIndo ( $arr [$gridDetail [$j]] );
					else
					echo $Helper->dateIndo ( $arr [$gridDetail [$j]] );
					?>
		</td> 
	<?
				} else if ($gridHeader [$j] == "Status Online") {
					?>
		<td>
	<?
					if($arr [$gridDetail [$j]]==0) echo "Offline";
					else{ echo "Online &nbsp; &nbsp;";
				?>
			<input type="image" src="Public/images/icn_alert_error.png" title="Hapus Data" Onclick="return set_action('getKill', '<?=$arr[0]?>', '<?=$arr[1]?>')">
	<?
					}
	?>
		</td> 
	<?
				} else if ($gridHeader [$j] == "Tanggal Backup") {
					?>
		<td>
	<?
					echo $Helper->dateTimeIndo ( $arr [$gridDetail [$j]] );
					?>
		</td> 
	<?
				} else if ($gridHeader [$j] == "Warna") {
					?>
		<td bgcolor="<?=$arr[$gridDetail[$j]]?>"><?=$arr[$gridDetail[$j]]?></td> 
	<?
				} else if ($gridHeader [$j] == "Lampiran") {
					?>
		<td><a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_Ref").$arr[$gridDetail[$j]]?>','_blank')"><?=$arr[$gridDetail[$j]]?></a></td> 
	<?
				} else if ($gridHeader [$j] == "Jumlah") {
					?>
		<td align="right">
	<?
					echo $Helper->format_uang ( $arr [$gridDetail [$j]] );
					?>
		</td> 
	<?
				} else if ($gridHeader [$j] == "Link") {
					?>
		<td align="center">
				<input type="image" src="Public/images/icn_search.png" title="Lihat Data" Onclick="window.open('<?=$Helper->baseurl("Upload_Foto").$arr[$gridDetail[$j]]?>','_blank')">
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
				?>
			<input type="image" src="Public/images/icn_alert_info.png" title="Rincian Data" Onclick="return set_action('getdetail', '<?=$arr[0]?>')">
			&nbsp;&nbsp;
	<?
			}
			if ($iconEdit) {
				?>
			<input type="image" src="Public/images/icn_edit.png" title="Ubah Data" Onclick="return set_action('getedit', '<?=$arr[0]?>')">
			&nbsp;&nbsp;
	<?
			}
			if ($iconDel) {
				?>
			<input type="image" src="Public/images/icn_trash.png" title="Hapus Data" Onclick="return set_action('getdelete', '<?=$arr[0]?>', '<?=$arr[1]?>')">
	<?
			}
			if ($method=='backuprestore') {
				?>
			<input type="image" src="Public/images/icn_restore.png" title="Restore Data" Onclick="return set_action('restore_database', '<?=$arr[0]?>', '<?=$Helper->dateTimeIndo ( $arr [2] )?>')">
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

