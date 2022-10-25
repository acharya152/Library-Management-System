<?php

		$date =getdate();

		$datetoday1 = $date['year']."-".$date['mon']."-".$date['mday'];
		echo($datetoday1);
		echo(" ");
		$date= date_create($datetoday1);


		$date1= date_create($datetoday1);

		date_add($date1,date_interval_create_from_date_string("1 days"));

		$datetoday=date_format($date1,"Y-m-d");
		echo ($datetoday);

		$interval=date_diff($date1,$date);
		echo($interval->days);

?>

		<?php
$date10 = new DateTime($datetoday1);
$date2 = new DateTime($datetoday);

var_dump($date10 == $date2);
var_dump($date10 < $date2);
var_dump($date10 > $date2);

?>