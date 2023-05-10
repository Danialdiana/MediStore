<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('preparats', function (Blueprint $table) {
            $table->string('name_en')->nullable();
            $table->string('name_kz')->nullable();
            $table->string('name_ru')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_kz')->nullable();
            $table->text('content_ru')->nullable();
            $table->string('term_en')->nullable();
            $table->string('term_kz')->nullable();
            $table->string('term_ru')->nullable();
            $table->string('country_en')->nullable();
            $table->string('country_kz')->nullable();
            $table->string('country_ru')->nullable();
            $table->string('company_en')->nullable();
            $table->string('company_kz')->nullable();
            $table->string('company_ru')->nullable();
        });
    }

    public function down()
    {
        Schema::table('preparats', function (Blueprint $table) {
            $table->dropColumn('name_en');
            $table->dropColumn('name_ru');
            $table->dropColumn('name_kz');
            $table->dropColumn('content_en');
            $table->dropColumn('content_kz');
            $table->dropColumn('content_ru');
            $table->dropColumn('term_en');
            $table->dropColumn('term_kz');
            $table->dropColumn('term_ru');
            $table->dropColumn('country_en');
            $table->dropColumn('country_kz');
            $table->dropColumn('country_ru');
            $table->dropColumn('company_en');
            $table->dropColumn('company_kz');
            $table->dropColumn('company_ru');
        });
    }
};
