@extends('admin.layout.master')
@section('title')
    Add User
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>Add</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="admin/user/add" method="POST">
                @csrf
                <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" placeholder="Please Enter Username" value="{!! old('username') !!}" />
                    @if($errors->has('username'))
                        <div class="alert alert-danger">{{$errors->first('username')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Please Enter Password" value="{!! old('password') !!}" />
                    @if($errors->has('password'))
                        <div class="alert alert-danger">{{$errors->first('password')}}</div>
                    @endif
                </div>
{{--                <div class="form-group">--}}
{{--                    <label>RePassword</label>--}}
{{--                    <input type="password" class="form-control" name="rePassword" placeholder="Please Enter RePassword" value="{!! old('rePassword') !!}" />--}}
{{--                    @if($errors->has('rePassword'))--}}
{{--                        <div class="alert alert-danger">{{$errors->first('rePassword')}}</div>--}}
{{--                    @endif--}}
{{--                </div>--}}
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Please Enter Email" value="{!! old('email') !!}" />
                    @if($errors->has('email'))
                        <div class="alert alert-danger">{{$errors->first('email')}}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <select name="role" class="form-control">
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-default">Add</button>
                <button type="reset" class="btn btn-default">Reset</button>
                <form>
        </div>
    </div>
    <!-- /.row -->
@endsection
