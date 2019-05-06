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
				if ($gridHeader [$j] == "Tanggal" || $gridHeader [$j] == "Batas Waktu") {
					?>
		<td align="center">
	<?
					echo $Helper->dateIndo ( $arr [$gridDetail [$j]] );
					?>
		</td>
	<?
} elseif ($gridHeader [$j] == "Obyek Audit") {
					?>
		<td>
	<?
					$rs_id_auditee = $assigns->assign_auditee_viewlist ( $arr [$gridDetail [$j]] );
					$count_auditee = $rs_id_auditee->RecordCount();
					$z = 0;
					while ( $arr_id_auditee = $rs_id_auditee->FetchRow () ) {
						$z ++;
						if($count_auditee==1) $z = 0;
						if($z == 0) $no = ""; else $no = $z . ". " ;
						echo $no.$arr_id_auditee ['auditee_name'] . "<br>";
					}
					?>
		</td>
	<?
				} else if ($gridHeader [$j] == "Tanggal Kegiatan") {
					?>
		<td>
	<?
					echo $Helper->dateIndo ( $arr ['assign_start_date'] ) . " s.d " . $Helper->dateIndo ( $arr ['assign_end_date'] );
					?>
		</td>
	<?
				} else if ($gridHeader [$j] == "Susunan Tim") {
					?>
		<td align="center">
	<?
					echo $assigns->count_auditor_assign ( $arr [$gridDetail [$j]] );
					if ($anggota_assign_akses) {
						?>
			<br> <input type="image" src="Public/images/icn_search.png" title="View Tim"
			Onclick="return set_action('anggota_assign', '<?=$arr[$gridDetail[$j]]?>', '')">
	<?
					}
					?>
		</td>
	<?
				} elseif ($gridHeader [$j] == "Status Surat Tugas") {
					?>
		<td align="center">
	<?
					if ($arr[$gridDetail[$j]]==0) {
						$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
						$iconDel = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );
						echo "Belum Diajukan";
					} else if ($arr[$gridDetail[$j]]==1) {
						$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
						$iconDel = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );
						echo "Sedang Menunggu Persetujuan";
					} else if ($arr[$gridDetail[$j]]==2 || $arr[$gridDetail[$j]]==3) {
						$iconEdit = 0;
						$iconDel = 0;
						if ($surat_tugas_akses) {
						echo $arr['assign_surat_no'];
						?>
						<br>
						<input type="image" src="Public/images/icn_search.png" title="View Surat Tugas" Onclick="return set_action('getsurattugas', '<?=$arr['assign_id']?>', '')">
	<?
						}
					} else if ($arr[$gridDetail[$j]]==4) {
						$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
						$iconDel = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );
						echo "Penugasan Ditolak";
					}
					?>
		</td>
	<?
				} elseif ($gridHeader [$j] == "KKA") {
					?>
		<td align="center">
	<?
					echo $kertas_kerjas->kertas_kerja_count ( $arr [$gridDetail [$j]], "", "", "" );
					$status_owner =  $kertas_kerjas->cek_owner_program ( $arr [$gridDetail [$j]], $ses_userId);
					if ($kertas_kerja && $status_owner) {
						?>
			<br> <input type="image" src="Public/images/icn_search.png" title="View KKA"
			Onclick="return set_action('kertas_kerja', '<?=$arr[$gridDetail[$j]]?>', '')">
	<?
					}
					?>
		</td>
	<?
				} elseif ($gridHeader [$j] == "Status LHA") {
					?>
		<td align="center">
					<?
				if($arr['assign_status']==2 || $arr['assign_status']==3){
					if($arr ['lha_status']==0){
						echo "Belum Diajukan";
					} else if($arr ['lha_status']==1){
						echo "Sudah Diajukan Katim, Sedang Direviu Oleh Pengendali Teknis";
					} else if($arr ['lha_status']==2){
						echo "Sudah Diajukan Pengendali Teknis, Sedang Direviu Oleh Pengendali Mutu";
					} else if($arr ['lha_status']==3){
						echo "Sudah Diajukan Penggendali Mutu, Sedang Direviu Oleh Inspektur";
					} else if($arr ['lha_status']==4){
						echo "Telah Disetujui Inspektur";
					} else if($arr ['lha_status']==5){
						echo "Ditolak oleh Pengendali Teknis";
					} else if($arr ['lha_status']==6){
						echo "Ditolak oleh Pengendali Mutu";
					} else if($arr ['lha_status']==7){
						echo "Ditolak oleh Inspektur";
					}

					$rs_id_auditee_2 = $assigns->assign_auditee_viewlist ( $arr [$gridDetail [$j]] );
					while ( $arr_id_auditee_2 = $rs_id_auditee_2->FetchRow () ) {
					?>
						<input type="image" src="Public/images/icn_search.png" title="View LHA <?=$arr_id_auditee_2['auditee_name']?>" onclick="return set_action('getlha', '<?=$arr['assign_id'].":".$arr_id_auditee_2['assign_auditee_id_auditee']?>', '')">
					<?
					}
				} else {
					echo 'Belum Diajukan';
				}
				?>
		</td>
	<?
				} else if ($gridHeader [$j] == "Program Audit") {
					?>
		<td align="center">
	<?
					echo $programaudits->program_audit_count ( $arr [$gridDetail [$j]], "", "", "" );
					if ($programaudit_akses) {
						?>
			<br> <input type="image" src="Public/images/icn_search.png"
			title="View Audit Program"
			Onclick="return set_action('programaudit', '<?=$arr[$gridDetail[$j]]?>', '')">
	<?
					}
					?>
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
			if ($method == "auditassign") {
				if ($arr ['assign_status'] == 0 || $arr ['assign_status'] == 4) {
					if($getajukan_penugasan){
					?>
			<fieldset>
				<select name="status"
					onchange="return set_action('getajukan_penugasan', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="1">Ajukan</option>
				</select>
			</fieldset>
			<?php
					}
				} elseif ($arr ['assign_status'] == 1) {
					if($getapprove_penugasan){
					?>
			<fieldset>
				<select name="status"
					onchange="return set_action('getapprove_penugasan', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="4">Tolak Penugasan</option>
					<option value="2">Setujui</option>
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
				$ket_text = $arr[1];
				if($method=='auditassign') $ket_text = "Penugasan Ini";
				?>
			<input type="image" src="Public/images/icn_trash.png" title="Hapus Data"
			Onclick="return set_action('getdelete', '<?=$arr[0]?>', '<?=$ket_text?>')">
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
