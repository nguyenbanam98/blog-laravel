<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->index();
            $table->longText('content');
            $table->integer('author_id')->default(0)->index();
            $table->tinyinteger('active')->default(1)->index();
            // $table->tinyinteger('hot')->default(0);
            $table->integer('view')->default(0);
            $table->text('description')->nullable();
            $table->string('description_seo')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('img_path')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
