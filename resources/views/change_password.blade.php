<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">  
    <title>Đổi Mật Khẩu</title>  
</head>  
<body>  
    <div class="container w-50">  
        <h1>Đổi Mật Khẩu</h1>  
        @if(session('success'))  
            <div class="alert alert-success">  
                {{ session('success') }}  
            </div>  
        @endif  
        @if ($errors->any())  
            <div class="alert alert-danger">  
                <ul>  
                    @foreach ($errors->all() as $error)  
                        <li>{{ $error }}</li>  
                    @endforeach  
                </ul>  
            </div>  
        @endif  

        <form action="{{ route('password.change.post') }}" method="post">  
            @csrf  
            <div class="mb-3">  
                <label for="current_password" class="form-label">Mật Khẩu Cũ</label>  
                <input type="password" name="current_password" id="current_password" class="form-control" required>  
            </div>  
            <div class="mb-3">  
                <label for="new_password" class="form-label">Mật Khẩu Mới</label>  
                <input type="password" name="new_password" id="new_password" class="form-control" required>  
            </div>  
            <div class="mb-3">  
                <label for="new_password_confirmation" class="form-label">Xác Nhận Mật Khẩu Mới</label>  
                <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>  
            </div>  
            <div class="mb-3">  
                <button type="submit" class="btn btn-primary">Đổi Mật Khẩu</button>             
       
                <a href="{{ route('phones.index') }}" class="btn btn-primary">Quay lại</a>  
                    
            </div>  
        </form>  
    </div>  
</body>  
</html>