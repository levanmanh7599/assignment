<?php  

namespace App\Http\Controllers;  
use App\Http\Requests\StorePhoneRequest;
use App\Models\Phone;  
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;  

class PhoneController extends Controller  
{  
    // Display list of phones  

    public function index()
    {
        $phones = DB::table('phones')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('phones.*', 'categories.name as category_name')
            ->orderByDesc('phones.id')
            ->paginate(10);
       
        return view('phones.index', compact('phones'));
    }

    // Thêm mới
    public function create()  
    {  
        $categories = Category::all();  
        return view('phones.create', compact('categories'));  
    }  

    // Store new phone data  
    public function store(Request $request)
    {
        $data = $request->except('image');
        
        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        } else {
            $data['image'] = '';
        }

        Phone::create($data);

        return redirect()->route('phones.index')->with('message', 'Thêm dữ liệu thành công');
    }

    public function edit(Phone $phone)  
    {  
        $categories = Category::all();  
        return view('phones.edit', compact('categories','phone' ));  
    }  
    // cập nhật dữ liệu 
    public function update(Request $request, Phone $phone)  
    {  
        // Xác thực các trường dữ liệu  
        // $request->validate([  
        //     'name' => 'required|string|max:255',  
        //     'manufacturer' => 'required|string|max:255',  
        //     'release_date' => 'required|date',  
        //     'price' => 'required|numeric',  
        //     'quantity' => 'required|integer',  
        //     'category_id' => 'required|exists:categories,id',  
        //     'image' => 'image|nullable',  
        // ]);  
    
        $data = $request->except('image');  
        $old_image = $phone->image;  
        $phones = Phone::paginate(10);
        if($request->hasFile('image')){
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;
        }
        // Cập nhật thông tin điện thoại  
        $phone->update($data);  
                //Xóa ảnh cũ
            if(isset($path_image)){
                if(file_exists('storage/' .$old_image)){
                        unlink('storage/' .$old_image);
                 }
            }
    
        return redirect()->route('phones.index')->with('message', 'Cập nhật dữ liệu thành công');  
    }
    // Delete a phone  
    public function destroy(Phone $phone)  
    {  
        $phone->delete();  

        return redirect()->route('phones.index')->with('message', 'Xóa dữ liệu thành công');  
    }  
}