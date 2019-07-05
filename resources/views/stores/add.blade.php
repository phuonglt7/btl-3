@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
        <div class="content-login">
            @include('layouts.announce')
            <div class = "header">
                Thêm kho
            </div>
            <div class="content">
                <form action="{{ route('store.store') }}" method="POST" role="form" id="formStore">
                    @csrf
                    <div class="row">
                        <div class="row-1">
                            <label for="store_name">Tên kho:</label>
                            <input type = "text" name = "store_name" size="30" placeholder="Tên kho" />
                        </div>
                        <div class="row-1">
                           <label for="user_id"> Người quản lý:</label>
                           <select name = "user_id">
                                <option value=""> -- Lựa chọn -- </option>
                                @foreach($userList as $dataUser)
                                <option value="{{ $dataUser->id }}"> {{ $dataUser->username }} </option>
                                @endforeach
                            </select>
                        </div>
                     </div>
                    <div class="row-2">
                        <input type="submit" value= "Thêm Kho">
                        <input type="reset" value="Reset">
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
@include('stores.jquery')
@endsection
