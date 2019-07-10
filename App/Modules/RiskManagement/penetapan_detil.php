<section id="main" class="column">	
<?
include "risk_view_parrent.php";
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">ANALISIS RISIKO</h2>
			</header>
			<div class="panel-body wrap">
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr align="center">
				<th width="2%" rowspan="2">No</th>
				<th width="47%" colspan="5">Identifikasi Risiko</th>
				<th width="47%" colspan="6">Risiko Inheren</th>
			</tr>
			<tr align="center">
				<th>Kategori Risiko</th>
				<th>No Risiko</th>
				<th>Nama Risiko</th>
				<th>Faktor <br>Penyebab Risiko
				</th>
				<th>Selera Risiko</th>
				<th>TK</th>
				<th>TD</th>
				<th>&nbsp;&nbsp;&nbsp;&nbsp;RI&nbsp;&nbsp;&nbsp;&nbsp;</th>
				<th>Bobot<br>Risiko
				</th>
				<th>Nilai<br>Risiko<br>Inhern
				</th>
				<th>Bobot<br>Kategori<br>Risiko
				</th>
			</tr>
	<?php
	$i = 0;
	$no = 0;
	$rs_kategori = $params->risk_kategori_data_viewlist ();
	while ( $arr_kategori = $rs_kategori->FetchRow () ) {
		$x = 0;
		$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
		$countKat = $rs_iden->RecordCount ();
		while ( $arr_iden = $rs_iden->FetchRow () ) {
			$x ++;
			$no ++;
			$rs_val_ri = $risks->cek_range_ri ( $arr_iden ['analisa_ri'] );
			$get_val_ri = $rs_val_ri->FetchRow ();
			?>
		<input type="hidden" name="indentifikasi_id"
				value="<?=$arr_iden['identifikasi_id'];?>">
			<tr>
			<?php
			if ($x == 1) {
				$i ++;
				?>
			<td rowspan=<?=$countKat?>><?=$i?></td>
				<td rowspan=<?=$countKat?>><?=$arr_iden['risk_kategori'];?></td>
			<?php
			}
			?>
			<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
				<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
				<td><?=$arr_iden['identifikasi_penyebab'];?></td>
				<td><?=$arr_iden['identifikasi_selera'];?></td>
				<td><?=$arr_iden['analisa_kemungkinan_name'];?> (<?=$arr_iden['analisa_kemungkinan'];?>)</td>
				<td><?=$arr_iden['analisa_dampak_name'];?> (<?=$arr_iden['analisa_dampak'];?>)</td>
				<td align="center"><label class="ri"><?=$get_val_ri['ri_name']?> (<?=$arr_iden['analisa_ri']?>)</label></td>
				<td align="center"><?=$arr_iden['analisa_bobot_risk']?> %</td>
				<td align="center"><label class="nilai_inhern"><?=$arr_iden['analisa_nilai_ri']?></label></td>	
			<?php
			if ($x == 1) {
				?>			
			<td align="center" rowspan=<?=$countKat?>><?=$arr_iden['analisa_bobot_kat_risk']?> %</td>
			<?php
			}
			?>
		</tr>
	<?php
		}
	}
	?>
</table>
			</div>
		</section>
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">EVALUASI RISIKO</h2>
			</header>
			<div class="panel-body wrap">
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr align="center">
				<th width="2%" rowspan="2">No</th>
				<th width="58%" colspan="7">Risiko Inhern</th>
				<th width="30%" colspan="2">Pengendalian Internal</th>
				<th width="6%" rowspan="2">Risiko Residu</th>
			</tr>
			<tr align="center">
				<th>Kategori Risiko</th>
				<th>Bobot<br>Kategori<br>Risiko
				</th>
				<th>No Risiko</th>
				<th>Nama Risiko</th>
				<th>Selera Risiko</th>
				<th>RI</th>
				<th>Bobot<br>Risiko
				</th>
				<th>Komponen<br> Pengendalian
				</th>
				<th>Efektifitas<br>Pengendalian
				</th>
			</tr>
	<?php
	$i = 0;
	$no = 0;
	$rs_kategori = $params->risk_kategori_data_viewlist ();
	while ( $arr_kategori = $rs_kategori->FetchRow () ) {
		$x = 0;
		$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
		$countKat = $rs_iden->RecordCount ();
		while ( $arr_iden = $rs_iden->FetchRow () ) {
			$x ++;
			$no ++;
			$rs_val_ri = $risks->cek_range_ri ( $arr_iden ['analisa_ri'] );
			$get_val_ri = $rs_val_ri->FetchRow ();
			?>
		<tr>
			<?php
			if ($x == 1) {
				$i ++;
				?>
			<td rowspan=<?=$countKat?>><?=$i?></td>
				<td rowspan=<?=$countKat?>><?=$arr_iden['risk_kategori'];?></td>
				<td rowspan=<?=$countKat?>><?=$arr_iden['analisa_bobot_kat_risk'];?> (%)</td>
			<?php
			}
			?>
			<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
				<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
				<td><?=$arr_iden['identifikasi_selera'];?></td>
				<td><label class="label_ri"><?=$get_val_ri['ri_name'];?> (<?=$get_val_ri['ri_value'];?>)</label></td>
				<td><?=$arr_iden['analisa_bobot_risk'];?> %</td>
				<td><?=$arr_iden['evaluasi_komponen'];?></td>
				<td><?=$arr_iden['evaluasi_efektifitas_name'];?> (<?=$arr_iden['evaluasi_efektifitas'];?>)</td>
				<td><label class="rr"><?=$arr_iden['evaluasi_risiko_residu_name']?> (<?=$arr_iden['evaluasi_risiko_residu']?>)</label></td>
			</tr>
	<?php
		}
	}
	?>
