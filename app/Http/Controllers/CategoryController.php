<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        Category::newCategory($request);
        return back()->with('message', 'category add successful');
    }

    public function manage()
    {
        return view('admin.category.manage', ['categories' => Category::where('status', 1)->get()]);
    }

    public function edit($id)
    {
        return view('admin.category.edit', ['category' => Category::find($id)]);
    }

    public function update(Request $request, $id)
    {
        Category::updateCategory($request, $id);
        return redirect('/category/manage')->with('message', 'Category update successful');
    }

    public function delete($id)
    {
        Category::deleteCategory($id);
        return back()->with('message', 'category delete successful');
    }

}
