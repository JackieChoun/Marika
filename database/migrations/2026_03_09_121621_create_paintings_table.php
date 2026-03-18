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
    Schema::create('paintings', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->date('date');
        $table->decimal('height', 6, 2)->nullable();
        $table->decimal('width', 6, 2)->nullable();
        $table->string('technique')->nullable();
        $table->decimal('price', 10, 2)->nullable();
        $table->boolean('is_available')->default(true);
        $table->string('image_path');
        $table->foreignId('period_id')->nullable()->constrained()->onDelete('set null');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paintings');
    }
};
