<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shopping_cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('.form');
    }


    public function store(Request $request)
    {
        $store = new Product();
        $store->fill($request->all());
        $store->save();
        return redirect('/list');
    }

    public function show()
    {
        //
    }
    public function list(){
        $list = Product::all();
        return view('.list',[
            'list' => $list
        ]);
    }


    public function edit()
    {
//        $edit = Shopping_cart::find($id);
//        return view('.shopping.edit',[
//            'edit' => $edit
//        ]);
    }


    public function update()
    {
//        $update = Shopping_cart::find($id);
//        $update->update($request->all());
//        $update->save();
//        return redirect('/list');
    }


    public function destroy()
    {
//        $delete = Shopping_cart::find($id);
//        $delete->delete();
//        return redirect('/list');
    }
}
