<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Translation;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function index(){
        $categories = Category::with('children')->get(); // Retrieve all categories
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::create($data);

        Translation::create([
           'table_name'=>'categories',
           'column_name'=>'name',
           'row_id'=>$category->id,
            'en'=> $request->name_en,
            'ru'=>$request->name_ru,
        ]);

        return redirect()->route('category')->with('success', 'Category created successfully');
    }
}
