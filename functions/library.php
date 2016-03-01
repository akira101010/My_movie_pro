<?php

function now_datetime(){

	$date_time_obj = new DateTime();
	$date_time = $date_time_obj->format('Y-m-d H:i:s');

	return $date_time;

}

?>
