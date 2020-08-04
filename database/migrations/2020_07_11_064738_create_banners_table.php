<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('picture')->nullable();
            $table->string('link')->nullable();
            $table->string('promotional_message')->nullable();
            $table->string('html_banner')->nullable();
            $table->tinyInteger('is_active')->nullable();
            $table->tinyInteger('is_draft')->nullable();
            $table->tinyInteger('soft_delete')->nullable();
            $table->tinyInteger('max_display')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
