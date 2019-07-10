<article class="module width_3_quarter">
	<header>
		<h3 class="tabs_involved"><?=$page_title?></h3>
				<div class="form-inline text-right mt-sm">
				<form method="post" name="f" action="#view2">
					<a class="btn btn-success" href="#" OnClick="return set_action('getadd');"><i class="fa fa-plus"> </i> Tambah</a>
					<input type="hidden" value="" name="data_action" id="data_action">
					<input type="hidden" value="" name="data_id" id="data_id">
				</form>
			</div>
	</header>
<?
include_once $grid;
?>  
</article>
