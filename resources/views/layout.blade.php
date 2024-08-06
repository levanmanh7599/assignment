<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>@yield('title')</title>  
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            line-height: 1.6;  
            margin: 0;  
            padding: 0;  
            background-color: #f4f4f4;  
        }  
        header {  
            background: #35424a;  
            color: #ffffff;  
            text-align: center;  
            
        }  
        nav {  
            background: #cccccc;  
            padding: 15px;  
        }  
        nav h1 {  
            margin: 0;  
            font-size: 20px;  
        }  
        nav ul {  
            list-style: none;  
            padding: 0; 
           
        }  
        nav ul li {  
            display: inline;  
            margin-right: 15px;  
            
        }  
        nav ul li a {  
            text-decoration: none;  
            color: #35424a;  
            padding: 5px 10px;  
            transition: background 0.3s;  
            
        }  
        nav ul li a:hover {  
            background: #35424a;  
            color: #ffffff;  
        }  
        article {  
            padding: 20px;  
            background: white;  
            margin: 20px;  
            border-radius: 5px;  
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
        }  
        aside {  
            background: #a0bccd;  
            color: white;  
            padding: 10px 0;  
            text-align: center;  
            position: absolute;  
            bottom: 0;  
            width: 100%;  
        }  
        footer {  
            background: #35424a;  
            color: #ffffff;  
            text-align: center;  
            padding: 5px 0;  
            position: relative;  
        }  
        @media (max-width: 600px) {  
            nav ul li {  
                display: block;  
                margin: 5px 0;  
            }  
        }  
        .product-container {  
    display: flex;  
    flex-wrap: wrap;  
    justify-content: space-around;
    margin: 20px;
}  

.product {  
    background: white;  
    border: 1px solid #ddd; 
    border-radius: 5px;  
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
    margin: 13px;  
    width: calc(25% - 30px);  
    transition: transform 0.3s, box-shadow 0.3s;  
    text-align: center; 
    padding-bottom: 20px;
}  

.product:hover {  
    transform: translateY(-5px); 
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);  
}  

.product img {  
    width: 100%; 
    height: auto;  
    border-top-left-radius: 5px;  
    border-top-right-radius: 5px; 
}  

.product-title {  
    font-size: 18px;  
    font-weight: bold; 
    padding: 10px; 
}  

.product-price {  
    font-size: 16px; 
    color: #28a745; 
    padding-bottom: 10px;  
}  

.product-button {  
    background: #007bff; 
    color: white; 
    border: none; 
    padding: 10px 15px; 
    cursor: pointer; 
    border-radius: 5px; 
    transition: background 0.3s;
}  

.product-button:hover {  
    background: #0056b3;
}
 

        .slideshow-container {  
            position: relative;  
            max-width: 100%;  
            margin: auto;  
         
        }  
        .slides {  
            display: none;  
            width: 100%;  
        }  
   
        .prev, .next {  
            cursor: pointer;  
            position: absolute;  
            top: 50%;  
            width: auto;  
            padding: 16px;  
            color: white;  
            font-weight: bold;  
            font-size: 18px;  
            transition: 0.6s ease;  
            border-radius: 0 3px 3px 0;  
            user-select: none;  
        }  
        .next {  
            right: 0;  
            border-radius: 3px 0 0 3px;  
        } 
        .prev{
            left: 0;
            border-radius: 3px 0 0 3px;  
        } 
        .prev:hover, .next:hover {  
            background-color: rgba(0, 0, 0, 0.8);  
        }
        nav {  
    background-color: #333; /* Màu nền của thanh menu */  
}  

nav ul {  
    list-style: none; /* Xóa dấu đầu dòng */  
    padding: 0; /* Xóa khoảng cách */  
    margin: 0; /* Xóa lề */  
    display: flex; /* Sử dụng Flexbox để căn chỉnh ngang */  
}  

nav li {  
    flex: 1; /* Các mục menu chia đều không gian */  
}  

nav a {  
    color: white; /* Màu chữ */  
    text-decoration: none; /* Bỏ gạch chân */  
    display: block; /* Chiếm toàn bộ chiều dài của li */  
    padding: 5px; /* Khoảng cách bên trong */  
    text-align: center; /* Căn giữa văn bản */  
    transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu khi hover */  
}  

nav a:hover {  
    background-color: #575757; /* Màu nền khi hover */  
    color: #ffcc00; /* Màu chữ khi hover */  
} 
/* Ẩn submenu ban đầu */  
.submenu {  
            display: none;  
            position: absolute; /* Để submenu xuất hiện bên dưới item chính */  
            background-color: white; /* Nền của submenu */  
            border: 1px solid #ccc; /* Đường viền cho submenu */  
            z-index: 1; /* Đảm bảo submenu hiển thị trên các phần tử khác */  
        }  

        /* Hiện submenu khi hover vào mục Sách */  
        .menu > li:hover .submenu {  
            display: block;  
        }  

        /* Một số phong cách cho menu và submenu */  
        .menu {  
            list-style-type: none;  
            padding: 0;  
            margin: 0;  
        }  

        .menu > li {  
            position: relative; /* Để submenu xuất hiện đúng vị trí */  
            display: inline-block; /* Để đưa menu lên hàng ngang */  
            margin: 0 15px; /* Khoảng cách giữa các mục */  
        }  

        .menu a {  
            text-decoration: none; /* Bỏ gạch chân */  
            color: black; /* Màu chữ */  
            padding: 10px; /* Khoảng cách cho chữ trong menu */  
        }  
         .submenu{
            width: 340px;
         }
        .submenu li {  
            float: none; /* Để các mục trong submenu không xếp hàng ngang */  
        }  

        .submenu a {  
            display: block; /* Mục submenu sẽ chiếm toàn bộ chiều rộng */  
      
            padding: 8px 12px; /* Khoảng cách cho mục submenu */  
            color: #333; /* Màu chữ cho submenu */  
        }  

        .submenu a:hover {  
            background-color: green; /* Màu nền cho mục submenu khi hover */  
        }  
 
    </style>  
