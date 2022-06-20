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
        Schema::create('server_storage_details', function (Blueprint $table) {
            $table->id();
            $table->integer('server_detail_id');
            $table->string('partition');
            $table->integer('allocated_size');
            $table->enum('unit',['KB', 'MB', 'GB', 'TB']);
            $table->string('remarks');
            $table->enum('status',['active','inactive']);
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
        Schema::dropIfExists('server_storage_details');
    }
};
