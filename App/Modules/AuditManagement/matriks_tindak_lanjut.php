<?
include_once "App/Classes/assignment_class.php";
include_once "App/Classes/finding_class.php";
include_once "App/Classes/rekomendasi_class.php";

$assigns = new assign ( $ses_userId );
$findings = new finding ( $ses_userId );
$rekomendasis = new rekomendasi ( $ses_userId );

$ses_assign_id = $_SESSION ['ses_assign_id'];
?>
<section id="main" class="column">	
	<article class="module width_3_quarter">
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr>
				<th width="2%">No</th>
				<th width="40%">Uraian Temuan</th>
				<th width="45%">Rekomendasi</th>
				<th width="8%">Status Rekomendasi</th>
				<th width="5%">Tindak Lanjut</th>
			</tr>
			<?
			$no_temuan = 0;
			$rs_list_temuan = $assigns->temuan_list($ses_assign_id);
			while($arr_list_temuan = $rs_list_temuan->FetchRow()){
				$no_temuan++;
				$no_rek = 0;
				$rs_list_rek = $findings->get_rekomendasi_list($arr_list_temuan['finding_id']);
				$count_rek = $rs_list_rek->RecordCount();
				while($arr_list_rek = $rs_list_rek->FetchRow()){
					$no_rek++;		
					if($arr_list_rek['rekomendasi_status']==1) $status = "Selesai";
					else $status = "Proses";
			?>
			<tr>
				<?
				if($no_rek==1){
				?>
				<td rowspan="<?=$count_rek?>"><?=$no_temuan?></td>
				<td rowspan="<?=$count_rek?>"><?=$arr_list_temuan['finding_judul']?></td>
				<?
				}
				?>
				<td><?=$arr_list_rek['rekomendasi_desc']?></td>
				<td><?=$status?></td>
				<td><input type="image" src="Public/images/icn_search.png" title="View Tindak Lanjut" Onclick="location='main.php?method=matrikstindaklanjut&idRec=<?=$arr_list_rek['rekomendasi_id']?>'"></td>
			</tr>
			<?
				}
			}
			?>
		</table>
	</article>
</section>