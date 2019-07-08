@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
       <a href="{{ route('product.create') }}">
        <button type="button" data-toggle="modal" data-target="#add-item" class="btn btn-primary add-item">  <span class="glyphicon glyphicon-edit"></span> Thêm sản phẩm </button>
    </a>
    <h3> Danh sách sản phẩm</h3>
    @include('layouts.announce')
    <table class="table-list" align='center' cellspacing=2 cellpadding=5 id="data_table" border=1 id="table">
        <thead>
            <tr>
                <th style="display:none"> id</th>
                <th class="text-center"> product_name </th>
            </tr>
        </thead>
        @foreach($product as $item)
        <tr id="row{{ $item->id }}">
              <td style="display:none"> {{ $item->id }}d</td>
            <td >{{ $item->product_name }} </td>
            <!-- <td>
                <table table-list align='center' cellspacing=2 cellpadding=5  border=1>
                    <thead>
                        <tr>
                            <th style="display:none"> id </th>
                            <th class="text-center"> amount</th>
                            <th>store</th>

                        </tr>
                    </thead>
                    @foreach($productStoreList as $st)
                    <tr >
                        <td style="display:none"> id </td>
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
            </td> -->
        </tr>
        @endforeach
    </table>
    {{ $product->links() }}
</div>
</div>
</script>
    <script src="{{ asset('js/jquery.tabledit.min.js') }}"></script>
     <script src="{{ asset('js/jquery.min.js') }}"></script>

<script>
        $('#table').Tabledit({
        url: 'demos.php',
        eventType: 'dblclick',
        editButton: true,
        deleteButton: true,
        hideIdentifier: false,
        saveButton: false,
        autoFocus: false,
        restoreButton: false,
        rowIdentifier: 'id',
        buttons: {
            edit: {
                class: 'btn btn-sm btn-warning',
                html: '<span class="glyphicon glyphicon-pencil"></span> &nbsp EDIT',
                action: 'edit'
            },
            delete: {
                class: 'btn btn-sm btn-danger',
                html: '<span class="glyphicon glyphicon-trash"></span> &nbsp TRASH',
                action: 'delete'
            },
            save: {
                class: 'btn btn-sm btn-success',
                html: 'Save'
            },
            restore: {
                class: 'btn btn-sm btn-warning',
                html: 'Restore',
                action: 'restore'
            },
            confirm: {
                class: 'btn btn-sm btn-default',
                html: 'Are you sure?'
            }
        },
        columns: {
            identifier: [0, 'id'],
            editable: [[1, 'product_name']]

        }
    });
    /*$('#table').Tabledit({
        url: 'product.update',
        columns: {
            identifier: [0, 'id'],
            editable: [[1, 'product_name']]
        },
        onDraw: function() {
            console.log('onDraw()');
        },
        onSuccess: function(data, textStatus, jqXHR) {
            console.log('onSuccess(data, textStatus, jqXHR)');
            console.log(data);
            console.log(textStatus);
            console.log(jqXHR);
        },
        onFail: function(jqXHR, textStatus, errorThrown) {
            console.log('onFail(jqXHR, textStatus, errorThrown)');
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        },
        onAlways: function() {
            console.log('onAlways()');
        },
        onAjax: function(action, serialize) {
            console.log('onAjax(action, serialize)');
            console.log(action);
            console.log(serialize);
        }
    });*/
    </script>
@endsection