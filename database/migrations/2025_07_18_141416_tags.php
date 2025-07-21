<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255)->unique();
            $table->timestamps();
        });

        Schema::create('product_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tag_id")->constrained()->onDelete("restrict");
            $table->foreignId("product_id")->constrained()->onDelete("restrict");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * MVC MODel of Laravel
     * Model Views and Controllers
     * Model is our Data storage - with Object Oriented Approach - every data storage needs a database
     * Product is an Ecommerce Shop is a sample model
     * You need a Migration
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('shops');
    }
};
