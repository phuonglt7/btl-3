@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
        <div class="content-login">
            @include('layouts.announce')
            <div class = "header">
                Thêm Tài Khoản
            </div>
            <div class="content">
                <form action="{{ route('user.store') }}" method="POST" role="form" id="formUser">
                    @csrf
                    <div class="row-1">
                        <label for="username">Username:</label>
                        <input type = "text" name = "username" size="30" placeholder="Username" />
                        <label for="email"> email:</label>
                        <input type = "email" name = "email" size="30" placeholder="email" />
                    </div>
                    <div class="row-2">
                        <input type="submit" value= "Thêm Tài Khoản">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('users.jquery')
@endsection
