<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Database\Factories;

use Ctrlc\RestaurantMenu\Models\Allergen;
use Illuminate\Database\Eloquent\Factories\Factory;

class AllergenFactory extends Factory
{
    protected $model = Allergen::class;

    public static $allergens = [
        'gluten',
        'shellfish',
        'egg',
        'fish',
        'peanuts',
        'soybeans',
        'dairy',
        'nuts',
        'celery',
        'mustard',
        'sesame',
        'sulfate',
        'lupins',
        'mollusc',
        'poppy',
    ];

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(self::$allergens),
            'description' => $this->faker->text,
        ];
    }
}
