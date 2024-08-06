@extends('layout')  

@section('content')  

<div class="phone-details">  
    <div class="phone-image">  
        <img src="{{ $phone->image }}" alt="{{ $phone->name }}">  
    </div>  
    <div class="phone-info">  
        <h1>{{ $phone->name }}</h1>  
        <div class="phone-meta">  
            <p>Nhà sản xuất: {{ $phone->manufacturer }}</p>  
            <p>Giá: {{ number_format($phone->price, 0, ',', '.') }}đ</p>  
            <p>Ngày phát hành: {{ $phone->release_date }}</p>  
            <p>Số lượng: {{ $phone->quantity }}</p>  
            <p>Tên loại: {{ $categoryName }}</p> 
        </div>  
        <div class="phone-actions">  
            <form action="{{ route('cart.add') }}" method="POST">  
                @csrf  
                <input type="hidden" name="id" value="{{ $phone->id }}">  
                <input type="hidden" name="name" value="{{ $phone->name }}">  
                <input type="hidden" name="price" value="{{ $phone->price }}">  
                <input type="number" name="quantity" value="1" min="1" class="quantity-input"><br>  

                <button type="submit" class="add-to-cart">Thêm vào giỏ hàng</button>  
                <button type="submit" class="buy-now">Mua ngay</button>  
            </form>  
        </div>  
    </div>  
</div>  

@endsection