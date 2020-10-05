<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('image');
            $table->string('preview');
            $table->text('content');
            $table->tinyInteger('sticky')->default(0);
            $table->string('status')->default('publish');
            $table->bigInteger('view')->default(0);
            $table->string('tags');
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
        Schema::dropIfExists('blogs');
    }
}
