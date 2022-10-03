<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
@extends('navbar')
@section('main_content')
<div class="container">
    <form action="{{route('edit.save',['product'=>$product->id])}}" method="post" enctype="multipart/form-data" style="display: flex; flex-direction: column">
        @csrf
        <div class="row mt-3">
            <div class="col-12">
                <label>NAME :</label>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <input type="text" placeholder="Enter product name" name="product_name" value="{{$product->product_name}}">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label>PRICE :</label>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <input type="text" placeholder="Enter product price" name="price" value="{{$product->price}}">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label>IMG:</label>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <input type="file" placeholder="Image" name="image">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <label>CATEGORY:</label>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
        <select class="form-select" name="category_id">
            <option value="{{$product->category_id}}"></option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
            </div>
        </div>
        <button class="btn btn-warning">Add product</button>
    </form>
</div>
@endsection
</body>
</html>
