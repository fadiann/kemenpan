<script type="text/javascript" src="Public/js/jquery.validate.min.js"></script>
<?php
include_once "App/Classes/assignment_class.php";
$assigns = new assign ( $ses_userId );
?>
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<h4 class="panel-title">Filter Laporan Hasil Audit</h4>
			</header>
			<div class="panel-body wrap">
                <form method="post" name="f" action="main.php?method=rekap_pelaksanaan" class="form-horizontal" id="validation-form">
                    <fieldset class="form-group mt-lg">
                        <label class="col-sm-4 control-label">Tahun <span class="required">*</span></label>
							<div class="col-sm-5">
                                <?php
                                $rs_tahun = $assigns->assign_tahun_viewlist();
                                $arr_tahun = $rs_tahun->GetArray ();
                                echo $Helper->buildCombo ( "fill_tahun", $arr_tahun, 0, 0, "", "", "", false, true, false );
                                ?>
							</div>
                    </fieldset>
                    <fieldset class="form-group">
                        <center>
                            <input type="submit" class="btn btn-success" value="Lihat">
                        </center>
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
			fill_tahun: "required"
		},
		messages: {
			fill_tahun: "Silahkan Pilih Tahun"
		},		
		submitHandler: function(form) {
			form.submit();
		}
	});
});
</script>