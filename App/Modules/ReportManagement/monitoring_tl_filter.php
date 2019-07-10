<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?
include_once "App/Classes/assignment_class.php";

$assigns = new assign ( $ses_userId );
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Filter Laporan Monitoring Tindak Lanjut</h3>
		</header>
		<form method="post" name="f" action="main.php?method=laporan_monitoring_tl" class="form-horizontal" id="validation-form">
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Tahun</label>
				<?php
				$rs_tahun = $assigns->assign_tahun_viewlist();
				$arr_tahun = $rs_tahun->GetArray ();
				echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "", "", false, false, true );
				?>
				<!-- <span class="required">*</span> -->
			</fieldset>
			<fieldset class="form-group">
				<label class="col-sm-3 control-label">Status Tindak Lanjut</label>
				<select name="status_tl">
					<option value="" selected="selected">==== All ====</option>
					<option value="0">Belum diajukan</option>
					<option value="1">Sedang Menunggu Persetujuan</option>
					<option value="3">Dalam Proses</option>
					<option value="2">Selesai</option>
				</select>
				<!-- <span class="required">*</span> -->
			</fieldset>
			<fieldset class="form-group">
				<center>
					<input type="submit" class="btn btn-success" value="Lihat">
				</center>
			</fieldset>
		</form>
	</article>
</section>
<script>

</script>