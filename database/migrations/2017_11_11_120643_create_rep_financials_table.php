<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rep_financials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('filename');
            $table->enum('enable',['0','1'])->nullable();
            $table->integer('download_count')->default(0);
            $table->string('type')->default('rep_financial');
            $table->rememberToken();
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
        Schema::dropIfExists('rep_financials');
    }
}
