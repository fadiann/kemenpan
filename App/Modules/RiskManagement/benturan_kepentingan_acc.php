<script src="Public/js/jquery.validate.min.js" type="text/javascript"></script>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title"><?=$page_title?></h2>
			</header>
			<div class="panel-body wrap">
        <form method="post" name="f" action="#" class="form-horizontal" id="validation-form">
            <?
            switch ($_action) {
                case "getadd":
                    ?>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Tahun</label> 
					<div class="col-sm-5"><?= $Helper->tahunCombo('tahun', 'tahun') ?></div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Uraian</label> 
                    <div class="col-sm-5"><textarea name="uraian" id="uraian" class="form-control" rows="10"></textarea>
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Pelaku Yang Terkait</label> 
                    <div class="col-sm-5"><input type="text" class="form-control" name="pelaku" id="pelaku">
                    </div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Rencana Aksi</label> 
                    <div class="col-sm-5"><textarea name="rencana" id="rencana" class="form-control" rows="10"></textarea>
                    </div>
                </fieldset>
                <?
                break;
            case "getedit":
                ?>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Tahun</label> 
					<div class="col-sm-5"><?= $Helper->tahunCombo('tahun', 'tahun', $row['tahun']) ?></div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Uraian</label> 
					<div class="col-sm-5"><textarea name="uraian" id="uraian" class="form-control" rows="10"><?=$row['uraian']?></textarea></div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Pelaku Yang Terkait</label> 
					<div class="col-sm-5"><input type="text" class="form-control" name="pelaku" id="pelaku" value="<?=$row['pelaku']?>"></div>
                </fieldset>
                <fieldset class="form-group">
                    <label class="col-sm-3 control-label">Rencana Aksi</label> 
					<div class="col-sm-5"><textarea name="rencana" id="rencana" class="form-control" rows="10"><?=$row['rencana_aksi']?></textarea></div>
                </fieldset>
                <input type="hidden" value="<?=$row['benturan_kepentingan_id']?>" name="data_id">
                <?
                break;
        }
        ?>
            <fieldset class="form-group mt-md">
                <center>
                    <input type="button" class="btn btn-primary" value="Kembali" onclick="location='<?= $def_page_request ?>'">
                    <input type="submit" class="btn btn-success" value="Simpan">
                </center>
                <input type="hidden" name="data_action" id="data_action" value="<?= $_nextaction ?>">
            </fieldset>
        </form>
            </div>
        </section>
    </div>
</div>
<script>
    $(function() {
        $("#validation-form").validate({
            rules: {
                tahun: "required",
                uraian: "required",
                pelaku: "required",
                rencana: "required"
            },
            messages: {
                tahun: "Silahkan Pilih Tahun",
                uraian: "Uraian Tidak Boleh Kosong",
                pelaku: "Pelaku Tidak Boleh Kosong",
                rencana: "Rencana Tidak Boleh Kosong"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>