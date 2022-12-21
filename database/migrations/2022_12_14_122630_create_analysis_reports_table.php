<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analysis_reports', function (Blueprint $table) {
            $table->id();
            $table->string('crime_id');
            // $table->foreignId('crime_id')->constrained()->onDelete('cascade');
            $table->string('arrest');
            $table->string('officer_in_charge');
            $table->string('court');
            $table->string('remand');
            $table->string('jailed');
            $table->longText('remarks');
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
        Schema::dropIfExists('analysis_reports');
    }
};
