<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
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
        $user = $this->user;
        $orders = $user->orders()->simplePaginate(5);
        return view('user.pages.order', compact('orders', 'user'));
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
        $user = $this->user;
        $order = $this->user->orders()->findOrFail($id);
        return view('user.pages.orderInfo', compact('order', 'user'));
    }
}
