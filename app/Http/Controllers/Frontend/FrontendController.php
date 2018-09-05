<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Post;
use App\Models\Page;
use Cache;
class FrontendController extends Controller {

	/**
	 * Landing
	 */
	public function index() {
			return redirect('/id');
	}
	public function home($locale) {
			$page = 'WELCOME';
			$page = Post::where('type','page')->where('template','home')->first();
			$posts = Post::latest('created_at')->limit(9)->get();
		 	return view('app.page.home',compact('page','posts'));
          //return \Response::view('custom.404', array(), 500);
	}
}
