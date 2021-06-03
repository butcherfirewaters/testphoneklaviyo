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
    </div>
    <form method="post" action="{{route('register.store')}}">
        @csrf
        <h1>Регистрация на сайте</h1> <br>
        <h2><a href="{{route('login.create')}}">Авторизация, если есть аккаунт</a></h2>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">First name</label>
                <input type="text" name="name" class="form-control" id="validationServer01" value="{{old('name')}}" required>

            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer02">Email</label>
                <input type="email" name="email" class="form-control" id="validationServer02" value="{{old('email')}}" required>

            </div>
        </div>
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer03">Password</label>
                <input type="password" name="password" class="form-control" id="validationServer03"  required>

            </div>
            <div class="col-md-6 mb-3">
                <label for="validationServer04">Repeat Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="validationServer03" required>

            </div>

        </div>
        <button class="btn btn-primary" type="submit">Зарегистрироваться</button>
    </form>
@endsection
