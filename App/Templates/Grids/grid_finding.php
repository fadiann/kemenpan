<div class="table-responsive mt-md">
	<table class="table table-bordered table-striped table-condensed mb-none">
	<tr>
		<?
		$jmlHeader = count ( $gridHeader );
		echo ("<th width='5%' class='text-center'>No</th>");
		for($j = 0; $j < $jmlHeader; $j ++) {
			echo ("<th class='text-center' width='" . $gridWidth [$j] . "%'>" . $gridHeader [$j] . "</th>");
		}
		if ($widthAksi != "0") {
			echo ("<th class='text-center' width='" . $widthAksi . "%'>Aksi</th>");
		}
		?>
	</tr>
	<?
	if ($recordcount != 0) {
		$i = 0;
		while ( $arr = $rs->FetchRow () ) {
			$i ++;
			if ($arr ['finding_status'] == 1 || $arr ['finding_status'] == 2 || $arr ['finding_status'] == 3 ||$arr ['finding_status'] == 4 || $arr ['finding_status'] == 8) {
				$iconEdit = "0";
				$iconDel = "0";
			}else{
				$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
				$iconDel = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );
			}
			?>
	<tr>
		<td><?=$i+$offset?></td> 
	<?
			for($j = 0; $j < count ( $gridDetail ); $j ++) {
				if ($gridHeader [$j] == "Rekomendasi") {
					?>
		<td align="center">
	<?
					echo $rekomendasis->rekomendasi_count ( $arr [$gridDetail [$j]], "", "", "", "" );
					if ($rekomendasi_akses) {
						?>
			<br> <input type="image" src="Public/images/icn_search.png"
			title="View Rekomendasi"
			Onclick="return set_action('rekomendasi', '<?=$arr[0]?>', '<?=$arr[1]?>')">
	<?
					}
					?>
		</td> 
	<?
				} else if ($gridHeader [$j] == "Status") {
					?>
		<td>
					<?php
					if ($arr ['finding_status'] == 1) {
						echo "Sedang direviu Katim";
					} elseif ($arr ['finding_status'] == 2) {
						echo "Di Setujui Pengendali Teknis <br>Sedang Menunggu Reviu Inspektur";
					} elseif ($arr ['finding_status'] == 3) {
						echo "Telah Direviu Pengendali Teknis <br>Sedang Menunggu Reviu Inspektur";
					} elseif ($arr ['finding_status'] == 4) {
						echo "Telah Disetujui";
					} elseif ($arr ['finding_status'] == 5) {
						echo "Ditolak Oleh Katim";
					} elseif ($arr ['finding_status'] == 6) {
						echo "Ditolak Pengendali Teknis <br>Sedang Menunggu Pebaikan Katim";
					} elseif ($arr ['finding_status'] == 7) {
						echo "Ditolak Inspektur <br>Sedang Menunggu Pebaikan Pengendali Teknis";
					} elseif ($arr ['finding_status'] == 8) {
						echo "Selesai";
					} else {
						echo "Temuan Belum Diajukan";
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
	<?
			$cek_posisi = $findings->cek_posisi($arr ['finding_assign_id']);
			if ($arr ['finding_status'] == 0 || $arr ['finding_status'] == 5) { 
				if($status_owner){// owner
		?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getajukan_temuan', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="1">Ajukan ke Katim</option>
				</select>
			</fieldset>
			<?php
				}
			} elseif ($arr ['finding_status'] == 1 || $arr ['finding_status'] == 6) { 
				if($cek_posisi=='8918ca5378a1475cd0fa5491b8dcf3d70c0caba7'){// katim
					?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getapprove_temuan', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="5">Tolak Temuan</option>
					<option value="2">Ajukan ke Dalnis</option> //langsung ke inspektur
				</select>
			</fieldset>
			<?php
				}
			} elseif ($arr ['finding_status'] == 10 || $arr ['finding_status'] == 7) {
				//if($cek_posisi=='8918ca5378a1475cd0fa5491b8dcf3d70c0caba7'){ // dalnis
				if($cek_posisi=='9e8e412b0bc5071b5d47e30e0507fe206bdf8dbd'){ // dalnis
					?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getapprove_temuan', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="6">Tolak Temuan</option>
					<!-- <option value="3">Ajukan ke Daltu</option> -->
					<option value="3">Ajukan ke Inspektur</option>
				</select>
			</fieldset>
			<?php
				}
			} elseif ($arr ['finding_status'] == 2) {
				//if($cek_posisi=='8918ca5378a1475cd0fa5491b8dcf3d70c0caba7'){ // daltu
				if($_SESSION ['ses_groupId']=='4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0'){ // Inspektur
					?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getapprove_temuan', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="7">Tolak Temuan</option>
					<option value="4">Setujui</option>
				</select>
			</fieldset>
			<?php
				}
			}
				
			if ($iconDetail) {
				?>
			<button class="btn btn-info btn-circle btn-sm" title="Rincian Data" Onclick="return set_action('getdetail', '<?=$arr[0]?>')"><i class="fa fa-info-circle"></i></button>
			
	<?
			}
			if ($iconEdit) {
				?>
			<input type="image" src="Public/images/icn_edit.png" title="Ubah Data"
			Onclick="return set_action('getedit', '<?=$arr[0]?>')">
			
	<?
			}
			if ($iconDel) {
				?>
			<input type="image" src="Public/images/icn_trash.png" title="Hapus Data"
			Onclick="return set_action('getdelete', '<?=$arr[0]?>', '<?=$arr[1]?>')">
			
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

