<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsephp
     */
    public function index()
    {

        $posts = Post::orderBy('id', 'DESC')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
      $categories = Category::get();
      return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category'=>'required',
            'body' => 'required',
          ]);
          $request['slug'] = Str::slug($request->title);
          $posts =  new Post;
          $posts->title=$request->input('title');
          $posts->slug=$request['slug'];
          $posts->body=$request->input('body');
          $posts->category_id=$request->input('category');
  
          $posts->save();
    
          return redirect()->route('posts.index')
            ->with('message','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$slug)
    {
      $request->validate([
        'title' => 'required',
        'body' => 'required',
      ]);
      
      return redirect()->route('posts.index')
        ->with('success', 'Post updated successfully.');
    }

    public function edit($slug)
    {
      // dd($slug);
     // info($slug); 
      $posts = Post::where(['slug' => $slug])->first();
    //  info($posts); 
      $categories = Category::get();
    
     if (empty($posts)) {
        return "NOT found";
    }
      return view('posts.edit', compact('posts','categories'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
      $posts = Post::where(['slug' => $slug])->first();
        $request->validate([
            'title' => 'required',
            'category'=>'required',
            'body' => 'required',
        ]);
         

          $posts->title=$request->input('title');
          $posts->slug=Str::slug($request->title);
          $posts->body=$request->input('body');
          $posts->category_id=$request->input('category');

          $posts->update();

          return redirect()->route('posts.index') ->with('message', 'Post updated successfully.');
    }

    /**
     * 
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index')
          ->with('message', 'Post deleted successfully');
    }
    /**/
   
    
}
