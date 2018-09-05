<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;
use App\Exports\VotesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\MediaRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Auth;
use Request;
use Response;
use Carbon\Carbon;
use Cache;

class CategoryController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}
	/**
	 * Display a listing of Data.
	 **/
	public function index() {
		$categories = Category::latest('created_at')->viewable()->paginate(10);
		$countTrash = Category::latest('created_at')->deleted()->count();
		$trash = false;
		return view('admin.category.index', compact('categories','countTrash','trash'));
	}
	public function trash() {
		$categories = Category::latest('created_at')->deleted()->paginate(20);
		$countTrash = Category::latest('created_at')->deleted()->count();
		$trash = true;
		return view('admin.category.index', compact('categories','countTrash','trash'));
	}
	/**
	 * SEARCH POST
	 **/
	public function search() {
		$search = \Request::get('search');//<-- we use global request to get the param of URI
		$categories  = Category::where('title', 'LIKE', '%'.$search.'%')->latest('created_at')->viewable()->paginate(20);
		return view('admin.category.index', compact('categories'));
	}
	/**
	 * CREATE POST VIEW
	 **/
	public function show($id) {
		$category = Category::find($id);
		return $category;
	}
    public function export($id) 
    {
    	return (new VotesExport)->forCategory($id)->download('votes-'.$id.'.xlsx');
    }
	/**
	 * CREATE POST VIEW
	 **/
	public function create() {
		return view('admin.category.add');
	}
	/**
	 * Store Data.
	 **/
	public function store(CategoryRequest $request) {
		$category = $this->createCategory($request);
		$category->translateOrNew('id')->name       = $request->name_id;
		$category->translateOrNew('id')->description = $request->description_id;
		$category->translateOrNew('en')->name       = $request->name_en;
		$category->translateOrNew('en')->description = $request->description_en;
		$category->name       = $request->name_id;
		$category->description       = $request->description_id;
		$category->save();
		if ($category) {
			flash() ->success('Your category has been created!');
			return redirect()->back();
		}
		Cache::flush();
		return redirect()->back();
	}
	/**
	 * Edit Data.
	 **/
	public function edit(Category $category) {
		$user = Auth::user();
		return view('admin.category.edit', compact('category'));
	}
	/**
	 * Update Data.
	 **/
	public function update(CategoryRequest $request, Category $category) {
		$category->update($request->all());
		$category->translateOrNew('id')->name       = $request->name_id;
		$category->translateOrNew('id')->description = $request->description_id;
		$category->translateOrNew('en')->name       = $request->name_en;
		$category->translateOrNew('en')->description = $request->description_en;
		$category->name       = $request->name_id;
		$category->description       = $request->description_id;
		$category->save();
		$this->saveMedia($category, $request,'categories');
		flash()->success("Your category has been update! ");
		Cache::flush();
		return redirect()->back();
	}


	/**
	 * CREATE POST
	 **/

	private function createCategory(CategoryRequest $request) {
		$category = Category::create($request->all());

		$this->saveMedia($category, $request,'categories');

		return $category;

	}
	public function storemedia(MediaRequest $request, $id) {
		$category  = Category::find($id);
		$image = $request->image;
		if (!empty($image)) {
			$category->addMedia($image)->toMediaCollection('categories');
		}
		return redirect()->back();
	}

	private function saveMedia($category, $request,$collection) {
		$image = $request->image;
		if (!empty($image)) {
			$category->addMedia($image)->toMediaCollection($collection);
		}
	}
	/**
	 * Delete Data.
	 **/
	public function delete()
	{
		if (Request::ajax()) {
			$id =	$_POST['id'];
			$category = Category::find($id);
			$category->trash = true;
			$category->update();

		    $countTrash = Category::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $category->trash,
				'countTrash' => $countTrash,
			);
			return Response::json($data);
		}
	}
	public function destroy($category)
	{
		if (Request::ajax()) {
			$id =	$_POST['id'];
			$category = Category::find($category);
			$category->delete();
		    $countTrash = Category::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $category->trash,
				'countTrash' => $countTrash,
			);
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
			$category = Category::find($id);
			$category->trash = false;
			$category->update();
		    $countTrash = Category::latest('created_at')->deleted()->count();
			$data = array(
				'id' =>  $id,
				'trash' => $category->trash,
				'countTrash' => $countTrash,
			);
			return Response::json($data);
		}
	}

}
