@extends('layouts.main')
@section('title', 'Регистрация')
@section('content')
    <form action="{{route('user.store')}}" method="post">
        <label for="name">Введите имя:</label>
        <input type="text" name="name" placeholder="Введите имя">
        <br>
        <label for="email">Введите email:</label>
        <input type="email" name="email" placeholder="email@mail.ru">
        <br>
        <label for="password">Введите пароль:</label>
        <input type="password" name="password" >
    </form>
@endsection
