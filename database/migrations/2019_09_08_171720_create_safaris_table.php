<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSafarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('safaris'))
        
            Schema::create('safaris', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('slug');
                $table->decimal('price_from')->nullable();
                $table->decimal('residents_price')->nullable();
                $table->decimal('non_residents_price')->nullable();
                $table->boolean('entry_fee')->default(false);
                $table->boolean('transport')->default(false);
                $table->boolean('tour_guide')->default(false);
                $table->boolean('drinks')->default(false);
                $table->boolean('lunch')->default(false);
                $table->boolean('dinner')->default(false);
                $table->boolean('accomodation')->default(false);
                $table->string('location')->nullable();
                $table->string('link')->nullable();
                $table->string('map')->nullable();
                $table->boolean('featured')->default(false);
                $table->string('cover')->nullable();
                $table->string('gallery')->nullable();
                $table->text('description')->nullable();
                // $table->text('shortDescription')->nullable();
                $table->unsignedInteger('subcategoryId')->nullable();
                $table->unsignedInteger('itineraryId')->nullable();
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
        Schema::dropIfExists('safaris');
    }
}
