<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnsweresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answeres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ask_id')->unsigned()->index();
            $table->string('slug', 100);
            $table->text('answere');
            $table->string('status_answere')->nullable();
            $table->foreign('ask_id')->references('id')->on('asks')->onDelete('cascade');
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
        Schema::dropIfExists('answeres');
    }
}
