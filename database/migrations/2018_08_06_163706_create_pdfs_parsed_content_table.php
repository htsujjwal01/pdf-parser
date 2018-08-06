<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfsParsedContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdfs_parsed_content', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('pdf_id');
            $table->foreign('pdf_id')
                ->references('id')
                ->on('pdfs')
                ->onDelete('cascade');
            $table->unsignedInteger('page_no');
            $table->longText('content');
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
        Schema::dropIfExists('pdfs_parsed_content');
    }
}
