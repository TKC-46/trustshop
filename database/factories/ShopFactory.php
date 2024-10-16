<?php

namespace Database\Factories;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{

    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(), // ユーザー関連付け
            'name' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
        ];
    }
}
