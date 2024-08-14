<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class InventoryProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        return view('admin,products.index', compact('products'));
    }
    
    public function create()
    {
        return view('admin.products.create');
    }
    
     public function store(Request $request)
    {
        $product = Product::create($request->all()); 


        // Handle successful creation, e.g., redirect with flash message
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }
}
