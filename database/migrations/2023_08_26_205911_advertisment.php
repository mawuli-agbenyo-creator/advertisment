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
        Schema::create('Advertisment', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('ad_uuid')->unique();
            $table->string('ad_name');
            $table->string('ad_company');
            $table->longText('Description');
            $table->string('ad_type');
            $table->string('Estimated_budget');
            $table->string('File')->nullable();
            $table->string('Project_Start');
            $table->string('Project_End');
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Advertisment');
    }
};
