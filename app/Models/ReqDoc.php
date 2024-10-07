<?php
namespace App\Models;

use App\AppModel;

class ReqDoc extends AppModel
{
    protected $fillable = [
        'bank_loan_id', 
		'document', 
        'doc_type',       
    ];	
	
	public function bank_loan(){
		return $this->belongsTo(BankLoan::class);
	}
}
