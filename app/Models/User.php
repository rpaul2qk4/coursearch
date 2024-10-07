<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
	use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'country_id',
        'state_id',
        'role_id',
        'photo',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
	
	public function role(){
		return $this->belongsTo(Role::class);
	}
	
	public function isAdmin(){
		
		return !strcmp($this->role->role,"Admin")?true:false;
	}
	public function isUser(){
		
		return !strcmp($this->role->role,"User")?true:false;
	} 
	
	public function isAgent(){
		
		return !strcmp($this->role->role,"Agent")?true:false;
	} 
	
	
	public function authorizeRoles($role){
	  if ($this->hasAnyRole($role)) {
		return true;
	  }
	  abort(401, 'This action is unauthorized.');
	}	
	
	public function hasRole($role){
	  if ($this->role->role==$role) {
		return true;
	  }
	  return false;
	}
	
	
	public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }
	
	public function wishlists()
    {
        return $this->belongsToMany(WishList::class);
    }
	public function country()
    {
        return $this->belongsTo(Country::class);
    }
	public function screen_shots(){
		return $this->hasMany(ScreenShot::class);
	}
}
