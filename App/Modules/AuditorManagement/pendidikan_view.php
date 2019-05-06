<article class="module width_3_quarter">
	<header>
		<h3 class="tabs_involved"><?=$page_title?></h3>
		<ul class="tabs">
			<li>
				<form method="post" name="x" action="#view4">
					<a href="#" OnClick="return set_action_x('getadd_x');">Tambah</a>
			
			</li>
			<input type="hidden" value="" name="data_action_x" id="data_action_x">
			<input type="hidden" value="" name="data_id_x" id="data_id_x">
			</form>
		</ul>
	</header>
<?
include_once $grid;
?>  
</article>
