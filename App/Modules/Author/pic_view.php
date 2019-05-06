<article class="module width_3_quarter">
	<header>
		<h3 class="tabs_involved"><?=$page_title?></h3>
		<ul class="tabs">
			<li>
				<form method="post" name="f" action="#view2">
					<a href="#" OnClick="return set_action('getadd');">Tambah</a>
			
			</li>
			<input type="hidden" value="" name="data_action" id="data_action">
			<input type="hidden" value="" name="data_id" id="data_id">
			</form>
		</ul>
	</header>
<?
include_once $grid;
?>  
</article>
