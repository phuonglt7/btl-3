@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
     <a href="{{ route('history.create') }}">
        <button type="button" data-toggle="modal" data-target="#add-item" class="btn btn-primary add-item">  <span class="glyphicon glyphicon-edit"></span> Thêm nhập xuất </button>
    </a>
    <h3> Danh sách sản phẩm</h3>
    @include('layouts.announce')
    <table class="table-list" id="table">
        <thead>
            <tr>
                <th class="text-center"> product </th>
                <th class="text-center"> amount</th>
                <th class="text-center"> storehouse</th>
                <th class="text-center"> Type </th>
            </tr>
        </thead>
        @foreach($history as $key=>$item)
        <tr>
            @foreach ($productList as $p)
            @if ($p->id == $item->product_id)
                <td > {{ $p->product_name }} </td>
            @endif
            @endforeach

            <td> {{ $item->amount }} </td>

            @foreach($storeList as $s)
            @if ($s->id == $item->store_id)
                <td> {{ $s->store_name }} </td>
            @endif
            @endforeach

            @if ($item->type == 1)
                <td> Nhập </td>
            @else
                <td> XUất </td>
            @endif
        </tr>
        @endforeach
    </table>
    {{ $history->links() }}
</div>
</div>
@endsection