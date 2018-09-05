<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;

use App\Models\Post;
use App\Models\City;
use App\Models\Camera;
use Request;
use Response;
use View;

class PageController extends Controller {
	/**
	 * Page
	 */
	public function view($locale,$slug) {
		$page = Post::whereTranslation('slug', $slug)->first();
		if ($page) {
		    $type     = \Request::get('post');
		    if ($type == 'vote') {
				$camera = Camera::findBySlug('x-t100');
				$city = City::findBySlug('bali');
				$posts = Post::where('type',$type)->get();
				return view('app.post.'.$type, compact('posts','city','camera'));
		    }
			if (View::exists('app.page.'.$page->type)) {
				return view('app.page.'.$page->type, compact('page'));
			}else{
				return view('app.page.default', compact('page'));
			}
		}
		return redirect('/');
	}
}
