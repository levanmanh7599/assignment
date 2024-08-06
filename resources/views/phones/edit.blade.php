<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhật điện thoại</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Cập nhật điện thoại</h1>
        <form action="{{ route('phone.update', $phone->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $phone->id }}">
            
            <div class="mb-3">
                <label for="title" class="form-label">Tên Điện Thoại</label>
                <input type="text" name="name" class="form-control" value="{{ $phone->name }}" id="title">
            </div>
            
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input class="form-control" type="file" name="image" id="fileImage">
                <img id="img" src="{{ asset('storage/' .$phone->image) }}" alt="{{ $phone->title }}" width="111">
              </div>
    
            
            
            <div class="mb-3">
                <label for="manufacturer" class="form-label">Nhà Sản Xuất</label>
                <input type="text" name="manufacturer" class="form-control" value="{{ $phone->manufacturer }}" id="manufacturer">
            </div>

            <div class="mb-3">
                <label for="release_date" class="form-label">Ngày Phát Hành</label>
                <input type="date" name="release_date" class="form-control" value="{{ \Carbon\Carbon::parse($phone->release_date)->format('Y-m-d') }}" id="release_date">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number"name="price" class="form-control" value="{{ $phone->price }}" id="price">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Số Lượng</label>
                <input type="number" name="quantity" class="form-control" value="{{ $phone->quantity }}" id="quantity">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Danh Mục</label>
                <select name="category_id" class="form-control" id="category_id">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}"
                            @if ($cate->id === $phone->category_id)
                                selected
                            @endif
                        >
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-success">Cập Nhật</button>
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
