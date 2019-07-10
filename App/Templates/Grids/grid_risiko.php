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
				if ($gridHeader [$j] == "Identifikasi") {
					?>
		<td align="center">
			<?=$risks->identifikasi_count($arr[$gridDetail[$j]],"","","")?> Risiko 
			<?php
					if ($risk_identifikasi) {
						if ($arr ['penetapan_status'] == 0 || $arr ['penetapan_status'] == 3) {
							?>
			<br> 
			<button class="btn btn-default btn-circle btn-sm" title="View Identifikasi" Onclick="return set_action('risk_identifikasi', '<?=$arr[$gridDetail[$j]]?>', '')"><i class="fa fa-search"></i></button>
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
			<br>
			<button class="btn btn-default btn-circle btn-sm" title="View Analisa" Onclick="return set_action('view_analisa', '<?=$arr[0]?>', '')"><i class="fa fa-search"></i></button>
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
			
			<button class="btn btn-default btn-circle btn-sm" title="View Evaluasi" Onclick="return set_action('view_evaluasi', '<?=$arr[0]?>', '')"><i class="fa fa-search"></i></button>
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
					//if ($view_penanganan) {
					//	if(!empty($arr['penetapan_profil_risk_residu'])){
					?>
			<button class="btn btn-default btn-circle btn-sm" title="View Penanganan" Onclick="return set_action('view_penanganan', '<?=$arr[$gridDetail[$j]]?>', '')"><i class="fa fa-search"></i></button>
					<?php
					//	}
					//}
					?>
		</td> 
		<?php } elseif ($gridHeader [$j] == "Rencana Waktu") { ?>
		<td align="center">
			<?php echo $Helper->dateIndo($arr[$gridDetail[$j]]);?>
		</td> 

		<!-- Start: Detail Identifikasi Risiko -->
		<?php } elseif ($gridHeader [$j] == "Indikator") { ?>
		<td>
			<?=$risks->get_identifikasi_detail_byKolom($arr[$gridDetail[$j]], 'indikator_kinerja')?>
		</td> 
		<?php } elseif ($gridHeader [$j] == "Kejadian") { ?>
		<td>
			<?=$risks->get_identifikasi_detail_byKolom($arr[$gridDetail[$j]], 'kejadian_risiko')?>
		</td> 
		<?php } elseif ($gridHeader [$j] == "Kategori") { ?>
		<td>
			<?=$risks->get_identifikasi_detail_byKolom($arr[$gridDetail[$j]], 'risk_kategori')?>
		</td> 
		<?php } elseif ($gridHeader [$j] == "Penyebab") { ?>
		<td>
			<?=$risks->get_identifikasi_detail_byKolom($arr[$gridDetail[$j]], 'penyebab_risiko')?>
		<?php } elseif ($gridHeader [$j] == "Dampak") { ?>
		<td>
			<?=$risks->get_identifikasi_detail_byKolom($arr[$gridDetail[$j]], 'dampak_risiko')?>
		</td> 
		<!-- End: Detail Identifikasi Risiko -->
		<?php } else { ?>
		<td><?=$arr[$gridDetail[$j]]?></td> 
		<?php
				}
			}
		?>
		<td class="text-center">
	<?
			if ($iconDetail) {
				if ($method == 'risk_reviu') {
					$action = "view_monitoring";
				}else{
					$action = "getdetail";
				}
				?>
					<button class="btn btn-info btn-circle btn-sm" title="Rincian Data" Onclick="return set_action('getdetail', '<?=$arr[0]?>')"><i class="fa fa-info-circle"></i></button>
			
	<?
			}
			if ($arr ['penetapan_status'] == 0 || $arr ['penetapan_status'] == 3 || ($method == 'risk_monitoring')) {
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