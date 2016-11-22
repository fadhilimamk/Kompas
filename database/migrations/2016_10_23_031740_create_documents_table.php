<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
          $table->increments('id');
    			$table->string('filename');
    			$table->string('title');
    			$table->string('author');
    			$table->integer('hit');
    			$table->string('filetype');
    			$table->unsignedBigInteger('filesize');
    			$table->date('tanggal_arsip')->default(Carbon::now());
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
        Schema::table('documents', function (Blueprint $table) {
            Schema::drop('documents');
        });
    }
}
