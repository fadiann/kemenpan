<?
include_once "App/Classes/auditee_class.php";
$auditees = new auditee ( $ses_userId );

$fdata_id = $Helper->replacetext ( $_GET ['auditee'] );
$rs = $auditees->auditee_data_viewlist ( $fdata_id );
$arr = $rs->FetchRow ();
?>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="Public/css/responsive-tabs.css" rel="stylesheet" type="text/css" />
<script src="Public/js/responsive-tabs.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">Detail Auditee</h2>
			</header>
			<div class="panel-body">
				<div class="tabs">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#1" data-toggle="tab">Rincian Auditee</a>
						</li>
						<li>
							<a href="#2" data-toggle="tab">Pejabat Auditee</a>
						</li>
					</ul>
					<div class="tab-content">
						<div id="1" class="tab-pane active">
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Kode Auditee</label> <label class="col-sm-9 control-label">: <?=$arr['auditee_kode']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Nama Auditee</label> <label class="col-sm-9 control-label">: <?=$arr['auditee_name']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Unit Penanggung Jawab</label> <label
									class="col-sm-9 control-label">: <?=$arr['nama_parrent']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Inspektorat Penanggung Jawab</label> <label
									class="col-sm-9 control-label">: <?=$arr['inspektorat_name']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Propinsi</label> <label class="col-sm-9 control-label">: <?=$arr['propinsi_name']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Kabupaten</label> <label class="col-sm-9 control-label">: <?=$arr['kabupaten_name']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Alamat</label> <label class="col-sm-9 control-label">: <?=$arr['auditee_alamat']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Telp</label> <label class="col-sm-9 control-label">: <?=$arr['auditee_telp']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Ext</label> <label class="col-sm-9 control-label">: <?=$arr['auditee_ext']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Email</label> <label class="col-sm-9 control-label">: <?=$arr['auditee_email']?></label>
							</fieldset>
							<fieldset class="form-group">
								<label class="col-sm-3 control-label">Fax</label> <label class="col-sm-9 control-label">: <?=$arr['auditee_fax']?></label>
							</fieldset>
						</div>
						<div id="2" class="tab-pane">
							<? include "pic_main.php"; ?>	
						</div>			
					</div>	
				</div>
			</div>
		</section>
	</div>
</div>
