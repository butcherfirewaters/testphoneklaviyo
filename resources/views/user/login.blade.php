@extends('layouts.master')

@section('content')
    <div class="col-12">


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
    </div>
    <form method="post" action="{{route('login')}}">
        @csrf
        <h1>Авторизация на сайте</h1> <br>
        <h2><a href="{{route('register.create')}}">Регистрация, если нет аккаунта</a></h2>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer02">Email</label>
                <input type="email" name="email" class="form-control" id="validationServer02" value="{{old('email')}}" required>

            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer03">Password</label>
                <input type="password" name="password" class="form-control" id="validationServer03"  required>

            </div>
        </div>

        <button class="btn btn-primary" type="submit">Авторизация</button>
    </form>
@endsection
