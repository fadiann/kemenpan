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
				if ($gridHeader [$j] == "Satuan Kerja") {
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
				} else if ($gridHeader [$j] == "Tanggal Rencana Audit" || $gridHeader [$j] == "Tanggal Audit") {
					?>
		<td>
	<?
					echo $Helper->dateIndo ( $arr ['assign_start_date'] ) . " s.d " . $Helper->dateIndo ( $arr ['assign_end_date'] );
					?>
		</td> 
	<?
				} else if ($gridHeader [$j] == "jml Auditor") {
					?>
		<td align="center">
	<?
					echo $assigns->count_auditor_assign ( $arr [$gridDetail [$j]] );
					?>
		</td> 
	<?
				} else if ($gridHeader [$j] == "jml Audit Program") {
					?>
		<td align="center">
	<?
					echo $programaudits->program_audit_count ( $arr [$gridDetail [$j]], "", "", "" );
					?>
		</td> 
	<?
				} else if ($gridHeader [$j] == "jml Temuan") {
					?>
		<td align="center">
	<?
					echo $findings->finding_count ( $arr [$gridDetail [$j]], "", "", "", "" );
					?>
			&nbsp;&nbsp;
			<input type="image" src="Public/images/icn_search.png" title="View Temuan"
			Onclick="return set_action('view_finding', '<?=$arr[$gridDetail[$j]]?>', '')">
		</td> 
	<?
				} else {
					?>
		<td><?=$arr[$gridDetail[$j]]?></td> 
	<?
				}
			}
			?>
		<td>&nbsp;
	<?
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
			Onclick="return set_action('getdelete', '<?=$arr[0]?>', '<?=$arr[1]?>')">
			&nbsp;&nbsp;
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

