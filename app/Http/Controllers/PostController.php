<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use DataTables;
// use Illuminate\Validation\Validator;
use Session;
use Validator;
// use App\Models\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()) {
            $model = Post::with('categories');
            return DataTables::eloquent($model)
                ->addColumn('categories', function (Post $post) {
                    return $post->categories->name;
                })
                ->toJson();
        }
        return view('post.index2');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = array();
    	foreach (Category::all() as $category) {
    		$categories[$category->id] = $category->name;
    	}
    	return view('post.create')->with('categories', $categories);
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('image'));
        // exit;
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|integer',
            'title' => 'required|max:20|min:3',
            'author' => 'required|max:20|min:3',
            'image' => 'required|mimes:jpg,jpeg,png,gif',
            'short_desc' => 'required|max:50|min:10',
            'description' => 'required|max:1000|min:50',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withInput()
                ->withErrors($validator);
        }

    $image = $request->file('image');
    $upload = 'img/posts/';
    $filename = time().$image->getClientOriginalName();
    $path = move_uploaded_file($image->getPathName(), $upload. $filename);

    $post = new Post;
    $post->category_id = $request->category_id;
    $post->title = $request->title;
    $post->author = $request->author;
    $post->image = $filename;
    $post->short_desc = $request->short_desc;
    $post->description = $request->description;
    $post->save();

    Session::flash('post_create','New Post is Created');

    return redirect('post/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
