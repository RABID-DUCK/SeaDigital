<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if(isset($data['categories'])) {
            $categories = $data['categories'];
            unset($data['categories']);
        }else{
            unset($data['categories']);
        }


        if (isset($data['images'])){
            $productImages = $data['images'];
            foreach ($productImages as $image){
                $file_path = Storage::disk('public')->put('/images', $image);
                ProductImages::create([
                    'product_id' => $product->id,
                    'file_path' => $file_path
                ]);
                unset($data['images']);
            }
        }else{
            unset($data['images']);
        }

        if (isset($data['cover'])){
            $data['cover'] = Storage::disk('public')->put('/images', $data['cover']);
        }else{
            unset($data['cover']);
        }

        $product->update($data);

        $old_categories = CategoryProduct::where('product_id', $product->id)->pluck('category_id')->toArray();
        $deleted_categories = array_diff($old_categories, $categories);

        foreach ($categories as $category) {
            CategoryProduct::query()->updateOrCreate([
                'product_id' => $product->id,
                'category_id' => $category
            ]);
        }

        foreach ($deleted_categories as $deleted_category) {
            CategoryProduct::where('category_id', $deleted_category)->where('product_id', $product->id)->delete();
        }

        return redirect()->route('product.show', compact('product', 'categories'));
    }
}
