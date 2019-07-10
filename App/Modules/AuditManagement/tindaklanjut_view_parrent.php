<?php
$rs_rek = $rekomendasis->rekomendasi_viewlist ( $ses_rekomendasi_id );
$arr_rek = $rs_rek->FetchRow ();
?>
<form method="post" name="x" action="main.php?method=tindaklanjut&data_action=update_status" class="form-horizontal" onsubmit="return confirm('Anda Yakin Rekomendasi Telah Selesai Ditindak Lanjuti Dengan Benar');">
<article class="module width_3_quarter">
	<fieldset class="form-group">
		<table class="table table-borderless">
			<tr>
				<td>No Temuan</td>
				<td>:</td>
				<td><?=$arr_rek['finding_no']?></td>
			</tr>
			<tr>
				<td>Kondisi</td>
				<td>:</td>
				<td><?=$Helper->text_show($arr_rek['finding_kondisi'])?></td>
			</tr>
			<tr>
				<td>Satuan Kerja</td>
				<td>:</td>
				<td><?=$arr_rek['auditee_name']?></td>
			</tr>
			<tr>
				<td>Rekomendasi</td>
				<td>:</td>
				<td><?=$Helper->text_show($arr_rek['rekomendasi_desc'])?></td>
			</tr>
			<?php 
			if($_action==""){
			?>
			<tr>
				<td>Status Rekomendasi</td>
				<td>:</td>
				<td>
					<?php 
					if($recordcount!=0){
						$cek_tl = $tindaklanjuts->cek_all_status_tl($ses_rekomendasi_id);
						if($cek_tl==0){
							if($arr_rek['rekomendasi_status']==1){
								$iconAdd = 0;
								echo "Selesai";
							}else{
					?>
							<input type="submit" class="btn btn-success" value="Selesai">
					<?php 
							}
						}else{
							echo "Tindak Lanjut Masih Belum Selesai";
						}
					}else{
						echo "Belum Ada Tindak Lanjut";
					}
					?>
				</td>
			</tr>
			<?php 
			}
			?>
		</table>
	</fieldset>
</article>
</form>