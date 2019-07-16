@extends('admin.layout.master')
@section('title')
    List category
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name</th>
                <th>Slug_Name</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <tbody>
            @if($category)
                @foreach($category as $key => $value)
                    <tr class="odd gradeX" align="center">
                        <td>{{$key+1}}</td>
                        <td>{{$value['name_category']}}</td>
                        <td>{{$value['slug_category']}}</td>
                        <td>
                            @if($value['status_category'] == 1)
                                Display
                            @else
                                Not display
                            @endif
                        </td>
                        <td class="center"><a href="admin/category/edit/{{$value->id}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td class="center"><a href="admin/category/delete/{{$value->id}}" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="pull-right">{{$category->links()}}</div>
    </div>
@endsection <!--(3)-->