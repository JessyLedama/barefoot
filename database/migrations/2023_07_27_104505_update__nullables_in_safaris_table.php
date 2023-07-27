<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('safaris', function (Blueprint $table) {
            $table->boolean('entry_fee')->default(false)->change();
            $table->boolean('transport')->default(false)->change();
            $table->boolean('tour_guide')->default(false)->change();    
            $table->boolean('drinks')->default(false)->change();
            $table->boolean('lunch')->default(false)->change();   
            $table->boolean('dinner')->default(false)->change();  
            $table->boolean('accomodation')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('safaris', function (Blueprint $table) {
            //
        });
    }
};
