<?php

namespace App\Http\Controllers\Guest;

use App\Factories\PaymentFactory;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function notify(Payment $payment, Request $request) {
        $notify_data = PaymentFactory::create($payment->gateway, $payment)->notify($request);
        $order = Order::where('id', $notify_data['order_id'])->first();
        if (!$order) {
           return redirect()->route('index');
        }
        
        if ($notify_data['order_status'] == '1') {
            $order->update(['callback_info' => $notify_data['callback_info']]);
            $order->complete();
            return redirect()->route('user.my-account.order.show', $order->id)->with('successMsg', 'Thanh toán thành công');

        } else if ($notify_data['order_status'] == '-1') {
            $order->close();
            return redirect()->route('user.my-account.order.show', $order->id)->withErrors( 'Thanh toán thất bại');

        } else {
            return redirect()->route('index');
        }
    }
}
