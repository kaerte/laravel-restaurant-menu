<?php declare(strict_types=1);

namespace Ctrlc\Menu\Seeds;

use Carbon\Carbon;
use Ctrlc\Menu\Models\Dish;
use Ctrlc\Menu\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 8; $i++) {
            $d =  Carbon::now()->addDay($i - 1)->startOfDay();
            $base[] =  [
                'date' => $d,
                'title' => 'Menu for day: ' . $d->format('d m'),
                'option_halal' => 1,
                'option_vegetarian' => 1,
            ];
        }
        $dishes = Dish::all();

        $full_dinner = \App\Product::find(1);
        $single_meal = \App\Product::find(2);

        foreach ($base as $m) {
            //full
            $menu = new Menu($m);
            $full_dinner->menus()->save($menu);
            $menu->dishes()->attach($dishes);
//            //single
//            $menu = new Menu($m);
//            $menu->save();
//            $menu->dishes()->attach($dishes[1]);
//            $single_meal->menus()->attach($menu->id);
        }
    }
}
