@extends('layout')  
@section('title', 'Trang Sản phẩm')  

@section('content')  

<h1>Top 8 Sản Phẩm Có Giá Cao Nhất</h1>  

<div class="product-container">  
@foreach ($topPricedPhones as $phone)  
    <div class="product">  
        <a href="{{ url('/phone/'.$phone->id) }}">  
            <img src="{{asset('/storage/' .$phone->image) }}" alt="{{ $phone->name }}">   
            <div class="product-title">{{ $phone->name }}</div>  
            <div class="product-price">{{ number_format($phone->price, 0, ',', '.') }}đ</div>  
        </a>  
        <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">  
            @csrf  
            <input type="hidden" name="id" value="{{ $phone->id }}">  
            <input type="hidden" name="name" value="{{ $phone->name }}">  
            <input type="hidden" name="price" value="{{ $phone->price }}">  
            <input type="hidden" name="quantity" value="1">  <!-- Đặt số lượng mặc định là 1 và ẩn -->  
            <button type="submit" class="product-button">Thêm vào giỏ hàng</button>  
        </form>  
    </div>   
@endforeach  
</div>  

<h1>Top 8 Sản Phẩm Có Giá Thấp Nhất</h1>  

<div class="product-container">  
@foreach ($lowestPricedPhones as $phone)  
    <div class="product">  
        <a href="{{ url('/phone/'.$phone->id) }}">  
            <img src="{{ asset('/storage/' .$phone->image) }}" alt="{{ $phone->name }}">   
            <div class="product-title">{{ $phone->name }}</div>  
            <div class="product-price">{{ number_format($phone->price, 0, ',', '.') }}đ</div>  
        </a>  
        <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">  
            @csrf  
            <input type="hidden" name="id" value="{{ $phone->id }}">  
            <input type="hidden" name="name" value="{{ $phone->name }}">  
            <input type="hidden" name="price" value="{{ $phone->price }}">  
            <input type="hidden" name="quantity" value="1">  <!-- Đặt số lượng mặc định là 1 và ẩn -->  
            <button type="submit" class="product-button">Thêm vào giỏ hàng</button>  
        </form>  
    </div>   
@endforeach  
</div>  

@endsection