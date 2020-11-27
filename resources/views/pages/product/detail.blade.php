@extends('layouts.master')

@section('content')

<!--product-detai-->

@include('pages.product.components.detail')

<!--category-tab-->
@include('pages.product.components.tab')


@include('pages.product.components.recommended')

<!--/recommended_items-->
@endsection