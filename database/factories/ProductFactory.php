<?php

namespace Database\Factories;

use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name'=> $this->faker->title,
            's_i_unit_id'=> $this->faker->randomDigit,
            'regular_price'=> $this->faker->randomNumber,
            'description'=> $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'discount_price'=> $this->faker->randomNumber,
            'my_shop_id'=> $this->faker->randomDigit,
            
            'cost_price'=> $this->faker->randomNumber,
            'popularity'=> $this->faker->randomDigit,
        ];
    }
}
