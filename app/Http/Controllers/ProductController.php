<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id=$request->user()->id;
        $product=Product::where('user_id',$user_id)->get();
        return response($product,201);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required|max:255',
            'price' => 'required',
        ]);

        Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price' => $request->price
        ]);

        return response([
            'message' => "san pham duoc tao thanh cong",
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product=Product::findOrFail($id);
        return response($product,201);
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
        $product=Product::findOrFail($id);
        $product->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price' => $request->price
        ]);
        return response([
            'message'=>'san pham cap nhat thanh cong',
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::where('id',$id)->delete();
        return response([
            'message'=>'san pham xoa thanh cong',
        ],201);
    }
}
