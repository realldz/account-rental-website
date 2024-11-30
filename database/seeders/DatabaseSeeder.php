<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);
        // \App\Models\User::factory(10)->create();
        // \App\Models\Category::factory(5)->create();
        // \App\Models\Product::factory(10)->create();
        // \App\Models\Account::factory(10)->create();
        // \App\Models\ProductCycle::factory(10)->create();
        // \App\Models\Order::factory(10)->create();
        // \App\Models\OrderItem::factory(20)->create();
        // \App\Models\Comment::factory(20)->create();
    }
}
