<?php
namespace App\Models;

use App\AppModel;

class City extends AppModel
{
	protected $table = 'cities';
	protected $fillable = [
		'city','state_id','country_id','code'
	];
	
	public function rules($country_id,$state_id) {
		$id = $this->id;
		return [
			'city' => "required|unique:cities,city,{$id},id,state_id,{$state_id},country_id,{$country_id},deleted_at,NULL|max:190",
		];
	}
	
	public function state()
    {
        return $this->belongsTo('App\Models\State');
    }
	public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
	public function users()
    {
        return $this->hasMany('App\Models\User');
    }
	public function universities()
    {
        return $this->hasMany(University::class);
    }
}
