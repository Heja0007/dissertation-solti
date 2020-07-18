<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrekkingRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trekking_routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('duration')->nullable();
            $table->string('difficulty')->nullable();
            $table->string('maximum_altitude')->nullable();
            $table->longText('description')->nullable();
            $table->longText('itinerary')->nullable();
            $table->string('cost')->nullable();
            $table->longText('cost_details')->nullable();
            $table->enum('status' , ['Active' ,'Inactive'])->default('Active');
            $table->string('type')->nullable();
            $table->string('destination')->nullable();
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
        Schema::dropIfExists('trekking_routes');
    }
}
