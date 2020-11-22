<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('name');
            $table->string('slug')->index();
            $table->integer('category_id')->default(0);
            $table->text('content');
            $table->integer('price')->default(0);
            $table->integer('author_id')->default(0)->index();
            $table->integer('sale')->default(0);
            $table->tinyinteger('active')->default(1)->index();
            $table->tinyinteger('hot')->default(0);
            $table->integer('view')->default(0);
            $table->text('description')->nullable();
            $table->string('description_seo')->nullable();
            $table->string('title_seo')->nullable();
            $table->string('img_path')->nullable();
            $table->string('keyword_seo')->nullable();
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
}
