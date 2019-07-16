@extends('admin.layout.master')
@section('title')
    Edit Product Type
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product Type
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="admin/product-type/update/{{$product_type->id}}" method="POST">
                @csrf
{{--                <input type="hidden" name="id" value="{{$product_type->id}}">--}}
                <div class="form-group">
                    <label>Product Type Name</label>
                    <input class="form-control" name="name_product_type" placeholder="Please Enter Product Type Name" value="{{$product_type->name_product_type}}">
                    @if($errors->has('name_product_type'))
                        <div class="alert alert-danger">{{$errors->first('name_product_type')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Product Type Status</label>
                    <select class="form-control" name="status_product_type">
                        @if($product_type['status_product_type'] == 1)
                            <option selected value="{{$product_type['status_product_type']}}">Display</option>
                            <option value="0">Not display</option>
                        @else
                            <option selected value="{{$product_type['status_product_type']}}">Not display</option>
                            <option value="1">Display</option>
                        @endif
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>

            </form></div>
    </div>
    <!-- /.row -->
@endsection