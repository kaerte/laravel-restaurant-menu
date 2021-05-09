<?php declare(strict_types=1);

use Ctrlc\RestaurantMenu\Models\Allergen;
use Ctrlc\RestaurantMenu\Models\Dish;
use Ctrlc\RestaurantMenu\Models\Menu;
use Ctrlc\RestaurantMenu\Models\Section;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->nullableMorphs('menuable');
            $table->dateTime('active_from');
            $table->dateTime('active_to')->nullable();
            $table->string('title')->nullable();
        });

        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Menu::class);
            $table->string('title')->nullable();
        });

        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->boolean('option_halal')->default(0);
            $table->boolean('option_vegetarian')->default(0);
            $table->string('img_featured')->nullable();
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
        });

        Schema::create('dish_section', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Dish::class);
            $table->foreignIdFor(Section::class);
        });

        Schema::create('allergens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->mediumText('description')->nullable();
        });

        Schema::create('allergen_dish', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(Allergen::class);
            $table->foreignIdFor(Dish::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dish_section');
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('sections');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('allergen_dish');
        Schema::dropIfExists('allergens');
    }
}
