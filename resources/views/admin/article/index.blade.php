@extends('admin.layouts.master')

@section('title')

<title>Trang chu</title>

@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', ['name' => 'Article', 'key' => 'List'])


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" style="font-size: 14px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <a href="{{route('admin.articles.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Bai viet</th>
                            <th>Mo ta</th>
                            <th>Trang thai</th>
                            <th>Ngay tao</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                         
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td>{{$article->name}}</td>
                                    <td scope="row">{{$article->description}}</td>
                                    <td>
                                        <a href="{{route('admin.articles.action', ['active','id' => $article->id])}}" class="badge badge-{{$article->getStatus($article->active)['class']}}">{{$article->getStatus($article->active)['name']}}</a>
                                    </td>
                                    <td>{{$article->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.articles.edit', ['id' => $article->id])}}"><i class="far fa-edit text-info mr-2"></i></a>
                                        <a href="{{route('admin.articles.action', ['delete','id' => $article->id])}}"><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                       
                                              
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{ $articles->links() }}
                </div>
              
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection