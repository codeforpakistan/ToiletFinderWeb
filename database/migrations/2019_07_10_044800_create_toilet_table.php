<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToiletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toilets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('city');
            $table->text('address');
            $table->string('added_by')->nullable();
            $table->string('toilet_available')->nullable();
            $table->string('accessible_physical_challenge')->nullable();
            $table->string('parking')->nullable();
            $table->string('sanitary_disposal_bin')->nullable();
            $table->string('payment_required')->nullable();
            $table->string('hand_wash')->nullable();
            $table->string('soap')->nullable();
            $table->string('providers')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('verify');
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
        Schema::dropIfExists('toilets');
    }
}
