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
        Schema::create('lookups', function (Blueprint $table) {
            $table->id();
            $table->string('admin_prefix')->default('admin');
            $table->string('title');
            $table->string('meta_tags');
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->longText('about_us');
            $table->longText('mission');
            $table->longText('vision');
            $table->longText('goals');
            $table->longText('privacy_policy');
            $table->longText('terms_conditions');
            $table->longText('pages_seo');
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
        Schema::dropIfExists('lookups');
    }
};
