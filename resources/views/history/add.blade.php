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
                <form action="{{ route('history.store') }}" method="POST" role="form" id="formHistory">
                    @csrf
                    <div class="row-1">
                        <label for="type"> Type </label>
                        <select name="type">
                            <option value=""> -- Lựa chọn -- </option>
                            <option value="1">Nhập</option>
                            <option value="2">Xuất</option>
                        </select>
                    </div>
                    <div id="dynamic">
                        <div class="row-1">
                            <label for="amount"> amount: </label>
                            <input type = "number" name = "amount[]" size="20" placeholder="amount">
                        </div>
                        <div class="row-1">
                            <label for="store"> Store</label>
                            <select name="store_id[]">
                                <option value=""> -- Lựa chọn -- </option>
                                @foreach ($storeList as $store)
                                <option value="{{ $store->id }}"> {{ $store->store_name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row-1">
                            <label for="product" class="text-label">Product:</label>
                            <select name="product_id[]">
                                <option value="" selected> -- Lua chon --</option>
                                @foreach ($productList as $product)
                                <option value="{{ $product->id }}"> {{ $product->product_name }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="add" id="add">Them</button>
                        </div>
                    </div>

                    <div class="row-2">
                        <input type="submit" value= "Thực hiện">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('history.jquery')
<script >

    var i = 1;
    $('#add').click(function(event) {
        $('#dynamic').append("<div id='row-add-"+i+"'> <div class='row-1'><label for='amount'> amount:</label> <input type = 'number' name = 'amount[]' size='30' placeholder='amount'/> </div><div class='row-1'> <label for='store'> Store</label> <select name='store_id[]'> <option value=''> -- Lựa chọn -- </option>@foreach ($storeList as $store)<option value=' {{ $store->id }}'> {{ $store->store_name }} </option> @endforeach </select></div><div class='row-1'><label for='product' class='text-label' >Product:</label><select name='product_id[]'> <option value='' selected> -- Lua chon --</option>@foreach ($productList as $product)<option value='{{ $product->id }}'> {{ $product->product_name }}</option> @endforeach</select>  <button name='btn-delete' id='"+i+"' class='btn-delete'>Xoa</button> </div> </div>");
  });
    $(document).on('click', '.btn-delete', function(){
        var button_id = $(this).attr('id');
        $('#row-add-'+button_id+'').remove();
    });
</script>
@endsection
