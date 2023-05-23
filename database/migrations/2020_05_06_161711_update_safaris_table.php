<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSafarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('safaris', function (Blueprint $table) {
                    $table->string('entry_fee')->change();
                    $table->string('transport')->change();
                    $table->string('tour_guide')->change();
                    $table->string('drinks')->change();
                    $table->string('lunch')->change();
                    $table->string('dinner')->change();
                    $table->string('accomodation')->change();
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
