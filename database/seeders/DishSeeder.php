<?php declare(strict_types=1);
namespace Ctrlc\RestaurantMenu\Seeds;

use Ctrlc\RestaurantMenu\Models\Allergen;
use Ctrlc\RestaurantMenu\Models\Dish;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    public function run()
    {
        $base = [
            [
                'name' => 'Keto mushroom omelet',
                'description' => 'French cuisine... Croque Monsieur sounds so much more up-market',
                'additional_info' => null,
                'img_featured' => $this->faker,
                'img_1' => $files->random()->src,
                'img_2' => $files->random()->src,
                'img_3' => $files->random()->src,
            ],
            [
                'name' => 'Keto browned butter asparagus with creamy eggs',
                'description' => 'These rich, buttery, low-carb pancakes totally wow ',
                'additional_info' => null,
                'img_featured' => $files->random()->src,
                'img_1' => $files->random()->src,
                'img_2' => $files->random()->src,
                'img_3' => $files->random()->src,
            ],
            [
                'name' => 'Keto pancakes with berries and whipped cream',
                'description' => 'Try these incredible keto cottage cheese pancakes',
                'additional_info' => null,
                'img_featured' => asset('demo-images/' . $files->random()->src),
                'img_1' => asset('demo-images/' . $files->random()->src),
                'img_2' => asset('demo-images/' . $files->random()->src),
                'img_3' => asset('demo-images/' . $files->random()->src),
            ],
        ];

        $allergens_ids = Allergen::all()->pluck('id')->random(1);

        foreach ($base as $item) {
            $p = new Dish($item);
            $p->save();

            $p->allergens()->sync($allergens_ids);
        }
    }
}
