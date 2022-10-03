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
    <div  style="margin-top:100px; margin-bottom:20px; margin-right:100px; margin-left:100px;align-content: center;">
        <h1> <strong> WELCOME TO ART SHOP!</strong> </h1>
        <p></p>
    </div>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="https://ocnreo.stripocdn.email/content/guids/CABINET_ee05216a5198d13ac4baca5578ec2b13/images/44321.jpg" class="d-block w-100" alt="..." width="750" height="600">
                <div class="carousel-caption d-none d-md-block">
                    <h5>художественные товары по скидке!</h5>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="https://www.hobbycraft.co.uk/dw/image/v2/BHCG_PRD/on/demandware.static/-/Library-Sites-hobbycraft-uk-content/default/dw13568c12/images/clp/art-supplies/2022/03/2880x930-art-main-banner-lg-canvas-shop.jpg?sw=1600&q=90" class="d-block w-100" alt="" width="750" height="600">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Art shop</h5>
                    <p></p>
                </div>
            </div>
            <!-- <div class="carousel-item">
               <img src="https://ocnreo.stripocdn.email/content/guids/CABINET_e3e7ab49bc6d30917fc44170177de42e/images/penalwnban2021news.jpg" class="d-block w-100" alt="..." width="750" height="600">
               <div class="carousel-caption d-none d-md-block">
               <h5>Third slide label</h5>
               <p>Some representative placeholder content for the third slide.</p>
               </div>
            </div> -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div align="center" style="margin-top:100px; margin-bottom:20px; margin-right:100px; margin-left:100px;">
        <h1> Скидки и акции!</h1>
        <p></p>
    </div>

    <div  style="margin:150px; margin-top:50px;">
    @if(session('satus'))
        {{session('status')}}
    @endif
        <div class="row">
        @foreach($products as $product)
            <div class="card" style="width: 18rem;">
                <img src="/storage/{{$product->image}}" alt="image" style="max-width: 300px">
                <div class="card-body">
            <h5 class="card-title"><a href="{{route('product',['product'=>$product->id])}}">{{$product->product_name}}</a> </h5>
               <p class="card-text">{{$product->price}}</p>
            <br>
            <span>{{$product->category->name}}</span>
                    <br>
                 <a href="" class="btn btn-warning">Buy</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
{{--@endsection--}}
</body>
</html>
