<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PaymentRequest;
use App\Models\Payment;
use App\Services\CartService;
use App\Services\OrderService;
use App\Services\PaymentService;
use App\Services\ProductCycleService;
use App\Traits\JsonResponseTrait;
use DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use JsonResponseTrait;
    public function pay(PaymentRequest $request)
    {
        $user = auth()->user();
        $cartService = new CartService();
        $orderService = new OrderService();
        $productCycleService = new ProductCycleService();
        $paymentService = new PaymentService();
        $payment_method = Payment::where('code', $request->payment_method)->firstOrFail();

        $carts = $cartService->getUserCart($user);
        $payment_url = "";
        if ($carts->isEmpty()) {
            return $this->fail('Giỏ hàng đang trống', 400);
        }

        $totalPrice = $cartService->getTotalPrice();

        DB::beginTransaction();
        try {
            $order = $orderService->createOrder($user, $totalPrice, $payment_method->name);

            $orderItems = $productCycleService->generateOrderItems($carts, $order->order_id);

            $orderService->createOrderItems($order, $orderItems);

            $payment_url = $paymentService->createPayment($order, $payment_method);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->fail($th->getMessage());
        }

        $cartService->clearCart($user);

        return $this->success($payment_url['url']);
    }
}
