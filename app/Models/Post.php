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

class Post extends Model implements HasMediaConversions {

	use HasMediaTrait;
	use Translatable;

	public $translatedAttributes = ['title','subtitle', 'summary', 'slug', 'description'];

	protected $fillable = ['user_id','video_id',
							'video_source','photo_source','template','trash','keyword','type','featured','published_at'];

	public function registerMediaConversions(Media $media = null){
		$this->addMediaConversion('small')->crop(Manipulations::CROP_CENTER, 300, 200)->performOnCollections('posts');
		$this->addMediaConversion('medium')->crop(Manipulations::CROP_CENTER, 700, 400)->performOnCollections('posts');
		$this->addMediaConversion('large')->crop(Manipulations::CROP_CENTER, 1400, 600)->performOnCollections('posts');
		$this->addMediaConversion('square')->crop(Manipulations::CROP_CENTER, 1000, 1000)->performOnCollections('posts');
	}

	public function scopeViewable($query) {
		$query->where('trash', false);
	}
	public function scopeDeleted($query) {
		$query->where('trash', true);
	}
	public function scopePublished($query) {
		$query->where('published_at', '<=', Carbon::now());
	}
	public function scopeUnpublished($query) {
		$query->where('published_at', '>', Carbon::now());
	}
	public function setPublishedAtAttribute($date) {
		$this->attributes['published_at'] = Carbon::parse($date);
	}
	public function getPublishedAtAttribute($date) {
		return Carbon::parse($date)->format('Y-m-d h:i A');
	}
	public function getCategoryListAttribute() {
		return $this->categories->pluck('id')->all();
	}
    public function categories()
    {
        return $this->morphToMany('App\Models\Category','categoryable')->viewable()->withTimestamps();
    }
	public function category()
	{
		return $this->hasOne('App\Models\Category', 'categoryable_id','id')
	           ->where('categoryable_type', 'App\Model\Post');
	}
	public function user() {
		return $this->belongsTo('App\Models\User');
	}
    public function trans($locale,$id)
    {
	    return Cache::remember('Post-'.$locale.'-'.$id,1440,function()  use ($locale) {
       		 return $this->hasMany('App\Models\PostTranslation')->where('locale',$locale)->first();
	    });
    }

}
