<fieldset class="row">
	<fieldset class="col-md-12">
		<section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title"><?=$page_title?></h2>
            </header>
            <fieldset class="panel-body">
                <fieldset>
                    <form action="" method="post" enctype="multipart/form-data">
                        <fieldset class="form-group">
                            <label class="col-sm-4 text-right">Tahun</label> 
                            <div class="col-sm-5">
                                <?=$Helper->tahunComboMulti('tahun', '', '')?>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="col-sm-4 text-right">Auditee</label> 
                            <div class="col-sm-5">
				                <?=$Helper->dbComboRequired("auditee", "auditee", "auditee_id", "auditee_name", "", "", "", 1)?>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <center>
                            <input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?= $def_page_request ?>'">
                            <button class="btn btn-success" type="submit">Lihat</button>
                            </center>
                        </fieldset>
                        <input type="hidden" value="view_report" name="data_action">
                    </form>
                </fieldset>
            </fieldset>
		</section>
	</fieldset>
</fieldset>
