<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="Public/js/jquery-ui-1.10.1.custom.min.js"></script>
<script type="text/javascript" src="Public/js/jquery.maskMoney.js"></script>
<script type="text/javascript" src="Public/js/jquery.loadTemplate-1.4.1.min.js"></script>
<link rel="stylesheet" href="Public/css/jquery.ui.datepicker.css">

<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved"><?=$page_title?></h3>
		</header>
		<form method="post" name="f" action="#" class="form-horizontal"
			id="validation-form">
		<?
		switch ($_action) {
			case "getadd" :
				?>
			<fieldset class="hr">
				<label class="span2">Satuan Kerja</label>
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				while($arr_auditee = $rs_auditee->FetchRow()){
					echo $arr_auditee['auditee_name']."<br>";
				}
				?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tanggal Audit</label>
				<?= $Helper->dateIndo ( $arr_assign ['assign_start_date'] ) . " s.d " . $Helper->dateIndo ( $arr_assign ['assign_end_date'] );?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">No Surat Tugas</label>
				<input type="text" class="span3" name="no_surat" id="no_surat">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tanggal Surat Tugas</label> 
				<input type="text" class="span1" name="tanggal_surat" id="tanggal_surat">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Penandatangan</label>
				<?=$Helper->dbCombo("ttd_id", "auditor", "auditor_id", "auditor_name", "and auditor_del_st = 1 ", "", "", 1, "order by auditor_name")?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jabatan Penandatangan</label>
				<input type="text" class="span1" name="jabatan_surat" id="jabatan_surat">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tembusan</label>
				<input type="text" class="span3" name="tembusan" id="tembusan">
				<span class="note">Gunakan koma (,) sebagai pemisah</span>
			</fieldset>
		<?
				break;
			case "getedit" :
				$arr = $rs->FetchRow ();
				?>
			<fieldset class="hr">
				<label class="span2">Satuan Kerja</label>
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				while($arr_auditee = $rs_auditee->FetchRow()){
					echo $arr_auditee['auditee_name']."<br>";
				}
				?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tanggal Audit</label>
				<?= $Helper->dateIndo ( $arr_assign ['assign_start_date'] ) . " s.d " . $Helper->dateIndo ( $arr_assign ['assign_end_date'] );?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">No Surat Tugas</label>
				<input type="text" class="span3" name="no_surat" id="no_surat" value="<?=$arr['assign_surat_no']?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tanggal Surat Tugas</label> 
				<input type="text" class="span1" name="tanggal_surat" id="tanggal_surat" value="<?=$Helper->dateIndo($arr['assign_surat_tgl'])?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Penandatangan</label>
				<?=$Helper->dbCombo("ttd_id", "auditor", "auditor_id", "auditor_name", "and auditor_del_st = 1 ", $arr['assign_surat_id_auditorTTD'], "", 1, "order by auditor_name")?>
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jabatan Penandatangan</label>
				<input type="text" class="span1" name="jabatan_surat" id="jabatan_surat" value="<?=$arr['assign_surat_jabatanTTD']?>">
				<span class="mandatory">*</span>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tembusan</label>
				<input type="text" class="span3" name="tembusan" id="tembusan" value="<?=$arr['assign_surat_tembusan']?>">
				<span class="note">Gunakan koma (,) sebagai pemisah</span>
			</fieldset>
			<input type="hidden" name="data_id" value="<?=$arr['assign_surat_id']?>">	
		<?
				break;
			case "getajukan_surat_tugas" :
			case "getapprove_surat_tugas" :
				$arr = $rs->FetchRow ();
				$rs_komentar = $assigns->surat_tugas_komentar_viewlist ( $arr ['assign_surat_id'] );
				?>
			<fieldset class="hr">
				<label class="span2">Satuan Kerja</label>
				<?php
				$rs_auditee = $assigns->assign_auditee_viewlist ( $ses_assign_id );
				while($arr_auditee = $rs_auditee->FetchRow()){
					echo $arr_auditee['auditee_name']."<br>";
				}
				?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tanggal Audit</label>
				<?=$Helper->dateIndo ( $arr_assign ['assign_start_date'] ) . " s.d " . $Helper->dateIndo ( $arr_assign ['assign_end_date'] );?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">No Surat Tugas</label>
				<?=$arr['assign_surat_no']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tanggal Surat Tugas</label> 
				<?=$Helper->dateIndo($arr['assign_surat_tgl'])?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Penandatangan</label>
				<?=$arr['auditor_name']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Jabatan Penandatangan</label>
				<?=$arr['assign_surat_jabatanTTD']?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tembusan</label>
				<?=$arr['assign_surat_tembusan']?>
			</fieldset>
				<?php
				$z = 0;
				while ( $arr_komentar = $rs_komentar->FetchRow () ) {
					$z ++;
					?>
			<fieldset>
			<label class="span2">detail komentar</label> <label class="span7">
					<?php echo $z.". ".$arr_komentar['auditor_name']." : ".$arr_komentar['surat_comment_desc']."<br>";?>
				</label>
			</fieldset>
			<?php
			}
			?>				
			<fieldset class="hr">
			<label class="span2">Isi Komentar</label> <input type="text" class="span7" name="komentar">
		</fieldset>
		<input type="hidden" name="data_id" value="<?=$arr['assign_surat_id']?>">
		<input type="hidden" name="status" value="<?=$status?>">
		<?
			break;
		}
		?>
			<fieldset>
				<center>
					<input type="button" class="blue_btn" value="Kembali" onclick="location='<?=$def_page_request?>'"> &nbsp;&nbsp;&nbsp; 
					<input type="submit" class="blue_btn" value="Simpan">
				</center>
				<input type="hidden" name="data_action" id="data_action" value="<?=$_nextaction?>">
			</fieldset>
		</form>
	</article>
</section>
<script>
$(function() {
	$("#validation-form").validate({
		rules: {
			no_surat: "required",
			tanggal_surat: "required",
			ttd_id: "required",
			jabatan_surat: "required"
		},
		messages: {
			no_surat: "Silahkan Masukan No Surat Tugas",
			tanggal_surat: "Silahkan Pilih Tanggal Surat Tugas",
			ttd_id: "Silahkan Pilih Penandatangan",
			jabatan_surat: "Silahkan Masukan Jabatan Penandatangan Surat Tugas"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});

$("#tanggal_surat").datepicker({
	dateFormat: 'dd-mm-yy',
	 nextText: "",
	 prevText: "",
	 changeYear: true,
	 changeMonth: true,
	 maxDate: '<?=$Helper->dateIndo($arr_assign['assign_start_date'])?>'
});
</script>