<?php declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Seeds;

use Ctrlc\RestaurantMenu\Models\Allergen;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
{
    public function run()
    {
        $allergens = [
            [ 'name' => 'gluten', 'icon' => null ],
            [ 'name' => 'shellfish', 'icon' => null ],
            [ 'name' => 'egg', 'icon' => null ],
            [ 'name' => 'fish', 'icon' => null ],
            [ 'name' => 'peanuts', 'icon' => null ],
            [ 'name' => 'soybeans', 'icon' => null ],
            [ 'name' => 'dairy', 'icon' => null ],
            [ 'name' => 'nuts', 'icon' => null ],
            [ 'name' => 'celery', 'icon' => null ],
            [ 'name' => 'mustard', 'icon' => null ],
            [ 'name' => 'sesame', 'icon' => null ],
            [ 'name' => 'sulfate', 'icon' => null ],
            [ 'name' => 'lupins', 'icon' => null ],
            [ 'name' => 'mollusc', 'icon' => null ],
            [ 'name' => 'poppy', 'icon' => null ],
        ];

        foreach ($allergens as $allergen) {
            $record = new Allergen($allergen);
            $record->save();
        }
    }
}
