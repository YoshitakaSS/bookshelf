<?php

use Illuminate\Support\Facades\Schema;
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
            // $table->bigIncrements('book_id');
            $table->string('book_id', 36)->primary();
            $table->string('title');
            $table->text('description');
            $table->string('price');
            $table->string('author');
            $table->string('publisher');
            $table->text('image_link');
            $table->text('google_store_link');
            $table->text('amazon_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.eix
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
