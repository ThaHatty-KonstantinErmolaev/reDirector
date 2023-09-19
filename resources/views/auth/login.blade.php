@extends('layouts.main')
@section('title', 'Вход')
@section('content')
    <form action="{{route('auth')}}" method="post">
        <label for="email">Логин:</label>
        <input type="email" name="email">
        <br>
        <label for="password">Пароль:</label>
        <input type="password" name="password">
    </form>
@endsection
