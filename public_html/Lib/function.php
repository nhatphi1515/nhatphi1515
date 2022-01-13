<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
function pagination($limit, $product) {
	$total = count($product);
	$total_page = ceil($total/$limit);
	$product_pagination;
	$id=1;
	$count=0;
	foreach ($product as $products) {
		$product_pagination[$id][$products['id']] = $products;
		$count++;
		if ($count==$limit) {
			$id++;
			$count=0;
		}
	}
	$pagination =  array('product' => $product_pagination, 'page' => $total_page);
	return $pagination;

}
function getPage($total_page) {
	if(isset($_POST['page'])) $current_page = $_POST['page'];
	else if(isset($_GET['page'])) $current_page = $_GET['page'];
	else $current_page=1;
	if($current_page < 1) $current_page = 1;
	else if($current_page > $total_page) $current_page = $total_page;
	return $current_page;
}
function getMax($array, $column)
{
	$max = 0;
	foreach($array as $arr)
	{
		if ($arr[$column] > $max) {
			$max = $arr[$column];
		}
	}

	return $max;
}
function getMin($array, $column)
{
	$min = reset($array)[$column];
	foreach($array as $arr)
	{
		if ($arr[$column] < $min) {
			$min = $arr[$column];
		}
	}

	return $min;
} 
function ascending($a, $b)
{
	if ($a["price"] == $b["price"]) {
		return 0;
	}
	return ($a["price"] > $b["price"]) ? -1 : 1;
}
function descending($a, $b)
{
	if ($a["price"] == $b["price"]) {
		return 0;
	}
	return ($a["price"] < $b["price"]) ? -1 : 1;
}
function ascendingSort($yourArray){
	usort($yourArray,"ascending");
}
function descendingSort($yourArray){
	usort($yourArray,"descending");
}
function filter($array, $min, $max,$column)
{
	return array_filter($array, function($var) use($min,$max,$column){
		return ($var[$column] <= $max && $var[$column] >= $min);
	});
}
function getTime()
{
	$hour = date("h");
	$minute = date("i");
	$second = date("s"); 	
	$tail = date("a");
	if($tail == 'pm' && $hour != 12) $hour+=12;
	$time = $hour.':'.$minute.':'.$second;
	$date = date("Y-m-d");
	$datetime = $date.' '.$time;
	return $datetime;
}
function getCurrentDate()
{
	return date("Y-m-d");
}
function getMaxDate()
{
	return date("Y-m-d", strtotime(date("Y-m-d"). ' + 30 days'));
}
function dayOfTheDate($date){
	$timestamp = strtotime($date);
	$day = date('l', $timestamp);
	return $day;
}

function dayOfTheDateVN($date)
{
	$day = dayOfTheDate($date);
	switch ($day)
	{
		case 'Sunday': return "Chủ nhật";
		case 'Monday': return "Thứ hai";
		case 'Tuesday': return "Thứ ba";
		case 'Friday': return "Thứ tư";
		case 'Thursday': return "Thứ năm";
		case 'Wednesday': return "Thứ sáu";
		default: return "Thứ bảy";
	}
}
function splitDateTime($datetime){
	return explode(" ",$datetime);
}
function formatDate($date){
	$d = explode("-",$date);
	return $d[2].'/'.$d[1].'/'.$d[0];
}
function formatTime($time){
	$t = explode(":",$time);
	return $t[0].':'.$t[1];
}
function dateDifference($start_date, $end_date)
{
	$diff = strtotime($start_date) - strtotime($end_date);
	return ceil(abs($diff / 86400))+1;
}
function checkAttached(&$safe, $rangeordered){
	foreach($rangeordered as $ordered){
		if($ordered[0] == $safe[0][0]) splitSpace($safe, $safe[0], $ordered);
		else foreach($safe as $key){
			if($ordered[0] > $key[0] && $ordered[1] < $key[1])
				splitSpace($safe, $safe[array_search($key,$safe)], $ordered);
		}
	}
}
function splitSpace(&$safespace ,&$safe , $ordered){
	array_push($safespace,array($ordered[1],$safe[1]));
	$safe = array($safe[0],$ordered[0]);
}
function checkValid($safespace, $rentday,$returnday){
	if($rentday == $safespace[0][0] && $returnday < $safespace[0][1]) return true;
	foreach($safespace as $key){
		if($rentday > $key[0] && $returnday < $key[1])
			return true;
	}
	return false;
}



?>