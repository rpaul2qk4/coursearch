<?php
namespace App\Models;

use App\AppModel;

class BankLoan extends AppModel
{
	protected $fillable = [
        'bank_name', 
		'loan_amount', 
        'interest_rate', 
        'process_time', 
        'docs_type', 
		'country_id', 
		'state_id', 
    ];	
	public function upload_docs(){
		return $this->hasMany(UploadDoc::class);
	}
	public function req_docs(){
		return $this->hasMany(ReqDoc::class);
	}
	public function country(){
		return $this->belongsTo(Country::class);
	}
	public function state(){
		return $this->belongsTo(State::class);
	}	
}
