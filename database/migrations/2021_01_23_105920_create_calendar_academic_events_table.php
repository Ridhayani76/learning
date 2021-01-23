<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarAcademicEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_academic_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calendar_academic_id');
            $table->foreign('calendar_academic_id')->references('id')->on('calendar_academics')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->tinyInteger('order');
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
        Schema::dropIfExists('calendar_academic_events');
    }
}
