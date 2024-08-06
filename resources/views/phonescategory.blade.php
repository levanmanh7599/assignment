@extends('layout')  
@section('content')  

@if ($phonesCategory->isEmpty())  
    <p>Không có điện thoại nào thuộc loại này.</p>  
@else  
<h1>Điện thoại theo loại: {{ $categoryName }} <!-- Hiển thị tên danh mục -->  
    <ul>  
        <div class="product-container">  
            @foreach ($phonesCategory as $phone)  
                <div class="product"> 
                    <a href="{{ url('/phone/'.$phone->id) }}">   
                    <img src="{{ $phone->image }}" alt="{{ $phone->name }}">  
                    <div class="product-title">{{ $phone->name }}</div>  
                    <div class="product-price">{{ number_format($phone->price, 0, ',', '.') }}đ</div>  
                    <button class="product-button">Thêm vào giỏ hàng</button> 
                    </a> 
                </div>   
            @endforeach  
        </div>   
    </ul>  
    <a href="{{ url('/') }}" class="btn btn-custom">Quay lại Trang chủ</a>   
@endif  
@endsection
