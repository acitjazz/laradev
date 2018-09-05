<?php
namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\Media;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Carbon\Carbon;
use Cache;

class Category extends Model implements HasMediaConversions {

	use Translatable;
	use HasMediaTrait;

	public $translatedAttributes = ['description'];

	protected $fillable = ['name','description'];

	public function registerMediaConversions(Media $media = null){
		$this->addMediaConversion('small')->crop(Manipulations::CROP_CENTER, 300, 200)->performOnCollections('categories');
		$this->addMediaConversion('medium')->crop(Manipulations::CROP_CENTER, 600, 400)->performOnCollections('categories');
		$this->addMediaConversion('large')->crop(Manipulations::CROP_CENTER, 1280, 400)->performOnCollections('categories');
	}

	public function scopeViewable($query) {
		$query->where('trash', false);
	}
	public function scopeDeleted($query) {
		$query->where('trash', true);
	}
	
    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'categoryable');
    }
	public function postTypes($type,$camera,$category) {
	    return Cache::remember('postTypes-'.$type.'-'.$camera.'-'.$category,1440,function()  use ($type,$camera) {
			return $this->morphedByMany('App\Models\Post','categoryable')->viewable()
			->where('camera_id',$camera)
			->where('type',$type)->get();
	    });
	}
	public function parents() {
		return $this->hasMany(Category::class , 'parent_id');
	}
	public function parent() {
		return $this->belongTo(Category::class , 'parent_id');
	}
	public function isParent() {
		return !!$this->parent;
	}

    public function trans($locale,$id)
    {
	    return Cache::remember('Category-'.$locale.'-'.$id,1440,function()  use ($locale) {
       		 return $this->hasMany('App\Models\CategoryTranslation')->where('locale',$locale)->first();
	    });
    }
	public function votes() {
		return $this->hasMany('App\Models\Vote');
	}
}
