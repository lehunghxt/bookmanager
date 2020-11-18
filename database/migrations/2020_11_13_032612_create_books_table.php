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
            $table->increments('id');
            $table->integer('cate_id');
            $table->integer('user_id');
            $table->string('book_code');
            $table->string('book_name');
            $table->string('book_slug');
            $table->string('book_image');
            $table->integer('book_qty');
            $table->string('book_description');
            $table->string('book_status')->default('actice');
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
