@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
        <div class="content-login">
            @include('layouts.announce')
            <div class = "header">
                Sửa kho
            </div>
            <div class="content">
                <form action="{{ route('store.update', $store->id) }}" method="post" role="form" id="formStore">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row-1">
                        <label for="store_name">Tên kho:</label>
                        <input type = "text" name = "store_name" size="30" placeholder="Tên kho" value="{{ $store->store_name }}" />
                        <label for="user_id"> Người quản lý:</label>
                        <select name = "user_id">
                            @foreach($userList as $dataUser)
                                @if ($store->user_id == $dataUser->id)
                                    <option value="{{ $dataUser->id }}" selected> {{ $dataUser->username }} </option>
                                @else
                                    <option value="{{ $dataUser->id }}"> {{ $dataUser->username }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="row-2">
                        <input type="submit" value= "Sửa Kho">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
