@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
        <a href="{{ route('user.create') }}">
            <button type="button" data-toggle="modal" data-target="#add-item" class="btn btn-primary add-item">  <span class="glyphicon glyphicon-edit"></span> Thêm tài khoản </button>
        </a>
        @if ($users)
            <div class="export">
                <a href ="{{ route('exportHistory') }}"><button  class="btn-info export" id="export-button">Export file</button></a>
            </div>
        @endif

    @include('layouts.announce')
    <form method="POST" action="{{ route('user.reset-password') }}">
        @csrf
        <h3> Danh sách tài khoản</h3>
        <button type="submit" class="btn btn-submit"> Reset Password </button>
        <table class="table-list" id="table">
            <thead>
                <tr>
                    <th> Check </th>
                    <th class="text-center"> STT </th>
                    <th class="text-center"> username </th>
                    <th class="text-center"> email </th>
                </tr>
            </thead>
            @foreach($users as $key=>$item)
            <tr >
                <td><input type="checkbox" name="reset[]" value="{{ $item->id }}"></td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->email }}</td>
            </tr>
            @endforeach
        </table>
    </form>
    {{ $users->links() }}
</div>
</div>
@endsection