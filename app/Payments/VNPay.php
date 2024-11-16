<?php

namespace App\Payments;

use App\Interfaces\PaymentGatewayInterface;

class VNPay implements PaymentGatewayInterface
{
    protected $payment;

    protected $config;

    public function __construct($payment = null)
    {
        $this->payment = $payment;
        $this->config = $payment ? json_decode($this->payment->config) : null;
    }

    public static function form()
    {
        return [
            'fields' => [
                'secret_key' => 'password',
                'merchant_id' => 'text',
            ],
        ];
    }

    /**
     * Redirect user to the payment gateway to make a payment.
     */
    public function pay($order)
    {
        $start_time = date('YmdHis');
        $data = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->config->merchant_id,
            "vnp_Amount" => $order->total_price * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $start_time,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => '127.0.0.1',
            "vnp_Locale" => 'vn', 
            "vnp_OrderInfo" => "Thanh toan GD: $order->id",
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => route('payment.notify', $this->payment->code),
            "vnp_TxnRef" => $order->id,
            "vnp_ExpireDate"=> date('YmdHis',strtotime('+15 minutes',strtotime($start_time)))
        ];
        ksort($data);
        $vnpSecureHash = hash_hmac('sha512', http_build_query($data), $this->config->secret_key);
        $data['vnp_SecureHash'] = $vnpSecureHash;
        $url = 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html?' . http_build_query($data);
        return ['url' => $url];
    }

    /**
     * Handle notifications from the payment gateway.
     *
     * This function processes incoming notifications from the VNPay
     * payment gateway, updating the system with the payment status
     * and other relevant information.
     */
    public function notify($request)
    {
        $secert_key = $this->config->secret_key;
        $vnp_SecureHash = $request->vnp_SecureHash;
        $inputData = [];

        foreach ($request->all() as $key => $value) {
            if (substr($key, 0, 4) == 'vnp_') {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $vnpSecureHash = hash_hmac('sha512', http_build_query($inputData), $secert_key);

        if ($vnpSecureHash == $vnp_SecureHash) {
            switch ($request->vnp_ResponseCode) {
                case '00':
                    return [
                        'order_status' => '1',
                        'order_id' => $request->vnp_TxnRef,
                        'callback_info' => implode('|',[
                            $request->vnp_BankCode, 
                            $request->vnp_CardType,
                            $request->vnp_TransactionNo,
                            $request->vnp_PayDate,
                            $request->vnp_OrderInfo,
                        ]),
                    ];
                default:
                    return [
                        'order_status' => '-1',
                        'order_id' => $request->vnp_TxnRef,
                    ];
            }
        }
    }
}
