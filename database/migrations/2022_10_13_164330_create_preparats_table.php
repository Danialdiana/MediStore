<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('preparats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content');
            $table->string('term');
            $table->string('country');
            $table->string('company');
            $table->string('price');
            $table->string('image');
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('category_id')->constrained()->restrictOnDelete();
            $table->foreignId('types_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('preparats');
    }
};
