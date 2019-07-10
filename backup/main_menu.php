<aside id="sidebar" class="column">
	<?
	$rs_menu_parrent = $Helper->menu_list ( "0", $ses_group_id );
	while ( $arr_menu_parrent = $rs_menu_parrent->FetchRow () ) {
		echo "<h3>" . $arr_menu_parrent ['menu_name'] . "</h3>";
		echo "<ul class=\"toggle\">";
		$rs_menu_child = $Helper->menu_list ( $arr_menu_parrent ['menu_id'], $ses_group_id );
		while ( $arr_menu_child = $rs_menu_child->FetchRow () ) {
			echo "<li class=\"icn_tags\"><a href=\" " . $arr_menu_child ['menu_link'] . " \">" . $arr_menu_child ['menu_name'] . "</a></li>";
		}
		echo "</ul>";
	}
	?>
</aside>
<!-- end of sidebar -->
