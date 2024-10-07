<?php
namespace App\Models;

use App\AppModel;

class Country extends AppModel
{   
	protected $table = 'countries';
    protected $fillable = [
       'country',
       'code',
       'currency',
       'currency_icon',
    ];	
	
	public function rules()
	{
		$id = $this->id;
		return [
			'country' => "required|unique:countries,country,{$id},id,deleted_at,NULL|max:190",
		];
	}	
	
	public function districts()
    {
        return $this->hasMany('App\Models\District');
    }

	public function cities()
    {
        return $this->hasMany('App\Models\City');
    } 
	
	public function states()
    {
        return $this->hasMany('App\Models\State');
    }  
	
	public function users()
    {
        return $this->hasMany('App\Models\User');
    } 
	
	public function universities()
    {
        return $this->hasMany(University::class);
    }
	public function visa_processes()
    {
        return $this->hasMany('App\Models\VisaProcess');
    }
	public function bank_loans()
    {
        return $this->hasMany(BankLoan::class);
    }
}
