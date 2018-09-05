<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model {
	use Sluggable;
	use SluggableScopeHelpers;

	//slug
	public function sluggable() {
		return [
			'slug'    => [
				'source' => 'name',
                'onUpdate' => true
			]
		];
	}

	protected $fillable = ['name', 'slug', 'locale', 'description'];

}
