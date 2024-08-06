<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách điện thoại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Danh sách điện thoại</h1>
        @auth  
        <div class="alert alert-primary d-flex justify-content-between align-items-center">  
            <div>  
                <strong>Username:</strong> <a href="{{ route('profile.show') }}" class="link-info">{{ Auth::user()->username }}</a>  
                <span class="badge bg-{{ Auth::user()->active ? 'success' : 'danger' }}">{{ Auth::user()->active ? 'Đang hoạt động' : 'Không hoạt động' }}</span>
       
            </div>  
            <div>
                <img src="{{ asset('/storage/' . Auth::user()->avatar ) }}" width="50" alt="">
           
            </div>  
            </div>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>  
        @endauth  
    
        @if(session('message'))  
            <div class="alert alert-success">  
                {{ session('message') }}  
            </div>  
        @endif  
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Tên điện thoại</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Nhà sản xuất</th>
                    <th scope="col">Ngày sản xuất</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Hành động</th>
                    <th scope="col">  
                        <a href="{{ route('phone.store') }}" class="btn btn-primary mb-1">Create new</a>  <br>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">Manage Users</a> <!-- Nút mới thêm vào -->        
                    </th>  
                </tr>
            </thead>
            <tbody>
                @foreach ($phones as $phone)
                    <tr>
                        <td>{{ $phone->id }}</td>
                        <td>{{ $phone->name }}</td>
                        <td><img src="{{asset('/storage/' .$phone->image) }}" alt="{{ $phone->name }}" width="100"></td>
                        <td>{{ $phone->manufacturer }}</td>
                        <td>{{ \Carbon\Carbon::parse($phone->release_date)->format('d/m/Y') }}</td>

                        <td>{{ number_format($phone->price, 0, ',', '.') }}đ</td>
                        <td>{{ $phone->quantity }}</td>
                        <td>{{ $phone->category_name }}</td>
                        <td>
                            <a href="{{ route('phone.edit', $phone->id) }}" class="btn btn-success">Sửa</a>
                            <form action="{{ route('phone.destroy', $phone->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <a href="{{ url('/') }}" class="btn btn-info">Trang chủ</a> <!-- Nút mới cho route /test --> 
        </table>
        {{ $phones->links() }} 
    </div>
</body>

</html>
