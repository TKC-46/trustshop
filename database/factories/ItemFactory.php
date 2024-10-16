<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;


class ItemFactory extends Factory
{

    protected $model = Item::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FakerFactory::create('ja_JP');

        return [
            'shop_id' => Shop::factory(), // Shopと関連付け
            'name' => $faker->word, // 日本語の単語
            'description' => $faker->sentence, // 日本語の文章
            'price' => $faker->randomFloat(2, 100, 500000), // 価格
            'stock' => $faker->numberBetween(1, 20), // 在庫数
            'created_at' => now(),
            'updated_at' => null,
            'deleted_at' => null,
        ];
    }
}
