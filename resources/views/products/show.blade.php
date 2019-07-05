@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
     <a href="{{ route('product.create') }}">
        <button type="button" class="btn btn-submit"> Thêm sản phẩm </button>
    </a>
    <form method="POST" action="{{ route('user.reset-password') }}">
        @csrf
        <h3> Danh sách sản phẩm mã {{$id}} </h3>
        <table class="table-list" id="table">
            <thead>
                <tr>
                    <th class="text-center"> số lượng</th>
                    <th class="text-center"> Kho</th>
                </tr>
            </thead>
            @foreach($product_store as $dataPS)
            <tr>
                <td>{{ $dataPS->amount }}</td>
                <td>{{ $dataPS->store_id }}</td>
            </tr>
            @endforeach
        </table>
    </form>
</div>
</div>
@endsection