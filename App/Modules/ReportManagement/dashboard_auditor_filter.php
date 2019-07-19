<?
include_once "App/Classes/assignment_class.php";

$assigns = new assign ( $ses_userId );
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Filter Dashboard Auditor</h2>
			</header>
			<div class="panel-body">
				<center>
					<form method="post" name="f" action="main.php?method=dashboard_auditor" class="form-horizontal" id="validation-form">
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Tipe Pengawasan</label>
							<div class="col-md-5">
								<?=$Helper->dbCombo("tipe_audit", "par_audit_type", "audit_type_id", "audit_type_name", "and audit_type_del_st = 1 ", "", "","","","", 1)?>
							</div>
						</fieldset>
						<fieldset class="form-group">
							<label class="col-sm-3 control-label">Tahun</label>
							<div class="col-md-5">
								<?php
								$rs_tahun = $assigns->assign_tahun_viewlist();
								$arr_tahun = $rs_tahun->GetArray ();
								echo $Helper->buildCombo ( "fil_tahun_id", $arr_tahun, 0, 0, "", "", "", false, false, true );
								?>
							</div>
						</fieldset>
						<fieldset class="form-group">
							<center>
								<input type="submit" class="btn btn-success" value="Lihat">
							</center>
						</fieldset>
					</form>
				</center>
			</div>
		</section>
	</div>
</div>