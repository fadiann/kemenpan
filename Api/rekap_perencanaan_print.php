<?php 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=rekap_pkpt.xls");
header("Pragma: no-cache");
header("Expires: 0");
define ("INBOARD",false);

include_once "../App/Libraries/login_history.php";
include_once "../App/Libraries/Helper.php";
include_once "../App/Classes/report_class.php";
include_once "../App/Classes/param_class.php";
include_once "../App/Classes/audit_plann_class.php";

$Helper       = new Helper ();
$reports      = new report ($ses_userId);
$params       = new param ($ses_userId);
$plannings    = new planning ($ses_userId);
$fil_tahun_id = "";
$fil_tahun_id = $Helper->replacetext ( $_REQUEST ["fil_tahun_id"] );
$fil_tipe_id  = $Helper->replacetext ( $_REQUEST ["fil_tipe_id"] );

if($fil_tahun_id != ""){
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<div class="panel-body">
			<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
					<tr>
						<td colspan="20">PROGRAM KERJA PENGAWASAN TAHUNAN (PKPT)<br>Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi <br>Tahun : <?=$fil_tahun_id?></td>
					</tr>
					<tr>
						<td width="2%" rowspan="2">Tim</td>
						<td align="center" rowspan="2" width="30%">Nama Kegiatan</td>
						<td align="center" rowspan="2" width="30%">Auditee</td>
						<td align="center" rowspan="2" width="4%">Jumlah Hari</td>
						<td align="center" rowspan="2" width="7%">Jenis Audit/Kegiatan</td>
						<td align="center" rowspan="2">&nbsp;</td>
						<td align="center" rowspan="2">Nama</td>
						<td align="center" rowspan="2" width="7%">Jumlah Anggaran (Rp)</td>
						<td align="center" colspan="12">Rencana Waktu Pelaksanaan</td>
						<!-- <td align="center" rowspan="2" width="7%">Ket</td> -->
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
					$rs_tipe_audit = $plannings->plan_tipe_viewlist($fil_tahun_id, "1");
					while($arr_tipe_audit = $rs_tipe_audit->FetchRow()){
						$no_tipe++;
						// if($arr_tipe_audit['audit_type_opsi'] != 1){
					?>
					<tr>
						<td align="center"><strong><?=$no_tipe?>.</strong></td>
						<td><strong><?=$arr_tipe_audit['audit_type_name']?></strong></td>
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
								for($i=1;$i<=5;$i++){
									echo "<td align='center'>&nbsp;</td>";
								}
						?>
						<td align="right"><?=$Helper->format_uang($arr_sub_tipe['sum_anggaran'])?></td>
						<?
								for($i=1;$i<=12;$i++){
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
						if($no_tim == 1 ){
					?>
						<td rowspan="<?=$count_tim?>" align="center"><?=$no_perencanaan?>.</td>
						<td rowspan="<?=$count_tim?>">
						<?
							$rs_auditee_audit = $plannings->planning_viewlist($arr_report['audit_plan_id']);
							while($arr_auditee_audit = $rs_auditee_audit->FetchRow()){
								echo ucwords(strtolower($arr_auditee_audit['audit_plan_kegiatan']))."<br>";
							}
						?>
						</td>
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
					//}
					?>
				</table>
			</div>
		</section>
	</div>
</div>
<?
}else{
	$Helper->js_alert_act ( 5 );
}
?>