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
        Schema::create('appartaments', function (Blueprint $table) {
            $table->id();
            $table->integer("m2");
            $table->integer("floor");
            $table->integer("rooms");
            $table->foreignId("appartaments_type_id") -> constrained("types");
            $table->integer("cost");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appartaments');
    }
};
