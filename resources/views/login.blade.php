@extends('layout')

@section('content')
    <form action="/login" method="POST" id="location-form" class="form-group">
        @csrf
        <label>Email:</label>
        <input name="email" type="text" id="email" placeholder="Type email..." />
        <label>Password:</label>
        <input name="password" type="password" id="password" placeholder="Type password..." />
        <button type="submit">Login</button>
        <p>Click <a href="/register">here</a> to register!</p>
    </form>
@endsection