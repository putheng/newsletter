<?php

namespace App\Models;

use App\Models\Image;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public static function boot()
    {
        parent::boot();

        static::creating(function($model){
            $model->slug = str_slug($model->title);
        });
    }

	public function scopeLatest($query)
	{
		return $query->orderBy('id', 'desc');
	}

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function image()
    {
    	return $this->belongsTo(Image::class);
    }
}
