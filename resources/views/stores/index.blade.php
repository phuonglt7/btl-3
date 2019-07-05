@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
        <a href="{{ route('store.create') }}"><button type="button" data-toggle="modal" data-target="#add-item" class="btn btn-primary add-item">  <span class="glyphicon glyphicon-edit"></span> Thêm kho </button></a>
        @include('layouts.announce')
        <table class="table-list" id="table">
            <thead>
                <tr>
                    <th class="text-center"> Tên kho </th>
                    <th class="text-center"> Quản lý </th>
                    <th> Thuc hien </th>
                </tr>
            </thead>
            @foreach($store as $item)
            <tr>
                <td>{{ $item->store_name }}</td>
                <td>
                    @foreach($userList as $user)
                    @if($user->id == $item->user_id)
                    {{ $user->username }}
                    @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('store.edit', $item->id) }}">
                        <button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $store->links() }}
    </div>
</div>
@endsection