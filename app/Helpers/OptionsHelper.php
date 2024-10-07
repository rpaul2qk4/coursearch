<?php
namespace App\Helpers;

use Auth;
use App\Models\Option;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Topic;
use App\Models\Section;
use App\Models\Color;

class OptionsHelper
{
	public static function options($name, $empty = '') {
		return ['' => $empty] + Option::where('name', $name)->pluck('value', 'value')->toArray();
	}
	
	public static function appOptions($name, $empty = '') {
		if (!$empty) {
			return require(app_path("Options/{$name}.php"));			
		} else {
			return ['' => $empty] + require(app_path("Options/{$name}.php"));
		}
	}
	
	public static function categories() {
		return Category::pluck('name', 'id')->toArray();
	}
	
	public static function categorySubCategories() {
		$options = [];
		foreach(SubCategory::all() as $sub_category) {
			$options[$sub_category->category_id][$sub_category->id] = $sub_category->name;
		}
		return $options;
	}
	
	public static function topics() {
		$options = [];
		foreach(Topic::all() as $topic) {
			$options[$topic->sub_category_id][$topic->id] = $topic->name;
		}
		return $options;
	}
	
	public static function sections($course_id) {		
		return Section::where('course_id', $course_id)->pluck('name', 'id')->toArray();
	}
	
	public static function colorOptions() {
		return ['' => ''] + Color::pluck('name', 'id')->toArray();
	}
	
	public static function roles($role) {
		$options = [];
		$roles = ($role=="Super Admin")?(self::appOptions('Roles')) : (self::appOptions('sRoles'));
		foreach ($roles as $k => $v) {
			$options[$k] = $k;
		}
		return $options;
	}
	
	public static function numberofSections($number) {
		$options = [];
		$sections =self::appOptions('Section');
		$inc=0;
		foreach ($sections as $section) {
			if($number==$inc) {
				break;
			}
			array_push($options,$section);
			$inc++;
		}
		
		//echo"<pre>";print_r($options);echo"</pre>";die();
		return $options;
	}
	
	public static function classSection($sectionid) {
		$sections =self::appOptions('Section');
		foreach ($sections as $k => $v) {
			if($k==$sectionid) {
				return $v;
			}
		}
		return null;
	}
	
	public static function empReligion($religionId) {
		$religions =self::appOptions('Religion');
		foreach ($religions as $k => $v) {
			if($k==$religionId) {
				return $v;
			}
		}
		return null;
	}
	
	
	
}
