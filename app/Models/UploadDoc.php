<?php
namespace App\Models;

use App\AppModel;

class UploadDoc extends AppModel
{

	protected $fillable = [
        'document',		
    ];	
	public function scholorship(){
		return $this->belongsTo(Scholorship::class);
	}
	public function bank_loan(){
		return $this->belongsTo(BankLoan::class);
	}
	public function visa_process(){
		return $this->belongsTo(VisaProcess::class);
	}
	public function standard_operating_procedure(){
		return $this->belongsTo(StandardOperatingProcedure::class);
	}	
}