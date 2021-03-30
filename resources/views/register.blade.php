@extends('layout')

@section('content')
    {{session('mssg')}}
    <form method="POST" action="/" id="location-form" class="form-group">
        @csrf
        <label>Name:</label>
            <input name="name" type="text" id="name" placeholder="Type name..." />
        <label>Email:</label>
            <input name="email" type="text" id="email" placeholder="Type email..." />
            <p class="error-msg">{{ $errors->first('email')}}</p>
        <label>Postcode:</label>
            <input name="postcode" type="text" id="postcode" placeholder="Type postcode..." />
        <label>Password:</label>
            <input name="password" type="password" id="password" placeholder="Type password..." />
        <label>Confirm Password:</label>
            <input name="password_confirmation" type="password" id="password_confirmation" placeholder="Type password again..." />
            <p class="error-msg">{{ $errors->first('password')}}</p>
        <div class="terms-container">
            <input class="terms-checkbox" type="checkbox" name="terms" id="terms" onchange="activateButton(this)">
            <p class="terms-text">Click here to indicate that you have read and agree to the terms of the <a href="#">App</a></p>
        </div>
        <button id="submit" type="submit" disabled="disabled">Register</button>
        <p>Click <a href="/login">here</a> to login!</p>
    </form>

    <script>
        function activateButton(element) {
            if(element.checked) {
               document.getElementById("submit").disabled = false;
            }
            else  {
               document.getElementById("submit").disabled = true;
            }
        }
       </script>
@endsection