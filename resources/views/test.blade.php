<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
    <title>Page Điện Thoại</title>  
</head>  
<body>  

    @auth  
    <div class="alert alert-primary d-flex justify-content-between align-items-center">  
        <div>  
            <strong>Username:</strong> <a href="{{ route('profile.show') }}" class="link-info">{{ Auth::user()->username }}</a>  
            <span class="badge bg-{{ Auth::user()->active ? 'success' : 'danger' }}">{{ Auth::user()->active ? 'Đang hoạt động' : 'Không hoạt động' }}</span>
            @if(Auth::user()->role !== 'user') <!-- Điều kiện để kiểm tra quyền hạn -->  
            <a href="{{ route('post.index') }}" class="btn btn-primary">Quay lại</a>  
        @endif        
        </div>  
        
        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>  
    </div>  
   @endauth 

    <h1>Website Điện Thoại</h1>  
    <p>Xin chào! Bạn đã đến trang chủ.</p>  
</body>  
</html>