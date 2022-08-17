<?php

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
        Schema::create('active_stream_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('active_stream_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->foreign('active_stream_id')->references('id')->on('active_streams');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('active_stream_tag');
    }
};
