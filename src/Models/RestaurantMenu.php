<?php

declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Models;

use Ctrlc\RestaurantMenu\Database\Factories\RestaurantMenuFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantMenu extends Model
{
    use HasFactory;

    protected static function newFactory(): RestaurantMenuFactory
    {
        return RestaurantMenuFactory::new();
    }
}
