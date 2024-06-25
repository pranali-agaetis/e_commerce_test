<?php

namespace App\Http\Controllers\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
      return view('category.create');
    }

    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->name);
        $request->validate([
            'name' => 'required',
          ]);
        $categories =  new Category;
        $categories->name=$request->input('name');
        $categories->slug=$request['slug'];

        $categories->save();
          return redirect()->route('category.index')
            ->with('message','Category created successfully.');
    }

    public function edit($slug)
    {
      $categories = Category::where(['slug' => $slug])->first();

      if (empty($categories)) {
        return "NOT fpun";
      }
      
      return view('category.edit', compact('categories'));
    }
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
          ]);
          $categories = Category::where(['slug' => $slug])->first();

          $categories->name=$request->input('name');
          $categories->slug=Str::slug($request->name);

          $categories->update();
          return redirect()->route('category.index') ->with('message', 'Category updated successfully.');
    }


    public function destroy($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('category.index')
          ->with('message', 'Category deleted successfully');
    }
}
