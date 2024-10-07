<?php
namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;


class AppModel extends Model
{
    use HasFactory;
	use SoftDeletes;
	use Notifiable;
	
	
	protected static function boot()
    {
		parent::boot();
       
		static::creating(function ($model) {
			$model->created_by = Auth::user()->id ?? 1;
		});
	}
	
	public function scopeWithAndWhereHas($query, $relation, $constraint){
		return $query->whereHas($relation, $constraint)
                 ->with([$relation => $constraint]);
	}
}
