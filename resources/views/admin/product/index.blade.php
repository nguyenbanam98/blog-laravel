@extends('admin.layouts.master')

@section('title')

<title>Trang chu</title>

@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', ['name' => 'Product', 'key' => 'List'])


    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" style="font-size: 14px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <form class="form-inline">
                        <div class="form-group" style="margin-top: 10px">
                            <form class="form-inline my-2 my-lg-0">
                                <input class="form-control mr-sm-2" name="name" value="{{ \Request::get('name') }}" type="search" placeholder="Search" aria-label="Search">
                                <select class="form-control mr-2" id="loai_san_pham" name="cate">
                                    <option value="">---Chon loai san pham---</option>
                                    @if($categories)
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ \Request::get('cate') == $category->id ? 'selected' : ''}}>{{$category->name}}</option> 
                                            
                                        @endforeach
                                    @endif
                                </select>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                            </form>

                        </div>
                     </form>
                </div>
                <div class="col-md-4">
                    <a href="{{route('admin.products.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                          <tr>      
                            <th>#</th>
                            <th>San pham</th>
                            <th>Gia</th>
                            <th>Gia khuyen mai</th>
                            <th>Danh muc</th>
                            <th>Trang thai</th>
                            <th>Nổi bật</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if(isset($products))
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>
                                        <span>{{number_format($product->price)}} vnd</span>
                                    </td>
                                    <td>
                                        <span>{{$product->sale}} %</span>
                                    </td>
                                    <td>{{$product->category->name}}</td>
                                    <td>
                                        <a href="{{route('admin.products.action', ['active','id' => $product->id])}}" class="badge badge-{{$product->getStatus($product->active)['class']}}">{{$product->getStatus($product->active)['name']}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.products.action', ['hot','id' => $product->id])}}" class="badge badge-{{$product->getHot($product->hot)['class']}}">{{$product->getHot($product->hot)['name']}}</a>
                                    </td>
                                    <td>
                                        <a href="{{route('admin.products.edit', ['id' => $product->id])}}"><i class="far fa-edit text-info mr-2"></i></a>
                                        <a href="{{route('admin.products.action', ['delete','id' => $product->id])}}"><i class="fas fa-trash-alt text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                          @endif
                                              
                        </tbody>
                      </table>
                </div>
                <div class="col-md-12">
                    {{-- {{ $products->links() }} --}}
                </div>
              
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection