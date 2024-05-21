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
        Schema::disableForeignKeyConstraints();

        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operator_id');
            $table->foreign('operator_id')->references('id')->on('operators')->cascadeOnDelete();
            $table->enum('stato', ["ASSEGNATO", "IN LAVORAZIONE", "CHIUSO"]);
            $table->string('titolo', 100);
            $table->string('slug');
            $table->text('descrizione')->nullable();
            $table->string('categoria');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
