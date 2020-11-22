@extends('admin.layouts.master')

@section('title')

<title>Trang chu</title>

@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', ['name' => 'Category', 'key' => 'List'])


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <a href="{{route('admin.categories.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Ten danh muc</th>
                            <th>Title Seo</th>
                            <th>Trang thai</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($categories))
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->title_seo}}</td>
                                    <td>
                                        <a href="" class="badge badge-{{$category->getStatus($category->active)['class']}}">{{$category->getStatus($category->active)['name']}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.categories.edit', ['id' => $category->id])}}"><i class="far fa-edit text-info mr-2"></i></a>
                                        <a href="{{route('admin.categories.action', ['delete','id' => $category->id])}}"><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                          @endif
                                              
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $categories->links() }}
                </div>
              
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection