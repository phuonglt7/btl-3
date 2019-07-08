@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
       <a href="{{ route('history.create') }}">
        <button type="button" data-toggle="modal" data-target="#add-item" class="btn btn-primary add-item">  <span class="glyphicon glyphicon-edit"></span> Thêm nhập xuất </button>
    </a>
    <h3> Danh sách nhập xuất trong các kho </h3>
    @include('layouts.announce')
    @foreach($store as $key=>$item)
    <a href ="{{ route('history.show', $item->id) }}"><button  class="btn-menu btn-info export">{{ $item->store_name }}</button></a>
    @endforeach
</div>
</div>
@endsection