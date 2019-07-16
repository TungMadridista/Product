@extends('admin.layout.master')
@section('title')
    Edit User
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>Edit</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="admin/user/update/{{$user->id}}" method="POST">
                @csrf
                <input class="form-control" name="id" value="{{$user->id}}" />
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" value="{{$user->username}}" />
                    @if($errors->has('username'))
                        <div class="alert alert-danger">{{$errors->first('username')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Please Enter Password"
                           value="{{$user->password}}"/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{{$user->email}}"/>
                </div>

                <button type="submit" class="btn btn-default">Update</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
    <!-- /.row -->
@endsection