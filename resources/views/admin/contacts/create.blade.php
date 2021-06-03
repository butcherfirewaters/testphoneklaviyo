@extends('admin.index')

@section('content')

    <div class="col-12">
        <h3>Добавьте ваши контакты</h3>
    <form method="post" action="{{route('contacts.store')}}">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" value="{{old('first_name')}}" name="first_name" class="form-control" id="first_name" placeholder="Имя">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" value="{{old('email')}}" id="email" aria-describedby="emailHelp" placeholder="Email">
            <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" name="phone" value="{{old('phone')}}" class="form-control" id="phone">
        </div>

        <div class="form-group" style="display: none">

            <label for="disabledTextInput">Имя пользователя - {{   Auth::user()->name}}</label>
            <input type="text" name="user_id" value="{{Auth::id()}}" id="disabledTextInput" class="form-control" placeholder="Disabled input">

        </div>

        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
    </div>
@endsection
