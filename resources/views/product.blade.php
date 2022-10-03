<!DOCTYPE html>
{{--@extends('navbar')--}}
{{--@section('main_content')--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
@extends('navbar')
@section('main_content')
<div class="container">
    @if(session('satus'))
        {{session('status')}}
    @endif
        <div class="row mt-3">
            <div class="col-12">
                <label>NAME:</label>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <input type="text" name="product_name"  class="form-control" value="{{$product->product_name}}" >
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <input type="file" placeholder="Image" name="image">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label>PRICE:</label>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <input type="text" name="price" class="form-control" value="{{$product->price}}">
            </div>
        </div>

        <a href="{{route('edit',['product'=>$product->id])}}" class="btn btn-warning">Edit</a>
        <a href="{{route('delete',['product'=>$product->id])}}" class="btn btn-warning">Delete</a>
        <a href="{{route('buy',['product'=>$product->id])}}" class="btn btn-warning">Buy</a>
</div>
@endsection
</body>
</html>
