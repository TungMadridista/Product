@extends('admin.layout.master')
@section('title')
    Add Product
@endsection
@section('content')
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/product/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="id_category">
                            @if($category)
                                @foreach($category as $type)
                                    <option value="{{$type->id}}">{{$type->name_category}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Type</label>
                        <select class="form-control" name="id_product_type">
                            @if($product_type)
                                @foreach($product_type as $type)
                                    <option value="{{$type->id}}">{{$type->name_product_type}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" name="name_product" placeholder="Please Enter Product Name">
                        @if($errors->has('name_product'))
                            <div class="alert alert-danger">{{$errors->first('name_product')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="image" class="form-control">
                        @if($errors->has('image'))
                            <div class="alert alert-danger">{{$errors->first('image')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" name="price" placeholder="Please Enter Price Name">
                        @if($errors->has('price'))
                            <div class="alert alert-danger">{{$errors->first('price')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input class="form-control" name="description" row="3" placeholder="Please Enter Description Name">
                    </div>
                    <div class="form-group">
                        <label>Product Status</label>
                        <label class="radio-inline">
                            <input name="status_product" value="1" checked="" type="radio">Display
                        </label>
                        <label class="radio-inline">
                            <input name="status_product" value="0" type="radio">Not display
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>

                </form></div>
        </div>
    </div>
    <!-- /.row -->
@endsection