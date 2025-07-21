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
        #CRUD CREATE READ UPDATE AND DELETE
        Schema::create('products', function (Blueprint $table) {
            $table->id();//column will have the column name of id, auto_increment primary_key
            $table->string('name', 255);//data type string
            $table->longText("description");
            $table->foreignId("user_id")->constrained()->onDelete("restrict");
            $table->string("image", 255);
            $table->float("price", 2);
            $table->string("category", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
