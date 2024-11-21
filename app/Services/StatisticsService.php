<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;

class StatisticsService
{
    public function getAllStatistics()
    {
        return [
            'revenue_by_month' => $this->getRevenueByMonth(),
            'new_user_by_month' => $this->getNewUserByMonth(),
            'revenue_by_day' => $this->getRevenueByDay(),
            'new_user_by_day' => $this->getNewUserByDay(),
            'new_order_by_month' => $this->getNewOrderByMonth(),
            'new_order_by_day' => $this->getNewOrderByDay(),
        ];
    }
    private function getRevenueByMonth()
    {
        return Order::where('status', '1')
            ->selectRaw('MONTH(created_at) as month, SUM(total_price) as total_revenue')
            ->groupBy('month')
            ->pluck('total_revenue', 'month');
    }

    private function getRevenueByDay()
    {
        return Order::where('status', '1')
            ->selectRaw('DAY(created_at) as day, SUM(total_price) as total_revenue')
            ->groupBy('day')
            ->orderBy('day', 'asc')
            ->pluck('total_revenue', 'day');
    }

    private function getNewUserByMonth()
    {
        return User::where('created_at', '>=', Carbon::now()->subMonth())
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as new_users')
            ->groupBy('month')
            ->pluck('new_users', 'month');
    }

    private function getNewUserByDay()
    {
        return User::where('created_at', '>=', Carbon::now()->startOfMonth())
            ->selectRaw('DAY(created_at) as day, COUNT(*) as new_users')
            ->groupBy('day')
            ->orderBy('day', 'asc')
            ->pluck('new_users', 'day');
    }

    private function getNewOrderByMonth()
    {
        return Order::where('status', '1')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as new_orders')
            ->groupBy('month')
            ->pluck('new_orders', 'month');
    }

    private function getNewOrderByDay()
    {
        return Order::where('status', '1')
            ->selectRaw('DAY(created_at) as day, COUNT(*) as new_orders')
            ->groupBy('day')
            ->orderBy('day', 'asc')
            ->pluck('new_orders', 'day');
    }
}
