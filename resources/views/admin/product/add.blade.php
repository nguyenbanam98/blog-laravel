@extends('admin.layouts.master')

@section('title')

<title>Trang chu</title>

@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.content-header', ['name' => 'Product', 'key' => 'Add'])

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
           <div class="row">
            <div class="container">
                <div class="col-md-12">
                <form action="{{route('admin.products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        @include('admin.product.form')
                     
                        <button type="submit" class="btn btn-primary">Them</button>
                        </form>
                </div>
            </div>
     
           </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection