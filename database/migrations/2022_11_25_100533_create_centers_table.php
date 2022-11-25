<?php
/**Center information

center_id: ID of the center
city_code: Code for a particular city
region_code: Code for a particular region
center_type: Type of Supermarket
op_area: Area of ​​operations and size of supermarket (in km^2) */

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
        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->integer('center_id');
            $table->integer('city_code');
            $table->integer('region_code');
            $table->string('center_type');
            $table->integer('op_area');
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
        Schema::dropIfExists('center_information');
    }
};
