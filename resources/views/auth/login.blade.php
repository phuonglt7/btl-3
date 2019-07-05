@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
        <div class="content-login">
            @include('layouts.announce')
            <div class = "header">
                Login
            </div>
            <div class="content">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="row-1">
                        <input type = "text" name = "username" size="30" placeholder="username" />
                        <input type="password" name ="password" size="30" placeholder="password">
                    </div>
                    <div class="row-2">
                        <input type="submit" value= "Login">
                        <input type="reset" value="Reset">
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" > Quên mật khẩu </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
