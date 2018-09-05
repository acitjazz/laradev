<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Media;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class User extends Authenticatable implements HasMediaConversions{
	use HasRoles;
	use Notifiable;
	use Sluggable;
	use SluggableScopeHelpers;
	use HasMediaTrait;
	//slug
	public function sluggable() {
		return [
			'slug'    => [
				'source' => 'name',
                'onUpdate' => true
			]
		];
	}

	protected $guard_name = 'web';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name','slug','phone', 'email', 'password', 'provider', 'provider_id',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function registerMediaConversions(Media $media = null){
		$this->addMediaConversion('small')->crop(Manipulations::CROP_CENTER, 150, 150)->performOnCollections('users');
		$this->addMediaConversion('medium')->crop(Manipulations::CROP_CENTER, 300, 300)->performOnCollections('users');
	}
	public function scopeViewable($query) {
		$query->where('trash', false);
	}
	public function scopeDeleted($query) {
		$query->where('trash', true);
	}
	public function posts() {
		return $this->hasMany('App\Models\Post')->viewable();
	}
}