</head>  
<body>
    <header>
        <div class="header-actions">
            <div class="search-container">
                <input type="text" placeholder="Tìm kiếm...">
                <button type="button">Tìm kiếm</button>
            </div>
            <div class="account-menu">
                <button class="account-button">Tài khoản</button>
                <div class="dropdown-menu">
                    <a href="{{ route('register') }}" class="header-button">Đăng Ký</a>
                    <a href="{{ route('postLogin') }}" class="header-button">Đăng Nhập</a>
                    @auth  
                    <a href="{{ route('logout') }}" class="header-button">Đăng Xuất</a>  
                    @endauth
                    
                </div>
                
            </div>
     
            <a href="{{ route('cart.index') }}" class="cart-button">  
                <button class="cart-button">Giỏ hàng</button>  
            </a>  
  

        </div>
        <div class="slideshow-container">
            <div class="slides fade">
                <img src="https://tienganhnghenoi.vn/wp-content/uploads/2023/09/banner-iphone-7-min.jpg" style="width:100%">
            </div>
            <div class="slides fade">
                <img src="https://cdn.tgdd.vn/hoi-dap/1355217/banner-tgdd-800x300.jpg" style="width:100%">
            </div>
            <div class="slides fade">
                <img src="https://img.pikbest.com/origin/10/01/53/35bpIkbEsTBzN.png!sw800" style="width:100%">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        


        <nav>
            <ul class="menu">
                <li><a href="{{route('homepage')}}">Trang Chủ</a></li>
                <li><a href="#about">Giới Thiệu</a></li>
                <li>
                    <a href="#phones">Điện Thoại</a>
                    <ul class="submenu">
                        @foreach($categories as $category)
                            <li><a href="{{ route('phones.detail', $category->id) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="#contact">Liên Hệ</a></li>
            </ul>
        </nav>
        

    </header>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("slides");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script>

</body>

        
        <script>  
            let slideIndex = 0;  
            showSlides();  
    
            function showSlides() {  
                let i;  
                let slides = document.getElementsByClassName("slides");  
                for (i = 0; i < slides.length; i++) {  
                    slides[i].style.display = "none";  
                }  
                slideIndex++;  
                if (slideIndex > slides.length) {slideIndex = 1}    
                slides[slideIndex-1].style.display = "block";  
                setTimeout(showSlides, 3000); // Thay đổi hình mỗi 3 giây  
            }  
    
            function plusSlides(n) {  
                slideIndex += n;  
                const slides = document.getElementsByClassName("slides");  
                if (slideIndex > slides.length) { slideIndex = 1 }  
                if (slideIndex < 1) { slideIndex = slides.length }  
                for (let i = 0; i < slides.length; i++) {  
                    slides[i].style.display = "none";  
                }  
                slides[slideIndex-1].style.display = "block";  
            }  
        </script>   
    </header>  
  
   

   
    <article>  
        @yield('content')  
    </article>  

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h2>Thông Tin</h2>
                <ul>
                    <li><a href="#">Giới Thiệu</a></li>
                    <li><a href="#">Liên Hệ</a></li>
                    <li><a href="#">Chính Sách Bảo Mật</a></li>
                    <li><a href="#">Điều Khoản Dịch Vụ</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Kết Nối</h2>
                <ul>
                    <li><a href="#"><img src="{{ asset('images/facebook-icon.png') }}" alt="Facebook"></a></li>
                    <li><a href="#"><img src="{{ asset('images/twitter-icon.png') }}" alt="Twitter"></a></li>
                    <li><a href="#"><img src="{{ asset('images/instagram-icon.png') }}" alt="Instagram"></a></li>
                    <li><a href="#"><img src="{{ asset('images/linkedin-icon.png') }}" alt="LinkedIn"></a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Thông Tin Liên Hệ</h2>
                <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ</p>
                <p>Email: info@example.com</p>
                <p>Điện thoại: (123) 456-7890</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Công ty của bạn. Tất cả quyền được bảo lưu.</p>
        </div>
    </footer>
    
    <style>
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            font-family: Arial, sans-serif;
        }
    
        .footer-content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 0 20px;
        }
    
        .footer-section {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }
    
        .footer-section h2 {
            margin-bottom: 15px;
            font-size: 1.2em;
            border-bottom: 2px solid #fff;
            padding-bottom: 5px;
        }
    
        .footer-section ul {
            list-style-type: none;
            padding: 0;
        }
    
        .footer-section ul li {
            margin: 10px 0;
        }
    
        .footer-section ul li a {
            color: #fff;
            text-decoration: none;
        }
    
        .footer-section ul li a:hover {
            text-decoration: underline;
        }
    
        .footer-section img {
            max-width: 24px; /* Điều chỉnh kích thước biểu tượng */
            height: auto;
        }
    
        .footer-bottom {
            text-align: center;
            padding: 10px;
            background-color: #222;
            border-top: 1px solid #444;
        }
    
        .footer-bottom p {
            margin: 0;
            font-size: 0.9em;
        }
    
        @media (max-width: 768px) {
            .footer-content {
                flex-direction: column;
                align-items: center;
            }
    
            .footer-section {
                text-align: center;
                margin: 10px 0;
            }
        }
    </style>
    
    
</body>  
</html>