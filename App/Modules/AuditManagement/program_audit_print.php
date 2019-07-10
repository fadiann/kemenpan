<?php 
include_once "App/Classes/report_class.php";

$reports = new report ( $ses_userId );

$rs_auditee = $assigns->assign_auditee_viewlist ( $arr['assign_id'], $auditee_id );
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body">
		<?
		while($arr_auditee = $rs_auditee->FetchRow()){
			$katim = $reports->get_anggota($arr['assign_id'], $arr_auditee['assign_auditee_id_auditee'], 'KT');
			$dalnis = $reports->get_anggota($arr['assign_id'], $arr_auditee['assign_auditee_id_auditee'], 'PT');
		?>
		<table border='0' class="table_report" cellspacing='0' cellpadding="0">
			<tr>
				<td colspan="8">
					<center>
						<img src="Public/images/logo.png" width="48"/><br>
						Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Republik Indonesia
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
				<td><?=@$fil_tahun_id?></td>
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
			$rs_aspek = $programaudits->get_assign_aspek($arr['assign_id'], $arr_auditee['assign_auditee_id_auditee']);
			while($arr_aspek = $rs_aspek->FetchRow()){
			?>
			<!--<tr>-->
			<!--	<td><?=$no_aspek?></td>-->
			<!--	<td colspan="2"><?=$arr_aspek['aspek_name']?></td>-->
			<!--	<td>&nbsp;</td>-->
			<!--	<td>&nbsp;</td>-->
			<!--	<td>&nbsp;</td>-->
			<!--	<td>&nbsp;</td>-->
			<!--	<td>&nbsp;</td>-->
			<!--	<td>&nbsp;</td>-->
			<!--</tr>				-->
			<?
				$no="0";
				$rs_program = $reports->assign_program_audit_list($arr_aspek['aspek_id'], $arr['assign_id'], $arr_auditee['assign_auditee_id_auditee']);
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
		<?
		}
		?>
		<fieldset class="form-group">
			<center>
				<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'">
			</center>
		</fieldset>
			</div>
		</section>
	</div>
</div>