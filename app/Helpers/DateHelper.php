<?php
namespace App\Helpers;

class DateHelper
{
	public static function date($date, $format='d-M-Y')
	{
		$str = strtotime($date);
		if ($str) {
			return date($format, $str);
		}
	}
	
	public static function datesBetween($start, $end)
	{
	    $dates = [];
		$startTime = strtotime($start); 
		$endTime = strtotime($end); 
		do {
		   $dates[] = date('Y-m-d', $startTime);
		   $startTime = strtotime('+1 day',$startTime); 
		} while ($startTime <= $endTime);
		//var_dump($start);die();
		return $dates;
	}
	
	public static function groupByWeek($start, $end)
	{
	    $dates = [];
		$startTime = strtotime($start); 
		$endTime = strtotime($end); 
		do {
		   $weekday = date('D', $startTime);
		   $dates[$weekday][] = date('Y-m-d', $startTime);
		   $startTime = strtotime('+1 day',$startTime); 
		} while ($startTime <= $endTime);
		return $dates;
	}
}
