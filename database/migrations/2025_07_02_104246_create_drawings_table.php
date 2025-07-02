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
        Schema::create('drawings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título SEO-friendly
            $table->string('slug')->unique(); // URL amigable
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->text('svg_content'); // Aquí irá el contenido SVG
            $table->unsignedInteger('downloads')->default(0); // contador de descargas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drawings');
    }
};
