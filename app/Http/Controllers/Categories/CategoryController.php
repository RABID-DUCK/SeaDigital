<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $messages = [
            'title.required' => 'Поле названия обязательно к заполнению!',
            'title.unique' => 'Такая категория уже существует!'
        ];

        $data = $request->validate(['title' => 'required|string|unique:categories|max:60'], $messages);

        Category::create($data);

        return redirect('admin/categories');
    }

    public function show(Category $category){
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category){
        $data = $request->validate(['title' => 'nullable|unique:categories|max:60'], ['title.unique' => 'Такая категория уже существует!']);
        if ($data){
            $category->update($data);
        }

        return view('admin.categories.show', compact('category'));
    }

    public function delete(Category $category){
        $category->delete();

        return redirect('admin/categories');
    }
}
