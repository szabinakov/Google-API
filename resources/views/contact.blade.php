@extends('layout')

@section('content')
<form action="/contact" method="POST" id="location-form" class="form-group">
    @csrf
    {{session('mssg')}}
    <label for="name">Name:</label>
    <input name="name" type="text" id="name" placeholder="Type your name..." />
    <label for="email">Email:</label>
    <input name="email" type="text" id="email" placeholder="Type your email..." />
    <label for="subject">Subject:</label>
    <input name="subject" type="text" id="subject"/>
    <label for="message">Message:</label>
    <textarea name="message" type="text" id="message"></textarea>
    <button type="submit">Send</button>
</form>

@endsection