<?php declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Models;

use Ctrlc\RestaurantMenu\Database\Factories\DishFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'option_halal',
        'option_vegetarian',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'option_halal' => 'boolean',
        'option_vegetarian' => 'boolean',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $with = ['allergens'];

    public function allergens(): BelongsToMany
    {
        return $this->belongsToMany(Allergen::class);
    }

    protected static function newFactory(): DishFactory
    {
        return DishFactory::new();
    }
}