</table>
			</div>
		</section>
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">PENANGANAN RISIKO</h2>
			</header>
			<div class="panel-body wrap">
		<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
			<tr align="center">
				<th width="2%" rowspan="2">No</th>
				<th width="55%" colspan="5">Risiko Residu</th>
				<th width="10%" rowspan="2">Pilihan<br>Penanganan<br>Risiko
				</th>
				<th width="33%" colspan="3">Penanganan Risiko</th>
			</tr>
			<tr align="center">
				<th width="25">Kategori Risiko</th>
				<th>No Risiko</th>
				<th width="40">Nama Risiko</th>
				<th>Selera Risiko</th>
				<th>Nilai<br>Risiko<br>Residu
				</th>
				<th>Rencana<br>Aksi
				</th>
				<th>Rencana<br> Waktu
				</th>
				<th>Penanggung<br>Jawab
				</th>
			</tr>
	<?php
	$cek_penanganan = $risks->cek_penanganan($ses_penetapan_id);
	$i = 0;
	$no = 0;
	$rs_kategori = $params->risk_kategori_data_viewlist ();
	while ( $arr_kategori = $rs_kategori->FetchRow () ) {
		$x = 0;
		$rs_iden = $risks->list_identifikasi ( $arr_kategori ['risk_kategori_id'], $ses_penetapan_id );
		$countKat = $rs_iden->RecordCount ();
		while ( $arr_iden = $rs_iden->FetchRow () ) {
			$x ++;
			$no ++;
			?>
		<tr>
			<?php
			if ($x == 1) {
				$i ++;
				?>
			<td rowspan=<?=$countKat?>><?=$i?></td>
				<td rowspan=<?=$countKat?>><?=$arr_iden['risk_kategori'];?></td>
			<?php
			}
			?>
			<td><?=$arr_iden['identifikasi_no_risiko'];?></td>
				<td><?=$arr_iden['identifikasi_nama_risiko'];?></td>
				<td><?=$arr_iden['identifikasi_selera'];?></td>
				<td><?=$arr_iden['evaluasi_risiko_residu_name'];?> (<?=$arr_iden['evaluasi_risiko_residu'];?>)</td>
				<td><?=$arr_iden['risk_penanganan_jenis'];?></td>
				<td><?=$arr_iden['penanganan_plan']?></td>
				<td><?=$Helper->dateIndo($arr_iden['penanganan_date'])?></td>
				<td><?=$arr_iden['pic_name']?></td>
			</tr>
	<?php
		}
	}
	
	
	?>
</table>
			</div>
		</section>
<form method="post" name="f" action="#" class="form-horizontal" onsubmit="return cek_data()">
<section class="panel">
	<header class="panel-heading">
		<h2 class="panel-title">KOMENTAR :</h2>
	</header>
	<div class="panel-body wrap">
	<table class="table table-borderless table-condensed table-hover">
		<tr>
			<td>Detail komentar</td>
			<td>:</td>
			<td>
			<?php 
			$z = 0;
			$rs_komentar = $risks->risk_komentar_viewlist ( $ses_penetapan_id );
			while ( $arr_komentar = $rs_komentar->FetchRow () ) {
				$z ++;
				echo $z.". ".$arr_komentar['pic_name']." : ".$arr_komentar['penetapan_comment_desc']."<br>";
			}
			?>
			</td>
		</tr>
	</table>
</fieldset>
	<?php 
switch ($_action) {
	case "poststatus" :
	?>
<fieldset class="form-group">
	<label class="col-sm-3 control-label">Isi Komentar</label>
	<textarea id="komentar" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
</fieldset>
<?
		break;
}
?>
			<fieldset class="form-group">
				<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'">
			<?php
	if($_action!='poststatus'){
		if($cek_penanganan<>0){
			if($getajukan){
				if ($arr_penetapan ['penetapan_status'] == '0' || $arr_penetapan ['penetapan_status'] == '3') {
					echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Ajukan\" onclick=\"document.getElementById('status_risk').value=1\">";
				}
			}
			if($getapprove){
				if ($arr_penetapan ['penetapan_status'] == '1') {
					echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status_risk').value=3\">";
					echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Setujui\" onclick=\"document.getElementById('status_risk').value=2\">";
				}
			}
		}
	}else{
		echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"blue_btn\" value=\"Simpan\">";
	}
			?>
		</center>
				<input type="hidden" name="status_resiko" value="<?=@$fstatus_risiko?>">	
				<input type="hidden" name="penetapan_id" id="penetapan_id" value="<?=$ses_penetapan_id?>">
				<input type="hidden" name="status_risk" id="status_risk" value="">
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
	</div>
</div>
<script>
function cek_data(){
	var data = document.getElementById('status_risk').value;
	if(data==1) text = "Anda Yakin Akan Mengajukan?";
	if(data==2) text = "Anda Yakin Akan Menyetujui?";
	if(data==3) text = "Anda Yakin Akan Menolak?";
	return confirm(text);
}
</script>