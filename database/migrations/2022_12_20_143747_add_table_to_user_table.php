<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('number')->default(0);
            $table->string('year')->default(0);
            $table->string('cvc')->default(0);
            $table->string('summa')->default(0);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('number');
            $table->dropColumn('year');
            $table->dropColumn('cvc');
            $table->dropColumn('summa');
        });
    }
};
