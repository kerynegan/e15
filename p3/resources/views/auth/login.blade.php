@extends('layouts/main')

@section('content')

    <h1 dusk='login-heading'>Login</h1>

    Don’t have an account? <a href='/register'>Register here...</a><br /><br />

    <form method='POST' action='/login'>

        {{ csrf_field() }}

        <label for='email'>E-Mail Address</label>
        <input id='login-email' type='email' dusk='login-email' name='email' value='{{ old('email') }}' autofocus>
        @include('includes.error-field', ['fieldName' => 'email'])<br />

        <label for='password'>Password</label>
        <input id='login-password' type='password' dusk='login-password' name='password'>
        @include('includes.error-field', ['fieldName' => 'password'])<br />

        <label>
            <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label><br />

        <button type='submit' dusk='login-button' class='btn btn-primary'>Login</button>

    </a>

    </form>

@endsection