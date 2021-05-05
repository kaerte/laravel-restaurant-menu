<?php declare(strict_types=1);

namespace Ctrlc\RestaurantMenu\Models;

use Ctrlc\RestaurantMenu\Database\Factories\SectionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order',
    ];

    protected $with = ['dishes'];

    protected $hidden = ['created_at', 'updated_at'];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function dishes(): BelongsToMany
    {
        return $this->belongsToMany(Dish::class);
    }

    protected static function newFactory(): SectionFactory
    {
        return SectionFactory::new();
    }
}
