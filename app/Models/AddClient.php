<?php
namespace App\Models;

use App\AppModel;

class AddClient extends AppModel
{
	protected $fillable = [
        'add_client',
        'description',
        'max_adds',
    ];
	
	public function advertisements(){
		return $this->hasMany(Advertisement::class);
	}
	public function getAddCountAttribute(){
		$ads_count=$this->max_adds - $this->advertisements->count();
		return $ads_count;
	}
}
