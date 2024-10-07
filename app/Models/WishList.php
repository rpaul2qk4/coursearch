<?php
namespace App\Models;

use App\AppModel;

class WishList extends AppModel
{
       protected $fillable = [
        'specialization_id',
		'user_id', 		
    ];	
		
	public function specialization(){
		return $this->belongsTo(Specialization::class);
	}
	
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
