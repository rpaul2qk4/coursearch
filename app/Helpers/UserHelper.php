<?php
namespace App\Helpers;

use Auth;
use App\Models\Color;

class UserHelper
{
	public static function nav($role) {
		return 'nav_'.strtolower(str_replace(' ','_', $role));
	}
	
	public static function color() {
		//var_dump(config('global.color'));die();
		if(!empty(Auth::user()->color_id)) {
			return Color::findOrfail(Auth::user()->color_id);// && Auth::user()->color ? Auth::user()->color : Color::find(config('global.color'));
		} else {
			//return new Color('default', '#fff', '#fff');
			return new Color('default', '#5856d6', '#ff2d55');
		}
	}	
}
