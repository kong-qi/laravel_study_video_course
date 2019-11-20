<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagRelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_rels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tag_id')->comment('tag_id');
            $table->string('model_type')->comment('类型');
            $table->integer('model_id')->comment('类型id');
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
        Schema::dropIfExists('tag_rels');
    }
}
