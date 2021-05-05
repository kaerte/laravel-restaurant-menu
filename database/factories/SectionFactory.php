<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Database\Factories;

use Ctrlc\RestaurantMenu\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{
    protected $model = Section::class;

    public static $sections = ['breakfast','brunch','dinner','teatime','supper'];

    public function definition()
    {
        return [
            'title' => $this->faker->randomElement(self::$sections),
        ];
    }
}
