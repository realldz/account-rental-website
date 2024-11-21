<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatisticsService;

class StatisticsController extends Controller
{
    public function index(StatisticsService $service)
    {
        $statistics = $service->getAllStatistics();
        // dd($statistics);
        $charts = [
            [
                'id' => 'revenueChart',
                'title' => 'Doanh thu theo tháng',
                'labels' => array_map(fn($month) => "Tháng $month", array_keys($statistics['revenue_by_month']->toArray())),
                'datasets' => [[
                    'label' => 'Doanh thu (VND)',
                    'data' => array_values($statistics['revenue_by_month']->toArray()),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                ]],
            ],
            [
                'id' => 'revenueDayChart',
                'title' => 'Doanh thu theo ngày',
                'labels' => array_map(fn($day) => "Ngày $day", array_keys($statistics['revenue_by_day']->toArray())),
                'datasets' => [[
                    'label' => 'Doanh thu (VND)',
                    'data' => array_values($statistics['revenue_by_day']->toArray()),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'fill' => true,
                ]],
            ],
            [
                'id' => 'userChart',
                'title' => 'Người dùng mới theo tháng',
                'labels' => array_map(fn($month) => "Tháng $month", array_keys($statistics['new_user_by_month']->toArray())),
                'datasets' => [[
                    'label' => 'Người dùng mới',
                    'data' => array_values($statistics['new_user_by_month']->toArray()),
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => true,
                ]],
            ],
            [
                'id' => 'userDayChart',
                'title' => 'Người dùng mới hàng ngày',
                'labels' => array_map(fn($day) => "Ngày $day", array_keys($statistics['new_user_by_day']->toArray())),
                'datasets' => [[
                    'label' => 'Người dùng mới',
                    'data' => array_values($statistics['new_user_by_day']->toArray()),
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => true,
                ]],
            ],
            [
                'id' => 'orderChart',
                'title' => 'Đơn hàng theo tháng',
                'labels' => array_map(fn($month) => "Tháng $month", array_keys($statistics['new_order_by_month']->toArray())),
                'datasets' => [[
                    'label' => 'Đơn hàng',
                    'data' => array_values($statistics['new_order_by_month']->toArray()),
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                    'fill' => true,
                ]],
            ],
            [
                'id' => 'orderDayChart',
                'title' => 'Đơn hàng theo ngày',
                'labels' => array_map(fn($day) => "Ngày $day", array_keys($statistics['new_order_by_day']->toArray())),
                'datasets' => [[
                    'label' => 'Đơn hàng',
                    'data' => array_values($statistics['new_order_by_day']->toArray()),
                    'borderColor' => 'rgba(255, 206, 86, 1)',
                    'backgroundColor' => 'rgba(255, 206, 86, 0.2)',
                    'fill' => true,
                ]]
            ]
        ];
 
        $chartOptions = [
            'responsive' => true,
            'plugins' => [
                'legend' => [
                    'position' => 'top',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => false,
                ],
            ],
        ];
        

        return view('admin.pages.statistics.index', compact('charts', 'chartOptions'));
    }
}
