<?php 
include_once "App/Classes/report_class.php";
include_once "App/Classes/param_class.php";
include_once "App/Classes/audit_plann_class.php";

$reports = new report ( $ses_userId );
$params = new param( $ses_userId );
$plannings = new planning ( $ses_userId );

$fil_tahun_id = "";

$fil_tahun_id = $Helper->replacetext ( $_POST ["fil_tahun_id"] );
$fil_tipe_id = $Helper->replacetext ( $_POST ["fil_tipe_id"] );

if($fil_tahun_id!=""){
?>
<section id="main" class="column">	
	<article class="module width_3_quarter">
		<table border='1' class="table_risk" cellspacing='0' cellpadding="0">
			<tr>
				<td colspan="20">PROGRAM KERJA PENGAWASAN TAHUNAN (PKPT)<br>PT. Tri Nindya Utama<br>Tahun : <?=$fil_tahun_id?></td>
			</tr>
			<tr>
				<td width="2%" rowspan="2">Tim</td>
				<td align="center" rowspan="2" width="30%">&nbsp;</td>
				<td align="center" rowspan="2" width="4%">Jumlah Hari</td>
				<td align="center" rowspan="2" width="7%">Jenis Audit/Kegiatan</td>
				<td align="center" rowspan="2">&nbsp;</td>
				<td align="center" rowspan="2">Nama</td>
				<td align="center" rowspan="2" width="7%">Jumlah Anggaran (Rp)</td>
				<td align="center" colspan="12">Pengawasan Oleh PT Tri Nindya Utama</td>
				<td align="center" rowspan="2" width="7%">Ket</td>
			</tr>
			<tr>
			<?
			for($i=1;$i<=12;$i++){
				echo "<td align='center'>".$i."</td>";
			}
			?>
			</tr>
			<?			
			$no_tipe = 0;
			?>
			<tr>
				<td><?=$no_tipe=$no_tipe+1?></td>
				<td>
			<?	
					$rs_tipe = $params->audit_type_lit_by_opsi(1);
					$count_tipe = $rs_tipe->RecordCount();
					$in_tipe = "";
					$koma_tipe = ",";
					$no_tp_audit=0;
					while($arr_tipe = $rs_tipe->FetchRow()){
						$no_tp_audit++;
						if($count_tipe==$no_tp_audit) $koma_tipe = "";
						$in_tipe .= "'".$arr_tipe['audit_type_id']."'".$koma_tipe;
						echo $arr_tipe['audit_type_name']." / ";
					}
			?>
					</td><?
					for($i=1;$i<=18;$i++){
						echo "<td align='center'>&nbsp;</td>";
					}
				?>
			</tr>
			<?
					$rs_sub_tipe = $plannings->plan_sub_tipe_viewlist("",$in_tipe);
					while($arr_sub_tipe = $rs_sub_tipe->FetchRow()){
			?>
			<tr>
				<td>&nbsp;</td>
				<td><?=$arr_sub_tipe['sub_audit_type_name']?></td>
				<?
						for($i=1;$i<=4;$i++){
							echo "<td align='center'>&nbsp;</td>";
						}
				?>
				<td align="right"><?=$Helper->format_uang($arr_sub_tipe['sum_anggaran'])?></td>
				<?
						for($i=1;$i<=13;$i++){
							echo "<td align='center'>&nbsp;</td>";
						}
				?>
			</tr>
			<?
						$no_perencanaan= 0;
						$rs_report = $plannings->plan_report_viewlist($arr_tipe_audit['audit_type_id'], $arr_sub_tipe['sub_audit_type_name'], $in_tipe);
						while($arr_report = $rs_report->FetchRow()){
							$no_perencanaan++;
							$no_tim=0;
							$count_tim=0;
							$rs_plan_anggota = $plannings->planning_list_auditor($arr_report['audit_plan_id']);
							$count_tim=$rs_plan_anggota->RecordCount();
							while($arr_plan_anggota = $rs_plan_anggota->FetchRow()){
								$no_tim++;
							
			?>
			<tr>
			<?
				if($no_tim==1){
			?>
				<td rowspan="<?=$count_tim?>"><?=$no_perencanaan?></td>
				<td rowspan="<?=$count_tim?>">
			<?
								$rs_auditee_audit = $plannings->planning_auditee_viewlist($arr_report['audit_plan_id']);
								while($arr_auditee_audit = $rs_auditee_audit->FetchRow()){
									echo ucwords(strtolower($arr_auditee_audit['auditee_name']))."<br>";
								}
			?>
				</td>
				<td rowspan="<?=$count_tim?>" align="center">
			<?
								$rs_auditee_audit = $plannings->planning_auditee_viewlist($arr_report['audit_plan_id']);
								while($arr_auditee_audit = $rs_auditee_audit->FetchRow()){
									echo $arr_auditee_audit['audit_plan_auditee_hari']."<br>";
								}
			?>	
				</td>
				<td rowspan="<?=$count_tim?>" align="center"><?=$arr_report['audit_type_code']?></td>
			<?
			}
			?>
				<td align="center"><?=$arr_plan_anggota['posisi_code'];?></td>
				<td colspan="2"><?=ucwords(strtolower($arr_plan_anggota['auditor_name']));?></td>
			<?
								for($i=1;$i<=13;$i++){
									 $color = "";
									$select_month = $plannings->planning_month($arr_report['audit_plan_id'], $i);
									if($select_month!="") $color = 'black';
									echo "<td align='center' bgcolor='".$color."'>&nbsp;</td>";
								}
				?>
			</tr>
			<?
							}
						}
					}
			$rs_tipe_audit = $plannings->plan_tipe_viewlist($fil_tahun_id, "1");
			while($arr_tipe_audit = $rs_tipe_audit->FetchRow()){
				$no_tipe++;
				if($arr_tipe_audit['audit_type_opsi']!=1){
			?>
			<tr>
				<td><?=$no_tipe?></td>
				<td><?=$arr_tipe_audit['audit_type_name']?></td>
				<?
					for($i=1;$i<=18;$i++){
						echo "<td align='center'>&nbsp;</td>";
					}
				?>
			</tr>
			<?
					$rs_sub_tipe = $plannings->plan_sub_tipe_viewlist($arr_tipe_audit['audit_type_id']);
					while($arr_sub_tipe = $rs_sub_tipe->FetchRow()){
			?>
			<tr>
				<td>&nbsp;</td>
				<td><?=$arr_sub_tipe['sub_audit_type_name']?></td>
				<?
						for($i=1;$i<=4;$i++){
							echo "<td align='center'>&nbsp;</td>";
						}
				?>
				<td align="right"><?=$Helper->format_uang($arr_sub_tipe['sum_anggaran'])?></td>
				<?
						for($i=1;$i<=13;$i++){
							echo "<td align='center'>&nbsp;</td>";
						}
				?>
			</tr>
			<?
						$no_perencanaan= 0;
						$rs_report = $plannings->plan_report_viewlist($arr_tipe_audit['audit_type_id'], $arr_sub_tipe['sub_audit_type_id']);
						while($arr_report = $rs_report->FetchRow()){
							$no_perencanaan++;
							$no_tim=0;
							$count_tim=0;
							$rs_plan_anggota = $plannings->planning_list_auditor($arr_report['audit_plan_id']);
							$count_tim=$rs_plan_anggota->RecordCount();
							while($arr_plan_anggota = $rs_plan_anggota->FetchRow()){
								$no_tim++;							
			?>
			<tr>
			<?
				if($no_tim==1){
			?>
				<td rowspan="<?=$count_tim?>"><?=$no_perencanaan?></td>
				<td rowspan="<?=$count_tim?>">
			<?
								$rs_auditee_audit = $plannings->planning_auditee_viewlist($arr_report['audit_plan_id']);
								while($arr_auditee_audit = $rs_auditee_audit->FetchRow()){
									echo ucwords(strtolower($arr_auditee_audit['auditee_name']))."<br>";
								}
			?>
				</td>
				<td rowspan="<?=$count_tim?>" align="center">
			<?
								$rs_auditee_audit = $plannings->planning_auditee_viewlist($arr_report['audit_plan_id']);
								while($arr_auditee_audit = $rs_auditee_audit->FetchRow()){
									echo $arr_auditee_audit['audit_plan_auditee_hari']."<br>";
								}
			?>	
				</td>
				<td rowspan="<?=$count_tim?>" align="center"><?=$arr_report['audit_type_code']?></td>
			<?
				}
			?>
				<td align="center"><?=$arr_plan_anggota['posisi_code'];?></td>
				<td colspan="2"><?=ucwords(strtolower($arr_plan_anggota['auditor_name']));?></td>
			<?
								for($i=1;$i<=12;$i++){
									 $color = "";
									$select_month = $plannings->planning_month($arr_report['audit_plan_id'],$i);
									if($select_month!="") $color = 'black';
									echo "<td align='center' bgcolor='".$color."'>&nbsp;</td>";
								}
				?>
			</tr>
			<?
							}
						}
					}
				}
			}
			?>
		</table>
</section>
<?
}else{
	$Helper->js_alert_act ( 5 );
?>
	<script>window.open('main.php?method=laporan_rekap_perencanaan_filter', '_self');</script>
<?
}
?>