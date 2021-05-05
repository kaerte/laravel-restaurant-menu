<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Database\Factories;

use Carbon\Carbon;
use Ctrlc\RestaurantMenu\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    protected $model = Menu::class;

    public function definition()
    {
        $date = Carbon::now()->startOfDay();

        return [
            'active_from' => $date,
            'active_to' => $date->endOfDay(),
            'title' => 'Menu for day ' . $date->toDateString(),
        ];
    }
}
