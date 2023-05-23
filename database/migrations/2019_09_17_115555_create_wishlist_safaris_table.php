<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWishlistSafarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('wishlist_safaris'))

            Schema::create('wishlist_safaris', function (Blueprint $table) {
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
        Schema::dropIfExists('wishlist_safaris');
    }
}
