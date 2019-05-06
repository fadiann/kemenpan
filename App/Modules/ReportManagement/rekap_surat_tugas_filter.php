<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?
include_once "App/Classes/assignment_class.php";

$assigns = new assign ( $ses_userId );
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Filter Rekap Surat Tugas</h3>
		</header>
		<form method="post" name="f" action="main.php?method=rekap_surat_tugas" class="form-horizontal" id="validation-form">
			<fieldset class="hr">
				<label class="span2">Tahun</label>
				<?php
				$rs_tahun = $assigns->assign_tahun_viewlist();
				$arr_tahun = $rs_tahun->GetArray ();
				echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "", "", false, false, true );
				?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Auditor</label>
				<?=$Helper->dbCombo( "fil_auditor_id", "auditor", "auditor_id", "concat(auditor_nip,' - ', auditor_name) as lengkap", "", "", "", "", "order by auditor_name", "", 1 )?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tipe Pengawasan</label>
				<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", "", "","","","", 1)?>
			</fieldset>
			<fieldset>
				<center>
					<input type="submit" class="blue_btn" value="Lihat">
				</center>
			</fieldset>
		</form>
	</article>
</section>