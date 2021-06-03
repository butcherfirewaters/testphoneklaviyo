@extends('layouts.master')

@section('adminPanel')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
<div class="container">
    <h1 style="text-align: center"><a href="{{route('admin.index')}}">Admin panel</a></h1>
    <div class="row">
        <div class="col-sm">
            <a href="{{route('contacts.create')}}" class="btn btn-success">Добавить контакт</a>
        </div>
        <div class="col-sm">
            <form action="{{route('admin.sendToKlavio')}}" method="post">
                @csrf
                <button class="btn btn-info">Сделать синхронизацию</button>
            </form>
        </div>
        <div class="col-sm">
            <a href="{{route('logout')}}" class="btn btn-danger">Выйти из системы</a>
        </div>
    </div>
</div>
    @if(isset($contacts))
        <div class="container" style="margin: 20px auto">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">created_at</th>
                    <th scope="col">updated_at</th>
                </tr>
                </thead>
                <tbody>
                @foreach($contacts as $contact)

                <tr>
                    <th scope="row">{{$contact->id}}</th>
                    <td>{{$contact->first_name}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->created_at}}</td>
                    <td>{{$contact->updated_at}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection
