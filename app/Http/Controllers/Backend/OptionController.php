<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Backend\Controller;

use App\Http\Requests\OptionRequest;
use App\Http\Requests;
use App\Models\Option;
use Redirect;
use Auth;

class OptionController extends Controller
{
     public function __construct()
     {
       $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $options = Option::paginate(20);
      // $posts = Post::latest('published_at')->get();
      return view('admin.option.index',compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.option.add');
    }
   public function navigation()
   {
       $pages = Page::latest('created_at')->get();
        $categories = Category::all();
        $options = Option::all();
       return view('admin.option.navigation',compact('pages','categories','options'));
   }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OptionRequest $request)
    {
        $this->createOption($request);

        flash()->success('Your option has been created!');

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
       $option = Option::findBySlug($slug);
       return view('app.option.single',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Option $option)
    {
        return view('admin.option.edit',compact('option'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OptionRequest $request, Option $option)
    {
        $option->update($request->all());

        flash()->success('Your Option has been updated!');

        return redirect('/backend/option');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        Option::find($request)->delete();
        flash()->success('Your Option has been deleted!');
        return redirect()->back();
    }
    private function createOption(OptionRequest $request)
    {
      $option = Option::create($request->all());

      return $option;

    }

}
