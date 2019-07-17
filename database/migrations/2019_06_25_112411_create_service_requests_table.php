<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('provider_id');
            $table->string('provider_name');
            $table->string('user_name');
            $table->integer('house_number');
            $table->string('time_range')->nullable();
            $table->date('service_date');
            $table->time('service_time');
            $table->string('service_location');
            $table->integer('service_length');
            $table->string('description');
            $table->boolean('is_accepted')->nullable();
            $table->boolean("is_done")->nullable();
            $table->string('user_email');
            $table->string('provider_email');
            $table->string('user_phone')->nullable();
            $table->string('provider_phone')->nullable();
            $table->boolean('is_reviewed')->nullable();
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
        Schema::dropIfExists('service_requests');
    }
}
