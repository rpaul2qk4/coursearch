<?php
namespace App\Models;

use App\AppModel;

class Currency extends AppModel
{
    protected $fillable = [
        'currency', 
        'code', 
        'icon', 
        'description', 
    ];	
	
}
