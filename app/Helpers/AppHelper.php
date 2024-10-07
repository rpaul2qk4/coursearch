<?php
namespace App\Helpers;

class AppHelper
{
	public static function options($optionname){
		//p(app_path('Options/'.$optionname.'.php'));
		//echo"<pre>";print_r(require app_path('Options/'.$optionname.'.php'));echo"</pre>";die();
        return require app_path('Options/'.$optionname.'.php');
    }
	
	public static function date($date) {
		if (strtotime($date)) {
			return date('d-M-Y', strtotime($date));
		}
	}
	
	public static function dates($date1, $date2) {
		return date('d-M-Y', strtotime($date1)) . ' to ' . date('d-M-Y', strtotime($date2));
	}
	
	public static function password() {
		return 'Abc123*@';//self::uniqid_base36();
    }
	
	public static function filters($filters) {
		//die('ddd');
		foreach ($filters as $k => $v) {
			if (empty($v)) {
				unset($filters[$k]);
			}
		}
		return $filters;
	}
	
	public static function acronym( $string = '' ) {
		//preg_match_all('#(?<=\s|\b)\pL#u', $request->other_course, $Result);
		
		$words = explode(' ', $string);
		if ( ! $words ) {
			return false;
		}
		$result = '';		
		foreach ( $words as $word ) $result .= $word[0];
		return strtoupper( $result );

	}	
	
	public static function mfilters($filters) {
		//die('ddd');
		foreach ($filters as $k => $v) {
			foreach ($v as $kk => $vv) {
				if (empty($filters[$k][$kk])) {
						unset($filters[$k]);
				}
			}
		}
		return $filters;
	}	
	
	public static function scoreFilters($filters) {
		//die('ddd');
		foreach ($filters as $k => $v) {
			foreach ($v as $kk => $vv) {
				
				if (count($filters[$k])<=1) {
						unset($filters[$k]);
				}
			}
		}
		return $filters;
	}
	
	public static function sfilters($filters) {
		
		foreach ($filters as $k => $v) {
				if(gettype($filters[$k]) == 'string'){
					continue;
				}
				if(empty($filters[$k])){
					unset($filters[$k]);
					continue;
				}
				
				foreach ($v as $kk => $vv) {
					if (empty($filters[$k][$kk])) {
							unset($filters[$k]);
					}
				}
		}
		return $filters;
	}
	
	public static function csfilters($filters) {
		
		foreach ($filters as $k => $v) {
				if(gettype($filters[$k]) == 'string'){
					if($k == 'fees' && $filters[$k]==0){
						unset($filters[$k]);
					}
					continue;
				}
				if(empty($filters[$k])){
					unset($filters[$k]);
					continue;
				}
				
				foreach ($v as $kk => $vv) {
					if (empty($filters[$k][$kk])) {
							unset($filters[$k]);
					}
				}
		}
		return $filters;
	}
	
	
}
