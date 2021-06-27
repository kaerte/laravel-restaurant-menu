<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Traits;

use Carbon\Carbon;
use Ctrlc\RestaurantMenu\Models\Menu;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasMenus
{
    public function menus(): MorphMany
    {
        return $this->morphMany(Menu::class, 'menuable');
    }

    public function menusForDays(int $numberOfDays = 1, ?Carbon $fromDate = null): MorphMany
    {
        if ($fromDate == null) {
            $fromDate = now();
        }

        $toDate = $fromDate->copy()->addDays($numberOfDays);

        return $this->morphMany(Menu::class, 'menuable')
            ->whereBetween('active_from', [$fromDate, $toDate])
            ->whereBetween('active_to', [$fromDate, $toDate])
            ->orderBy('active_from');
    }

    public function menuToday(): MorphOne
    {
        $fromDate = now()->startOfDay();
        $toDate = $fromDate->copy()->endOfDay();

        return $this->morphOne(Menu::class, 'menuable')
            ->whereBetween('active_from', [$fromDate, $toDate])
            ->whereBetween('active_to', [$fromDate, $toDate])
            ->orderBy('active_from');
    }
}
