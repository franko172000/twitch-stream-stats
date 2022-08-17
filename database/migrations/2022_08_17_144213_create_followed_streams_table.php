<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('followed_streams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('twitch_stream_id')->unique();
            $table->string('channel_name');
            $table->string('stream_title');
            $table->string('game_name');
            $table->string('thumbnail_url');
            $table->integer('viewers_count');
            $table->timestamp('date_started');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('CASCADE');
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
        Schema::dropIfExists('followed_streams');
    }
};
