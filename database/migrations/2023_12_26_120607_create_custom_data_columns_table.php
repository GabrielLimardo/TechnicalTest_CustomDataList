<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomDataColumnsTable extends Migration
{
    public function up()
    {
        Schema::create('custom_data_columns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_id');
            $table->string('name');
            $table->string('data_type');
            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('custom_data_lists')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_data_columns');
    }
}
