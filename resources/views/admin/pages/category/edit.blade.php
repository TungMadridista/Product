@extends('admin.layout.master')
@section('title')
    Edit category
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="admin/category/update/{{$category->id}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" name="name_category" placeholder="Please Enter Category Name" value="{{$category->name_category}}">
                    @if($errors->has('name_category'))
                        <div class="alert alert-danger">{{$errors->first('name_category')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Category Status</label>
                    <select class="form-control" name="status_category">
                        @if($category['status_category'] == 1)
                            <option selected value="{{$category['status_category']}}">Display</option>
                            <option value="0">Not display</option>
                        @else
                            <option selected value="{{$category['status_category']}}">Not display</option>
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