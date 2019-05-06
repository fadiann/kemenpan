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
<section id="main" class="column">
	<article class="module width_3_quarter">
		<div id="demopage">
			<div class="container1">
				<ul class="rtabs">
					<li><a href="#view1">Rincian Auditee</a></li>
					<li><a href="#view2">Pejabat Auditee</a></li>
				</ul>
				<div class="panel-container">
					<div id="view1">
						<fieldset class="hr">
							<label class="span3">Kode Auditee</label> <label class="span2">: <?=$arr['auditee_kode']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Nama Auditee</label> <label class="span5">: <?=$arr['auditee_name']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Unit Penanggung Jawab</label> <label
								class="span6">: <?=$arr['nama_parrent']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Inspektorat Penanggung Jawab</label> <label
								class="span6">: <?=$arr['inspektorat_name']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Propinsi</label> <label class="span5">: <?=$arr['propinsi_name']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Kabupaten</label> <label class="span5">: <?=$arr['kabupaten_name']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Alamat</label> <label class="span6">: <?=$arr['auditee_alamat']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Telp</label> <label class="span2">: <?=$arr['auditee_telp']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Ext</label> <label class="span2">: <?=$arr['auditee_ext']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Email</label> <label class="span2">: <?=$arr['auditee_email']?></label>
						</fieldset>
						<fieldset class="hr">
							<label class="span3">Fax</label> <label class="span2">: <?=$arr['auditee_fax']?></label>
						</fieldset>
					</div>
					<div id="view2">
						<? include "pic_main.php"; ?>					
					</div>
				</div>
			</div>
		</div>
	</article>
</section>