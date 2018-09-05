<?php

use App\Models\Option;
use App\Models\Camera;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Models\City;
use App\Models\Area;
use App\Models\Place;
use App\Models\Vote;
use Carbon\Carbon;
use Spatie\Medialibrary\Media;

function hasVote($post_id,$category_id) {
	if (Auth::check()) {
		$user_id = Auth::user()->id;
		$vote = Vote::where('user_id', '=', $user_id)->where('category_id', '=', $category_id)->latest('created_at')->first(); 
		if ($vote) {
			$expired = Carbon::parse($vote->created_at)->addDay(1);
			$now = Carbon::now();
			if ($category_id == $vote->category_id && $post_id != $vote->post_id) {
				$data = array(
					'fail' => true,
					'red' => false,
					'category' => $category_id,
					'votecat' => $vote->category_id,
					'expired' => $now<$expired,
					'message' => trans('content.hasvotecat'),
				);
				return $data;
			}
			if($post_id == $vote->post_id && $now<$expired){
				$data = array(
					'fail' => true,
					'red' => true,
					'category' => $category_id,
					'votecat' => $vote->category_id,
					'expired' => $now<$expired,
					'message' => trans('content.hasvote'),
				);
				return $data;
			}
			if ($category_id == $vote->category_id && $now<$expired) {
				$data = array(
					'fail' => true,
					'red' => true,
					'category' => $category_id,
					'votecat' => $vote->category_id,
					'expired' => $now<$expired,
					'message' => trans('content.hasvotecat'),
				);
				return $data;
			}
		}
	}
	$data = array(
		'fail' => false,
		'red' => false,
		'message' => trans('content.hasvote'),
	);
	return $data;
}
/**
 * Get Cat Vote
 */
function getCatVote($id) {
    return Cache::remember('getCatVote-'.$id,1440,function()  use ($id) {
		$category = Post::find($id)->categories->first()->id;
		return $category;
    });
}
/**
 * Get Post
 */
function getPost($type) {
    return Cache::remember('postType-'.$type,1440,function()  use ($type) {
		$posts = Post::published()->viewable()->where('type',$type)->get();
		return $posts;
    });
}
function getPostTemplate($type) {
    return Cache::remember('postTemplate-'.$type,1440,function()  use ($type) {
		$posts = Post::published()->viewable()->where('template',$type)->latest('published_at')->get();
		return $posts;
    });
}
/**
 * Get Post Featured
 */
function getFeatured($limit) {
	$posts = Post::published()->viewable()->featured()->limit($limit)->get();
	return $posts;
}
/**
 * Limit Wordss
 */
function limitWord($str, $limit) {
	$word = Str::words($str, $limit, '...');
	return $word;
}
/**
 * Human Date Carbon 
 */
function humandate($date) {
	$date = \Carbon\Carbon::parse($date)->diffForHumans();
	return $date;
}

/**
 * Indonesian Date
 */
function formatDate($date) {
	$date = \Carbon\Carbon::parse($date)->diffForHumans();
	return $date;
}

/**
 * Format Date
 */
function formatDateDay($date) {
	$date = Carbon::parse($date)->format('d/m/Y');
	return $date;
}
/**
 * Format Date
 */
function formatMonthYear($date) {
	$date = Carbon::parse($date)->format('F Y');
	return $date;
}
function formatMonth($date) {
	$date = Carbon::parse($date)->format('F');
	return $date;
}
/**
 *  Get Page
 */
function page() {
	$page = Page::latest('created_at')->viewable()->get();
	return $page;
}
/**
 *  Get Camera
 */
function camera($slug = null) {
    return Cache::remember('camera-'.$slug,1440,function()  use ($slug) {
		if ($slug) {
			$camera = Camera::findBySlug($slug);
			return $camera;
		}
		$camera = Camera::viewable()->get();
		return $camera;
    });
}
/**
 *  Get Photo
 */
function getPhoto($area,$place) {
    return Cache::remember('getPhoto-'.$area.'-'.$place,1440,function()  use ($area,$place) {
		return Post::latest('created_at')
				->where('type','photo')
				->where('area_id',$area)
				->where('place_id',$place)->viewable()->get();
    });
}
/**
 *  Get City
 */
