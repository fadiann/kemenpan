<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">
<script type="text/javascript" src="Public/ckeditor/ckeditor.js"></script>
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<?php 

$rs  = $assigns->assign_viewlist ( $assign_id );
$arr = $rs->FetchRow();

$rs_auditee          = $assigns->auditee_detil ( $auditee_id );
$arr_auditee         = $rs_auditee->FetchRow();
$assign_id_auditee   = $arr_auditee['auditee_id'];
$assign_nama_auditee = $arr_auditee['auditee_name'];

$rs_lha  = $assigns->assign_lha_viewlist ( $arr ['assign_id'] );
$arr_lha = $rs_lha->FetchRow ();

$cek_posisi = $findings->cek_posisi($arr['assign_id']);
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
	<form method="post" name="f" action="#" class="form-horizontal" id="validation-form" enctype="multipart/form-data"  onsubmit="return cek_data()">
			<fieldset class="form-group">
					<div class="col-md-12">
						<ul class="rtabs">
							<li><a href="#view1">Cover</a></li>
							<li><a href="#view2">Bagian Pertama</a></li>
							<li><a href="#view3">Bab I</a></li>
							<li><a href="#view4">Bab II</a></li>
							<li><a href="#view5">Bab III</a></li>
							<li><a href="#view6">Lampiran</a></li>
							<li><a href="#view7">LHA</a></li>
							<li><a href="#view8">Matriks Temuan</a></li>
						</ul>
						<div id="view1">
							<fieldset class="form-group mt-md">
								<label class="col-sm-3">Nomor LHA</label>
								<div class="col-md-6">
								<input type="text" class="form-control" name="no_lha" id="no_lha" value="<?=$arr_lha['lha_no']?>">
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3">Tanggal LHA</label> 
								<div class="col-md-6">
								<input type="text" class="form-control" name="tanggal_lha" id="tanggal_lha" value="<?=$Helper->dateIndo($arr_lha['lha_date'])?>"> 
								</div>
							</fieldset>
						</div>
						<div id="view2">
							<fieldset class="form-group mt-md">
								<label class="col-md-4">Simpulan Hasil Audit dan Rekomendasi</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
									<textarea class="ckeditor" cols="10" rows="40" name="ringkasan" id="ringkasan"><?=$arr_lha['lha_ringkasan']?></textarea>
								</div>
							</fieldset>
						</div>
						<div id="view3">
							<fieldset class="form-group mt-md">
								<label class="col-sm-3">Dasar Audit</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="dasar_audit" id="dasar_audit"><?=$arr_lha['lha_dasar_audit']?></textarea>
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3">Tujuan Audit</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="tujuan_audit" id="tujuan_audit"><?=$arr_lha['lha_tujuan_audit']?></textarea>
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3">Ruang Lingkup Audit</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="ruang_lingkup" id="ruang_lingkup"><?=$arr_lha['lha_ruanglingkup']?></textarea>
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3">Batasan Audit</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="batasan_tanggung_jawab" id="batasan_tanggung_jawab"><?=$arr_lha['lha_batasan']?></textarea>
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3">Metodologi Audit</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="metodologi_audit" id="metodologi_audit"><?=$arr_lha['lha_metodologi']?></textarea>
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3">Strategi Laporan</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="strategi_laporan" id="strategi_laporan"><?=$arr_lha['lha_strategi_laporan']?></textarea>
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3">Data Umum Auditan</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="data_umum_auditan" id="data_umum_auditan"><?=$arr_lha['lha_data_auditan']?></textarea>
								</div>
							</fieldset>
						</div>
						<div id="view4">
							<fieldset class="form-group mt-md">
								<label class="col-sm-3">Uraian Hasil Audit</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="hasil_yang_dicapai" id="hasil_yang_dicapai"><?=$arr_lha['lha_hasil']?></textarea>
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3">Informasi Umum Peraspek</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="cc" id="cc"><?=$arr_lha['lha_hasil']?></textarea>
								</div>
							</fieldset>
						</div>
						<div id="view5">
							<fieldset class="form-group mt-md">
								<label class="col-sm-3">Penutup</label>
							</fieldset>
							<fieldset class="form-group">
								<div class="col-md-12">
								<textarea class="ckeditor" cols="10" rows="40" name="penutup" id="penutup"><?=$arr_lha['lha_penutup']?></textarea>
								</div>
							</fieldset>
						</div>
						<div id="view6">					
							<fieldset class="form-group mt-md">
								<label class="col-md-3 control-label">Lampiran</label> 
								<div class="col-md-5">
								<input type="file" class="form-control" name="attach[]" id="attach" multiple="" onChange="makeFileList();"> 
								<label class="fileList_label"></label>
								<ul id="fileList">
									<li>No Files Selected</li>
								</ul>
								</div>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-md-3 control-label">List Lampiran</label> 
								<div class="col-md-5">
									<?php 
									$y=0;
									$rs_file = $assigns->list_lha_lampiran($arr['assign_id']);
									while($arr_file = $rs_file->FetchRow()){ 
									$y++;
									?>
										<input type="checkbox" name="nama_file_<?=$y?>" value="<?=$arr_file['lha_attach_name']?>">
										<a href="#" Onclick="window.open('<?=$Helper->baseurl("Upload_LHA").$arr_file['lha_attach_name']?>','_blank')"><?=$arr_file['lha_attach_name']?></a>, &nbsp;&nbsp; 
									<?php 
									}
									?>
								</div>
							</fieldset>
						</div>
						<div id="view7">
							<div class="col-md-12">
								<table align="center" width="100%">
									<tr>
										<td align="center"><br><br><br><strong>Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi </strong></td>
									</tr>
									<tr>
										<td colspan="2"><hr></td>
									</tr>
									<tr>
										<td align="center"><br><br><br><strong>LAPORAN HASIL AUDIT KINERJA</strong></td>
									</tr>
									<tr>
										<td align="center"><br><br><br><strong><?=$assign_nama_auditee?></strong></td>
									</tr>
									<tr>
										<td style="padding-left:30%"><br><br><br><strong>Nomor : <?=$arr_lha['assign_no_lha']?></strong></td>
									</tr>
									<tr>
										<td style="padding-left:30%"d><strong>Tanggal :  <?=$Helper->dateIndo($arr_lha['assign_date_lha'])?></strong></td>
									</tr>
								</table>
								<br>
								<fieldset class="form-group">
								<table align="center" width="100%">
									<tr>
										<td align="center"><strong>BAGIAN PERTAMA</strong></td>
									</tr>
									<tr>
										<td align="center"><strong>SIMPULAN HASIL AUDIT DAN REKOMENDASI</strong></td>
									</tr>
									<tr>
										<td align="justify"><?=$Helper->text_show($arr_lha['lha_ringkasan'])?></td>
									</tr>
								</table>
								</fieldset>
								<br>
								<fieldset class="form-group">
								<table align="center" width="100%">
									<tr>
										<td align="center" colspan="4"><strong>BAGIAN KEDUA</strong></td>
									</tr>
									<tr>
										<td align="center" colspan="4"><strong>URAIAN HASIL AUDIT</strong><br></td>
									</tr>
									<tr>
										<td align="center" colspan="4"><strong>BAB I</strong></td>
									</tr>
									<tr>
										<td align="center" colspan="4"><strong>PENDAHULUAN</strong></td>
									</tr>
									<tr>
										<td width="2%">1.</td>
										<td colspan="2">Dasar Audit</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_dasar_audit'])?></td>
									</tr>
									<tr>
										<td>2.</td>
										<td colspan="2">Tujuan Audit</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_tujuan_audit'])?></td>
									</tr>
									<tr>
										<td>3.</td>
										<td colspan="2">Ruang Lingkup Audit</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_ruanglingkup'])?></td>
									</tr>
									<tr>
										<td>4.</td>
										<td colspan="2">Batasan Audit</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_batasan'])?></td>
									</tr>
									<tr>
										<td>5.</td>
										<td colspan="2">Metodologi Audit</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_metodologi'])?></td>
									</tr>
									<tr>
										<td>6.</td>
										<td colspan="2">Strategi pelaporan</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td  colspan="2"align="justify"><?=$Helper->text_show($arr_lha['lha_strategi_laporan'])?></td>
									</tr>
									<tr>
										<td>7.</td>
										<td colspan="2">Data umum Auditan</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify"><?=$Helper->text_show($arr_lha['lha_data_auditan'])?></td>
									</tr>
									<tr>
										<td>8.</td>
										<td colspan="2">Status Dan Tindak Lanjut Temuan Hasil Audit Yang Lalu</td>
									</tr>
									<?
									$no_assign_lama = "a";
									$count_temuan_tuntas = 0;
									$count_temuan_proses = 0;
									$total_temuan=0;
									$rs_get_assign_find_open = $findings->assign_find_open ( $assign_id_auditee, $arr_lha['assign_tahun'] );
									while($arr_assign_find_open = $rs_get_assign_find_open->FetchRow ()){
										$count_temuan_tuntas = $findings->get_jml_temuan_selesai ( $arr_assign_find_open['assign_id']);
										$count_temuan_proses = $findings->get_jml_temuan_proses ( $arr_assign_find_open['assign_id']);
										$total_temuan = $count_temuan_tuntas+$count_temuan_proses;
									?>
									<tr>
										<td>&nbsp;</td>
										<td valign="top"><?=$no_assign_lama?></td>
										<td align="justify">Rekomendasi terhadap <?=$total_temuan?> temuan hasil audit yang lalu, yakni: <?=$arr_assign_find_open['audit_type_name']?> T.A <?=$arr_assign_find_open['assign_tahun']?> dengan Nomor LHA: <?=$arr_assign_find_open['assign_no_lha']?> tanggal <?=$Helper->dateIndoLengkap($arr_assign_find_open['assign_date_lha'])?>; <?=$count_temuan_tuntas?> temuan dinyatakan Tuntas sedangkan <?=$count_temuan_proses?> temuan masih dinyatakan Proses, yaitu:</td>
									</tr>
									<tr>
										<td colspan="2">&nbsp;</td>
										<td>
											<table width="100%" border="1" cellspacing="0" cellpadding="0">
												<tr>
													<th width="10%">No</th>
													<th width="40%">Uraian Temuan</th>
													<th width="40%">Rekomendasi</th>
													<th width="10%">Status</th>
												</tr>
											<?
												$rs_temuan_proses = $findings->get_temuan_proses ( $arr_assign_find_open['assign_id']);
												while($arr_temuan_proses = $rs_temuan_proses->FetchRow()){
													$rs_rekomendasi_proses = $findings->get_rekomendasi_proses ( $arr_temuan_proses['finding_id']);
													$count_rek = $rs_rekomendasi_proses->RecordCount ();
													$no_rek = 0;
													while($arr_rekomendasi_proses = $rs_rekomendasi_proses->FetchRow()){	
														$no_rek++;
											?>
												<tr>
											<?
													if($no_rek==1){
											?>
													<td rowspan="<?=$count_rek?>" valign="top"><?=$arr_temuan_proses['finding_no']?></td>
													<td rowspan="<?=$count_rek?>" valign="top"><?=$arr_temuan_proses['finding_judul']?></td>
											<?
													}
											?>
													<td><?=$Helper->text_show($arr_rekomendasi_proses['rekomendasi_desc'])?></td>
													<td>Proses</td>
												</tr>									
											<?
													}
												}
											?>
											</table>
										</td>
									</tr>
									<?
										$no_assign_lama++;
									}
									?>
								</table>
								</fieldset>
								<br>
								<fieldset class="form-group">
								<table align="center" width="100%">
									<tr>
										<td colspan="5" align="center"><strong>BAB II</strong></td>
									</tr>
									<tr>
										<td colspan="5" align="center"><strong>URAIAN HASIL AUDIT</strong></td>
									</tr>
									<tr>
										<td colspan="5" align="justify"><?=$Helper->text_show($arr_lha['lha_hasil'])?></td>
									</tr>
									<?
									$no_aspek=0;
									$rs_list_aspek = $programaudits->get_assign_aspek ( $arr_lha['assign_id'], $assign_id_auditee);
									while($arr_list_aspek = $rs_list_aspek->FetchRow()){
										$no_aspek++;
									?>
									<tr>
										<td width="2%"><?=$no_aspek?>.</td>
										<td colspan="4"><?=ucwords(strtolower($arr_list_aspek['aspek_name']))?></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td width="2%">a.</td>
										<td colspan="3">Informasi Umum</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>b.</td>
										<td colspan="3">Temuan Dan Rekomendasi</td>
									</tr>
									<?
										$no_temuan=0;
										$rs_list_temuan = $findings->get_list_temuan_by_aspek ( $arr_list_aspek['aspek_id'], $arr_lha['assign_id'], $assign_id_auditee);
										while($arr_list_temuan = $rs_list_temuan->FetchRow()){
											$no_temuan++;
									?>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td width="2%"><?=$no_temuan?>.</td>
										<td colspan="2"><strong><?=$arr_list_temuan['finding_judul']?></strong></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td colspan="2"><?=$Helper->text_show($arr_list_temuan['finding_kondisi'])?></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td colspan="2"><strong>Tanggapan Auditan :</strong></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td colspan="2"><?=$Helper->text_show($arr_list_temuan['finding_tanggapan_auditee'])?></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td colspan="2"><strong>Rekomendasi :</strong></td>
									</tr>
									<?
											$rs_rekomendasi = $findings->get_rekomendasi_list ( $arr_list_temuan['finding_id']);
											$no_rek = 0;
											while($arr_rekomendasi = $rs_rekomendasi->FetchRow()){
												$no_rek++;
									?>
									<tr>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td width="2%"><?=$no_rek?></td>
										<td><?=$Helper->text_show($arr_rekomendasi['rekomendasi_desc'])?></td>
									</tr>
									<?
											}
										}
									}
									?>
								</table>
								</fieldset>
								<br>
								<fieldset class="form-group">
								<table align="center" width="100%">
									<tr>
										<td colspan="3" align="center"><strong>BAB III</strong></td>
									</tr>
									<tr>
										<td colspan="3" align="center"><strong>PENUTUP</strong></td>
									</tr>
									<tr>
										<td colspan="5" align="justify"><?=$Helper->text_show($arr_lha['lha_penutup'])?></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify">
											<br><br><br><strong>Status LHA :
											<?
											if($arr_lha ['lha_status']==0){
												echo "Belum Diajukan";
											} else if($arr_lha ['lha_status']==1){
												echo "Sudah Diajukan Katim, Sedang Direviu Oleh Pengendali Teknis";
											} else if($arr_lha ['lha_status']==2){
												echo "Sudah Diajukan Penegendali Teknis, Sedang Direviu Oleh Pengendali Mutu";
											} else if($arr_lha ['lha_status']==3){
												echo "Sudah Diajukan Penegendali Mutu, Sedang Direviu Oleh Inspektur";
											} else if($arr_lha ['lha_status']==4){
												echo "Telah Disetujui Inspektur";
											} else if($arr_lha ['lha_status']==5){
												echo "Ditolak oleh Pengendali Teknis";
											} else if($arr_lha ['lha_status']==6){
												echo "Ditolak oleh Pengendali Mutu";
											} else if($arr_lha ['lha_status']==7){
												echo "Ditolak oleh Inspektur";
											}
											?>
											</strong>
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify">
											<table>					
												<tr>
													<td>Detail komentar</td>
													<td>:</td>
													<td>
													<?php 
													$z = 0;
													$rs_komentar = $assigns->lha_komentar_viewlist ( $arr_lha ['lha_id'] );
													while ( $arr_komentar = $rs_komentar->FetchRow () ) {
														$z ++;
														echo $z.". ".$arr_komentar['auditor_name']." : ".$arr_komentar['lha_comment_desc']."<br>";
													}
													?>
													</td>
												</tr>
											</table>
										</td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td colspan="2" align="justify">
											<fieldset class="form-group">
											<label class="col-md-2 control-label">Komentar : </label>
											<div class="col-md-6">
												<textarea id="komentar" class="form-control" name="komentar" rows="1" cols="20" style="width: 475px; height: 3em; font-size: 11px;"></textarea>
											</div>
											<?php
											/*
											<fieldset class="form-group">
											<div class="col-md-2 text-center">
												<button class="btn btn-success" onclick="return set_action('postkomentar')">Kirim</button>
											</div>
											</fieldset>
											*/ ?>
										</td>
									</tr>
									<?
									//Daltu
									if ($arr_lha ['lha_status'] == '2' || $arr_lha ['lha_status'] == '7') {
										if($cek_posisi=='1fe7f8b8d0d94d54685cbf6c2483308aebe96229'){
									?>
									<tr>
										<td>&nbsp;</td>
										<td colspan="4" align="justify">
											Inspektur Inspektorat :<br>
											<?=$Helper->dbCombo("inpektorat_id", "par_inspektorat", "inspektorat_id", "inspektorat_name", "and inspektorat_del_st = 1 ", "", "", 1)?>
											<span class="note">Khusus Untuk Mengajukan</span>
										</td>
									</tr>
									<?
										}
									}
									?>
								</table>				
							</div>
						</div>
						<div id="view8">
							<? include "matriks_temuan.php";?>
						</div>
					</div>
			</fieldset>
		<fieldset class="form-group mt-md">
			<center>
					<input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?=$def_page_request?>'">
					<?
					//0=default, 1=ajukan, 2=approve_dalnis, 3=approve_daltu, 4=approve_inspektur, 5=tolak_dalnis, 6=tolak_daltu, 7=tolak_inspektur
					if($cek_posisi=='8918ca5378a1475cd0fa5491b8dcf3d70c0caba7'){ //katim
						if ($arr_lha ['lha_status'] == '0' || $arr_lha ['lha_status'] == '5') {
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Simpan\">";
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Simpan Dan Ajukan\" onclick=\"document.getElementById('status_lha').value=1\">";
						} else if ($arr_lha ['lha_status'] == '1' || $arr_lha ['lha_status'] == '6') {
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status_lha').value=5\">";
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Setujui\" onclick=\"document.getElementById('status_lha').value=2\">";
						} else if ($arr_lha ['lha_status'] == '2' || $arr_lha ['lha_status'] == '7') {
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status_lha').value=6\">";
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Setujui\" onclick=\"document.getElementById('status_lha').value=3\">";
						} else if ($arr_lha ['lha_status'] == '3') {
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Tolak Pengajuan\" onclick=\"document.getElementById('status_lha').value=7\">";
							echo "&nbsp;&nbsp;&nbsp;<input type=\"submit\" class=\"btn btn-success\" value=\"Setujui\" onclick=\"document.getElementById('status_lha').value=4\">";
						}
					}
					?>
					<input type="hidden" name="status_lha" id="status_lha" value="">
					<input type="hidden" name="data_id" value="<?=$arr['assign_id']?>">	
					<input type="hidden" name="lha_id" value="<?=$arr_lha['lha_id']?>">	
					<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</center>
		</fieldset>
	</form>
			</div>
		</section>
	</div>
