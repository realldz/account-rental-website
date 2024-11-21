<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class BuildAdminMenu
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Thêm các mục menu động
        $event->menu->add(
            [
                'text' => 'Trang tổng quan',
                'route'  => 'admin.index',
                'icon' => 'fas fa-tachometer-alt',
            ],
            [
                'text' => 'Quản lí người dùng',
                'route'  => 'admin.user.index',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'Quản lí đơn hàng',
                'route'  => 'admin.order.index',
                'icon' => 'fas fa-fw fa-shopping-cart',
            ],
            [
                'text' => 'Quản lí bình luận',
                'route'  => 'admin.comment.index',
                'icon' => 'fas fa-fw fa-comment',
            ],
            [
                'header' => 'Sản phẩm'
            ],
            [
                'text' => 'Quản lí danh mục',
                'route'  => 'admin.category.index',
                'icon' => 'fas fa-fw fa-folder',
            ],
            [
                'text' => 'Quản lí sản phẩm',
                'route'  => 'admin.product.index',
                'icon' => 'fas fa-fw fa-file',
            ],
            [
                'text' => 'Quản lí tài khoản',
                'route'  => 'admin.account.index',
                'icon' => 'fas fa-fw fa-cookie-bite',
            ],
            [
                'header' => 'Thống kê'
            ],
            [
                'text' => 'Thống kê',
                'route'  => 'admin.statistics.index',
                'icon' => 'fas fa-fw fa-folder',
            ],
            [
                'header' => 'Cấu hình'
            ],
            [
                'text' => 'Thanh toán',
                'route'  => 'admin.config.payment.index',
                'icon' => 'fas fa-fw fa-credit-card',
            ],
        );
    }
}
