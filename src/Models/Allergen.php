<?php declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Models;

use Ctrlc\RestaurantMenu\Database\Factories\AllergenFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Allergen extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }

    protected static function newFactory(): AllergenFactory
    {
        return AllergenFactory::new();
    }
}
