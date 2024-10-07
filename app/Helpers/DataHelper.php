<?php
namespace App\Helpers;

use App\Models\Role;
use App\Models\Branch;
use App\Models\University;
use App\Models\Discipline;
use App\Models\Duration;
use App\Models\Program;
use App\Models\Country;
use App\Models\State;
use App\Models\Format;
use App\Models\Attendance;
use App\Models\Requirement;
use App\Models\Specialization;

class DataHelper
{
	public static function getDisciplines() {
		return Discipline::all();
	}
	public static function getAttendance() {
		return Attendance::all();
	}
	public static function getDurations() {
		return Duration::all();
	}
	public static function getPrograms() {
		return Program::all();
	}
	
	public static function getProgramsArray() {
		return Program::get()->pluck('program','id')->prepend("Select","");
	}
	public static function getDisciplinesArray() {
		return Discipline::get()->pluck('discipline','id')->prepend("Select","");
	}
	public static function getBranchesArray() {
		return Branch::get()->pluck('branch','id')->prepend("Select","");
	}
	public static function getRequirementsArray() {
		return Requirement::get()->pluck('requirement','id');
	}
	
	public static function getFormats() {
		return Format::all();
	}
	
	public static function specializations() {
		return Specialization::all();
	}
	
	public static function getRoles() {
		return Role::where('role','<>','Admin')->get()->pluck('role','id')->prepend('Select role','')->toArray();
	}
	
	public static function getDurationOptions() {
		return Duration::get()->pluck('duration','id')->toArray();
	}
	public static function getFormatOptions() {
		return Format::get()->pluck('format','id')->toArray();
	}
	public static function getRequirementOptions() {
		return Requirement::get()->pluck('requirement','id')->toArray();
	}
	public static function getAttendanceOptions() {
		return Attendance::get()->pluck('attendance','id')->toArray();
	}
	public static function getCountriesOptions() {
		return Country::get()->pluck('country','id')->prepend('Select country','')->toArray();
	}
	public static function getUniversitiesOptions() {
		return University::get()->pluck('university','id')->prepend('Select university','')->toArray();
	}
	public static function getDisciplineOptions() {
		return Discipline::get()->pluck('discipline','id')->prepend('Select','')->toArray();
	}
		
	public static function getCountriesAndStatesNames() {
		$countries=Country::with(['states'])->get();
		/* $states=State::get()->pluck('state')->toArray();
		$countries_and_states=array_push($countries,$states);	 */
		return $countries;
	}
	
	public static function getSpecializationsNames() {
		return Specialization::get()->pluck('specialization');
	}
	
	public static function getSpecializationsOptions() {
		return Specialization::get()->pluck('specialization','id')->prepend('Select specialization','')->toArray();
	}
	
	public static function getCountriesNames() {
		return Country::get()->pluck('country');
	}
	public static function getStatesNames() {
		return State::get()->pluck('state');
	}
		
	public static function config($key) {
		//var_dump($key);die();
		$config = Config::where('key', $key)->first();
		if ($config) {
			return $config->value;
		}
	}
	
	public static function getSeason($month) {
		$seasons = [
			'Spring' => [3, 4, 5],
			'Summer' => [6, 7, 8],
			'Autumn' => [9, 10, 11],
			'Winter' => [12, 1, 2],
		];

		foreach ($seasons as $season => $months) {
			if (in_array($month, $months)) {
				return $season;
			}
		}

		return 'Invalid month';
	}
	
	public static function getPassword() {
		return 'abcd1234';//self::uniqid_base36();
    }
		
	
	public static function greScoreOptions() {
		return [
			'' => 'Select',			
			'280' => '280',			
			'300' => '300',			
			'305' => '305',			
			'310' => '310',			
		];
	}		
	
	public static function monthOptions() {
		return [
			'1' => 'January',
			'2' => 'Febuary',
			'3' => 'March',
			'4' => 'April',
			'5' => 'May',
			'6' => 'June',
			'7' => 'July',
			'8' => 'August',
			'9' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December',
		];
	}
	public static function getDataAccessFormat() {
		return [
			'asc' => 'Ascending',
			'desc' => 'Descending',			
		];
	}
	
	public static function getDocsType() {
		return [
			'' => 'Select doc type',
			'Collatral' => 'Collatral',
			'Surity' => 'Surity',			
		];
	}
	
	public static function colorCodes (){
		
		return [	
			0=>'rgb(255, 255, 255)',
			1=>'rgb(192, 192, 192)',
			2=>'rgb(128, 128, 128)',
			3=>'rgb(0, 0, 0)',
			4=>'rgb(255, 0, 0)',
			
			5=>'rgb(232,244,234)',
			6=>'rgb(255, 255, 0)',
			7=>'rgb(128, 128, 0)',
			8=>'rgb(128, 0, 128)',
			9=>'rgb(0, 128, 0)',
			
			10=>'rgb(0, 255, 255)',
			11=>'rgb(0, 128, 128)',
			12=>'rgb(0, 0, 255)',
			13=>'rgb(0, 0, 128)',
			14=>'rgb(255, 0, 255)',
			
			15=>'rgb(128, 0, 128)',
			16=>'rgb(165,42,42)',
			17=>'rgb(255,192,203)'		
		];
	}
}
