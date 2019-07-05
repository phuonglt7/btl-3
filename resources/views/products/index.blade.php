@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
       <a href="{{ route('product.create') }}">
        <button type="button" data-toggle="modal" data-target="#add-item" class="btn btn-primary add-item">  <span class="glyphicon glyphicon-edit"></span> Thêm sản phẩm </button>
    </a>
    <h3> Danh sách sản phẩm</h3>
    @include('layouts.announce')
    <table class="table-list" align='center' cellspacing=2 cellpadding=5 id="data_table" border=1>
        <thead>
            <tr>
                <th class="text-center"> product_name </th>
                <th></th>

            </tr>
        </thead>
        @foreach($product as $item)
        <tr id="row{{ $item->id }}">
            <td >{{ $item->product_name }} </td>
            <td>
                <table table-list align='center' cellspacing=2 cellpadding=5  border=1>
                    <thead>
                        <tr>
                            <th class="text-center"> amount</th>
                            <th>store</th>

                        </tr>
                    </thead>
                    @foreach($productStoreList as $st)
                    <tr >
                        <td> {{ $st->amount }} </td>
                        @foreach($storeList as $s)
                        @if($s->id == $st->store_id)
                        <td >{{ $s->store_name }} </td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                </table>
                {{ $productStoreList->links() }}
            </td>
        </tr>
        @endforeach
    </table>
    {{ $product->links() }}
</div>
</div>
</script>
@endsection