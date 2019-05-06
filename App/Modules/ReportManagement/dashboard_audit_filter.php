<?
include_once "App/Classes/assignment_class.php";

$assigns = new assign ( $ses_userId );
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Filter Dashboard Pengawasan</h3>
		</header>
		<form method="post" name="f" action="main.php?method=dashboard_audit" class="form-horizontal" id="validation-form">
			<fieldset class="hr">
				<label class="span2">Tipe Pengawasan</label>
				<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", "", "","","","", 1)?>
			</fieldset>
			<fieldset class="hr">
				<label class="span2">Tahun</label>
				<?php
				$rs_tahun = $assigns->assign_tahun_viewlist();
				$arr_tahun = $rs_tahun->GetArray ();
				echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "", "", false, false, true );
				?>
			</fieldset>
			<fieldset>
				<center>
					<input type="submit" class="blue_btn" value="Lihat">
				</center>
			</fieldset>
		</form>
	</article>
</section>