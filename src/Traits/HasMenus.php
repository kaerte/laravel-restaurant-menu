<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Traits;

use Ctrlc\RestaurantMenu\Models\Menu;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasMenus
{
    public function menus(): MorphMany
    {
        return $this->morphMany(Menu::class, 'menuable');
    }
}
