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
			$rs_id_auditee = $plannings->planning_auditee_viewlist ( $arr [$gridDetail [$j]] );
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
		} else if ($gridHeader [$j] == "Rencana Kegiatan" || $gridHeader [$j] == "Tanggal Audit") {
		?>
		<td align="center">
			<?=$Helper->dateIndo($arr['audit_plan_start_date']) . " s.d " . $Helper->dateIndo($arr['audit_plan_end_date']);
			?>
		</td>
		<?
		} else if ($gridHeader [$j] == "Tim Audit") {
		?>
		<td align="center">
			<?
			$count_anggota = 0;
			$count_anggota = $plannings->auditor_plan_count ( $arr [$gridDetail [$j]], "", "", "" );
			echo $count_anggota;
			if ($anggota_plan) {
			?>
			<br> <input type="image" src="Public/images/icn_search.png" title="View Tim"
			Onclick="return set_action('anggota_plan', '<?=$arr[$gridDetail[$j]]?>', '')">
			<?
			}
			?>
		</td>
		<?
		} else if ($gridHeader [$j] == "Status") {
		?>
		<td>
			<?
			if ($arr ['audit_plan_status'] == 1) {
			echo "Diajukan Oleh " . ucfirst ( $arr ['user_propose'] ) . "<br>Sedang Menunggu Approval";
			} elseif ($arr ['audit_plan_status'] == 2) {
			echo "Telah Disetujui Oleh " . ucfirst ( $arr ['user_approve'] );
			} elseif ($arr ['audit_plan_status'] == 3) {
			echo "Ditolak oleh " . ucfirst ( $arr ['user_approve'] ) . "<br>Silahkan Ajukan Kembali";
			} elseif ($arr['audit_plan_status'] == 0) {
			echo "Belum Diajukan";
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
				if ($arr ['audit_plan_status'] == 2) {
					$cekAction = $Helper->cekAction($ses_group_id);
					if($cekAction == 1){
						$iconDel 	= 1;
						$iconEdit	= 1;
					}else{
						$iconDel 	= 0;
						$iconEdit	= 0;
					}
				} else {
					$iconEdit = $Helper->cek_akses ( $ses_group_id, $method, 'getedit' );
					$iconDel = $Helper->cek_akses ( $ses_group_id, $method, 'getdelete' );
				}
				if ($method == "auditplan" && $count_anggota!=0) {
					if ($arr ['audit_plan_status'] == 0 || $arr ['audit_plan_status'] == 3) {
						if ($getajukan) {
			?>
			<fieldset>
				<select name="status"
					onchange="return set_action('getajukan', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="1">Ajukan</option>
				</select>
			</fieldset>
			<?php
					}
				} elseif ($arr ['audit_plan_status'] == 1) {
					if ($getapprove) {
			?>
			<fieldset>
				<select name="status"
					onchange="return set_action('getapprove', '<?=$arr[0]?>', this.value)">
					<option value="">Pilih Status</option>
					<option value="3">Tolak Pengajuan</option>
					<option value="2">Setujui</option>
				</select>
			</fieldset>
			<?php
					}
				}
			}
			?>
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
<script>
$(document).ready(function() {
	$(".colorbox_status").colorbox({iframe:false, innerWidth:550, innerHeight:150});
});
</script>