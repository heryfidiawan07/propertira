<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('preview');
            $table->string('address');
            $table->string('price_text')->nullable();
            $table->string('price');
            $table->text('update')->nullable();
            $table->text('content');
            $table->dateTime('event')->nullable();
            $table->tinyInteger('sticky')->default(0);
            $table->string('status')->default('publish');
            $table->bigInteger('view')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->softDeletesTz();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
