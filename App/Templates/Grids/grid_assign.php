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
			?>
	<tr>
		<td class='text-center'><?=$i+$offset?>.</td>
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
		<td class="text-center">
	<?
					echo $Helper->dateIndo ( $arr ['assign_start_date'] ) . " <br>s.d<br> " . $Helper->dateIndo ( $arr ['assign_end_date'] );
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
			<br>
			<button class="btn btn-default btn-circle btn-sm"  title="View Tim"
			Onclick="return set_action('anggota_assign', '<?=$arr[$gridDetail[$j]]?>', '')"><i class="fa fa-search"></i></button>
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
						echo "Sedang Menunggu Persetujuan Dalnis";
					} else if ($arr[$gridDetail[$j]]==2 || $arr[$gridDetail[$j]]==3) {
						$cekAction = $Helper->cekAction($ses_group_id);
						if($cekAction == 1){
							$iconDel 	= 1;
							$iconEdit	= 1;
						}else{
							$iconDel 	= 0;
							$iconEdit	= 0;
						}
						if ($surat_tugas_akses) {
						echo $arr['assign_surat_no'];
						?>
						<br>
						<button class="btn btn-default btn-circle btn-sm" title="View Surat Tugas" Onclick="return set_action('getsurattugas', '<?=$arr['assign_id']?>', '')"><i class="fa fa-search"></i></button>
	<?
						}
					} else if ($arr[$gridDetail[$j]]==4) {
						$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
						$iconDel = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );
						echo "Penugasan Ditolak Dalnis";
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
			<br>
			<button class="btn btn-default btn-circle btn-sm" title="View KKA" Onclick="return set_action('kertas_kerja', '<?=$arr[$gridDetail[$j]]?>', '')"><i class="fa fa-search"></i></button>
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
					?>	<br>
						<button class="btn btn-default btn-circle btn-sm" title="View LHA <?=$arr_id_auditee_2['auditee_name']?>" onclick="return set_action('getlha', '<?=$arr['assign_id'].":".$arr_id_auditee_2['assign_auditee_id_auditee']?>', '')"><i class="fa fa-search"></i></button>
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
						<br>
						<button class="btn btn-default btn-circle btn-sm" title="View Audit Program" Onclick="return set_action('programaudit', '<?=$arr[$gridDetail[$j]]?>', '')"><i class="fa fa-search"></i></button>
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
		<td class="text-center">
	<?php
			if ($method == "auditassign") {
				if ($arr ['assign_status'] == 0 || $arr ['assign_status'] == 4) {
					if($getajukan_penugasan){
					?>
			<fieldset class="form-group mb-sm">
				<select name="status" class="form-control"
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
			<fieldset class="form-group mb-sm">
				<select name="status" class="form-control"
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
			<button class="btn btn-info btn-circle btn-sm" title="Rincian Data" Onclick="return set_action('getdetail', '<?=$arr[0]?>')"><i class="fa fa-info-circle"></i></button>
			
	<?
			}
			if ($iconEdit) {
				?>
			<button class="btn btn-warning btn-circle btn-sm" title="Ubah Data" Onclick="return set_action('getedit', '<?=$arr[0]?>')"><i class="fa fa-pencil"></i></button>
			
	<?
			}
			if ($iconDel) {
				$ket_text = $arr[1];
				if($method=='auditassign') $ket_text = "Penugasan Ini";
				?>
			<button class="btn btn-danger btn-circle btn-sm" title="Hapus Data" Onclick="return set_action('getdelete', '<?=$arr[0]?>', '<?=$ket_text?>')"><i class="fa fa-trash-o"></i></button>
			
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