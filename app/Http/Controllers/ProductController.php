<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::simplePaginate(2);
        return view('product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->prod_name);

        $product =  new Product;
        $product->name=$request->input('prod_name');
        $product->slug=$request['slug'];
        $product->description=$request->input('prod_desc'); 
        $product->status=$request->input('status');
        $product->quantity=$request->input('prod_quantity');
    
        $product->save();

        return redirect('product')->with('success', 'Product successfully stored.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        $bread = [
            'Products' => url('/product'),
            "{$product->name}" => url("/product/{$product->id}")
        ];
        return view('view-product', compact('product', 'bread'));
    }

    /**
     *br**/
    public function edit($id)
    {
        $product = Product::find($id);
        return view('edit-product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product =  Product::find($id);
        $product->name=$request->input('prod_name');
        $product->description=$request->input('prod_desc'); 
        $product->status=$request->input('status');
        $product->quantity=$request->input('prod_quantity');
    
        $product->update();

        return redirect('product')->with('success', 'Product successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect('product')->with('success', 'Product successfully deleted.');
    }
}
