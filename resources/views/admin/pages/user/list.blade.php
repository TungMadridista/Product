@extends('admin.layout.master')
@section('title')
    List User
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">User
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Level</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
            </thead>
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <tbody>
            @if($user)
                @foreach($user as $key => $value)
                    <tr class="odd gradeX" align="center">
                        <td>{{$key+1}}</td>
                        <td>{{$value['username']}}</td>
                        <td>{{$value['password']}}</td>
                        <td>{{$value['email']}}</td>
                        <td>{{$value['level']}}</td>
                        <td class="center"><a href="admin/user/edit/{{$value->id}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td class="center"><a href="admin/user/delete/{{$value->id}}" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="pull-right">{{$user->links()}}</div>
    </div>
@endsection <!--(3)-->
