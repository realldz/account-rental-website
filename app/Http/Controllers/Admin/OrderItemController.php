<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrderItemRequest;
use App\Models\OrderItem;
use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\View\View;

class OrderItemController extends Controller
{
    use CrudTrait;
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Contracts\View\Factory
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(OrderItem $orderItem)
    {
        $accounts = $orderItem->product->account;
        return view('admin.pages.orderItem.info', compact('orderItem', 'accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\OrderItemRequest  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(OrderItemRequest $request, OrderItem $orderItem)
    {
        return $this->updateT($request, $orderItem);
    }
}
