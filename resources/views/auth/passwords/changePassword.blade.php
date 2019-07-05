@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
        <div class="content-login">
            @include('layouts.announce')
            <div class = "header">
                Đổi mật khẩu
            </div>
            <div class="content">
                <form action="{{ route('user.post-change-password') }}" method="POST" id="formChangPass">
                    @csrf
                    <div class="row-1">
                        <input type = "password" name = "password_old" size="30" placeholder="Mật khẩu cũ"/>
                        <input type = "password" name = "password" size="30" placeholder="Mật khẩu mới" />
                        <input type="password" name ="password_confirm" size="30" placeholder="Nhập lại mật khẩu mới">
                        @if (Auth::user()->email)
                        @else
                        <input type="email" name ="email" size="30" placeholder="Nhập email">
                        @endif
                    </div>
                    <div class="row-2">
                        <input type="submit" value= "Đổi mật khẩu">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
