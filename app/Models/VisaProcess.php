<?php
namespace App\Models;

use App\AppModel;

class VisaProcess extends AppModel
{
   
	protected $fillable = [
        'country_id', 
		'state_id', 
        'user_id',       
    ];
	
	public function country()
    {
        return $this->belongsTo(Country::class);
    }
	
	public function user()
    {
        return $this->belongsTo(User::class);
    }
	public function upload_docs(){
		return $this->hasMany(UploadDoc::class);
	}
}
