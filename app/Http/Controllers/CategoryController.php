<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.category.list', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug_category'] = utf8tourl($request->name_category);
        if (Category::create($data)) {
            return redirect('admin/category/list')->with('message', 'Add Category Success');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id_category
     * @return \Illuminate\Http\Response
     */
    public function edit($id_category)
    {
        $category = Category::find($id_category);
        return view('admin.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id_category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id_category)
    {
        $category = Category::find($id_category);
        $data = $request->all();
        $data['slug_category'] = utf8tourl($request->name_category);
        if ($category->update($data)) {
            return redirect('admin/category/list')->with('message', 'Edit Category Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id_category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_category)
    {
        $category = Category::find($id_category);
        if ($category->delete()) {
            return redirect('admin/category/list')->with('message', 'Delete Category Success');
        }

    }
}
