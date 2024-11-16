<?php

namespace App\Http\Controllers\Admin;

use App\Factories\PaymentFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PaymentRequest;
use App\Models\Payment;
use App\Traits\CrudTrait;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\Request;
use Str;

class PaymentController extends Controller
{
    use JsonResponseTrait, CrudTrait;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $payments = Payment::all();
        return view('admin.pages.config.payment.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $payment_gateways = PaymentFactory::getAvailablePaymentMethods();
        return view('admin.pages.config.payment.info', compact('payment_gateways'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PaymentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PaymentRequest $request)
    {
        $payment = $request->validated();
        $payment['config'] = json_encode($payment['config']);
        $payment['code'] = Str::random(10);
        try {
            Payment::create($payment);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        return redirect()->back()->with('successMsg', 'Payment method created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Payment $payment)
    {
        $payment_gateways = PaymentFactory::getAvailablePaymentMethods();
        return view('admin.pages.config.payment.info', compact('payment', 'payment_gateways'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PaymentRequest $request, Payment $payment)
    {
        $request = $request->validated();
        $request['config'] = json_encode($request['config']);
        try {
            $payment->update($request);
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($th->getMessage());
        }
        return redirect()->back()->with('successMsg', 'Payment method updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Payment $payment)
    {
        return $this->destroyT($payment);
    }

    /**
     * Get the fields for the specified payment gateway.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getField(Request $request)
    {
        try {
            $fields = PaymentFactory::create($request->gateway)->form();
            return $this->success($fields);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
}

