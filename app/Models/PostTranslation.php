<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model {
	use Sluggable;
	use SluggableScopeHelpers;

	//slug
	public function sluggable() {
		return [
			'slug'    => [
				'source' => 'title',
                'onUpdate' => true
			]
		];
	}

	protected $fillable = ['title', 'slug', 'locale', 'summary', 'description'];

}
