@extends('admin.layout.master')
@section('title')
    Add category
@endsection
@section('content')
    <div class="row">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="admin/category/add" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="name_category" placeholder="Please Enter Category Name">
                        @if($errors->has('name_category'))
                            <div class="alert alert-danger">{{$errors->first('name_category')}}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Category Status</label>
                        <label class="radio-inline">
                            <input name="status_category" value="1" checked="" type="radio">Display
                        </label>
                        <label class="radio-inline">
                            <input name="status_category" value="0" type="radio">Not display
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>

                </form></div>
        </div>
    </div>
    <!-- /.row -->
@endsection