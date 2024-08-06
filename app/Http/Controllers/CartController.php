<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $categories = DB::table('categories')->get(); // Lấy danh mục để truyền vào view
        $totalItems = array_sum(array_column($cart, 'quantity')); // Tính tổng số lượng sản phẩm trong giỏ hàng
        return view('cart.index', compact('cart', 'categories', 'totalItems'));
    }

    public function add(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'quantity' => $quantity
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        if (isset($cart[$id])) {
            if ($quantity <= 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]['quantity'] = $quantity;
            }
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->input('id');

        if (isset($cart[$id])) {
            unset($cart[$id]);
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function buyNow(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'quantity' => $quantity
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }
}
