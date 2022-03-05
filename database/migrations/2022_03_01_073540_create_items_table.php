<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('id');
            $table->string('sku')->nullable();
            $table->string('title')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('openingstock')->nullable();
            $table->integer('bufferstock')->nullable();
            $table->integer('unit')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->nullable(true)->default(true);
            $table->date('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
