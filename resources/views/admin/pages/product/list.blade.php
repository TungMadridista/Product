@extends('admin.layout.master')
@section('title')
    List Product
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>
            <tr align="center">
                <th>ID</th>
                <th>Name Product</th>
                <th>Slug_Name</th>
                <th>Category Name</th>
                <th>Product Type Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            @if(Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
            <tbody>
            @if($product)
                @foreach($product as $key => $value)
                    <tr class="odd gradeX" align="center">
                        <td>{{$key+1}}</td>
                        <td>{{$value['name_product']}}</td>
                        <td>{{$value['slug_product']}}</td>
                        <td>{{$value->categories->name_category}}</td>
                        <td>{{$value->product_types->name_product_type}}</td>
                        <td>{{$value['price']}}</td>
                        <td>
                            <img style="width: 100px; height: 100px; -webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px;" src="image/upload/product/{{$value['image']}}" alt="">
                        </td>
                        <td>{{$value['description']}}</td>
                        <td>
                            @if($value['status_product'] == 1)
                                Display
                            @else
                                Not display
                            @endif
                        </td>
                        <td class="center"><a href="admin/product/edit/{{$value->id}}" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td class="center"><a href="admin/product/delete/{{$value->id}}" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="pull-right">{{$product->links()}}</div>
    </div>
@endsection <!--(3)-->