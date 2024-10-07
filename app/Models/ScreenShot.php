<?php

namespace App\Models;

use App\AppModel;

class ScreenShot extends AppModel
{

   protected $fillable = [
        'user_id', 		
        'screenshot',    
    ];	

	public function user(){
		return $this->belongsTo(User::class);
	}
}	