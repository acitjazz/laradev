<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Auth;

class DashboardController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	public function index() {
		$totalMember = User::role('member')->count();
		$latestPosts = Post::viewable()->limit(10)->get();
		return view('admin.dashboard',compact('totalMember','latestPosts'));
	}
	public function homeSetting() {
		return view('admin.option.home');
	}
}
