@extends('layouts.master')

@section('content')

<div class="features_items">
    <h2 class="title text-center">{{$brand->name}}</h2>
    @foreach($products as $product)
        
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <a href="{{route('get.product.detail', ['id' => $product->id])}}">
                                <img src="{{config('app.base_url') . $product->img_path}}" alt="" />
                                <h2>{{ number_format($product->price) }} VNĐ</h2>
                                <p>{{$product->name}}</p>
                            </a>
                            
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        {{-- <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{ number_format($product->price) }} VNĐ</h2>
                                <p>{{$product->name}}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div> --}}
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="{{route('get.product.detail', ['id' => $product->id])}}"><i class="fa fa-plus-square"></i>chi tiết</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>

    @endforeach

</div>

@endsection