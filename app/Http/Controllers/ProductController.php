<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->paginate(5);
        return view('admin.pages.product.list', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $product_type = ProductType::orderBy('id', 'DESC')->get();
        return view('admin.pages.product.add', compact('product_type', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug_product'] = utf8tourl($request->name_product);
        if($request->hasFile('image')){
            $file = $request->image;
            //Lấy tên file
            $file_name = $file->getClientOriginalName();
            //Lấy loại file
            $file_type = $file->getMimeType();
            //Kích thước file với đơn vị byte
            $file_size = $file->getSize();
            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
                if($file_size <= 1048576){
                    $file_name = date('D-m-yyyy').'-'.rand().'-'.utf8tourl($file_name);
                    if($file->move('image/upload/product',$file_name)){
                        $data['image'] = $file_name;
                    }
                }else{
                    return back()->with('error','Bạn không thể upload ảnh quá 1mb');
                }
            }else{
                return back()->with('error','File bạn chọn không là hình ảnh');
            }
        }else{
            $data['image'] = '';
        }
        Product::create($data);
        return redirect('admin/product/list')->with('thongbao','Add Product Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id_product)
    {
        $product = Product::find($id_product);
        return view('admin.pages.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id_product)
    {
        $product = Product::find($id_product);
        $data = $request->all();
        $data['slug_product'] = utf8tourl($request->name_product);
        if($request->hasFile('image')){
            $file = $request->image;
            //Lấy tên file
            $file_name = $file->getClientOriginalName();
            //Lấy loại file
            $file_type = $file->getMimeType();
            //Kích thước file với đơn vị byte
            $file_size = $file->getSize();
            $file_path = 'image/upload/product/';

            if($file_type == 'image/png' || $file_type == 'image/jpg' || $file_type == 'image/jpeg' || $file_type == 'image/gif'){
                if($file_size <= 1048576){
                    $file_name = date('D-m-yyyy').'-'.rand().'-'.utf8tourl($file_name);
                    if($file->move($file_path,$file_name)){
                        if(File::exists($file_path.$product->image)){
                            unlink($file_path.$product->image);
                        }
                        $data['image'] = $file_name;
                    }
                }else{
                    return back()->with('error','Bạn không thể upload ảnh quá 1mb');
                }
            }else{
                return back()->with('error','File bạn chọn không là hình ảnh');
            }
        }
        else{
            $data['image'] = $product->image;
        }
        if ($product->update($data)) {
            return redirect('admin/product/list')->with('message', 'Edit Product Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
        $file_path = 'image/upload/product/';
        $product = Product::find($id_product);
        if(File::exists($file_path.$product->image)){
            unlink($file_path.$product->image);
        }
        $product->delete();
        return redirect('admin/product/list')->with('message', 'Delete product success');
    }
}
