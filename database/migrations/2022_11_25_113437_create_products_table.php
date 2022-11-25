<?php
/**Product Information

meal_id: Product ID
category: Type of product (beverages/snacks/soups, etc.)
cuisine: Type of cuisine of the product (Indian/Italian, etc.)
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id('');
            $table->string('meal_id');
            $table->string('type_of_product');
            $table->string('type_of_cuisine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
