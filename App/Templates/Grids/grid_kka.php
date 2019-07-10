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
			if ($arr ['kertas_kerja_status'] == 1 || $arr ['kertas_kerja_status'] == 2) {
				$iconEdit = "0";
				$iconDel = "0";
			}else{
				$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
				$iconDel = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );
			}
			$i ++;
			?>
	<tr>
		<td class="text-center"><?=$i+$offset?>.</td> 
	<?
			for($j = 0; $j < count ( $gridDetail ); $j ++) {
				if ($gridHeader [$j] == "Tanggal") {
					?>
		<td align="center">
	<?
					echo $Helper->dateIndo ( $arr [$gridDetail [$j]] );
					?>
		</td> 
	<?
				} elseif ($gridHeader [$j] == "Temuan Audit") {
					?>
		<td align="center">
	<?
					echo $findings->finding_count ( $arr ['program_id_assign'], $arr [$gridDetail [$j]], "", "", "" );
					if ($finding_kka_akses) {
						if ($arr ['kertas_kerja_status'] >= 2 && $arr ['kertas_kerja_status']!=5) {
						?>
			<br> <input type="image" src="Public/images/icn_search.png"
			title="View Temuan"
			Onclick="return set_action('finding_kka', '<?=$arr[$gridDetail[$j]]?>', '')">
	<?
						}
					}
					?>
		</td>  
	<?
				} else if ($gridHeader [$j] == "Status") {
					?>
		<td>
	<?
					if ($arr ['kertas_kerja_status'] == 1) {
						echo "Sedang direviu Katim";
					} elseif ($arr ['kertas_kerja_status'] == 2) {
						echo "Telah Disetujui Katim";
					} elseif ($arr ['kertas_kerja_status'] == 3) {
						echo "Ditolak Oleh Katim";
					} else {
						echo "KKA Belum Diajukan";
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
			$cek_posisi = $kertas_kerjas->cek_posisi($arr ['program_id_assign']);
			if ($arr ['kertas_kerja_status'] == 0 || $arr ['kertas_kerja_status'] == 3) { 
				if($status_owner){// owner
					?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getajukan_kka', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="1">Ajukan</option>
				</select>
			</fieldset>
			<?php
				}
			} elseif ($arr ['kertas_kerja_status'] == 1) {
				if($cek_posisi=='8918ca5378a1475cd0fa5491b8dcf3d70c0caba7'){// katim
					?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getapprove_kka', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="3">Tolak KKA</option>
					<option value="2">Setujui</option>
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
			<button class="btn btn-warning btn-circle btn-sm" title="Ubah Data" Onclick="return set_action('getedit', '<?=$arr[0]?>')"><i class="fa fa-pencil"></i></button>
	<?
			}
			if ($iconDel) {
				?>
			<button class="btn btn-danger btn-circle btn-sm" title="Hapus Data" Onclick="return set_action('getdelete', '<?=$arr[0]?>', '<?=$arr[1]?>')"><i class="fa fa-trash-o"></i></button>
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
		echo "<a href='" . $paging_request . "&page=" . ($noPage - 1) . "' class='btn btn-sm btn-circle btn-primary'> <<d </a>";
	for($page = 1; $page <= $jumPage; $page ++) {
		if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) {
			if (($showPage == 1) && ($page != 2))
				echo "<span class='titik_titik'>...</span>";
			if (($showPage != ($jumPage - 1)) && ($page == $jumPage))
				echo "<span class='titik_titik'>...</span>";
			if ($page == $noPage)
				echo "<span class='btn btn-sm btn-circle btn-default'>" . $page . "</span> ";
			else
				echo " <a href='" . $paging_request . "&page=" . $page . "' class='btn btn-sm btn-circle btn-primary'>" . $page . "</a> ";
			$showPage = $page;
		}
	}
	if ($noPage < $jumPage)
		echo "<a href='" . $paging_request . "&page=" . ($noPage + 1) . "' class='btn btn-sm btn-circle btn-primary'> > </a>";
	?>
	</td>
	</tr>
	</table>
</div>