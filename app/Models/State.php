<?php
namespace App\Models;

use App\AppModel;

class State extends AppModel
{    
	protected $table = 'states';
    
	protected $fillable = [
       'state','country_id','code'
    ];	
	
	public function rules($country_id)
	{
		$id = $this->id;
		return [
			'state' => "required|unique:states,state,{$id},id,country_id,{$country_id},deleted_at,NULL|max:190",
		];
	}	
		
	public function cities()
    {
        return $this->hasMany('App\Models\City');
    } 
	
	public function users()
    {
        return $this->hasMany('App\Models\User');
    } 
		
	public function country()
    {
        return $this->belongsTo(Country::class);
    }
	
	public function universities()
    {
        return $this->hasMany(University::class);
    }	
	public function bank_loans()
    {
        return $this->hasMany(BankLoan::class);
    }
}
