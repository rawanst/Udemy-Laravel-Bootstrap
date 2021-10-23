<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('catgories.list', compact('categories'));
    }

    public function add ()
    {
        return view('catgories.add');
    }

    public function store(CategoryStoreRequest $request)
    {
        $param = $request->validated();
        Category::create($param);
        return back();
    }

    public function update($id, CategoryStoreRequest $request)
    {
        $param = $request->validated();
        $category = Category::find($id);
        $category->update($param);
        return back();
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return back();
    }

}
