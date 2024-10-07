<?php
namespace App\Models;

use App\AppModel;

class Advertisement extends AppModel
{
	protected $fillable = [
        'advertisement',
        'description',
        'priority',
     ];
	
	public function add_client(){
		return $this->belongsTo(AddClient::class);
	}
}
