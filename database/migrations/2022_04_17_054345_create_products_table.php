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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('level1')->nullable();
            $table->string('level2')->nullable();
            $table->string('level3')->nullable();
            $table->string('name')->nullable();
            $table->decimal('price', 64, 2)->default(0);
            $table->decimal('price_sp', 64, 2)->default(0);
            $table->integer('amount')->default(0);
            $table->string('properties')->nullable();
            $table->string('joint_purchase')->nullable();
            $table->string('unit')->nullable();
            $table->string('picture')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('products');
    }
};
