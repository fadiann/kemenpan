<?
include_once "App/Libraries/login_history.php";
include_once "App/Classes/finding_class.php";
include_once "App/Classes/rekomendasi_class.php";

$findings = new finding ( $ses_userId );
$rekomendasis = new rekomendasi ( $ses_userId );

?>
<div class="col-md-12 mt-md">
	<div class="col-md-2">
		<img src="Public/images/logo.png" width="70"/>
	</div>
	<div class="col-md-6 text-center">
		<h3>MATRIKS  TEMUAN  HASIL  AUDIT</h3>
	</div>
	<table class="table table-borderless mt-md">
		<tr>
			<td width="15%">NAMA AUDITAN</td>
			<td width="2%">:</td>
			<td><?=$assign_nama_auditee?></td>
			<td width="15%">Lampiran</td>
			<td width="2%">:</td>
			<td>LHA - <?=$arr_lha['audit_type_name']?></td>
		</tr>
		<tr>
			<td>SASARAN AUDIT</td>
			<td>:</td>
			<td><?=$arr_lha['audit_type_name']?></td>
			<td>Nomor</td>
			<td>:</td>
			<td><?=$arr_lha['assign_no_lha']?></td>
		</tr>
		<tr>
			<td>TAHUN ANGGARAN</td>
			<td>:</td>
			<td><?=$arr_lha['assign_tahun']?></td>
			<td>Tanggal</td>
			<td>:</td>
			<td><?=$Helper->dateIndo($arr_lha['lha_date'])?></td>
		</tr>
	</table>
	<br>
	<table border='1' class="table table-bordered table-striped table-condensed mb-none" cellspacing='0' cellpadding="0">
		<tr>
			<th width="5%">No</th>
			<th width="40%">Uraian Temuan</th>
			<th width="10%">Kode</th>
			<th width="40%">Rekomendasi</th>
			<th width="5%">Tindak Lanjut</th>
		</tr>
		<tr>
			<th>1</th>
			<th>2</th>
			<th>3</th>
			<th>4</th>
			<th>5</th>
		</tr>
		<?
			$no_temuan = 0;
			$rs_list_temuan = $assigns->temuan_list($assign_id);
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
				<td rowspan="<?=$count_rek?>"><?=$arr_list_temuan['kode_temuan']?></td>
				<?
				}
				?>
				<td><?=$arr_list_rek['rekomendasi_desc']?></td>
				<td></td>
			</tr>
			<?
				}
			}
			?>
	</table>
</div>
