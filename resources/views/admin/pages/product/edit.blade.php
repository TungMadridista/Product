@extends('admin.layout.master')
@section('title')
    Edit Product
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="admin/product/update/{{$product->id}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="form-group">
                    <label>Product Name</label>
                    <input class="form-control" name="name_product" placeholder="Please Enter Product Type Name" value="{{$product->name_product}}">
                    @if($errors->has('name_product'))
                        <div class="alert alert-danger">{{$errors->first('name_product')}}</div>
                    @endif
                </div>
                <input type="hidden" name="id" value="{{$product->id}}">
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" name="price" placeholder="Please Enter Product Type Name"  value="{{$product->price}}">
                    @if($errors->has('price'))
                        <div class="alert alert-danger">{{$errors->first('price')}}</div>
                    @endif
                </div>
                <div class="form-group" >
                    <label>Image</label>
                    <img src="image/upload/product/{{$product->image}}" alt="{{$product->image}}" style="width: 100px; height: 100px;">
                    <input type="file" class="form-control" name="image" placeholder="Please Enter Product Type Name" value="">
                    @if($errors->has('image'))
                        <div class="alert alert-danger">{{$errors->first('image')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Product Status</label>
                    <select class="form-control" name="status_product">
                        @if($product['status_product'] == 1)
                            <option selected value="{{$product['status_product']}}">Display</option>
                            <option value="0">Not display</option>
                        @else
                            <option selected value="{{$product['status_product']}}">Not display</option>
                            <option value="1">Display</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>

            </form></div>
    </div>
@endsection