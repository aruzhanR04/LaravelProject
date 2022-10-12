<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

</head>
<body>
@extends('navbar')
@section('main_content')
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto">
                @if(session('status'))
                    {{session('status')}}
                @endif
                <form action="{{route('user.create')}}" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>NAME:</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <input type="text" name="name" class="form-control" placeholder="Name:">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>EMAIL:</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <input type="text" name="email" class="form-control" placeholder="Email:">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>PASSWORD :</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <input type="password" name="password" class="form-control" placeholder="Password:">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <label>CONFIRM PASSWORD :</label>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Password:">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-success">Sign up</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
</body>
</html>
