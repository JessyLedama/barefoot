<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSafariLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('safari_likes'))

            Schema::create('safari_likes', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedInteger('safariId');
                $table->unsignedInteger('customerId');
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
        Schema::dropIfExists('safari_likes');
    }
}
