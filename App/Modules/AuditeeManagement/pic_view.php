
<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<h2 class="panel-title"><?=$page_title?></h2>
			<div class="panel-body">
				<form method="post" name="f" action="#">
				<div class="form-inline text-right mt-sm">
					<a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
				</div>
				<input type="hidden" value="" name="data_action" id="data_action">
				<input type="hidden" value="" name="data_id" id="data_id">
				<?php include_once $grid; ?>  
				</form>
			</div>
		</section>
	</div>
</div>
