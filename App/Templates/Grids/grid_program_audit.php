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
			if (!$status_katim) {
				$iconEdit = "0";
				$iconDel = "0";
			}else{
				$iconEdit = "1";
				$iconDel = "1";
			}
			$i ++;
			?>
	<tr>
		<td><?=$i+$offset?>.</td>
	<?
			$cek_posisi = $kertas_kerjas->cek_posisi($ses_assign_id);
			for($j = 0; $j < count ( $gridDetail ); $j ++) {
				if ($gridHeader [$j] == "KKA") {
					$jml_kka = 0;
					$warna_kka = "";
					$jml_kka = $kertas_kerjas->kertas_kerja_count ( $arr [$gridDetail [$j]], "", "", "" );
					if($jml_kka==0) $warna_kka = "red";
					?>
		<td align="center" bgcolor="<?=$warna_kka?>">
	<?
					echo $jml_kka;
					if($cek_posisi== '6a70c2a39af30df978a360e556e1102a2a0bdc02')
					$status_owner =  $kertas_kerjas->cek_owner_program ( $arr [$gridDetail [$j]], $ses_userId);

					else
						$status_owner = 1;
					if ($kertas_kerja_akses && $status_owner && $arr ['program_status'] == 2) {
						?>
			<br> <input type="image" src="Public/images/icn_search.png" title="View KKA" Onclick="return set_action('kertas_kerja', '<?=$arr[$gridDetail[$j]]?>', '')">
	<?
					}
					?>
		</td>
	<?
				} else if ($gridHeader [$j] == "Status") {
					?>
		<td>
	<?
					if ($arr ['program_status'] == 1) {
					    $iconEdit = "0";
				        $iconDel = "0";
						echo "Diajukan Oleh Katim<br>Sedang Menunggu Approval";
					} elseif ($arr ['program_status'] == 2) {
					    $iconEdit = "0";
				        $iconDel = "0";
						echo "Telah Disetujui";
					} elseif ($arr ['program_status'] == 3) {
						echo "Ditolak oleh Dalnis<br>Silahkan Ajukan Kembali";
					} else {
						echo "Belum Diajukan Oleh Katim";
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
			if($cek_posisi== '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7') {
				if ($arr ['program_status'] == 0 || $arr ['program_status'] == 3) {
		?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getajukan_pka', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="1">Ajukan</option>
				</select>
			</fieldset>
		<?
				}
			}
			if($cek_posisi== '9e8e412b0bc5071b5d47e30e0507fe206bdf8dbd') {
				if($arr ['program_status'] == 1){
		?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getapprove_pka', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="3">Tolak Pengajuan</option>
					<option value="2">Setujui</option>
				</select>
			</fieldset>
			<?php
				}
			}
			?>

			<?php if($_SESSION ['ses_groupId'] == '4d6cb5538c7cfbd6b1ccbd881e0e97e69183b4a0'): ?>
				<?php if($arr ['program_status'] == 1): ?>
			<fieldset class="form-group">
				<select name="status" class="form-control"
					onchange="return set_action('getapprove_pka', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="3">Tolak Pengajuan</option>
					<option value="2">Setujui</option>
				</select>
			</fieldset>
				<?php endif ?>
			<?php endif ?>


	<?php
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