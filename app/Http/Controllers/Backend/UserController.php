<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Models\User;
use Request;
use Response;
use Cache;

class UserController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
	    $users  = Cache::remember('allmember',1440,function() {
			return User::role('member')->latest('created_at')->viewable()->with(['roles','permissions'])->paginate(20);
	    });
	    $countTrash  = Cache::remember('countTrashMember',1440,function() {
			return User::role('member')->latest('created_at')->deleted()->count(); 
	    });
		$trash = false;
		return view('admin.user.index',compact('users','countTrash','trash'));	
	}
	public function trash() {
	    $users  = Cache::remember('deletedmember',1440,function() {
			return User::role('member')->latest('created_at')->deleted()->with(['roles','permissions'])->paginate(20);
	    });
	    $countTrash  = Cache::remember('countTrashMember',1440,function() {
			return User::role('member')->latest('created_at')->deleted()->count(); 
	    });
		$trash = true;
		return view('admin.user.index',compact('users','countTrash','trash'));	
	}
	/**
	 * Create Data.
	 **/
	public function create() {
		return view('admin.user.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(GalleryRequest $request) {
		$this->createPage($request);

		flash()->success('Your user has been created!');

		Cache::flush();
		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(User $user) {
		return view('admin.user.edit', compact('user'));
	}
	/**
	 * Update Data.
	 **/
	public function update(GalleryRequest $request, User $user) {
		$user->update($request->all());
		$this->saveMedia($user, $request);

		flash()->success('User has been updated!');

		Cache::flush();
		return redirect()->back();
	}
	/**
	 * Create User
	 **/
	private function createPage(GalleryRequest $request) {
		$user = User::create($request->all());
		$this->saveMedia($user, $request);
		return $user;

	}
	public function storemedia(MediaRequest $request, $id) {
		$user  = User::find($id);
		$this->saveMedia($user, $request);
		Cache::flush();
		return redirect()->back();
	}

	private function saveMedia($user, $request) {
		$image = $request->image;
		$logo = $request->logo;
		if (!empty($image)) {
			$user->addMedia($image)->toMediaCollection('users');
		}
		if (!empty($logo)) {
			$user->addMedia($logo)->toMediaCollection('logo');
		}
	}
	/**
	 * Delete Data.
	 **/
	public function delete()
	{
		if (Request::ajax()) {
			$id =	$_POST['id'];
			$user = User::find($id);
			$user->trash = true;
			$user->update();

		    $countTrash = User::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $user->trash,
				'countTrash' => $countTrash,
			);
			Cache::flush();
			return Response::json($data);
		}
	}
	public function destroy($user)
	{
		if (Request::ajax()) {
			$id =	$_POST['id'];
			$user = User::find($user);
			$user->delete();
		    $countTrash = User::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $user->trash,
				'countTrash' => $countTrash,
			);
			Cache::flush();
			return Response::json($data);
		}
	}
	/**
	 * Restore Restore.
	 **/
	public function restore()
	{
		if (Request::ajax()) {
			$id =	$_POST['id'];
			$user = User::find($id);
			$user->trash = false;
			$user->update();
		    $countTrash = User::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $user->trash,
				'countTrash' => $countTrash,
			);
			Cache::flush();
			return Response::json($data);
		}
	}

}
