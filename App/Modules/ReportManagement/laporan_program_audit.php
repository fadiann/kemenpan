<?php 
include_once "App/Classes/report_class.php";
include_once "App/Classes/program_audit_class.php";
include_once "App/Classes/assignment_class.php";

$reports = new report ( $ses_userId );
$programaudits = new programaudit( $ses_userId );
$assigns = new assign ( $ses_userId );

$fil_tahun_id = "";
$fil_auditee_id = "";

$fil_tahun_id = $Helper->replacetext ( $_POST ["fil_tahun_id"] );
$fil_auditee_id = $Helper->replacetext ( $_POST ["fil_auditee_id"] );

$assign_id = $reports->get_assignment_id($fil_auditee_id, $fil_tahun_id);

$rs_assign = $assigns->assign_viewlist ( $assign_id );
$arr = $rs_assign->FetchRow();

$rs_auditee = $assigns->auditee_detil ( $fil_auditee_id );
$arr_auditee = $rs_auditee->FetchRow();

$katim = $reports->get_anggota($assign_id, $fil_auditee_id, 'KT');
$dalnis = $reports->get_anggota($assign_id, $fil_auditee_id, 'PT');

if($fil_tahun_id!="" && $fil_auditee_id!=""){
?>
<section id="main" class="column">	
	<article class="module width_3_quarter">
		<table border='0' class="table_report" cellspacing='0' cellpadding="0">
			<tr>
				<td colspan="8">
					<center>
						<img src="Public/images/TNU-logo3.png" width="48" height="48" style="width:48pt;height:48pt;" /><br>
						Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi 
					</center><br>
				</td>
			</tr>
			<tr>
				<td width="5%" style="border-top:1px solid">&nbsp;</td>
				<td width="5%" style="border-top:1px solid">&nbsp;</td>
				<td style="border-top:1px solid">&nbsp;</td>
				<td style="border-top:1px solid">&nbsp;</td>
				<td width="10%" style="border-top:1px solid">No KKA</td>
				<td align="center" style="border-top:1px solid">:</td>
				<td style="border-top:1px solid">-</td>
				<td style="border-top:1px solid">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">Nama Auditan</td>
				<td align="center">:</td>
				<td><?=$arr_auditee['auditee_name'];?></td>
				<td>Ref. PKA No</td>
				<td align="center">:</td>
				<td>-</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">Sasaran Audit</td>
				<td align="center">:</td>
				<td><?=$arr['audit_type_name'];?></td>
				<td>Disusun Oleh</td>
				<td align="center">:</td>
				<td><?=$katim?></td>
				<td>Paraf :</td>
			</tr>
			<tr>
				<td colspan="2">&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>Tanggal</td>
				<td align="center">:</td>
				<td>-</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="2">Periode Audit</td>
				<td align="center">:</td>
				<td><?=$fil_tahun_id?></td>
				<td>Direviu Oleh</td>
				<td align="center">:</td>
				<td><?=$dalnis ?></td>
				<td>Paraf :</td>
			</tr>
			<tr>
				<td colspan="2" style="border-bottom:1px solid">&nbsp;</td>
				<td style="border-bottom:1px solid">&nbsp;</td>
				<td style="border-bottom:1px solid">&nbsp;</td>
				<td style="border-bottom:1px solid">Tanggal</td>
				<td style="border-bottom:1px solid" align="center">:</td>
				<td style="border-bottom:1px solid">-</td>
				<td style="border-bottom:1px solid">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="8" align="center"><br>PROGRAM KERJA AUDIT RINCI/LANJUTAN</td>
			</tr>
			<tr>
				<td><strong>A.</strong></td>
				<td colspan="7"><strong>Pendahuluan</strong></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="7"><?=$Helper->text_show($arr['assign_pendahuluan'])?></td>
			</tr>
			<tr>
				<td><strong>B.</strong></td>
				<td colspan="7"><strong>Tujuan Audit</strong></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="7"><?=$Helper->text_show($arr['assign_tujuan'])?></td>
			</tr>
			<tr>
				<td><strong>C.</strong></td>
				<td colspan="7"><strong>Instruksi Khusus</strong></td>
			</tr>
			<tr>
				<td style="border-bottom:1px solid">&nbsp;</td>
				<td colspan="7" style="border-bottom:1px solid"><?=$Helper->text_show($arr['assign_instruksi'])?></td>
			</tr>
			<tr>
				<td><strong>D.</strong></td>
				<td colspan="7"><strong>Langkah Kerja:</strong></td>
			</tr>
		</table>
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr align="center">
				<th width="2%" rowspan="2">No.</th>
				<th width="50%" rowspan="2" colspan="2">Langkah Kerja Audit</th>
				<th width="16%" colspan="2">Dilaksanakan Oleh</th>
				<th width="16%" colspan="2">Waktu yang Diperlukan</th>
				<th width="9%" rowspan="2">Nomor KKA</th>
				<th width="7%" rowspan="2">Catatan</th>
			</tr>
			<tr align="center">
				<th>Rencana</th>
				<th>Realisasi</th>
				<th>Rencana</th>
				<th>Realisasi</th>
			</tr>
			<?php
			$no_aspek="A";
			$rs_aspek = $programaudits->get_assign_aspek($assign_id, $fil_auditee_id);
			while($arr_aspek = $rs_aspek->FetchRow()){
			?>
			<tr>
				<td><?=$no_aspek?></td>
				<td colspan="2"><?=$arr_aspek['aspek_name']?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>				
			<?
				$no="0";
				$rs_program = $reports->assign_program_audit_list($arr_aspek['aspek_id'], $assign_id, $fil_auditee_id);
				while($arr_program = $rs_program->FetchRow()){
					$no++;
			?>
			<tr>
				<td>&nbsp;</td>
				<td width="2%" style="border-right:0"><?=$no?></td>
				<td style="border-left:0"><?=$arr_program['ref_program_title']?></td>
				<td><?=$arr_program['auditor_name']?></td>
				<td>&nbsp;</td>
				<td><?=$arr_program['program_jam']?> Jam</td>
				<td>&nbsp;</td>
				<td>
					<?php 
					$rs_kka = $reports->program_kka_list($arr_program['program_id']);
					while($arr_kka = $rs_kka->FetchRow ()){
						echo $arr_kka['kertas_kerja_no']."<br>";
					}
					?>
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td width="2%" style="border-right:0">&nbsp;</td>
				<td style="border-left:0"><?=$arr_program['ref_program_procedure']?></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<?
				}
				$no_aspek++;
			}
			?>
		</table>
</section>
<?
}else{
	$Helper->js_alert_act ( 5 );
?>
	<script>window.open('main.php?method=risk_fil_report', '_self');</script>
<?
}
?>