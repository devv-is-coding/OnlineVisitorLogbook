<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname');
            $table->integer('age');
            $table->string('sex');
            $table->string('purpose_of_visit');
            $table->bigInteger('contact_number');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
