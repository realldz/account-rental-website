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
                'route'  => 'admin.users',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'Quản lí đơn hàng',
                'url'  => 'admin/profile',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'header' => 'Sản phẩm'
            ],
            [
                'text' => 'Quản lí danh mục',
                'url'  => 'admin/profile',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'Quản lí sản phẩm',
                'url'  => 'admin/profile',
                'icon' => 'fas fa-fw fa-user',
            ],
            [
                'text' => 'Quản lí tài khoản',
                'url'  => 'admin/profile',
                'icon' => 'fas fa-fw fa-user',
            ],
        );

        // Ví dụ thêm các mục menu từ cơ sở dữ liệu
        // $categories = \App\Models\Category::all();
        // foreach ($categories as $category) {
        //     $event->menu->add([
        //         'text' => $category->name,
        //         'url'  => 'admin/categories/' . $category->id,
        //         'icon' => 'fas fa-fw fa-tag',
        //     ]);
        // }
    }
}
