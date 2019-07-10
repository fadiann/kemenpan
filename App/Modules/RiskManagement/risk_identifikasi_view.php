<form method="post" name="f" action="#">
	<section id="main" class="column">
	<?php
		include 'risk_view_parrent.php';
	?>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<header class="panel-heading">
					<h2 class="panel-title"><?=$page_title?></h2>
				</header>
				<div class="panel-body">
					<div class="form-inline text-right mt-sm">
					<?php if ($iconAdd == '1') { ?>
							<a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
					<?php } ?>
					</div>
					<input type="hidden" value="" name="data_action" id="data_action">
                    <input type="hidden" value="" name="data_id" id="data_id">
                    
                    <div class="table-responsive mt-md">
                        <table class="table table-bordered table-striped table-condensed mb-none">
                            <tr>
                                <th>No.</th>
                                <th>Nomor Risiko</th>
                                <th>Sasaran</th>
                                <th>Indikator</th>
                                <th>Kejadian</th>
                                <th>Kategori</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </table>
                    </div>
				</div>
			</section>
		</div>
	</div>
</form>
