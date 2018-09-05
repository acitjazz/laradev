<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Option extends Model 
{
  protected $fillable = ['title','value','status'];

	public function getCreatedAtAttribute($date) {
		return Carbon::parse($date)->format('d/m/Y h:i A');
	}
}
