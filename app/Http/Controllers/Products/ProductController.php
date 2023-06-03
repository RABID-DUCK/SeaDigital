<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreRequest $request){
        $data = $request->validated();
        dd($data);
    }
}
