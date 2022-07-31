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
            $table->id("article_id");
            $table->unsignedBigInteger("project_id");
            $table->foreign("project_id")->references("project_id")->on("projects");
            $table->string("N_prix");
            $table->string("article_name");
            $table->integer("quantité");
            $table->string("unité");
            $table->string("unité");
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
