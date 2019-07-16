@extends('admin.layout.master')
@section('title')
    Add Product Type
@endsection
@section('content')
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product Type
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/product-type/add" method="POST">
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
                        <label>Product Type Name</label>
                        <input class="form-control" name="name_product_type" placeholder="Please Enter Product Type Name">
                        @if($errors->has('name_product_type'))
                            <div class="alert alert-danger">{{$errors->first('name_product_type')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Product Type Status</label>
                        <label class="radio-inline">
                            <input name="status_product_type" value="1" checked="" type="radio">Display
                        </label>
                        <label class="radio-inline">
                            <input name="status_product_type" value="0" type="radio">Not display
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>

                </form></div>
        </div>
    </div>
    <!-- /.row -->
@endsection