</div>
<script> 
function cek_data(){
	var data = document.getElementById('status_lha').value;
	if(data==1) text = "Anda Yakin Akan Mengajukan?";
	if(data==2) text = "Anda Yakin Akan Menyetujui dan Ajukan?";
	if(data==3) text = "Anda Yakin Akan Menyetujui dan Ajukan?";
	if(data==4) text = "Anda Yakin Akan Menyetujui?";
	if(data==5) text = "Anda Yakin Akan Menolak?";
	if(data==6) text = "Anda Yakin Akan Menolak?";
	if(data==7) text = "Anda Yakin Akan Menolak?";
	return confirm(text);
}

function makeFileList() {
	var input = document.getElementById("attach");
	var label = document.getElementById("fileList_label");
	var ul = document.getElementById("fileList");
	while (ul.hasChildNodes()) {
		ul.removeChild(ul.firstChild);
	}
	for (var i = 0; i < input.files.length; i++) {
		var li = document.createElement("li");
		label.text(input.files[i].name);
		li.innerHTML = input.files[i].name;
		ul.appendChild(li);
	}
	if(!ul.hasChildNodes()) {
		var li = document.createElement("li");
		li.innerHTML = 'No Files Selected';
		ul.appendChild(li);
	}
}
$("#tanggal_lha").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true
}); 
</script>