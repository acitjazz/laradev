<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\MediaRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Auth;
use Request;
use Response;
use Carbon\Carbon;
use Cache;

class PostController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$type     = checkType();
	    $posts  = Cache::remember('allposts',1440,function() {
			return Post::latest('created_at')->viewable()->with(['categories'])->paginate(10);
	    });
	    $countTrash = Cache::remember('countpoststrash',1440,function() {
			return Post::latest('created_at')->deleted()->count();
	    });
		$trash = false;
		if ($type) {
		    $posts = Cache::remember('allposts-'.$type,1440,function() use($type){
				return Post::latest('created_at')->viewable()->where('type', $type)->with(['categories'])->paginate(10);
		    });
		    $countTrash =  Cache::remember('countpoststrash-'.$type,1440,function() use($type){
				return Post::latest('created_at')->deleted()->where('type', $type)->count();
		    });
		}
		return view('admin.post.index', compact('posts', 'type','countTrash','trash'));
	}
	public function trash() {
		$type     = checkType();
	    $posts  = Cache::remember('deletedposts',1440,function() {
			return Post::latest('created_at')->deleted()->with(['city','place','area','camera','categories','votes','shares'])->paginate(10);
	    });
	    $countTrash = Cache::remember('countpoststrash',1440,function() {
			return Post::latest('created_at')->deleted()->count();
	    });
		$trash = true;
		if ($type) {
		    $countTrash =  Cache::remember('countpoststrash-'.$type,1440,function() use($type){
				return Post::latest('created_at')->deleted()->where('type', $type)->count();
		    });
		    $posts = Cache::remember('deletedposts-'.$type,1440,function() use($type){
				return Post::latest('created_at')->deleted()->where('type', $type)->with(['city','place','area','camera','categories','votes','shares'])->paginate(10);
		    });
		}
		return view('admin.post.index', compact('posts', 'type','countTrash','trash'));
	}
	/**
	 * SEARCH POST
	 **/
	public function search() {
		$type     = checkType();
		$search = \Request::get('search');//<-- we use global request to get the param of URI
		$posts  = Post::where('title', 'LIKE', '%'.$search.'%')->latest('created_at')->viewable()->where('type', $type)->paginate(20);
		return view('admin.post.index', compact('posts', 'type'));
	}
	/**
	 * CREATE POST VIEW
	 **/
	public function create() {
		$categories = Category::latest('created_at')->viewable()->pluck('name', 'id');
		$type     = checkType();
		return view('admin.post.add', compact('type','categories'));
	}
	/**
	 * Store Data.
	 **/
	public function store(PostRequest $request) {
		$post = $this->createPost($request);
		$post->translateOrNew('id')->title       = $request->title_id;
		$post->translateOrNew('id')->summary 	 = $request->summary_id;
		$post->translateOrNew('id')->description = $request->description_id;
		$post->translateOrNew('en')->title       = $request->title_en;
		$post->translateOrNew('en')->summary 	 = $request->summary_en;
		$post->translateOrNew('en')->description = $request->description_en;
		$post->save();
		$photo_source = uploadFile($request,$post->getTranslation('id')->slug,'photos');
		$video_source = uploadFile($request,$post->getTranslation('id')->slug,'videos');
		$post->photo_source = $photo_source;
		$post->video_source = $video_source;
		$post->update();
		if ($post) {
			flash() ->success('Your post has been created!');
			return redirect('backend/post/'.$post->id.'/edit/?type='.$post->type);
		}
		Cache::flush();
		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Post $post) {
		$user = Auth::user();
		$type     = checkType();
		$categories = Category::latest('created_at')->viewable()->pluck('name', 'id');
		return view('admin.post.edit', compact('post', 'type','categories'));
	}
	/**
	 * Update Data.
	 **/
	public function update(PostRequest $request, Post $post) {

		$post->update($request->all());
		$post->translateOrNew('id')->title       = $request->title_id;
		$post->translateOrNew('id')->summary 	 = $request->summary_id;
		$post->translateOrNew('id')->description = $request->description_id;
		$post->translateOrNew('en')->title       = $request->title_en;
		$post->translateOrNew('en')->summary 	 = $request->summary_en;
		$post->translateOrNew('en')->description = $request->description_en;
		$post->save();
		if ($request->video_source) {
	    	$post->video_source = uploadFile($request,$post->getTranslation('id')->slug,'videos');
			$post->update();
		}
		if ($request->photo_source) {
			$photo_source = uploadFile($request,$post->getTranslation('id')->slug,'photos');
			$post->photo_source = $photo_source;
			$post->update();
		}
		if (empty($request->feature)) {
			$post->featured = NULL;
			$post->update();
		}

		$categoryList = $request->input('categoryList');
		if (count($categoryList)) {
			$this->syncCategories($post, $categoryList);
		}
		$this->saveMedia($post, $request,'posts');
		flash()->success("Your post has been update! ");
		Cache::flush();
		return redirect()->back();
	}


	/**
	 * CREATE POST
	 **/

	private function createPost(PostRequest $request) {
		$post = Auth::user()->posts()->create($request->all());
		$this->saveMedia($post, $request,'posts');

		$categoryList = $request->input('categoryList');
		if (count($categoryList)) {
			$this->syncCategories($post, $categoryList);
		}

		return $post;

	}
	public function storemedia(MediaRequest $request, $id) {
		$post  = Post::find($id);
		$image = $request->image;
		if (!empty($image)) {
			$post->addMedia($image)->toMediaCollection('posts');
		}
		Cache::flush();
		return redirect()->back();
	}

	/**
	 * SYNC CATEGORY
	 **/
	private function syncCategories(Post $post, array $categories) {
		$post->categories()->sync($categories);
	}
	/**
	 * SAVE MEDIA
	 **/
	private function saveMedia($post, $request,$collection) {
		$image = $request->image;
		$square = $request->crop_photo_square;
		$large = $request->crop_photo_large;
		if (!empty($image)) {
			$post->addMedia($image)->toMediaCollection($collection);
		}
		if (!empty($square)) {
			$post->addMediaFromBase64($square)->toMediaCollection($collection);
		}
		if (!empty($large)) {
			$post->addMediaFromBase64($large)->toMediaCollection('large');
		}
	}
	/**
	 * Delete Data.
	 **/
	public function delete()
	{
		if (Request::ajax()) {
			$id =	$_POST['id'];
			$post = Post::find($id);
			$post->trash = true;
			$post->update();

		    $countTrash = Post::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $post->trash,
				'countTrash' => $countTrash,
			);
			Cache::flush();
			return Response::json($data);
		}
	}
	public function destroy($post)
	{
		if (Request::ajax()) {
			$id =	$_POST['id'];
			$post = Post::find($post);
			$post->delete();
		    $countTrash = Post::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $post->trash,
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
			$post = Post::find($id);
			$post->trash = false;
			$post->update();
		    $countTrash = Post::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $post->trash,
				'countTrash' => $countTrash,
			);
			Cache::flush();
			return Response::json($data);
		}
	}

}
