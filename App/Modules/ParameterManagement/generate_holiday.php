<?php
include_once "../App/Classes/param_class.php";
include_once "../App/Libraries/Helper.php";
$params = new param ();
$Helper = new Helper ();

$year = date ( "Y" ) + 1;
$date = "01-01-" . $year;
$date1 = str_replace ( '-', '/', $date );
for($i = 1; $i <= 366; $i ++) {
	$all_date = date ( 'd-m-Y', strtotime ( $date1 . "+" . $i . " days" ) );
	if (date ( "N", strtotime ( $all_date ) ) == 6 || date ( "N", strtotime ( $all_date ) ) == 7) {
		if (date ( "Y", strtotime ( $all_date ) ) == $year) {
			$weekend = $Helper->date_db ( $all_date );
			$params->insert_weekend ( $weekend, "2" );
		}
	}
}
?>