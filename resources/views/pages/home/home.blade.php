@extends('layouts.master')

@section('content')
    <!--features_items-->
    @include('pages.home.components.features-item')

    <!--category-tab-->
    {{-- @include('pages.home.components.category-tab') --}}

    <!--recommended_items-->
    @include('pages.home.components.recommended')
@endsection
