<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Database\Factories;

use Ctrlc\RestaurantMenu\Models\Dish;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    protected $model = Dish::class;

    protected static $foodNames = [
        'Cheese Pizza', 'Hamburger', 'Cheeseburger', 'Bacon Burger', 'Bacon Cheeseburger',
        'Little Hamburger', 'Little Cheeseburger', 'Little Bacon Burger', 'Little Bacon Cheeseburger',
        'Veggie Sandwich', 'Cheese Veggie Sandwich', 'Grilled Cheese',
        'Cheese Dog', 'Bacon Dog', 'Bacon Cheese Dog', 'Pasta',
    ];

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(self::$foodNames),
            'description' => $this->faker->text,
            'option_halal' => $this->faker->boolean,
            'option_vegetarian' => $this->faker->boolean,
            'img_featured' => $this->faker->imageUrl(),
            'img_1' => $this->faker->imageUrl(),
            'img_2' => $this->faker->imageUrl(),
            'img_3' => $this->faker->imageUrl(),
        ];
    }
}
