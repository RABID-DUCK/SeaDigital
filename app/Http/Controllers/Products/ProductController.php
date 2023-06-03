<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function show(Product $product){
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product){
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function deleteImage(Request $request){
        ProductImages::query()->where('id', $request->id)->delete();
        return response()->json(['message' => "Успешное удаление"], 200);
    }

    public function store(StoreRequest $request){
        $data = $request->validated();

        $productImages = $data['images'];
        $categories = $data['categories'];

        $data['cover'] = Storage::disk('public')->put('/images', $data['cover']);

        unset($data['images'], $data['categories']);

       $product = Product::query()->firstOrCreate($data);

        foreach ($productImages as $image){
            $file_path = Storage::disk('public')->put('/images', $image);
            ProductImages::create([
                'product_id' => $product->id,
                'file_path' => $file_path
            ]);
        }

        foreach ($categories as $category) {
            CategoryProduct::query()->firstOrCreate([
                'product_id' => $product->id,
                'category_id' => $category
            ]);
        }

        return redirect()->route('product.index');
    }
}
