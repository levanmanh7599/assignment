<!-- resources/views/users/index.blade.php -->  
<!doctype html>  
<html lang="en">  
<head>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>Quản lý Tài khoản</title>  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  
</head>  
<body>  
<div class="container mt-5">  
    <h1>Danh sách tài khoản</h1>  

    @if(session('message'))  
        <div class="alert alert-success">  
            {{ session('message') }}  
        </div>  
    @endif  

    <table class="table table-bordered">  
        <thead>  
            <tr>  
                <th scope="col">#ID</th>  
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên người dùng</th>  
                <th scope="col">Email</th>  
                <th scope="col">Vai trò</th> <!-- Cột mới cho vai trò -->  
                <th scope="col">Trạng thái</th>  
                <th scope="col">Thao tác</th>  
                <th scope="col">Chức năng</th>  
            </tr>  
        </thead>  
        <tbody>  
            @foreach ($users as $user)  
                <tr>  
                    <th scope="row">{{ $user->id }}</th>  
                    <td>  
                        <img src="{{ asset('/storage/' . $user->avatar) }}" width="50" alt="">  
                    </td>  
                    <td>{{ $user->username }}</td>  
                    <td>{{ $user->email }}</td>  
                    <td>{{ ucfirst($user->role) }}</td> <!-- Hiển thị vai trò -->  
                    <td>  
                        <span class="badge bg-{{ $user->active ? 'success' : 'danger' }}">  
                            {{ $user->active ? 'Đang hoạt động' : 'Không hoạt động' }}  
                        </span>  
                    </td> 
                    <td>  
                        <form action="{{ route('users.toggle-status', $user) }}" method="post" style="display: inline;">  
                            @csrf  
                            <button onclick="return confirm('Bạn có chắc chắn muốn thay đổi trạng thái?')" type="submit" class="btn btn-warning">  
                                {{ $user->active ? 'Ngừng kích hoạt' : 'Kích hoạt' }}  
                            </button>  
                        </form>  
                    </td>
                    <td>
                        
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                        </form>
                        
                    </td>
                      
                </tr>  
                
            @endforeach  
      
        </tbody>  
    </table>  
    <div class="mt-5">  
        <a href="{{ route('phones.index') }}" class="btn btn-primary">Quay lại</a>     
    </div>
    
</div>  
</body>  
</html>