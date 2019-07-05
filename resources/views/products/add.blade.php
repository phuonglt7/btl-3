@extends('layouts.app')

@section('content')
<div class="wrapper_container">
    <div class="info_page">
        <div class="content-login">
            @include('layouts.announce')
            <div class = "header">
                Thêm Sản phẩm
            </div>
            <div class="content">
                <form action="{{ route('product.store') }}" method="POST" role="form" id="formProduct">
                    @csrf
                    <div class="row-1">
                        <label for="username">Product_name:</label>
                        <input type = "text" name = "product_name" size="30" placeholder="roduct_name" />
                    </div>
                    <div class="row-2">
                        <input type="submit" value= "Thêm Sản phẩm">
                        <input type="reset" value="Reset">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('products.jquery')
@endsection
