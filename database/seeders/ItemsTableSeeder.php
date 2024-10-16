<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'トヨタ',
                'description' => 'トヨタ',
                'price' => 3500000,
                'stock' => 10,
                'shop_id' => 4, // 中古車ショップ
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'name' => 'サイレン',
                'description' => 'KONAMI',
                'price' => 7980,
                'stock' => 23,
                'shop_id' => 5, // ゲームショップ
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ]
        ]);

        $this->command->info('Itemsテーブルにデータを挿入しました');
    }
}
