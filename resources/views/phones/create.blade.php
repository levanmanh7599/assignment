<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm mới điện thoại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Thêm mới điện thoại</h1>
        <form action="{{ route('phone.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tên Điện Thoại</label>
                <input type="text" name="name" class="form-control" id="name">
                @error('name')
                <span class="text-danger" >{{ $message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="image" id="fileImage" >
                <img id="img" src="{{ asset('/storage/' ) }}" width="111">
                @error('image')
                <span class="text-danger" >{{ $message}}</span>
                @enderror
              </div>

            <div class="mb-3">
                <label for="manufacturer" class="form-label">Nhà Sản Xuất</label>
                <input type="text" name="manufacturer" class="form-control" id="manufacturer">
                @error('manufacturer')
                <span class="text-danger" >{{ $message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="release_date" class="form-label">Ngày Phát Hành</label>
                <input type="date" name="release_date" class="form-control" id="release_date">
                @error('release_date')
                <span class="text-danger" >{{ $message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" step="0.1" name="price" class="form-control" id="price">
                @error('price')
                <span class="text-danger" >{{ $message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số Lượng</label>
                <input type="number" name="quantity" class="form-control" id="quantity">
                @error('quantity')
                <span class="text-danger" >{{ $message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Danh Mục</label>
                <select name="category_id" class="form-control" id="category_id">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Thêm Mới</button>
                <a href="{{ route('phones.index') }}" class="btn btn-secondary">Danh Sách</a>
            </div>
        </form>
    </div>
    <script>
        var fileImage = document.querySelector("#fileImage");
        var img = document.querySelector("img");
        fileImage.addEventListener('change', function(e){
            e.preventDefault()
            img.src = URL.createObjectURL(this.files[0])
        })
    </script>
</body>

</html>
