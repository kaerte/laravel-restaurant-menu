<?php declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Models;

use Carbon\Carbon;
use Ctrlc\RestaurantMenu\Database\Factories\MenuFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Menu extends Model
{
    use HasFactory;

    protected $dates = [
        'active_from',
        'active_to',
    ];

    protected $fillable = [
        'active_from',
        'active_to',
        'option_halal',
        'option_vegetarian',
    ];

    protected $with = ['sections'];

    protected $hidden = ['created_at', 'updated_at'];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function menuable(): MorphTo
    {
        return $this->morphTo('menuable', 'menuable_type', 'menuable_id');
    }

    public function makeActiveOnDay(Carbon $date): void
    {
        $this->active_from = $date->startOfDay();
        $this->active_to = $date->endOfDay();
    }

    protected static function newFactory(): MenuFactory
    {
        return MenuFactory::new();
    }
}
