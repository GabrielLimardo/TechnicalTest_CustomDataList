<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomDataRowsTable extends Migration
{
    public function up()
    {
        Schema::create('custom_data_rows', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('list_id'); // Clave foránea a la tabla custom_data_lists.
            $table->unsignedBigInteger('column_id'); // Clave foránea a la tabla custom_data_columns.
            $table->text('value'); // Valor de la celda correspondiente.

            $table->timestamps();

            $table->foreign('list_id')->references('id')->on('custom_data_lists')->onDelete('cascade');
            $table->foreign('column_id')->references('id')->on('custom_data_columns')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('custom_data_rows');
    }
}
