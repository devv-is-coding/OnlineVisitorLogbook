<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('model_has_sexes', function (Blueprint $table) {
            $table->unsignedBigInteger('sex_id');
            $table->string('model_type');
            $table->unsignedBigInteger('model_id');

            // Index for faster lookups by model
            $table->index(
                ['model_id', 'model_type'],
                'model_has_sexes_model_id_model_type_index'
            );
            
            $table->foreign('sex_id')
                  ->references('id')
                  ->on('sexes')
                  ->onDelete('cascade');

            $table->primary(
                ['sex_id', 'model_id', 'model_type'],
                'model_has_sexes_sex_model_type_primary'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('model_has_sexes');
    }
};
