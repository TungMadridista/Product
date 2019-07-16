<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Requests\ProductTypeRequest;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_type = ProductType::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.product-type.list', ['product_type' => $product_type]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin.pages.product-type.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeRequest $request)
    {
        $data = $request->all();
        $data['slug_product_type'] = utf8tourl($request->name_product_type);
        if (ProductType::create($data)) {
            return redirect('admin/product-type/list')->with('message', 'Add Product Type Success');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product_type)
    {
        $product_type = ProductType::find($id_product_type);
        return view('admin.pages.product-type.edit', compact('product_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(ProductTypeRequest $request, $id_product_type)
    {
        $product_type = ProductType::find($id_product_type);
        $data = $request->all();
        $data['slug_product_type'] = utf8tourl($request->name_product_type);
        if ($product_type->update($data)) {
            return redirect('admin/product-type/list')->with('message', 'Edit Product Type Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product_type)
    {
        $product_type = ProductType::find($id_product_type);
        if ($product_type->delete()) {
            return redirect('admin/product-type/list')->with('message', 'Delete Product Type Success');
        }
    }
}
