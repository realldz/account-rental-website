<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductCycle;
use App\Models\User;
use App\Services\CartService;
use Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $user;
    /**
     * Create a new controller instance.
     *
     * Retrieves the currently authenticated user
     */
    public function __construct() {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user(); // Lấy user sau khi middleware đã chạy
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $title = 'Tài khoản';
        $user = $this->user;
        $orders = $user->orders()->orderByDesc('id')->simplePaginate(5);
        return view('user.pages.order', compact('orders', 'user', 'title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function show(int $id)
    {
        $title = 'Tài khoản';
        $user = $this->user;
        $order = $this->user->orders()->findOrFail($id);
        return view('user.pages.orderInfo', compact('order', 'user', 'title'));
    }

    public function renew(Request $request) {
        $cartService = new CartService();
        $success = false;
        foreach ($request->renew as $key => $value) {
            if ($value == null || $key == null) {
                continue;
            }
            $order_item = OrderItem::findOrFail($key);
            $cycle = ProductCycle::findOrFail($value);

            if ($cartService->add($order_item->product->id, $cycle->id, 1, $order_item->id)) {
                $success = true;
            }
        }
        if (!$success) {
            return redirect()->route('user.checkout.index')->withErrors( 'Một số sản phẩm không thể thêm vào giỏ hàng');
        }
        return redirect()->route('user.checkout.index')->with('successMsg', 'Đã thêm sản phẩm vào giỏ hàng');
    }
}
