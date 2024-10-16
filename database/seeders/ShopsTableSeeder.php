<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert([
            [
                'user_id' => 1,
                'name' => '中古車ショップ',
                'description' => '中古車販売店',
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ],
            [
                'user_id' => 2,
                'name' => 'ゲームショップ',
                'description' => 'Steam',
                'created_at' => Carbon::now(),
                'updated_at' => null,
                'deleted_at' => null,
            ]
        ]);

        $this->command->info('Shopsテーブルにデータを挿入しました');
    }
}
