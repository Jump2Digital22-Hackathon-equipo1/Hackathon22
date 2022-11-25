<?php
/**weekly demand

id: unique ID of the instance
week: Week number
center_id: ID of the center
meal_id: Product ID
checkout_price: Final sale price of the product (after applying discounts, transportation charges, etc.)
base_price: Base price of the product
emailer_for_promotion: Email campaign sent to promote the product (1: Yes it has been sent; 0: It has not been sent)
homepage_featured: Product promoted on the web page
num_orders: Number of orders for each product

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
        Schema::create('weekly_demand', function (Blueprint $table) {
            $table->id();
            $table->integer('week_number');
            $table->integer('center_id');
            $table->integer('meal_id');
            $table->integer('checkout_price');
            $table->integer('base_price');
            $table->string('emailer_for_promotion');
            $table->string('homepage_featured_url');
            $table->integer('num_orders');
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
        Schema::dropIfExists('weekly_demand');
    }
};
