<?php
namespace App\Models;

use App\AppModel;

class Scholorship extends AppModel
{
   protected $fillable = [
        'document', 		
        'discription', 		
        'country_id', 		
        'state_id', 		
        'discipline_id', 		
        'specialization_id', 	
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
