<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutlayIncome extends Model
{
    protected $fillable = [
		'comment',
		'outlay',
		'income',
		'created_at',
		
	];
}