function city() {
    return Cache::remember('cities',1440,function() {
		return City::latest('created_at')->with('camera')->with('areas')->viewable()->get();
    });
}
/**
 *  Get Area
 */
function area() {
    return Cache::remember('areas',1440,function() {
		return Area::latest('created_at')->with('places')->viewable()->get();
    });
}
/**
 *  Get Place
 */
function place() {
	$place = Place::latest('created_at')->viewable()->get();
	return $place;
}
function comingsoon($date){
		if ($date > Carbon::now()) {
		 return true;
		}
}
/**
 * Get Current Language
 */
function lang() {
	$current = Request::segment(1);
	if ($current == 'id'  || $current == 'en') {
		App::setLocale($current);
		$locale = App::getLocale();
	}else{
		$locale = Lang::locale();
	}
	return $locale;
}
/**
 * Get Current Language ID
 */
function langID() {
	$url = url()->full();
	$url = str_replace('/en', '/id', $url);
	return $url;
}
/**
 * Get Current Language EN
 */
function langEn() {
	$url = url()->full();
	$url = str_replace('/id', '/en', $url);
	return $url;
}
/**
 * Get Current Language ID
 */
function changeLanguageId() {
	$url = url()->full();
	$url = str_replace('/en', '/id', $url);
	return $url;
}
/**
 * Get Current Language EN
 */
function changeLanguageEn() {
	$url = url()->full();
	$url = str_replace('/id', '/en', $url);
	return $url;
}
/**
 *  Upload Route For Backend
 */
function uploadRoute() {
  //2 -> get model
  //3 -> get ID
  $url = 'store-media-'.currentUrl(2).'/'.currentUrl(3);
  return $url;
}
/**
 *  Get Current Url
 */
function currentUrl($number) {
  if ($number == 3) {
  	 $currentpage = Request::segment($number);
  	 if ($currentpage) {
	   return $currentpage;
  	 }
	 return 'tokyo';
  }
  $currentpage = Request::segment($number);
  return $currentpage;
}

/**
 *  Get Latest Posts
 */
function latestPost($limit) {
	$post = Post::published()->limit($limit)->get();
	return $post;
}
/**
 * Get Options  Site
 */
function getOption($title) {
    return Cache::remember('option-'.$title,1440,function()  use ($title) {
		$option = Option::where('title', $title)->first();
		if ($option) {
			return $option->value;
		}
		return false;
    });
}

/**
 * Get All Media uploaded
 */
function getAllMedia($limit) {
	$medias = Media::latest('created_at')->where('model_type','App\Models\Post')->limit($limit)->get();
	return $medias;
}
/**
 * Get Thumbnail
 */
function getThumbnail($data, $collection, $size) {
	   $media = Cache::remember('media-'.$collection.'-'.$data->id,1440,function()  use ($data,$collection) {
			return $data->getMedia($collection);
	    });
      $url = url('/');
      if (count($media)){
      	$image = $url.'/media/'.$media->first()->id.'/conversions/'.$size.'.jpg';
      	return $image;
      }
      else{
      	return url('/').'/images/default_'.$size.'.jpg';
      }
}
/**
 * Check Type
 */
function checkType() {
	$type     = \Request::get('type');
	if(is_null($type)){
		return false;
	}
	return $type;
}
/**
 * Upload File
 */
function uploadFile($request,$slug,$type) {
		$file            = $request->file('photo_source');
		if ($file) {
			$now             = Carbon::now();
			$datenow         = $now->format('YmdHis');
			$filename        = $file->getClientOriginalName();
			$imgname         = preg_replace('/\s+/', '', $filename);
			$extension       = $file->getClientOriginalExtension();
			$filename        = $datenow.'_'.$slug.'.'.$extension;
			$realpath        = $file->getRealPath();
			$size            = $file->getSize();
			$mimetype        = $file->getMimeType();
			$destinationPath = public_path().'/'.$type;
			$file->move($destinationPath, $filename);
			return $filename;
		}
		return null;
}
