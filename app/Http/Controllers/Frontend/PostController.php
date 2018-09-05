<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;

use App\Models\Camera;
use App\Models\City;
use App\Models\Area;
use App\Models\Post;
use App\Models\Vote;
use App\Models\Share;
use App\Models\Category;
use Auth;
use Request;
use Response;
use Cache;

class PostController extends Controller {

	public function area($locale,$camera,$city,$area) {
	    $area =  Cache::remember('area-'.$area,1440,function()  use ($area) {
			return Area::whereTranslation('slug', $area)->with('places')->first();
	    });
		if ($area) {
			return view('app.area.index', compact('area'));
		}
	}
	public function type($locale,$camera,$city,$type) {
	    $camera = Cache::remember('cameraid-'.$camera,1440,function()  use ($camera) {
			$camera = Camera::where('slug',$camera)->with('cities')->first();
			return $camera;
	    });
	    $city = Cache::remember('cityid-'.$city,1440,function()  use ($city) {
			$city = City::where('slug',$city)->with(['camera','areas'])->first();
			return $city;
	    });
		if ($city && $camera) {
		    $categories = Cache::remember('categories-',1440,function() {
				return Category::viewable()->with('posts')->get();
		    });
		    $posts = $city->posts($type)->get();
			return view('app.post.'.$type, compact('posts','city','camera','categories'));
		}
		return redirect('/');
	}
	public function typearea($locale,$camera,$city,$type,$area) {
		$camera = Camera::findBySlug($camera);
		$city = City::findBySlug($city);
		$area = Area::whereTranslation('slug', $area)->first();
		if ($city && $camera && $area) {
		    if ($type == 'vote' || $type == 'video' || $type == 'instastory') {
				$posts = $city->posts($type)->where('area_id',$area->id)->get();
				return view('app.post.'.$type, compact('posts','city','camera'));
		    }
		}
		return redirect('/');
	}
	public function vote() {
		if (Request::ajax()) {
			$user = Auth::user();
			if ($user) {
				$id = $_POST['id'];
				$camera_id = $_POST['camera_id'];
				$category_id = $_POST['category_id'];
				$locale = $_POST['locale'];
				\App::setLocale($locale);
				if (!$user->verified) {
					$data = array(
						'fail' => true,
						'unverified' => true,
					);
					return Response::json($data);
				}
				if (hasVote($id,$category_id)['fail']) {
					$data = array(
						'fail' => true,
						'message' => trans('content.hasvote'),
					);
					return Response::json(hasVote($id,$category_id));
				}
				$post = Post::find($id)->increment('vote',1);
				$vote = new Vote;
				$vote->user_id = $user->id;
				$vote->post_id = $id;
				$vote->category_id = $category_id;
				$vote->save();
				$data = array(
					'id' => $id,
					'message' => trans('content.successvote'),
					'hasVote' => hasVote($id,$category_id),
				);
				Cache::flush();
			    return Response::json($data);
			}
			$data = array(
				'fail' => true,
				'guest' => true,
			);
			return Response::json($data);
		}
	}
	public function share() {
		if (Request::ajax()) {
			$user = Auth::user();
			$via = $_POST['via'];
			$post_id = $_POST['post_id'];
			if ($user) {
				$share = new Share;
				$share->user_id = $user->id;
				$share->post_id = $post_id;
				$share->via = $via;
				$share->save();
				$data = array(
					'share' => true,
				);
				Cache::flush();
				return Response::json($data);
			}else{
					$share = new Share;
					$share->user_id = null;
					$share->post_id = $post_id;
					$share->via = $via;
					$share->save();
					$data = array(
						'share' => true,
					);
					Cache::flush();
					return Response::json($data);
			}
		}
	}
}
