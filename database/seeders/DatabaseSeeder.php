<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Shop;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        // シーダーを利用
        // $this->call([
        //     ShopsTableSeeder::class,
        //     ItemsTableSeeder::class,
        // ]);

        User::factory()
            ->count(2)
            ->has(
                Shop::factory() // factoryクラスで作成した内容を作成
                    ->count(2) // 各ユーザーに２つのショップを作成
                    ->has(
                        Item::factory()->count(3) // 各ショップに3つの商品を作成
                    )
            )
            ->create();
    }
}
