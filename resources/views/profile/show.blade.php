<!doctype html>  
<html lang="en">  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Trang cá nhân</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body>  
<div class="container mt-5">  
    <h1>Thông tin cá nhân</h1>  

    @if(session('message'))  
        <div class="alert alert-success">  
            {{ session('message') }}  
        </div>  
    @endif  

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">  
        @csrf  
        <div class="mb-3">  
            <label for="username" class="form-label">Tên người dùng</label>  
            <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" required>  
        </div>  
        <div class="mb-3">  
            <label for="email" class="form-label">Email</label>  
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>  
        </div>  

        <div class="mb-3">  
            <label for="avatar" class="form-label">Ảnh đại diện</label>  
            <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">   
            <div class="mt-2">  
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="img-fluid" style="max-width: 150px;">  
            </div>  
        </div>   
        <div class="mt-5"> 
            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>   
          
            <a href="{{ route('phones.index') }}" class="btn btn-primary">Quay lại</a>  
       
        </div> 
        
    </form>  

    <div class="mt-3">  
        <a href="{{ route('password.change') }}" class="btn btn-warning text-white" role="button">Đổi mật khẩu</a>  
    </div>  

   
</div>  
<script>  
    var avatarInput = document.querySelector("#avatar");  
    var avatarImg = document.querySelector("img[alt='Avatar']"); // Chọn hình ảnh với alt là "Avatar"  
   
    avatarInput.addEventListener('change', function(e) {  
        e.preventDefault();  
        if (this.files && this.files[0]) {  
            avatarImg.src = URL.createObjectURL(this.files[0]);  
        }  
    });  
</script>  
</body>  
</html>