<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->integer('author_id')->unsigned()->index();
            $table->foreign('author_id')->references('id')->on('authors');
            $table->string('author_bio')->nullable();
            $table->string('title_slug');
            $table->string('isbn13')->unique();
            $table->string('isbn10')->unique();
            $table->double('price')->default(0.0);
            $table->string('format');
            $table->string('publisher');
            $table->date('pubdate')->nullable();
            $table->string('edition')->nullable();
            $table->string('lexile')->nullable();
            $table->string('subjects')->nullable();
            $table->integer('pages')->default(0);
            $table->string('dimensions')->nullable();
            $table->text('overview')->nullable();
            $table->text('synopsis')->nullable();
            $table->string('excerpt')->nullable();
            $table->string('toc')->nullable();
            $table->string('editorial_reviews')->nullable();
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
        Schema::dropIfExists('books');
    }
}
