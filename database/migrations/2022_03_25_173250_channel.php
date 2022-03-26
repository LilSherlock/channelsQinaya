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
        Schema::create('channel', function (Blueprint $table) {
            $table->string('name');
            $table->string('logo');
            $table->string('url');
            $table->string('categoryName');
            $table->string('categorySlug');
            $table->string('countryName');
            $table->string('countryCode');
            $table->string('languageName');
            $table->string('languageCode');
            $table->string('tvgId');
            $table->string('tvgName');
            $table->string('tvgUrl');
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
        Schema::table('channel', function (Blueprint $table) {
            //
        });
    }
};
