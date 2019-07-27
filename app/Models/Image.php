<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public function getUrlAttribute()
	{
		return asset($this->path);
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
